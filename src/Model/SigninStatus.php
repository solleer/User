<?php
namespace User\Model;

class SigninStatus {
    public function setSigninID($id) {
        $_SESSION['user_id'] = $id;
        return true;
    }

    public function getSigninID() {
        return $_SESSION['user_id'];
    }
}