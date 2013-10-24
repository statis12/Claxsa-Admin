<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Admin extends CActiveRecord
{
	public $current_password;
	public $new_password;
	public $confirm_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,  name, email', 'required'),
			array('username', 'length', 'max'=>80),
			array('username', 'unique', 'message'=>'username has been registered'),
			array('password, email', 'length', 'max'=>100),
			array('name', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>25),
			array('address,created_date', 'safe'),
			array('new_password, confirm_password', 'required', 'on'=>'insert'),
			array('current_password, new_password, confirm_password', 'length', 'max'=>32),
			array('confirm_password', 'compare', 'compareAttribute'=>'new_password'),			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name, email, phone, address,created_date,modified_date', 'safe', 'on'=>'search'),
			array('modified_date','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'update'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'address' => 'Address',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeValidate()
	{
		if (!$this->isNewRecord)
		{
			if (!empty($this->new_password) && !empty($this->confirm_password))
			{
				if (empty($this->current_password))
				{
					$this->addError('current_password', 'Current Password cannot be blank.');
				}
				else if (md5($this->current_password.md5(Yii::app()->params['saltAdmin'])) !== $this->password)
				{
					$this->addError('current_password', 'Current Password must be repeated exactly.');
				}
			}
		}

		return true;
	}	
	
	public function beforeSave()
	{
		if (!empty($this->new_password) && !empty($this->confirm_password))
		{
			$this->password = md5($this->new_password. md5(Yii::app()->params['saltAdmin']));
		}
		
		if($this->isNewRecord)
		{
			$this->created_date=date("Y-m-d H:i:s");
		}
		
			return true;
	}
	
}