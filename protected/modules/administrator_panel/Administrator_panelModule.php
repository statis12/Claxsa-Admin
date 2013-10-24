<?php

class Administrator_panelModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'administrator_panel.models.*',
			'administrator_panel.components.*',
		));
		Yii::app()->theme = 'admin_claxsa'; 
		$this->setComponents(array(
				'user' => array(
						'class' => 'CWebUser',
						'loginUrl' => Yii::app()->createUrl('administrator_panel/default/login'),
						'stateKeyPrefix' => '_admin',
				)
		));		
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
                // this method is called before any module controller action is performed
                // you may place customized code here
                $route = $controller->id . '/' . $action->id;
                $publicPages = array(
                    'default/login',
                    'default/error',
                    'default/forgot',
                );
                if (!Yii::app()->authManager->checkAccess('administrator', Yii::app()->getModule('administrator_panel')->user->name) && !in_array($route, $publicPages))
                {            
                    Yii::app()->getModule('administrator_panel')->user->loginRequired();
                }
				else				
					return true;
		}
		else
			return false;
	}
}
