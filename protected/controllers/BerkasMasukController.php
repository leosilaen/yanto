<?php
error_reporting(0);
class BerkasMasukController extends Controller
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
'actions'=>array('create','update','print'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','upload','cariDokumen','ditolak','kadisSekretariat','prosesAkuntansi','disposisiPerben','prosesPerben','disposisiKadis','prosesKadis','selesai'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model = $this->loadModel($id);
	if($model->riwayat_berkas_terakhir==0)
	{
		$user->setFlash(
			    'warning',
			    "<strong>Berkas ini belum di disposisi! <a href='".Yii::app()->createUrl('RiwayatAlurBerkas/create',array('id_berkas'=>$model->id))."' id='disposisi'>Disposisikan Sekarang.</a></strong>"
		);
	}
	if($model->status_berkas==-1)
	{
		$model_keterangan = RiwayatProsesDibatalkan::model()->find(array('condition'=>'id_berkas="'.$id.'"'));
		$tanggal = explode(" ", $model_keterangan->tanggal_dibatalkan);
		$user->setFlash(
			    'error',
			    "<strong>Permohonan telah ditolak bidang Akuntansi tanggal ".ApplikasiKomponen::tanggal_indonesia($tanggal[0]).". </strong><br>Keterangan : ".$model_keterangan->keterangan.""
		);
	}
	$modelFileMasuk =new FileMasuk('search');
	$modelFileMasuk->unsetAttributes();  // clear any default values
	if(isset($_GET['FileMasuk']))
	$modelFileMasuk->attributes=$_GET['FileMasuk'];
	$modelFileMasuk->id_berkas = $id;
	
	$this->render('view',array(
		'model'=>$model,
		'modelFileMasuk'=>$modelFileMasuk
	));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new BerkasMasuk;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
$nomor_berkas = BerkasMasuk::model()->generateNomorSurat();
if(isset($_POST['BerkasMasuk']))
{
	$model->attributes=$_POST['BerkasMasuk'];
	$model->jam_masuk = $_POST['jam_masuk'];
	$model->tanggal_masuk = $model->tanggal_masuk." ".$model->jam_masuk;
	$model->nomor_berkas=$nomor_berkas."-".$model->skpd;
	$model->alur_berkas=1;
	
	//print_r($model);
	if($model->save())
	{
		
		$riwayat_berkas = new RiwayatAlurBerkas;
		$riwayat_berkas->id_berkas = $model->id;
		$riwayat_berkas->posisi_berkas = "Sekretariat";
		$riwayat_berkas->dari_kadis=0;
		//$riwayat_berkas->tanggal_dikirimkan = $model->tanggal_masuk." ".$model->jam_masuk;
		$riwayat_berkas->tanggal_diterima = $model->tanggal_masuk;
		//$riwayat_berkas->pengirim = Yii::app()->user->akun->id;
		$riwayat_berkas->save();
		$this->redirect(array('view','id'=>$model->id));
	}
}

$this->render('create',array(
'model'=>$model,
));
}
public function actionCariDokumen()
{
	$model=new BerkasMasuk;

	if(isset($_GET['BerkasMasuk']))
	{
		$model->attributes=$_GET['BerkasMasuk'];
		$data = BerkasMasuk::model()->find(array('condition'=>'nomor_spm="'.$model->nomor_spm.'"'));
		$keterangan_tolak = array();
		if($data->status_berkas==-1)
		{
			$keterangan_tolak = RiwayatProsesDibatalkan::model()->find(array('condition'=>'id_berkas="'.$data->id.'"','order'=>'id desc'));
		}
		$dataGrid=new RiwayatAlurBerkas('CariDokumen');
		$dataGrid->unsetAttributes();  // clear any default values
		$dataGrid->id_berkas = $data->id;
		$this->render('hasilCari',array(
			'data'=>$data,
			'nomor_spm'=>$model->nomor_spm,
			'dataGrid'=>$dataGrid,
			'keterangan_tolak'=>$keterangan_tolak
		));
	}else 
	{
		$this->render('cari',array(
			'model'=>$model,
		));
	}	
}
public function actionprint($nomor_spm)
{
	$model=new BerkasMasuk;

		$data = BerkasMasuk::model()->find(array('condition'=>'nomor_spm="'.$nomor_spm.'"'));
		$keterangan_tolak = array();
		if($data->status_berkas==-1)
		{
			$keterangan_tolak = RiwayatProsesDibatalkan::model()->find(array('condition'=>'id_berkas="'.$data->id.'"','order'=>'id desc'));
		}
		$dataGrid=new RiwayatAlurBerkas('CariDokumen');
		$dataGrid->unsetAttributes();  // clear any default values
		$dataGrid->id_berkas = $data->id;
		
		$mPDF1 = Yii::app()->ePdf->mpdf();
		# You can easily override default constructor's params
		$mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4-L');
	 	# render (full page)
	 	$stylesheet = file_get_contents('css/print.css'); // external css
		$mPDF1->WriteHTML($stylesheet,1);
	 	$mPDF1->WriteHTML($this->renderPartial('hasilCari',array(
			'data'=>$data,
			'nomor_berkas'=>$model->nomor_berkas,
			'nomor_spm'=>$model->nomor_spm,
			'dataGrid'=>$dataGrid,
			'keterangan_tolak'=>$keterangan_tolak,
			'print'=>1
		),true));
	 	header('Content-Type: application/pdf');
		header('Cache-Control: max-age=0');
	 	$mPDF1->Output();
	 	exit();
}
/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);
$jam_masuk = explode(" ", $model->tanggal_masuk);
$model->tanggal_masuk = $jam_masuk[0];
$model->jam_masuk = $jam_masuk[1];
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['BerkasMasuk']))
{
	$model->attributes=$_POST['BerkasMasuk'];
	$model->jam_masuk = $_POST['jam_masuk'];
	$model->tanggal_masuk = $model->tanggal_masuk." ".$model->jam_masuk;
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

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('BerkasMasuk');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new BerkasMasuk('search');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('admin',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionKadisSekretariat()
{
$model=new BerkasMasuk('searchSekretariat');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_sekretariat',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionProsesAkuntansi()
{
$model=new BerkasMasuk('searchAkuntansi');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_proses_akuntansi',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionDisposisiPerben()
{
$model=new BerkasMasuk('searchDisposisiPerben');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_disposisi_perben',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionProsesPerben()
{
$model=new BerkasMasuk('searchPerbendaharaan');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_proses_perben',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionDisposisiKadis()
{
$model=new BerkasMasuk('searchDisposisiKadis');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_disposisi_kadis',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionProsesKadis()
{
$model=new BerkasMasuk('searchKadis');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_proses_kadis',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionSelesai()
{
$model=new BerkasMasuk('searchSelesai');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_selesai',array(
'model'=>$model,
'new_filter'=>$new_filter
));
}

public function actionDitolak()
{
$model=new BerkasMasuk('searchDitolak');
$new_filter = new BerkasMasuk;
$new_filter->attributes=$_GET['BerkasMasuk'];
$model->unsetAttributes();  // clear any default values
if(isset($_GET['BerkasMasuk']))
$model->attributes=$_GET['BerkasMasuk'];

$this->render('kadis_ditolak',array(
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
$model=BerkasMasuk::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='berkas-masuk-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function actionupload($id)
{
	$user = Yii::app()->getComponent('user');
	//$model = KonfirmasiHasilPemeriksaan::model()->findByPk($id);
	$uploaddir = 'upload/dokumen/';
	$nama_file = ApplikasiKomponen::generateRandomString();
	$ext = pathinfo($_FILES['dokumen']['name'], PATHINFO_EXTENSION);
	$uploadfile = $uploaddir .$nama_file.".".$ext;
	//Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
	
		/*if($ext!="docx")
		{
			$user = Yii::app()->getComponent('user');
			$user->setFlash(
			    'error',
			    "<strong>Oh snap!</strong> Jenis file yang diizinkan adalah jenis file docx."
			);
			$current_user=Yii::app()->user->id;
			$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);

		}*/

	if (move_uploaded_file($_FILES['dokumen']['tmp_name'], $uploadfile)) {
		$model = new FileMasuk;
		$model->id_berkas = $id;
		$model->nama_dokumen = $_POST['nama_dokumen'];
		$model->keterangan = $_POST['keterangan'];
		$model->nama_file = $nama_file.".".$ext;
		$model->save();
		$current_user=Yii::app()->user->id;
		$user->setFlash(
			    'success',
			    "<strong>Upload dokumen berhasl!</strong>"
			);
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
 	} else {
		
		$user->setFlash(
			    'error',
			    "<strong>Oh snap!</strong> Terjadi kesalahan, gagal upload file."
			);
		$current_user=Yii::app()->user->id;
		$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);

	}
}	
}
