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
        $user = User::model()->findByAttributes(array('email'=>$this->username)); //CUserIdentity lagrar email som username
        error_log("user.codeRole---> " . $user->code_role);
        error_log("user.firstName---> " . $user->first_name);
        if($user === null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if($user->password !== ($this->password)) {
            //  } else if($user->password !== SHA1($this->password)) {  ---fixa när jag vet hur man gör SHA1 lösenord
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id=$user->guid;
            $role = CodeRole::model()->findByPk($user->code_role);
            error_log("role type:  " . gettype($role));
            error_log("title name " . $role->title);

            $this->setState('role', $role->title);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}

    public function getId()
    {
        return $this->_id;
    }


}