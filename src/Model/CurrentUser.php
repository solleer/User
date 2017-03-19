<?php

namespace User\Model;

class CurrentUser {
    private $user;
    private $status;

    public function __construct(\User\Model\User $user, SigninStatus $status) {
        $this->user = $user;
        $this->status = $status;
    }

    public function updateCurrentUser(array $data) {
        return $this->save($data, $this->status->getSigninID());
    }

    public function getCurrentUser() {
        return $this->getUser($this->status->getSigninID());
    }
}
