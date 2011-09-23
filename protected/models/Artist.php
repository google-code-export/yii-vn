<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $id
 * @property string $name
 * @property string $realname
 * @property integer $isauthor
 * @property string $avatar
 * @property string $about
 * @property string $company
 * @property string $birthday
 */
class Artist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Artist the static model class
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
		return 'person';
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
			array('isauthor', 'numerical', 'integerOnly'=>true),
			array('name, realname, avatar, company, birthday', 'length', 'max'=>45),
			array('about', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, realname, isauthor, avatar, about, company, birthday', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'realname' => 'Realname',
			'isauthor' => 'Isauthor',
			'avatar' => 'Avatar',
			'about' => 'About',
			'company' => 'Company',
			'birthday' => 'Birthday',
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
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('isauthor',$this->isauthor);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('birthday',$this->birthday,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}