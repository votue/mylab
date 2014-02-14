<?php
/**
 * Internal Identity Class
 * Basically verifies a member by his email from the DB
 * 
 * 
 */
class InternalIdentity extends CUserIdentity
{
    /**
     * @var int unique member id
     */
    private $_id;

    /**
     * Authenticate a member
     *
     * @return int value greater then 0 means an error occurred 
     */
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('username'=>$this->name),'role != 4');

        if($record===null)
        {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage = 'Xin lỗi, chúng tôi không thể tìm thấy thông tin của người dùng đã đăng nhập';
        }
        else if( $record->password !== $record->hashPassword($this->password) )
        {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            $this->errorMessage = 'Xin lỗi, mật khẩu nhập vào không đúng';
        }
        else
        {
            $this->setStateMember($record);
        }
        return !$this->errorCode;
    }
    
    function setStateMember($record){
        $this->_id = $record->id;

        /*$auth=Yii::app()->authManager;
        if(!$auth->isAssigned($record->role,$this->_id))
        {
            if($auth->assign($record->role,$this->_id))
            {
                Yii::app()->authManager->save();
            }
        }*/
        
        // We add username to the state
        $this->setState('username', $record->username);
        $this->setState('firstname', $record->first_name);
        $this->setState('lastname', $record->last_name);
        $this->setState('email', $record->email);
        $this->setState('role', $record->role);
        
        $this->errorCode = self::ERROR_NONE;
    }

    /**
     * @return int unique member id
     */
    public function getId()
    {
        return $this->_id;
    }
}