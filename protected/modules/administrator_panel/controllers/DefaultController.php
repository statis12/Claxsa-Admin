<?php

class DefaultController extends Controller
{
	public $layout='//layouts/main';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLogin()
	{
		$this->layout='//layouts/login';
		$model=new AdminLoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['AdminLoginForm']))
		{
			$model->attributes=$_POST['AdminLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
					$this->redirect(array('default/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionForgot()
	{
		$this->layout='//layouts/login';
	
		$model=new AdminForgotForm;
		if(isset($_POST['AdminForgotForm']))
		{
			$model->attributes=$_POST['AdminForgotForm'];
			if($model->validate())
			{
				$email = $model->email;
				$cari=Admin::model()->find('email=:email', array(':email'=>$email));				
				
				if($cari!==null)
					{
						$headers=$cari->email;
						$password=$this->genRandomString(5);
						$cari->password = md5($password . md5(Yii::app()->params['saltAdmin']));
						$subject="Password";
						$body="<br>Username : ".$cari->username."<br>Password : ".$password;
						$vars=array('content'=>$body);
						$subject = 'Reset Passoword';
						$this->sendEmail($headers, $subject, 'forget', $vars);
						//$cari->password='a';
						$cari->save();
					}
				$this->refresh();
			}else{
				
			}
		}
		$this->render('forgot',array('model'=>$model));
	}
	
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}	
	
	public function actionLogout()
	{
		Yii::app()->getModule('administrator_panel')->user->logout(false);
        $this->redirect(array('default/index'));
	}	
	
	function genRandomString($length=10, $chars='', $type=array()) {
		//initialize the characters
		$alphaSmall = 'abcdefghijklmnopqrstuvwxyz';
		$alphaBig = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '0123456789';
		$othr = '`~!@#$%^&*()/*-+_=[{}]|;:",<>.\/?' . "'";

		$characters = "";
		$string = '';  
		//defaults the array values if not set
		isset($type['alphaSmall'])  ? $type['alphaSmall']: $type['alphaSmall'] = true;  //alphaSmall - default true  
		isset($type['alphaBig'])    ? $type['alphaBig']: $type['alphaBig'] = true;      //alphaBig - default true
		isset($type['num'])         ? $type['num']: $type['num'] = true;                //num - default true
		isset($type['othr'])        ? $type['othr']: $type['othr'] = false;             //othr - default false 
		isset($type['duplicate'])   ? $type['duplicate']: $type['duplicate'] = true;    //duplicate - default true     
		
		if (strlen(trim($chars)) == 0) { 
			$type['alphaSmall'] ? $characters .= $alphaSmall : $characters = $characters;
			$type['alphaBig'] ? $characters .= $alphaBig : $characters = $characters;
			$type['num'] ? $characters .= $num : $characters = $characters;
			$type['othr'] ? $characters .= $othr : $characters = $characters;        
		}
		else
			$characters = str_replace(' ', '', $chars);
		  
		if($type['duplicate'])
			for (; $length > 0 && strlen($characters) > 0; $length--) {
				$ctr = mt_rand(0, (strlen($characters)) - 1);
				$string .= $characters[$ctr];
			}
		else
			$string = substr (str_shuffle($characters), 0, $length);
	   
		return $string;
	}	
	
	private function sendEmail($to, $subject, $view, $vars)
    {   
         $message = new YiiMailMessage;
         $message->view = $view;
         $message->setBody(array('vars'=>$vars), 'text/html');
         $message->subject = $subject;
         $message->addTo($to);
         $message->from = Yii::app()->params['supportEmail'];
         Yii::app()->mail->send($message);            
    }   	
}