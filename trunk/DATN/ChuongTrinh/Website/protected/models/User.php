<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $displayname
 * @property integer $photo_id
 * @property string $password
 * @property string $salt
 * @property string $creation_date
 * @property string $modified_date
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo_id', 'numerical', 'integerOnly'=>true),
			array('username, email, phone, displayname, password, salt', 'length', 'max'=>45),
                        array('username,password,email','required'),
                        array('email','email'),
			array('creation_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, phone, displayname, photo_id, password, salt, creation_date, modified_date', 'safe', 'on'=>'search'),
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
                    'api'=>array(self::HAS_ONE, 'Api', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'User Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'displayname' => 'Display Name',
			'photo_id' => 'Photo',
			'password' => 'Password',
			'salt' => 'Salt',
			'creation_date' => 'Creation Date',
			'modified_date' => 'Modified Date',
            'website'=> 'Website',
            'information'=> "About"
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('displayname',$this->displayname,true);
		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    public function getUser($user_id){
        $condition= array(
                        'condition'=>'id=:id',
                        'params'=>array(':id'=>$user_id)
        );
        $user= self::model()->find($condition);
        //get Photo
        $file= File::model()->getFile($user->photo_id);
        
        return $file;
    }
    public function getAdmin($type){
        $condition= array(
                        'condition'=>'type=:type',
                        'params'=>array(':type'=>$type)
        );
        $users= self::model()->findAll($condition);
        return $users;
    }
}