<?php

/**
 * This is the model class for table "tbl_comment".
 *
 * The followings are the available columns in table 'tbl_comment':
 * @property integer $id
 * @property string $resource_type
 * @property integer $resource_id
 * @property string $poster_type
 * @property integer $poster_id
 * @property string $content
 * @property string $creation_date
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'tbl_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resource_id, poster_id', 'numerical', 'integerOnly'=>true),
			array('resource_type, poster_type', 'length', 'max'=>45),
			array('content, creation_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, resource_type, resource_id, poster_type, poster_id, content, creation_date', 'safe', 'on'=>'search'),
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
			'resource_type' => 'Resource Type',
			'resource_id' => 'Resource',
			'poster_type' => 'Poster Type',
			'poster_id' => 'Poster',
			'content' => 'Content',
			'creation_date' => 'Creation Date',
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
		$criteria->compare('resource_type',$this->resource_type,true);
		$criteria->compare('resource_id',$this->resource_id);
		$criteria->compare('poster_type',$this->poster_type,true);
		$criteria->compare('poster_id',$this->poster_id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('creation_date',$this->creation_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}