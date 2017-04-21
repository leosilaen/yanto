<ul>
<?php 
$data = $this->getComments();
 
foreach($data as $item)
{
	if($item->status<=2 )
	{
		echo "Ada berkas masuk yang belum didisposisi. mohon dicek!";
		// echo "<li class='drop_down_menu'><a href='".$item->link."'>{$item->pesan}</a></li>";
	}else 
	{
		echo "Ada berkas masuk yang belum didisposisi. mohon dicek!";
		// echo "<li class='drop_down_menu new_notif'><a href='".$item->link."&id_notif=".$item->id."'>{$item->pesan}</a></li>";
	}
    
}

?>
</ul>