<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $nama_pengguna
 * @property string $nip
 * @property string $email
 * @property string $no_telp
 * @property string $username
 * @property string $password
 * @property string $password_md5
 * @property string $level
 * @property string $status
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_pengguna, nip, email, no_telp, username, password, level, status', 'required'),
			array('nama_pengguna, nip, email, no_telp, username, password, password_md5', 'length', 'max'=>255),
			array('level', 'length', 'max'=>14),
			array('status', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_pengguna, nip, email, no_telp, username, password, password_md5, level, status', 'safe', 'on'=>'search'),
		);
	}
	public function beforeSave() {
	
		$this->password_md5 = md5($this->password);
		return parent::beforeSave();
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
			'nama_pengguna' => 'Nama Pengguna',
			'nip' => 'Nip',
			'email' => 'Email',
			'no_telp' => 'No Telp',
			'username' => 'Username',
			'password' => 'Password',
			'password_md5' => 'Password Md5',
			'level' => 'Level',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama_pengguna',$this->nama_pengguna,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('password_md5',$this->password_md5,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
