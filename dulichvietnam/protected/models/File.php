<?php

/**
 * This is the model class for table "tbl_file".
 *
 * The followings are the available columns in table 'tbl_file':
 * @property integer $id
 * @property integer $parent_file_id
 * @property string $type
 * @property string $parent_type
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $creation_date
 * @property string $modified_date
 * @property string $storage_type
 * @property string $storage_path
 * @property string $extension
 * @property string $name
 * @property string $mime_major
 * @property string $mime_minor
 * @property string $size
 * @property string $hash
 */
class File extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return File the static model class
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
		return 'tbl_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_file_id, parent_id, user_id', 'numerical', 'integerOnly'=>true),
			array('type, parent_type, storage_type', 'length', 'max'=>45),
			array('storage_path, name', 'length', 'max'=>255),
			array('extension', 'length', 'max'=>8),
			array('mime_major, mime_minor, hash', 'length', 'max'=>64),
			array('size', 'length', 'max'=>20),
			array('creation_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_file_id, type, parent_type, parent_id, user_id, creation_date, modified_date, storage_type, storage_path, extension, name, mime_major, mime_minor, size, hash', 'safe', 'on'=>'search'),
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
			'parent_file_id' => 'Parent File',
			'type' => 'Type',
			'parent_type' => 'Parent Type',
			'parent_id' => 'Parent',
			'user_id' => 'User',
			'creation_date' => 'Creation Date',
			'modified_date' => 'Modified Date',
			'storage_type' => 'Storage Type',
			'storage_path' => 'Storage Path',
			'extension' => 'Extension',
			'name' => 'Name',
			'mime_major' => 'Mime Major',
			'mime_minor' => 'Mime Minor',
			'size' => 'Size',
			'hash' => 'Hash',
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
		$criteria->compare('parent_file_id',$this->parent_file_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('parent_type',$this->parent_type,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('storage_type',$this->storage_type,true);
		$criteria->compare('storage_path',$this->storage_path,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mime_major',$this->mime_major,true);
		$criteria->compare('mime_minor',$this->mime_minor,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('hash',$this->hash,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    public function getFile($file_id){
        return self::model()->findByPk($file_id);
    }
    //get photo orignal
    //dang lam do doan ni:d
    public function getFileOrginal($file_id){
        $condition= array(
                        'condition'=>'parent_file_id=:id AND type=:type',
                        'params'=>array(':id'=>$file_id, ':type'=> 'orgin')
        );
        return self::model()->find($condition);
    }
    
}