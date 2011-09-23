<?php

/**
 * This is the model class for table "song".
 *
 * The followings are the available columns in table 'song':
 * @property integer $id
 * @property string $title
 * @property string $src
 * @property string $desc
 * @property string $lyric
 * @property string $image
 * @property string $genre
 * @property string $year
 * @property string $date_create
 * @property string $date_update
 */
class Song extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Song the static model class
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
		return 'song';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, src', 'required'),
			array('title, src', 'length', 'max'=>100),
			array('image', 'length', 'max'=>45),
			array('genre, year', 'length', 'max'=>10),
			array('desc, lyric, date_create, date_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, src, desc, lyric, image, genre, year, date_create, date_update', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'src' => 'Src',
			'desc' => 'Desc',
			'lyric' => 'Lyric',
			'image' => 'Image',
			'genre' => 'Genre',
			'year' => 'Year',
			'date_create' => 'Date Create',
			'date_update' => 'Date Update',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('src',$this->src,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('lyric',$this->lyric,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('genre',$this->genre,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_update',$this->date_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}