<?php

/**
 * This is the model class for table "riwayat_alur_berkas".
 *
 * The followings are the available columns in table 'riwayat_alur_berkas':
 * @property string $id
 * @property string $id_berkas
 * @property string $posisi_berkas
 * @property string $tanggal_diterima
 * @property string $tanggal_dikirimkan
 * @property integer $penerima
 * @property integer $pengirim
 * @property string $keterangan
 */
class RiwayatAlurBerkas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $jenis_berkas,$nomor_berkas,$status_tolak,$status_disposisi,$status_verifikasi,$dokumen_tanda_tangan,$dokumen_belum_tanda_tangan,$status_terima_disposisi,$permohonan_diterima,$dokumen_selesai,$teks_status,$waktu_proses,$tampil_waktu,$jam_proses,$keterangan;

	public function findNewNotif($limit=null)
    {
        return $this->findAll(array(
            'order'=>'t.id DESC',
			'condition'=>'status<=2 and posisi_berkas="Akuntansi"',
            'limit'=>$limit,
        ));
    }

    	public function findNewNotif1($limit=null)
    {
        return $this->findAll(array(
            'order'=>'t.id DESC',
			'condition'=>'status<=2 and posisi_berkas="Perbendaharaan"',
            'limit'=>$limit,
        ));
    }
	public function afterFind() {
        parent::afterFind();
		
		if($this->status ==-1 or $this->status==2 or $this->status==3)
			$this->status_tolak= true;
		else
			$this->status_tolak= false;
		if($this->status ==0)
			$this->status_terima_disposisi= false;
		else
			$this->status_terima_disposisi= true;
		if($this->status ==2 or $this->status==3 or $this->status==0)
			$this->status_verifikasi= true;
		else
			$this->status_verifikasi= false;
		if($this->status ==2)
			$this->status_disposisi= true;
		else
			$this->status_disposisi=false;
		if($this->status ==4)
			$this->dokumen_belum_tanda_tangan= true;
		else
			$this->dokumen_belum_tanda_tangan=false;
		if($this->status ==5)
			$this->dokumen_tanda_tangan= true;
		else
			$this->dokumen_tanda_tangan=false;
		if($this->status ==6)
			$this->dokumen_selesai= true;
		else
			$this->dokumen_selesai=false;
		$this->teks_status = "Sedang dalam proses.";
		if($this->status==-1)
			$this->teks_status = "Permohonan ditolak";
		elseif($this->status==2)
			$this->teks_status = "Dokumen telah diterima.";
		elseif($this->status==3)
			$this->teks_status = "Dokumen telah selesai diproses";
		elseif($this->status==4)
			$this->teks_status = "Dokumen belum ditandatangani oleh Kepala Dinas.";
		elseif($this->status==5)
			$this->teks_status = "Dokumen sudah ditandatangani oleh Kepala Dinas.";
		elseif($this->status==6)
			$this->teks_status = "Dokumen sudah selesai.";
		elseif($this->status==0)
			$this->teks_status = "Dokumen belum diterima.";
		//$this->tampil_waktu = false;
		if($this->status==1 or $this->status==2 or $this->status==0)
			$this->waktu_proses = "-";
        return;

    }
	public function tableName()
	{
		return 'riwayat_alur_berkas';
	}

	public function jumlahPemberitahuanAkuntansi()
	{
		$model = $this->findAll(array('condition'=>'status<=2 AND posisi_berkas="Akuntansi" AND MOD(HOUR(TIMEDIFF(tanggal_dikirimkan, now())), 24)>6'));
		return sizeof($model);
	}

public function jumlahPemberitahuanPerbendaharaan()
	{
		$model = $this->findAll(array('condition'=>'status<=2 AND posisi_berkas="Perbendaharaan" AND MOD(HOUR(TIMEDIFF(tanggal_dikirimkan, now())), 24)>6'));
		return sizeof($model);
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_berkas, posisi_berkas', 'required'),
			array('penerima,dari_kadis, pengirim,status', 'numerical', 'integerOnly'=>true),
			array('id_berkas,permohonan_diterima,tanggal_disposisi,tanggal_dikirimkan,jenis_berkas,tanggal_diterima', 'length', 'max'=>20),
			array('keterangan,nomor_berkas', 'length', 'max'=>420),
			array('posisi_berkas', 'length', 'max'=>14),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_berkas, posisi_berkas,dari_kadis, tanggal_diterima,tanggal_disposisi, tanggal_dikirimkan, penerima, pengirim, keterangan', 'safe', 'on'=>'search'),
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
			'penerima_'=>array(self::BELONGS_TO, 'User', 'penerima'),
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
			'waktu_proses'=>'Waktu Pemrosesan Berkas',
			'id_berkas' => 'Id Berkas',
			'posisi_berkas' => 'Posisi Berkas Kepada',
			'tanggal_diterima' => 'Tanggal Diterima',
			'tanggal_dikirimkan' => 'Tanggal Diposisi',
			'penerima' => 'Penerima',
			'pengirim' => 'Pengirim',
			'keterangan' => 'Keterangan Disposisi',
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
		$criteria->compare('posisi_berkas',$this->posisi_berkas,true);
		$criteria->compare('tanggal_diterima',$this->tanggal_diterima,true);
		$criteria->compare('tanggal_dikirimkan',$this->tanggal_dikirimkan,true);
		$criteria->compare('penerima',$this->penerima);
		$criteria->compare('pengirim',$this->pengirim);
		$criteria->compare('status',$this->status);
		$criteria->compare('berkas_masuk.jenis_berkas',$this->jenis_berkas);
		$criteria->compare('berkas_masuk.nomor_berkas',$this->nomor_berkas);
		$criteria->compare('keterangan',$this->keterangan,true);
		if($this->permohonan_diterima==1)
		{
			$criteria->addCondition("status=2 or status=3");
		}
		$criteria->join = "LEFT JOIN berkas_masuk ON berkas_masuk.id = t.id_berkas";
	
		$criteria->select = "t.*,CONCAT(
						   FLOOR(HOUR(TIMEDIFF(tanggal_dikirimkan, now())) / 24), ' hari, ',
						   MOD(HOUR(TIMEDIFF(tanggal_dikirimkan, now())), 24), ' jam, ',
						   MINUTE(TIMEDIFF(tanggal_dikirimkan, now())), ' menit, ',
						   SECOND(TIMEDIFF(tanggal_dikirimkan, now())), ' detik') as jam_proses";
	
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
		$criteria->compare('dari_kadis',1,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_berkas',$this->id_berkas,true);
		$criteria->compare('posisi_berkas',$this->posisi_berkas,true);
		$criteria->compare('tanggal_diterima',$this->tanggal_diterima,true);
		$criteria->compare('tanggal_dikirimkan',$this->tanggal_dikirimkan,true);
		$criteria->compare('penerima',$this->penerima);
		$criteria->compare('pengirim',$this->pengirim);
		$criteria->compare('status',$this->status);
		$criteria->compare('berkas_masuk.jenis_berkas',$this->jenis_berkas);
		$criteria->compare('berkas_masuk.nomor_berkas',$this->nomor_berkas);
		$criteria->compare('keterangan',$this->keterangan,true);
		//$criteria->condition=$this->dari_kadis=1;
		if($this->permohonan_diterima==1)
		{
			$criteria->addCondition("status=2 or status=3");
		}
		$criteria->join = "LEFT JOIN berkas_masuk ON berkas_masuk.id = t.id_berkas";
	
		$criteria->select = "t.*,CONCAT(
						   FLOOR(HOUR(TIMEDIFF(tanggal_dikirimkan, now())) / 24), ' hari, ',
						   MOD(HOUR(TIMEDIFF(tanggal_dikirimkan, now())), 24), ' jam, ',
						   MINUTE(TIMEDIFF(tanggal_dikirimkan, now())), ' menit, ',
						   SECOND(TIMEDIFF(tanggal_dikirimkan, now())), ' detik') as jam_proses";
	
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_berkas',$this->id_berkas,true);
		$criteria->compare('posisi_berkas',$this->posisi_berkas,true);
		$criteria->compare('tanggal_diterima',$this->tanggal_diterima,true);
		$criteria->compare('tanggal_dikirimkan',$this->tanggal_dikirimkan,true);
		$criteria->compare('penerima',$this->penerima);
		$criteria->compare('pengirim',$this->pengirim);
		$criteria->compare('status',$this->status);
		$criteria->compare('berkas_masuk.jenis_berkas',$this->jenis_berkas);
		$criteria->compare('berkas_masuk.nomor_berkas',$this->nomor_berkas);
		$criteria->compare('keterangan',$this->keterangan,true);
		if($this->permohonan_diterima==1)
		{
			$criteria->addCondition("status=2 or status=3");
		}
		$criteria->join = "LEFT JOIN berkas_masuk ON berkas_masuk.id = t.id_berkas";
		$criteria->select = "t.*,CONCAT(
						   FLOOR(HOUR(TIMEDIFF(tanggal_dikirimkan, now())) / 24), ' hari, ',
						   MOD(HOUR(TIMEDIFF(tanggal_dikirimkan, now())), 24), ' jam, ',
						   MINUTE(TIMEDIFF(tanggal_dikirimkan, now())), ' menit, ',
						   SECOND(TIMEDIFF(tanggal_dikirimkan, now())), ' detik') as jam_proses";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id DESC',
			)
		));
	}


	public function CariDokumen()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_berkas',$this->id_berkas,true);
		$criteria->compare('posisi_berkas',$this->posisi_berkas,true);
		$criteria->compare('tanggal_diterima',$this->tanggal_diterima,true);
		$criteria->compare('tanggal_dikirimkan',$this->tanggal_dikirimkan,true);
		$criteria->compare('penerima',$this->penerima);
		$criteria->compare('pengirim',$this->pengirim);
		$criteria->compare('status',$this->status);
		$criteria->compare('berkas_masuk.jenis_berkas',$this->jenis_berkas);
		$criteria->compare('berkas_masuk.nomor_berkas',$this->nomor_berkas);
		$criteria->compare('keterangan',$this->keterangan,true);
		if($this->permohonan_diterima==1)
		{
			$criteria->addCondition("status=2 or status=3");
		}
		$criteria->join = "LEFT JOIN berkas_masuk ON berkas_masuk.id = t.id_berkas";
		$criteria->select = "t.*,CONCAT(
						   FLOOR(HOUR(TIMEDIFF(tanggal_disposisi, tanggal_diterima)) / 24), ' hari, ',
						   MOD(HOUR(TIMEDIFF(tanggal_disposisi, tanggal_diterima)), 24), ' jam, ',
						   MINUTE(TIMEDIFF(tanggal_disposisi, tanggal_diterima)), ' menit, ',
						   SECOND(TIMEDIFF(tanggal_disposisi, tanggal_diterima)), ' detik') as waktu_proses";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id ASC',
			)
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiwayatAlurBerkas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
