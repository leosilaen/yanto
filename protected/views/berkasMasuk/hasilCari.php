<?php 
if($print!=1)
{?>
<section class="filter">
<a href='index.php?r=berkasMasuk/cariDokumen' class='btn btn-primary btn-flat'>Cari Lagi</a>
<?php 
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Cetak','url'=>array('print','nomor_spm'=>$data->nomor_spm),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Berkas Masuk','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
</section>
<?php }?>
<?php 
if($print==1)
{
	?>
	<table class='kop_surat'>
	<tr>
	<td style='width:1%;margin-left: 50px'>
	<img src='<?php echo Yii::app()->baseUrl.'/img/logo-kota-pematangsiantar-sumut-768x967.png'?>' class='logo'> </td>
	<td style='width:99%;margin-left: -230px'>
	<h1 class='judul'>PROGRESS PEKERJAAN VERIFIKASI PENCAIRAN ANGGARAN DANA KOTA PEMATANGSIANTAR</h1>
	</td></tr>
	</table>
<?php 
}
?>
<div class='content'>
<?php
if(sizeof($data)>0)
{
	echo "<h4>Hasil pencarian dokumen dengan nomor <strong>".$data->nomor_spm."</strong></h4>";
	$this->widget('booster.widgets.TbDetailView',array(
	'htmlOptions' => array('class'=>'data'),
	'data'=>$data,
	'attributes'=>array(
			'nomor_berkas',
			'nomor_spm',
			'tanggal_masuk',
			'jenis_berkas_.jenis_berkas',
			
			'keterangan',
			array(
				'label'=>'Input oleh',
				'value'=>$data->penerima_->nama_pengguna
			),
			array(
				'header'=>'Status Berkas',
				'name'=>'teks_status_berkas',
			),
			//'status_berkas',
	),
	)); 
	if(sizeof($keterangan_tolak)>0)
	{
		?>
		<div class='alert alert-danger'>Alasan tolak  <strong><?php echo $keterangan_tolak->keterangan?></strong></div>
		<?php
	}
	echo "<h4>Riwayat alur berkas</h4>";
		$this->widget('booster.widgets.TbGridView',array(
		'id'=>'riwayat-alur-berkas-grid',
		'itemsCssClass' => 'data',
		'dataProvider'=>$dataGrid->CariDokumen(),
		'filter'=>null,
		'enableSorting' => false,
		'columns'=>array(
			array(
		        'header'=>'No.',
				'htmlOptions'=>array('width'=>'50'),
		        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
				),
				'posisi_berkas',
				
				array(
					'header'=>'Tanggal Diterima',
					'name'=>'tanggal_diterima',
				),
				array(
					'header'=>'Tanggal Selesai',
					'name'=>'tanggal_disposisi',
				),
				array(
					'header'=>'Penerima Berkas',
					'name'=>'penerima_.nama_pengguna',
				),
				array(
					'name'=>'waktu_proses',
				),
				array(
					'header'=>'Status',
					'name'=>'teks_status',
				),
				/*
				'pengirim',
				'keterangan',
				*/

		),
		));
}else 
{
	?>
	<div class='alert alert-danger'>Tidak ditemukan dokumen dengan nomor spm <strong><?php echo $nomor_spm?></strong></div>
	<?php 
}
?>

</div>
