<?php

/**
 * This is the model class for table "tbl_photo".
 *
 * The followings are the available columns in table 'tbl_photo':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $creation_date
 * @property string $modified_date
 * @property integer $collection_id
 * @property string $owner_type
 * @property integer $user_id
 * @property integer $file_id
 * @property integer $view_count
 * @property integer $comment_count
 * @property integer $rating
 * @property integer $total
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Photo the static model class
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
		return 'tbl_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('collection_id, user_id, file_id, view_count, comment_count, rating, total', 'numerical', 'integerOnly'=>true),
			array('title, owner_type', 'length', 'max'=>45),
			array('description, creation_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, creation_date, modified_date, collection_id, owner_type, user_id, file_id, view_count, comment_count, rating, total', 'safe', 'on'=>'search'),
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
            'comments' => array(self::HAS_MANY, 'Comment', 'resource_id', 'condition'=>'comments.resource_type=:resource_type', 'params'=>array(':resource_type'=> 'photo_comment'), 'order'=>'comments.creation_date DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'resource_id'),
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
			'description' => 'Description',
			'creation_date' => 'Creation Date',
			'modified_date' => 'Modified Date',
			'collection_id' => 'Collection',
			'owner_type' => 'Owner Type',
			'user_id' => 'User',
			'file_id' => 'File',
			'view_count' => 'View Count',
			'comment_count' => 'Comment Count',
			'rating' => 'Rating',
			'total' => 'Total',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('collection_id',$this->collection_id);
		$criteria->compare('owner_type',$this->owner_type,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('file_id',$this->file_id);
		$criteria->compare('view_count',$this->view_count);
		$criteria->compare('comment_count',$this->comment_count);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    //get all photo of album
    public function listPhoto($album_id){
        $condition= array(
                        'condition'=>'collection_id=:collection_id',
			             'params'=>array(':collection_id'=>$album_id)
        );
        return self::model()->findAll($condition);
    }
    //get 1 picture in album
    public function getPhoto($album_id){
        $condition= array(
                        'condition'=>'collection_id=:collection_id',
			             'params'=>array(':collection_id'=>$album_id)
        );
        return self::model()->find($condition);
    }
    public function getPhotoFile($photo_id){
        $condition= array(
                        'condition'=>'id=:id',
			             'params'=>array(':id'=>$photo_id)
        );
        return self::model()->find($condition);
    }
    //check rated
    public function checkRated($photo_id, $user_id)
    {
        $condition= array(
                        'condition'=>'user_id=:user_id AND photo_id=:photo_id',
			             'params'=>array(':user_id'=>$user_id, ':photo_id'=> $photo_id)
        );
        $row= Rating::model()->findAll($condition);
        if (count($row)>0) return true;
        return false;
    }
}