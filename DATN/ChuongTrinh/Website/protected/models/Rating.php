<?php

/**
 * This is the model class for table "tbl_rating".
 *
 * The followings are the available columns in table 'tbl_rating':
 * @property integer $rating
 * @property integer $user_id
 * @property integer $photo_id
 */
class Rating extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rating the static model class
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
		return 'tbl_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, photo_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rating, user_id, photo_id', 'safe', 'on'=>'search'),
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
			'rating' => 'Rating',
			'user_id' => 'User',
			'photo_id' => 'Photo',
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

		$criteria->compare('rating',$this->rating);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('photo_id',$this->photo_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    //rating count
    public function ratingCount($photo_id){
        $condition= array(
                        'condition'=>'photo_id=:photo_id',
                        'params'=>array(':photo_id'=> $photo_id)
        );
        $row= self::model()->findAll($condition);
        $total = count($row);
        return $total;
    }
    //get rating
    public function getRatings($photo_id)
    {
        $condition= array(
                        'condition'=>'photo_id=:photo_id',
			             'params'=>array(':photo_id'=> $photo_id)
        );
        $row= self::model()->findAll($condition);
        
        return $row;
    }
    public function setRating($photo_id, $user_id, $rating){
        $condition= array(
                        'condition'=>'photo_id=:photo_id AND user_id=:user_id',
			             'params'=>array(':photo_id'=> $photo_id, ':user_id'=> $user_id)
        );
        
        $row= self::model()->find($condition);
        if (empty($row)) {
          // create rating
          $model= new Rating();
          $model->rating= $rating;
          $model->user_id= $user_id;
          $model->photo_id= $photo_id;
          $model->save();
        }
    }
    public function getListRatingPhoto($photo_id){
        $condition= array(
                        'condition'=>'photo_id=:photo_id',
			             'params'=>array(':photo_id'=>$photo_id)
        );
        return self::model()->findAll($condition);
    }
}