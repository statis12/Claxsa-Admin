<?php

/**
 * This is the model class for table "left_menu".
 *
 * The followings are the available columns in table 'left_menu':
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $sort
 * @property integer $top_menu_id
 * @property string $controller
 *
 * The followings are the available model relations:
 * @property TopMenu $topMenu
 */
class LeftMenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LeftMenu the static model class
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
		return 'left_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url, top_menu_id, controller', 'required'),
			array('sort, top_menu_id', 'numerical', 'integerOnly'=>true),
			array('name, controller', 'length', 'max'=>100),
			array('url', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url, sort, top_menu_id, controller', 'safe', 'on'=>'search'),
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
			'topMenu' => array(self::BELONGS_TO, 'TopMenu', 'top_menu_id'),
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
			'url' => 'Url',
			'sort' => 'Sort',
			'top_menu_id' => 'Top Menu',
			'controller' => 'Controller',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('top_menu_id',$this->top_menu_id);
		$criteria->compare('controller',$this->controller,true);

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
	
	public function getLeftMenu($controller){
		$leftMenus = $this->findAll();
		$topId = 0;
		if($leftMenus){
			foreach($this->findAll() as $leftMenu){
				if(strtolower($leftMenu->controller) === strtolower($controller)){
					$menu = "";
					foreach($leftMenu->topMenu->leftMenus as $leftMenus){
						$active = strtolower($leftMenus->controller) === strtolower($controller)?"class='active'":"";
						$menu.="<li ".$active.">";
                        $menu.="<a href='".Yii::app()->createurl('administrator_panel/'.$leftMenus->url)."'><i class='icon-chevron-right'></i> ".$leftMenus->name."</a>";
						$menu.="</li>";
					}
					return $menu;
					break;
				}
			}
		}
	}
	
}