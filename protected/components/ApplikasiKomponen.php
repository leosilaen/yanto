<?php
class ApplikasiKomponen extends CApplicationComponent {
	public static function sudahDiterima($status)
	{
		if($status==0 or $status ==-1)
			return false;
		return true;
	}
   public static function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	public static function romanic_number($integer, $upcase = true) 
	{ 
	    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
	    $return = ''; 
	    while($integer > 0) 
	    { 
	        foreach($table as $rom=>$arb) 
	        { 
	            if($integer >= $arb) 
	            { 
	                $integer -= $arb; 
	                $return .= $rom; 
	                break; 
	            } 
	        } 
	    } 

	    return $return; 
	} 
	public static function patient_char($str)
	{
		$alpha = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X ', 'Y', 'Z');
		$newName = '';
		do {
		    $str--;
		    $limit = floor($str / 26);
		    $reminder = $str % 26;
		    $newName = $alpha[$reminder].$newName;
		    $str=$limit;
		} while ($str >0);
		return $newName;
	}
	public static function toNum($data) {
	    $alphabet = array( 'a', 'b', 'c', 'd', 'e',
	                       'f', 'g', 'h', 'i', 'j',
	                       'k', 'l', 'm', 'n', 'o',
	                       'p', 'q', 'r', 's', 't',
	                       'u', 'v', 'w', 'x', 'y',
	                       'z'
	                       );
	    $alpha_flip = array_flip($alphabet);
	    $return_value = -1;
	    $length = strlen($data);
	    for ($i = 0; $i < $length; $i++) {
	        $return_value +=
	            ($alpha_flip[$data[$i]] + 1) * pow(26, ($length - $i - 1));
	    }
	    return strtoupper($return_value);
	}
   public function dateDiff($start, $end)
   {
	   $start_ts = strtotime($start);
	   $end_ts = strtotime($end);
	   $difference = $end_ts - $start_ts;
	   
	   $days = floor($difference / 86400);
	   $hours = floor(($difference - $days * 86400) / 3600);
	   $minutes = floor(($difference - $days * 86400 - $hours * 3600) / 60);
	   $seconds = floor($difference - $days * 86400 - $hours * 3600 - $minutes * 60);
	   return "{$days} hari {$hours} jam {$minutes} menit {$seconds} detik ";
	}
	public function tambahTanggal($tgl_awal,$penambahan)
	{
		$tgl_awal = strtotime($tgl_awal);
		$penambahan = $penambahan * 60;
		$waktu_sekarang = $tgl_awal+$penambahan;
		return $waktu_sekarang;
	}
	public static function tanggal_indonesia($tanggal)
	{
		$tanggal = explode("-",$tanggal);
		//Array Hari
		
		//Array Bulan
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$bulan = $array_bulan[$tanggal[1]*1];

		//Format Tahun
		$tahun = $tanggal[0];
	
		return  $tanggal[2] ." ". $bulan ." ". $tahun;

	}
}
?>