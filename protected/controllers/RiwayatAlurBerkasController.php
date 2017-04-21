<?php
error_reporting(0);
class RiwayatAlurBerkasController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','diterimaAkuntansi','undoTerimaBerkas','berkasSelesai','verifikasiAkuntansi','terimaVerifikasiAkuntansi','viewBendahara','verifikasiBendahara','CreateFromKadis','CreateFromBendahara','adminDisposisiAkuntansi'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','ViewAkuntansi','Akuntansi','kadis','berkassudahselesai','terimaTandaTanganKadis','terimaSekretariat','terimaAkuntansi','berkasok','viewSekretariat','terimaKadis','TandaTanganKadis','terimaBendahara','CreateFromAkuntansi','perbendaharaan','selesai','terimaVerifikasiBendahara','diterimaBendahara','adminDisposisiBendahara','dokumenSelesai'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actionTerimaVerifikasiAkuntansi($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 2;
	//$model->tanggal_diterima= date("Y-m-d H:i:s");
	//$model->penerima = Yii::app()->user->akun->id;
	if($model->save())
	{
		$model_berkas_masuk = BerkasMasuk::model()->findByPk($model->id_berkas);
		$model_berkas_masuk->alur_berkas=4;
		$model_berkas_masuk->save();
		//$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	//	$berkas->riwayat_berkas_terakhir = $model->id;
		//$berkas->save();
		//$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
		//$RiwayatAlurBerkas->status=2;
		//$RiwayatAlurBerkas->save();
		$user->setFlash(
			'success',
			"<strong>Dokumen telah di verifikasi oleh bidang Akuntansi!</strong>"
		);
	}
		$current_user=Yii::app()->user->id;
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}
public function actionTerimaVerifikasiBendahara($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 2;
	//$model->tanggal_diterima= date("Y-m-d H:i:s");
	//$model->penerima = Yii::app()->user->akun->id;
	if($model->save())
	{
		$model_berkas_masuk = BerkasMasuk::model()->findByPk($model->id_berkas);
		$model_berkas_masuk->alur_berkas=7;
		$model_berkas_masuk->save();
		//$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	//	$berkas->riwayat_berkas_terakhir = $model->id;
		//$berkas->save();
		//$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
		//$RiwayatAlurBerkas->status=2;
		//$RiwayatAlurBerkas->save();
		$user->setFlash(
			'success',
			"<strong>Dokumen telah di verifikasi oleh bidang Perbendaharaan namun belum ditandatangani oleh Kepala Dinas!</strong>"
		);
	}
		$current_user=Yii::app()->user->id;
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}

public function actionTerimaTandatanganKadis($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 2;
	//$model->tanggal_diterima= date("Y-m-d H:i:s");
	//$model->penerima = Yii::app()->user->akun->id;
	if($model->save())
	{
		$model_berkas_masuk = BerkasMasuk::model()->findByPk($model->id_berkas);
		$model_berkas_masuk->alur_berkas=10;
		$model_berkas_masuk->save();
		//$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	//	$berkas->riwayat_berkas_terakhir = $model->id;
		//$berkas->save();
		//$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
		//$RiwayatAlurBerkas->status=2;
		//$RiwayatAlurBerkas->save();
		$user->setFlash(
			'success',
			"<strong>Dokumen telah ditandatangani oleh Kepala Dinas!</strong>"
		);
	}
		$current_user=Yii::app()->user->id;
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}

public function actionterimaAkuntansi($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 1;
	$model->tanggal_diterima= date("Y-m-d H:i:s");
	$model->penerima = Yii::app()->user->akun->id;
	if($model->save())
		$model_berkas_masuk = BerkasMasuk::model()->findByPk($model->id_berkas);
		$model_berkas_masuk->alur_berkas=3;
		$model_berkas_masuk->save();
	$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah diterima oleh bidang Akuntansi!</strong>"
			);
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}
public function actionterimaKadis($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 1;
	$model->tanggal_diterima= date("Y-m-d H:i:s");
	$model->penerima = Yii::app()->user->akun->id;
	if($model->save())
		$model_berkas_masuk = BerkasMasuk::model()->findByPk($model->id_berkas);
		$model_berkas_masuk->alur_berkas=9;
		$model_berkas_masuk->save();
	$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah diterima oleh Kepala Dinas!</strong>"
			);
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}
public function actionDokumenSelesai($id_berkas,$id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 4;
	$model->penerima = Yii::app()->user->akun->id;
	$model->save();
	// Berkas Masuk
	$model_berkas_masuk = BerkasMasuk::model()->findByPk($id_berkas);
	$model_berkas_masuk->status_berkas=4;
	$model_berkas_masuk->tgl_dokumen_selesai = date("Y-m-d H:i:s");
	$model_berkas_masuk->save();
	//
	$riwayat = RiwayatAlurBerkas::model()->find(array('condition'=>'id_berkas="'.$id_berkas.'" AND posisi_berkas="Kepala Dinas"','order'=>'id desc'));
	$riwayat->status = 3;
	$riwayat->tanggal_disposisi =  date("Y-m-d H:i:s");
	$riwayat->save();
	$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah Selesai dan ditandatangani Kepala Dinas!</strong>"
			);
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}

public function actionterimaBendahara($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 1;
	$model->tanggal_diterima= date("Y-m-d H:i:s");
	$model->penerima = Yii::app()->user->akun->id;
	if($model->save())
	$model_berkas_masuk = BerkasMasuk::model()->findByPk($model->id_berkas);
		$model_berkas_masuk->alur_berkas=6;
		$model_berkas_masuk->save();
	$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah diterima oleh bidang Perbendaharaan!</strong>"
			);
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}

public function actionterimaSekretariat($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->status = 1;
	$model->tanggal_diterima= date("Y-m-d H:i:s");
	$model->penerima = Yii::app()->user->akun->id;
	$model->save();
	$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah diterima oleh Sekretariat!</strong>"
			);
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}
/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionverifikasiAkuntansi($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	if($model->status==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum dikenali sistem sebagai diterima bidang akuntansi, apabila anda sudah menerima Harcopy dokumen silahkan klik tombol terima! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/terimaAkuntansi',array('id'=>$model->id))."' id='terima_disposisi'>Terima.</a></strong>"
		);
	}elseif($model->status==-1)
	{
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak!</strong>"
		);
	}elseif($model->status==2)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di verifikasi oleh Akuntansi!</strong>"
		);
	}
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	$modelFileMasuk->id_berkas = $model->id_berkas;
	$this->render('viewVerifikasi',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}
public function actionverifikasiBendahara($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	if($model->status==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum dikenali sistem sebagai diterima bidang Perbendaharaan, apabila anda sudah menerima Harcopy dokumen silahkan klik tombol terima! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/terimaAkuntansi',array('id'=>$model->id))."' id='terima_disposisi'>Terima.</a></strong>"
		);
	}elseif($model->status==-1)
	{
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak!</strong>"
		);
	}elseif($model->status==2)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di verifikasi oleh bidang Perbendaharaan!</strong>"
		);
	}
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	$modelFileMasuk->id_berkas = $model->id_berkas;
	$this->render('viewVerifikasi_bendahara',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}

public function actionTandaTanganKadis($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	if($model->status==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum dikenali sistem sebagai diterima Kepala Dinas, apabila anda sudah menerima Harcopy dokumen silahkan klik tombol terima! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/terimaKadis',array('id'=>$model->id))."' id='terima_disposisi'>Terima.</a></strong>"
		);
	}elseif($model->status==-1)
	{
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak!</strong>"
		);
	}elseif($model->status==2)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah ditandatangani oleh Kepala Dinas!</strong>"
		);
	}
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	$modelFileMasuk->id_berkas = $model->id_berkas;
	$this->render('viewVerifikasi_Kadis',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}

public function actionberkasok($id,$id_berkas)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	$model->id_berkas=$id_berkas;
	$model->status = 6;
	$model->tanggal_disposisi= date("Y-m-d H:i:s");
	$model->penerima = Yii::app()->user->akun->id;
	

	if($model->save()){
	$model_berkas_masuk = BerkasMasuk::model()->findByPk($id_berkas);
	$model_berkas_masuk->status_berkas=6;
	$model_berkas_masuk->alur_berkas=12;
	$model_berkas_masuk->tgl_dokumen_selesai = date("Y-m-d H:i:s");
	$model_berkas_masuk->save();
	$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah selesai diproses seluruhnya!</strong>"
			);
	}
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}


public function actionViewSekretariat($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	
		if($model->status==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum dikenali sistem sebagai diterima oleh Kepala Dinas, apabila anda sudah menerima Harcopy dokumen silahkan klik tombol terima! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/terimaAkuntansi',array('id'=>$model->id))."' id='terima_disposisi'>Terima.</a></strong>"
		);
	}elseif($model->status==-1)
	{
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak!</strong>"
		);
	}elseif($model->status==2)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di verifikasi oleh Kepala Dinas!</strong>"
		);
	}elseif($model->status==3)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di verifikasi dan telah di disposisi ke C- MES!</strong>"
		);
	}
	
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	$modelFileMasuk->id_berkas = $model->id_berkas;
	$this->render('view',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}

public function actionViewAkuntansi($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	if($model->status==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum dikenali sistem sebagai diterima bidang akuntansi, apabila anda sudah menerima Harcopy dokumen silahkan klik tombol terima! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/terimaAkuntansi',array('id'=>$model->id))."' id='terima_disposisi'>Terima.</a></strong>"
		);
	}elseif($model->status==-1)
	{
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak!</strong>"
		);
	}elseif($model->status==2)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di verifikasi oleh Akuntansi!</strong>"
		);
	}elseif($model->status==3)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di verifikasi dan telah di disposisi ke bidang Perbendaharaan!</strong>"
		);
	}
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	$modelFileMasuk->id_berkas = $model->id_berkas;
	$this->render('view',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}
public function actionViewBendahara($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	if($model->status==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum dikenali sistem sebagai diterima bidang perbendaharan, apabila anda sudah menerima Harcopy dokumen silahkan klik tombol terima! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/terimaBendahara',array('id'=>$model->id))."' id='terima_disposisi'>Terima.</a></strong>"
		);
	}elseif($model->status==-1)
	{
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak!</strong>"
		);
	}elseif($model->status==2)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di veriikasi oleh bidang Perbendaharaan!</strong>"
		);
	}elseif($model->status==3)
	{
		$user->setFlash(
			    'success',
			    "<strong>Dokumen telah di veriikasi dan telah di disposisi ke Kepala Dinas!</strong>"
		);
	}
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	$modelFileMasuk->id_berkas = $model->id_berkas;
	$this->render('view_bendahara',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id_berkas)
{
$model=new RiwayatAlurBerkas;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatAlurBerkas']))
{
$user = Yii::app()->getComponent('user');
$model->attributes=$_POST['RiwayatAlurBerkas'];
$model->id_berkas = $id_berkas;
$model->tanggal_dikirimkan = date("Y-m-d H:i:s");
$model->pengirim = Yii::app()->user->akun->id;
if($model->save())
{
	$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	$berkas->riwayat_berkas_terakhir = $model->id;
	$berkas->alur_berkas=2;
	$berkas->save();
	$riwayat = RiwayatAlurBerkas::model()->find(array('condition'=>'id_berkas="'.$model->id_berkas.'" AND posisi_berkas="Sekretariat"','order'=>'id desc'));
	$riwayat->status = 3;
	$riwayat->tanggal_disposisi =  date("Y-m-d H:i:s");
	
	$user->setFlash(
		'success',
		"<strong>Dokumen telah di disposisi kepada ".$model->posisi_berkas."!</strong>"
	);
}else 
{
	$user->setFlash(
		'error',
		"<strong>Terjadi kesalahan, dokumen gagal di disposisi!</strong>"
	);
}
$current_user=Yii::app()->user->id;
$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->renderPartial('create',array(
'model'=>$model,
));
}
public function actionCreateFromBendahara($id_berkas,$id)
{
$model=new RiwayatAlurBerkas;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatAlurBerkas']))
{
$user = Yii::app()->getComponent('user');
$model->attributes=$_POST['RiwayatAlurBerkas'];
$model->id_berkas = $id_berkas;
$model->tanggal_dikirimkan = date("Y-m-d H:i:s");
$model->tanggal_diterima =  date("Y-m-d H:i:s");
$model->pengirim = Yii::app()->user->akun->id;
if($model->save())
{
	$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	$berkas->riwayat_berkas_terakhir = $model->id;
	$berkas->alur_berkas=8;
	$berkas->save();
	$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
	$RiwayatAlurBerkas->status=3;
	$RiwayatAlurBerkas->tanggal_disposisi =  date("Y-m-d H:i:s");
	$RiwayatAlurBerkas->save();
	$user->setFlash(
		'success',
		"<strong>Dokumen telah di disposisi kepada ".$model->posisi_berkas."!</strong>"
	);

}else 
{
	$user->setFlash(
		'error',
		"<strong>Terjadi kesalahan, dokumen gagal di disposisi!</strong>"
	);
}
$current_user=Yii::app()->user->id;
$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->renderPartial('create',array(
'model'=>$model,
));
}

public function actionCreateFromKadis($id_berkas,$id)
{
$model=new RiwayatAlurBerkas;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatAlurBerkas']))
{
$user = Yii::app()->getComponent('user');
$model->attributes=$_POST['RiwayatAlurBerkas'];
$model->id_berkas = $id_berkas;
$model->tanggal_dikirimkan = date("Y-m-d H:i:s");
$model->tanggal_diterima =  date("Y-m-d H:i:s");
$model->pengirim = Yii::app()->user->akun->id;
if($model->save())
{
	$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	$berkas->riwayat_berkas_terakhir = $model->id;
	$berkas->alur_berkas=11;
	
	$berkas->save();
	$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
	$RiwayatAlurBerkas->status=5;
	$RiwayatAlurBerkas->tanggal_disposisi =  date("Y-m-d H:i:s");
	$RiwayatAlurBerkas->dari_kadis=1;
	$RiwayatAlurBerkas->save();
	$user->setFlash(
		'success',
		"<strong>Dokumen telah di disposisi kepada ".$model->posisi_berkas."!</strong>"
	);

}else 
{
	$user->setFlash(
		'error',
		"<strong>Terjadi kesalahan, dokumen gagal di disposisi!</strong>"
	);
}
$current_user=Yii::app()->user->id;
$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->renderPartial('create',array(
'model'=>$model,
));
}




public function actionCreateFromAkuntansi($id_berkas,$id)
{
$model=new RiwayatAlurBerkas;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatAlurBerkas']))
{
$user = Yii::app()->getComponent('user');
$model->attributes=$_POST['RiwayatAlurBerkas'];
$model->id_berkas = $id_berkas;
$model->tanggal_dikirimkan = date("Y-m-d H:i:s");
$model->pengirim = Yii::app()->user->akun->id;
if($model->save())
{
	$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	$berkas->riwayat_berkas_terakhir = $model->id;
	$berkas->alur_berkas=5;
	$berkas->save();
	$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
	$RiwayatAlurBerkas->status=3;
	$RiwayatAlurBerkas->tanggal_disposisi =  date("Y-m-d H:i:s");
	$RiwayatAlurBerkas->save();
	$user->setFlash(
		'success',
		"<strong>Dokumen telah di disposisi kepada ".$model->posisi_berkas."!</strong>"
	);
}else 
{
	$user->setFlash(
		'error',
		"<strong>Terjadi kesalahan, dokumen gagal di disposisi!</strong>"
	);
}
$current_user=Yii::app()->user->id;
$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->renderPartial('create',array(
'model'=>$model,
));
}


public function actionSelesai($id_berkas,$id)
{
$model=new RiwayatAlurBerkas;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatAlurBerkas']))
{
$user = Yii::app()->getComponent('user');
$model->attributes=$_POST['RiwayatAlurBerkas'];
$model->id_berkas = $id_berkas;
$model->tanggal_dikirimkan = date("Y-m-d H:i:s");
$model->tanggal_diterima =  date("Y-m-d H:i:s");
$model->pengirim = Yii::app()->user->akun->id;
if($model->save())
{
	$berkas = BerkasMasuk::model()->findByPk($id_berkas);
	$berkas->riwayat_berkas_terakhir = $model->id;
	$berkas->save();
	$RiwayatAlurBerkas = RiwayatAlurBerkas::model()->findByPk($id);
	$RiwayatAlurBerkas->status=4;
	$RiwayatAlurBerkas->tanggal_disposisi =  date("Y-m-d H:i:s");
	$RiwayatAlurBerkas->save();
	$user->setFlash(
		'success',
		"<strong>Dokumen telah diselesaikan!</strong>"
	);

}else 
{
	$user->setFlash(
		'error',
		"<strong>Terjadi kesalahan, dokumen gagal di disposisi!</strong>"
	);
}
$current_user=Yii::app()->user->id;
$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
if($model->save())
$this->redirect(array('viewSelesai','id'=>$model->id));
}

$this->renderPartial('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatAlurBerkas']))
{
$model->attributes=$_POST['RiwayatAlurBerkas'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}
public function actionUndoTerimaBerkas($id)
{
if(Yii::app()->request->isPostRequest)
{
	// we only allow deletion via POST request
	$data = $this->loadModel($id);
	$data->status = 1;
	$data->save();
	// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	if(!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('RiwayatAlurBerkas');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new RiwayatAlurBerkas('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['RiwayatAlurBerkas']))
$model->attributes=$_GET['RiwayatAlurBerkas'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionBerkasSelesai()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->posisi_berkas = 'Sekretariat';
		$this->render('admin_sekretariat',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}

public function actionBerkasSudahSelesai()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('searchSelesai');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->posisi_berkas = 'Sekretariat';
		$this->render('admin_selesai',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}

public function actionAkuntansi()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->posisi_berkas = 'Akuntansi';
		$this->render('admin_akuntansi',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}



public function actionPerbendaharaan()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->posisi_berkas = 'Perbendaharaan';
		$this->render('admin_perbendaharan',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}

public function actionKadis()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->posisi_berkas = 'Kepala Dinas';
		$this->render('admin_kadis',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}

public function actionAdminDisposisiAkuntansi()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->pengirim = Yii::app()->user->id;
		$this->render('admin_riwayat_disposisi_akuntansi',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}
public function actionAdminDisposisiBendahara()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->pengirim = Yii::app()->user->id;
		$this->render('admin_riwayat_disposisi_bendahara',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}

public function actionDiterimaAkuntansi()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->permohonan_diterima = 1;
	$model->posisi_berkas = 'Akuntansi';
		$this->render('admin_diterima',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}
public function actionDiterimaBendahara()
{
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$new_filter = new RiwayatAlurBerkas;
	$model=new RiwayatAlurBerkas('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatAlurBerkas'])){
		$model->attributes=$_GET['RiwayatAlurBerkas'];
		$new_filter->attributes=$_GET['RiwayatAlurBerkas'];
	}
	$model->permohonan_diterima = 1;
	$model->posisi_berkas = 'Perbendaharaan';
		$this->render('admin_diterima_bendahara',array(
		'model'=>$model,
		'new_filter'=>$new_filter
	));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=RiwayatAlurBerkas::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='riwayat-alur-berkas-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
