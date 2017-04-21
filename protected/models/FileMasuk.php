<?php

/**
 * This is the model class for table "file_masuk".
 *
 * The followings are the available columns in table 'file_masuk':
 * @property string $id
 * @property string $id_berkas
 * @property string $nama_dokumen
 * @property string $keterangan
 * @property string $nama_file
 */
class FileMasuk extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $dokumen_download;
	public function tableName()
	{
		return 'file_masuk';
	}
	public function afterFind() {
        parent::afterFind();
		$this->dokumen_download = "<a href='upload/dokumen/".$this->nama_file."' target='_BLANK'>Download</a>";
        return;
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_berkas, nama_dokumen, nama_file', 'required'),
			array('id_berkas', 'length', 'max'=>20),
			array('nama_dokumen, nama_file,keterangan', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_berkas, nama_dokumen, keterangan, nama_file', 'safe', 'on'=>'search'),
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
			'id_berkas' => 'Id Berkas',
			'nama_dokumen' => 'Nama Dokumen',
			'keterangan' => 'Keterangan',
			'nama_file' => 'Nama File',
			'dokumen_download'=>'Dokumen'
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
		$criteria->compare('id_berkas',$this->id_berkas,true);
		$criteria->compare('nama_dokumen',$this->nama_dokumen,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('nama_file',$this->nama_file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FileMasuk the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
