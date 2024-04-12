<?php
class AuthenticationService {
    public function login($usernameOrEmail, $password) {
        if ($this->verifyCredentials($usernameOrEmail, $password)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCredentials($usernameOrEmail, $password) {
        global $collection;
        $user = $collection->findOne([
            '$or' => [
                ['username' => $usernameOrEmail],
                ['email' => $usernameOrEmail]
            ]
        ]);

        if ($user) { 
            if ((password_verify($password,$user['password']))) {
                return true;
            }
        }
        return false;
    }
}

?>