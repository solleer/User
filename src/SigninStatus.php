<?php
namespace Solleer\User;

class SigninStatus {
    public function setSigninID($id, $setCookie = false) {
        if (isset($_COOKIE['user_id'])) $setCookie = true;
        $_SESSION['user_id'] = $id;
        if ($setCookie) $this->setCookie('user_id', $id);
        return true;
    }

    public function getSigninID() {
        return $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;
    }

    private function setCookie($name, $value) {
        if (is_array($value)) {
            foreach ($value as $key => $val) $this->setCookie($name . "[$key]", $val);
            return;
        }

        if ($value) $expire = time()+(60*60*24*365); // Expire in 1 year
        else $expire = 1;

        setCookie($name, $value ?? '', $expire, '/');
    }
}
