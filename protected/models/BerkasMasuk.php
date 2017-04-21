<?php

/**
 * This is the model class for table "berkas_masuk".
 *
 * The followings are the available columns in table 'berkas_masuk':
 * @property string $id
 * @property string $nomor_berkas
 * @property string $tanggal_masuk
 * @property string $penerima
 * @property string $keterangan
 * @property integer $jenis_berkas
 * @property string $riwayat_berkas_terakhir
 * @property integer $status_berkas
 */
class BerkasMasuk extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $jam_masuk,$teks_status_berkas;
	public function tableName()
	{
		return 'berkas_masuk';
	}
	public function afterFind() {
        parent::afterFind();
        $this->teks_status_berkas = "Sedang dalam proses.";
		if($this->status_berkas==-1)
			$this->teks_status_berkas = "Dokumen ditolak.";
		if($this->status_berkas==4)
			$this->teks_status_berkas = "Dokumen telah selesai diproses.";
		if($this->status_berkas==6)
			$this->teks_status_berkas = "Dokumen telah selesai.";
        return;
    }
	public function beforeSave() {
	
		$this->penerima = Yii::app()->user->akun->id;
		return parent::beforeSave();
	}
	public function generateNomorSurat()
	{
		$year = date("Y");
		$month = date("m");
		$sql = "SELECT COUNT(nomor_berkas) as nomor_berkas FROM berkas_masuk WHERE MONTH(tanggal_masuk)='".$month."' AND YEAR(tanggal_masuk)='".$year."'";
		$command = Yii::app()->db->createCommand($sql);
		$results = $command->queryAll();
		$numClients = (int)$results[0]["nomor_berkas"];
		return "REG"."-".$year."-".$month."-".sprintf("%'.04d", ($numClients+1));;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_berkas, tanggal_masuk, nomor_spm,  jenis_berkas', 'required'),
			array('jenis_berkas, skpd,alur_berkas, status_berkas', 'numerical', 'integerOnly'=>true),
			array('nomor_berkas, nomor_spm, riwayat_berkas_terakhir', 'length', 'max'=>250),
			array('penerima,tgl_dokumen_selesai, alur_berkas', 'length', 'max'=>200),
			array('keterangan', 'length', 'max'=>1200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nomor_berkas,skpd, nomor_spm, tanggal_masuk,alur_berkas, penerima, keterangan, jenis_berkas, riwayat_berkas_terakhir, status_berkas', 'safe', 'on'=>'search'),
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
			'jenis_berkas_'=>array(self::BELONGS_TO, 'JenisBerkas', 'jenis_berkas'),
			'penerima_'=>array(self::BELONGS_TO, 'User', 'penerima'),
			'statusberkas_'=>array(self::BELONGS_TO, 'StatusBerkas', 'status_berkas'),
			'skpd_'=>array(self::BELONGS_TO, 'Skpd', 'skpd'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nomor_berkas' => 'Nomor Berkas',
			'nomor_spm' => 'Nomor SPM',
			'skpd' => 'SKPD',
			'skpd_.skpd' => 'SKPD',
			'alur_berkas' => 'Posisi Berkas',
			'tanggal_masuk' => 'Tanggal Masuk',
			'tgl_dokumen_selesai' => 'Tanggal Selesai',
			'penerima' => 'Penerima',
			'teks_status_berkas'=>'Status',
			'keterangan' => 'Keterangan',
			'jenis_berkas' => 'Jenis Berkas',
			'riwayat_berkas_terakhir' => 'Riwayat Berkas Terakhir',
			'status_berkas' => 'Status Berkas',
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
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchSekretariat()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('alur_berkas',$this->alur_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}


	public function searchAkuntansi()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition='alur_berkas>=2 AND alur_berkas<=4';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchDisposisiPerben()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('alur_berkas',5,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchPerbendaharaan()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition='alur_berkas=6 OR alur_berkas=7';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchDisposisiKadis()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('alur_berkas',8,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchKadis()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition='alur_berkas>=9 AND alur_berkas<=11';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchSelesai()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('alur_berkas',12,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
			    'defaultOrder'=>'id DESC',
			  )

		));
	}

	public function searchDitolak()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nomor_berkas',$this->nomor_berkas,true);
		$criteria->compare('alur_berkas',0,true);
		$criteria->compare('nomor_spm',$this->nomor_spm,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jenis_berkas',$this->jenis_berkas);
		$criteria->compare('riwayat_berkas_terakhir',$this->riwayat_berkas_terakhir,true);
		$criteria->compare('status_berkas',$this->status_berkas);

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
	 * @return BerkasMasuk the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
