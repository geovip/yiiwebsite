<?php

/**
 * This is the model class for table "{{adsvertisment}}".
 *
 * The followings are the available columns in table '{{adsvertisment}}':
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $img_file
 * @property string $creation_date
 * @property string $modified_date
 */
class Adsvertisment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Adsvertisment the static model class
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
		return '{{adsvertisment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url, img_file', 'length', 'max'=>255),
			array('creation_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url, img_file, creation_date, modified_date', 'safe', 'on'=>'search'),
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
			'url' => 'Url',
			'img_file' => 'Img File',
			'creation_date' => 'Creation Date',
			'modified_date' => 'Modified Date',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('img_file',$this->img_file,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}