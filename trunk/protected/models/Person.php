<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property string $id
 * @property string $name
 * @property string $realname
 * @property integer $job
 * @property string $avatar
 * @property string $about
 * @property string $company
 * @property integer $birthday
 * @property integer $gender
 */
class Person extends CActiveRecord
{
	const S_IMAGES      = '/media/images/';
        const S_THUMBNAIL   = '/media/images/thumbnails/';
        const S_NOIMAGE     = 'noimage.gif';
        /**
	 * Returns the static model of the specified AR class.
	 * @return Person the static model class
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
			array('job, birthday, gender', 'numerical', 'integerOnly'=>true),
			array('name, realname, avatar, company', 'length', 'max'=>255),
                        array('avatar', 'file',
                            'types'     => 'gif, jpg, png',
                            'maxSize'   =>1024 * 1024 * 2,
                            'tooLarge'  =>'The file was larger than 2MB. Please upload a smaller file.',
                            'allowEmpty'=>true,
                        ),
			array('about', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, realname, job, avatar, about, company, birthday, gender', 'safe', 'on'=>'search'),
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
			'job' => 'Job',
			'avatar' => 'Avatar',
			'about' => 'About',
			'company' => 'Company',
			'birthday' => 'Birthday',
			'gender' => 'Gender',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('job',$this->job);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('birthday',$this->birthday);
		$criteria->compare('gender',$this->gender);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}