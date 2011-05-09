<?php

/**
 * This is the model class for table "{{place}}".
 *
 * The followings are the available columns in table '{{place}}':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $img_file
 * @property double $lat
 * @property double $long
 * @property string $creation_date
 * @property string $modified_date
 */
class Place extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Place the static model class
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
		return '{{place}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lat, long', 'numerical'),
			array('name, address, img_file', 'length', 'max'=>255),
                        array('name, address', 'required'),
                        array('img_file', 'file', 'types'=>'jpg, gif, png'),
			array('creation_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, img_file, lat, long, creation_date, modified_date', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'img_file' => 'Image File',
			'lat' => 'Lat',
			'long' => 'Long',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('img_file',$this->img_file,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('long',$this->long);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        // remove upload
        
        protected function beforeDelete()
        {                     
            unlink(Yii::app()->basePath . '/uploads/place/' . $this->img_file);
            return parent::beforeDelete(); 
        }
}