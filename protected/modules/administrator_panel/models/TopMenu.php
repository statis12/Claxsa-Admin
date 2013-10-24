<?php

/**
 * This is the model class for table "top_menu".
 *
 * The followings are the available columns in table 'top_menu':
 * @property integer $id
 * @property string $name
 * @property integer $sort
 *
 * The followings are the available model relations:
 * @property LeftMenu[] $leftMenus
 */
class TopMenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TopMenu the static model class
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
		return 'top_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sort', 'safe', 'on'=>'search'),
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
			'leftMenus' => array(self::HAS_MANY, 'LeftMenu', 'top_menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'sort' => 'Sort',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{ 
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->created_date=date("Y-m-d H:i:s");
			}
			return true;
		}
		else
		return false;
	}
	
	public function getFirstParentUrl(){
		return $this->leftMenus[0]->url;
	}
	
	public function getParentIsActive($controller){
		$active = "";
		if($this->leftMenus){
			foreach($this->leftMenus as $leftMenu){
				if(strtolower($leftMenu->controller) === strtolower($controller)){
					return "class='active'";
					break;
				}
			}
		}
		return $active;
	}
}