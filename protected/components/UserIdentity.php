<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 private $_id;
	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('username'=>$this->username,'status'=>'Aktif'));
		if($user===null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif($user->password_md5 !== md5($this->password))
			   $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			   #Call with Yii::app()->user->id
			  // $log = new LogDataSiswa;
			   //$log->keterangan = "User ".$user->username." melakukan login pada waktu ".date("Y-m-d H:i:s")."";
			  // $log->tanggal = new CDbExpression('NOW()');
			   //$log->save();
			   $this->_id=$user->id;
			   $this->username = $user->username;
			   $this->errorCode=self::ERROR_NONE;
			   $this->setState('level', $user->level);	
			   $this->setState('akun', $user);					
		}
		return !$this->errorCode;
	}
	public function getId()
	 {
		return $this->_id;
	 }
}