<?php
  class RegisterService {
    public function register($username,$password,$email,$phone,$name) {
        if ($this->verifyCredentials($username,$password,$email,$phone,$name)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCredentials($username,$password,$email,$phone,$name) {
        global $collection;
        $user = $collection->findOne([         
                ['username' => $username]
        ]);
        if($user){
            return true;
        }
        return false;
    }
}
?>