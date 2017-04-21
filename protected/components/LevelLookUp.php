<?php 
class LevelLookUp{
      const PERBENDAHARAAN = "Perbendaharaan";
      const AKUNTANSI = "Akuntansi";
      const SEKRETARIAT = "Sekretariat";
      const ADMIN  = "Administrator";
      const KADIS = "Kepala Dinas";
	 
      // For CGridView, CListView Purposes
      public static function getLabel( $level ){
          if($level == self::PERBENDAHARAAN)
             return 'Perbendaharaan';
          if($level == self::AKUNTANSI)
             return 'Akuntansi';
          if($level == self::SEKRETARIAT)
            return 'Sekretariat';
          if($level == self::ADMIN)
            return 'Administrator';
           if($level == self::KADIS)
            return 'Kepala Dinas';
		  
          return false;
      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                self::PERBENDAHARAAN=>'Perbendaharaan',
                self::AKUNTANSI=>'Akuntansi',
                self::SEKRETARIAT=>'Sekretariat',
				        self::ADMIN=>'Administrator',
                 self::KADIS=>'Kepala Dinas',
				 );
    }
}