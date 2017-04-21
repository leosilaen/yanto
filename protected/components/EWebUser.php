<?php 
class EWebUser extends CWebUser{
 
    protected $_model;
    function isAkuntansi(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::AKUNTANSI;
        return false;
    }
    function isAdministrator(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::ADMIN;
        return false;
    }
    function isPerbendaharaan(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::PERBENDAHARAAN;
        return false;
    }
     function isSekretariat(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::SEKRETARIAT;
        return false;
    }
    function isKadis(){
        $user = $this->loadUser();
        if ($user)
           return $user->level==LevelLookUp::KADIS;
        return false;
    }
	function accountUser()
	{
		$user = $this->loadUser();
       
        return $user;
	}
	
	
	function id_user()
	{
		if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk( $this->id );
        }
        return $this->_model->id;
	}
    // Load user model.
    protected function loadUser()
    {
        if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk( $this->id );
        }
        return $this->_model;
    }
}
?>