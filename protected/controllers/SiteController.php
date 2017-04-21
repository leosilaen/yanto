<?php
error_reporting(0);
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function actionHome()
	{
		$this->layout='//layouts/column4';
		$model=new BerkasMasuk;

		if(isset($_GET['BerkasMasuk']))
		{
			$model->attributes=$_GET['BerkasMasuk'];
			$data = BerkasMasuk::model()->find(array('condition'=>'nomor_berkas="'.$model->nomor_berkas.'"'));
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
				'nomor_berkas'=>$model->nomor_berkas,
				'dataGrid'=>$dataGrid,
				'keterangan_tolak'=>$keterangan_tolak
			));
		}else 
		{
			$this->render('home',array(
				'model'=>$model,
			));
		}	
		
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(array('home'));
		}
		$sqlDokumenMasuk = "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk ";
		$command = Yii::app()->db->createCommand($sqlDokumenMasuk);
		$results = $command->queryAll();
		$jumlah_dokumen = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenProses = "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE status_berkas<>-1 AND status_berkas<>4";
		$command = Yii::app()->db->createCommand($sqlDokumenProses);
		$results = $command->queryAll();
		$jumlah_dokumen_dalam_proses = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenSelesai = "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE status_berkas=4";
		$command = Yii::app()->db->createCommand($sqlDokumenSelesai);
		$results = $command->queryAll();
		$jumlah_dokumen_dalam_selesai = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenProsesAkuntansi= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas>=2 AND alur_berkas<=4";
		$command = Yii::app()->db->createCommand($sqlDokumenProsesAkuntansi);
		$results = $command->queryAll();
		$jumlah_dokumen_proses_akuntansi = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenDisposisiKePerben= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas=5";
		$command = Yii::app()->db->createCommand($sqlDokumenDisposisiKePerben);
		$results = $command->queryAll();
		$jumlah_dokumen_disposisi_ke_perben = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenProsesPerben= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas=6 OR alur_berkas=7";
		$command = Yii::app()->db->createCommand($sqlDokumenProsesPerben);
		$results = $command->queryAll();
		$jumlah_dokumen_proses_perben = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenDisposisiKeKadis= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas=8";
		$command = Yii::app()->db->createCommand($sqlDokumenDisposisiKeKadis);
		$results = $command->queryAll();
		$jumlah_dokumen_disposisi_ke_kadis = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenProsesKadis= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas>=9 AND alur_berkas<=11";
		$command = Yii::app()->db->createCommand($sqlDokumenProsesKadis);
		$results = $command->queryAll();
		$jumlah_dokumen_proses_kadis = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenSudahSelesai= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas=12";
		$command = Yii::app()->db->createCommand($sqlDokumenSudahSelesai);
		$results = $command->queryAll();
		$jumlah_dokumen_sudah_selesai = (int)$results[0]["jumlah_dokumen"];

		$sqlDokumenDitolak= "SELECT COUNT(id) as jumlah_dokumen FROM berkas_masuk WHERE alur_berkas=0";
		$command = Yii::app()->db->createCommand($sqlDokumenDitolak);
		$results = $command->queryAll();
		$jumlah_dokumen_ditolak = (int)$results[0]["jumlah_dokumen"];

		$this->render('index',
				array(
					'jumlah_dokumen'=>$jumlah_dokumen,
					'jumlah_dokumen_dalam_proses'=>$jumlah_dokumen_dalam_proses,
					'jumlah_dokumen_dalam_selesai'=>$jumlah_dokumen_dalam_selesai,
					'jumlah_dokumen_proses_akuntansi'=>$jumlah_dokumen_proses_akuntansi,
					'jumlah_dokumen_disposisi_ke_perben'=>$jumlah_dokumen_disposisi_ke_perben,
					'jumlah_dokumen_proses_perben'=>$jumlah_dokumen_proses_perben,
					'jumlah_dokumen_disposisi_ke_kadis'=>$jumlah_dokumen_disposisi_ke_kadis,
					'jumlah_dokumen_proses_kadis'=>$jumlah_dokumen_proses_kadis,
					'jumlah_dokumen_sudah_selesai'=>$jumlah_dokumen_sudah_selesai,
					'jumlah_dokumen_ditolak'=>$jumlah_dokumen_ditolak
					)
				);
	}
	
	public function actionAbout()
	{
		
		$this->render('about');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout='//layouts/column2';
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='//layouts/login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{

		Yii::app()->user->logout();
		$this->redirect(array('home'));
	}
}