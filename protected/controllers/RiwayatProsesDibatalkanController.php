<?php
error_reporting(0);
class RiwayatProsesDibatalkanController extends Controller
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
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','AdminBendahara'),
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
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id=null,$id_berkas)
{
$model=new RiwayatProsesDibatalkan;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RiwayatProsesDibatalkan']))
{
	$model->attributes=$_POST['RiwayatProsesDibatalkan'];
	$model->id_berkas = $id_berkas;
	$model->id_alur_berkas = $id;
	$model->tanggal_dibatalkan = date("Y-m-d H:i:s");
	$model->pemeriksa = Yii::app()->user->akun->id;
if($model->save())
{
	$models = RiwayatAlurBerkas::model()->find(array('condition'=>'id_berkas="'.$id_berkas.'" AND id="'.$id.'"'));
	$models->status = -1; 
	$models->save();
	$models2 = BerkasMasuk::model()->findByPk($models->id_berkas);
	$models2->status_berkas = -1;
	$models2->alur_berkas=0;
	$models2->save();
	$user = Yii::app()->getComponent('user');
	$user->setFlash(
		'error',
		"<strong>Permohonan telah ditolak!</strong>"
	);
	//$current_user=Yii::app()->user->id;
	//$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
}
	$current_user=Yii::app()->user->id;
	$this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
//	
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

if(isset($_POST['RiwayatProsesDibatalkan']))
{
$model->attributes=$_POST['RiwayatProsesDibatalkan'];
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
public function actionDelete($id,$id_berkas,$id_alur_berkas)
{
	if(Yii::app()->request->isPostRequest)
	{
		$data = $this->loadModel($id);
		$dataRiwayat = RiwayatAlurBerkas::model()->find(array('condition'=>'id_berkas="'.$data->id_berkas.'" AND id = "'.$id_alur_berkas.'"','order'=>'id DESC'));
		if(sizeof($dataRiwayat)>0)
		{	$dataRiwayat->status=1;
			$dataRiwayat->save();
		}
		$model = BerkasMasuk::model()->findByPk($data->id_berkas);
		if(sizeof($model)>0)
		{
			$model->status_berkas = 1;
			$model->save();
		}
		$data->delete();
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
$dataProvider=new CActiveDataProvider('RiwayatProsesDibatalkan');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model=new RiwayatProsesDibatalkan('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatProsesDibatalkan']))
		$model->attributes=$_GET['RiwayatProsesDibatalkan'];
	$model->jenis = "Akuntansi";
	$this->render('admin',array(
		'model'=>$model,
	));
}
public function actionAdminBendahara()
{
	$user = Yii::app()->getComponent('user');
	$current_user=Yii::app()->user->id;
	Yii::app()->session['userView'.$current_user.'returnURL']= Yii::app()->request->Url;
	$model=new RiwayatProsesDibatalkan('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiwayatProsesDibatalkan']))
		$model->attributes=$_GET['RiwayatProsesDibatalkan'];
	$model->jenis = "Perbendaharaan";
	$this->render('admin',array(
		'model'=>$model,
	));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=RiwayatProsesDibatalkan::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='riwayat-proses-dibatalkan-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
