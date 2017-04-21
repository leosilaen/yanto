<?php

/**
 * This is the model class for table "riwayat_proses_dibatalkan".
 *
 * The followings are the available columns in table 'riwayat_proses_dibatalkan':
 * @property string $id
 * @property string $id_berkas
 * @property string $tanggal_dibatalkan
 * @property string $keterangan
 * @property integer $pemeriksa
 */
class RiwayatProsesDibatalkan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $jenis_berkas,$nomor_berkas,$jenis;
	public function tableName()
	{
		return 'riwayat_proses_dibatalkan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_berkas,id_alur_berkas, tanggal_dibatalkan, keterangan, pemeriksa', 'required'),
			array('pemeriksa', 'numerical', 'integerOnly'=>true),
			array('id_berkas,jenis_berkas,nomor_berkas,jenis', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_berkas, tanggal_dibatalkan, keterangan, pemeriksa', 'safe', 'on'=>'search'),
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
			'berkas'=>array(self::BELONGS_TO, 'BerkasMasuk', 'id_berkas'),
			'pemeriksa_'=>array(self::BELONGS_TO, 'User', 'pemeriksa'),
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
			'tanggal_dibatalkan' => 'Tanggal Dibatalkan',
			'keterangan' => 'Keterangan',
			'pemeriksa' => 'Pemeriksa',
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
		$criteria->compare('tanggal_dibatalkan',$this->tanggal_dibatalkan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('pemeriksa',$this->pemeriksa);
		$criteria->compare('berkas_masuk.jenis_berkas',$this->jenis_berkas);
		$criteria->compare('berkas_masuk.nomor_berkas',$this->nomor_berkas);
		$criteria->compare('berkas_masuk.nomor_berkas',$this->nomor_berkas);
		$criteria->compare('riwayat_alur_berkas.posisi_berkas',$this->jenis);
		$criteria->join = "LEFT JOIN berkas_masuk ON berkas_masuk.id = t.id_berkas";
		$criteria->join .= " LEFT JOIN riwayat_alur_berkas ON riwayat_alur_berkas.id = t.id_alur_berkas AND riwayat_alur_berkas.id_berkas = t.id_berkas";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id DESC',
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiwayatProsesDibatalkan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
