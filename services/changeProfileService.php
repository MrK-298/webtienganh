<?php
  class ChangeProfileService {
    public function changeProfile($email,$phone,$name,$username) {
        if ($this->verifyCredentials($email,$phone,$name,$username)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCredentials($email,$phone,$name,$username) {
        $user = $collection->findOne(['username' => $username]);
        $userId = $user['_id'];
        $filter = ['_id' => $userId];
        $update = ['$set' => ['email'=>$email,'phone'=>$phone,'name'=>$name]]; 
        $result = $collection->updateOne($filter, $update);
        if ($result->getModifiedCount() > 0) {
           return true;
        } else {
            return false;
        }        
    }
}
?>