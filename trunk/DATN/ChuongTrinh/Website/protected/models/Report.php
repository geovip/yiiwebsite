<?php

/**
 * This is the model class for table "tbl_report".
 *
 * The followings are the available columns in table 'tbl_report':
 * @property integer $id
 * @property integer $user_id
 * @property string $category
 * @property string $description
 * @property string $subject_type
 * @property integer $subject_id
 * @property string $creation_date
 * @property integer $read
 */
class Report extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Report the static model class
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
		return 'tbl_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, subject_id, read', 'numerical', 'integerOnly'=>true),
			array('category, subject_type', 'length', 'max'=>45),
			array('description, creation_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, category, description, subject_type, subject_id, creation_date, read', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'category' => 'Category',
			'description' => 'Description',
			'subject_type' => 'Subject Type',
			'subject_id' => 'Subject',
			'creation_date' => 'Creation Date',
			'read' => 'Read',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('subject_type',$this->subject_type,true);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('read',$this->read);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}