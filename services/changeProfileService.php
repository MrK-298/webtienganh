<?php
  class ChangeProfileService {
    public function changeProfile($email,$phone,$name) {
        if ($this->verifyCredentials($email,$phone,$name)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCredentials($email,$phone,$name) {
        if($username){
            return true;
        }
        return false;
    }
}
?>