<?php $this->pageTitle=Yii::app()->name; ?>

<?php 
if(!Yii::app()->user->isGuest)
{
	?>
	<div class="modal fade" id="dialog_utama" >
	  <div class="modal-dialog " style='width:900px;left:2%'>
		<div class="">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body" style='width:900px;overflow-y: scroll;height: 500px;'  id="modal_content">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		   
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<div class='col-md-12'>
	<h2 class='page-head-line'>Selamat datang di Sistem Informasi Penanggulangan Bencana Kota Pematangsiantar</h2>
	<table>
	<tr><td>Jumlah Rumah Sakit </td><td>: <?php echo sizeof($RumahSakit)?></td></tr>
	<tr><td>Jumlah Puskesmas </td><td>: <?php echo sizeof($Puskesmas)?></td></tr>
	<tr><td>Jumlah Laporan Bencana </td><td>: <?php echo sizeof($SuratMasuk)?></td></tr>
	<tr><td>Jumlah Laporan Bencana Tahun <?php echo date("Y")?></td><td>: <?php echo sizeof($SuratMasukTahunIni)?></td></tr>
	</table> 
	<h2><span class='alert alert-info'><strong>122 </strong>hari tanpa laporan bencana..!!</span></h2>
	<h2 class='alert alert-warning'>Laporan Bencana Terbaru</h2>
	
	</div>
	<?php 
}

?>