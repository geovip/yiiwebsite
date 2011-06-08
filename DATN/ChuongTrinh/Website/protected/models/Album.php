<?php

/**
 * This is the model class for table "tbl_album".
 *
 * The followings are the available columns in table 'tbl_album':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $owner_type
 * @property integer $user_id
 * @property integer $category_id
 * @property string $creation_date
 * @property string $modified_date
 * @property integer $photo_id
 * @property integer $view_count
 * @property integer $comment_count
 * @property integer $search
 * @property string $type
 */
class Album extends CActiveRecord
{
    private static $_items=array();
	/**
	 * Returns the static model of the specified AR class.
	 * @return Album the static model class
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
		return 'tbl_album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, category_id, photo_id, view_count, comment_count, search', 'numerical', 'integerOnly'=>true),
			array('title, owner_type, type', 'length', 'max'=>45),
			array('description, creation_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, owner_type, user_id, category_id, creation_date, modified_date, photo_id, view_count, comment_count, search, type', 'safe', 'on'=>'search'),
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
            'comments' => array(self::HAS_MANY, 'Comment', 'resource_id', 'condition'=>'comments.resource_type=:resource_type', 'params'=>array(':resource_type'=> 'album_comment'), 'order'=>'comments.creation_date DESC'),
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
			'owner_type' => 'Owner Type',
			'user_id' => 'User',
			'category_id' => 'Category',
			'creation_date' => 'Creation Date',
			'modified_date' => 'Modified Date',
			'photo_id' => 'Photo',
			'view_count' => 'View Count',
			'comment_count' => 'Comment Count',
			'search' => 'Search',
			'type' => 'Type',
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
		$criteria->compare('owner_type',$this->owner_type,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('view_count',$this->view_count);
		$criteria->compare('comment_count',$this->comment_count);
		$criteria->compare('search',$this->search);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    //Get albums 
    public static function getAlbums($type){
        if(!isset(self::$_items[$type]))
			self::loadAlbums($type);
		return self::$_items[$type];
    }
    private static function loadAlbums($type)
	{
		self::$_items[$type]=array();
		$models=self::model()->findAll(array(
			'condition'=>'user_id=:user_id',
			'params'=>array(':user_id'=>$type),
			'order'=>'id',
		));
		foreach($models as $model)
			self::$_items[$type][$model->id]=$model->title;
	}
    public function listAlbum(){
        $condition= array(
                        'order'=> 'view_count DESC',
                        'limit'=>6
                        );
        return self::model()->findAll($condition);
    }
    //get album follow id
    public function getAlbum($album_id){
        $condition= array(
                        'condition'=>'id=:id',
			             'params'=>array(':id'=>$album_id)
        );
        return self::model()->find($condition);
    }
    //display album at home page with view count desc
    public function homeAlbum(){
        $condition= array(
                        'order'=> 'view_count DESC',
                        'limit'=>2
                        );
        return self::model()->findAll($condition);
    }
    //display album at home page with comment count desc
    public function homeHotAlbum(){
        $condition= array(
                        'order'=> 'comment_count DESC',
                        'limit'=>3
                        );
        return self::model()->findAll($condition);
    }
    
    //display album at home page with comment count desc
    public function suggestAlbum(){
        $condition= array(
                        'order'=> 'RAND()',
                        'limit'=>2
                        );
        return self::model()->findAll($condition);
    }
    
    public function AdminAlbum($user_id){
        $condition= array(
                        'condition'=>'user_id=:user_id',
                        'params'=>array(':user_id'=>$user_id)
                        );
        return self::model()->findAll($condition);
    }
}