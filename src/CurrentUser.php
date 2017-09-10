<?php

namespace Solleer\User;

class CurrentUser {
    private $user;
    private $status;

    public function __construct(User $user, SigninStatus $status) {
        $this->user = $user;
        $this->status = $status;
    }

    public function updateCurrentUser(array $data) {
        return $this->user->save($data, $this->status->getSigninID());
    }

    public function getCurrentUser() {
        return $this->user->getUser($this->status->getSigninID());
    }

    public function delete() {
        $deleted = $this->user->delete($this->status->getSigninID());
        if ($deleted) $this->status->setSigninID(null);
        return $deleted;
    }
}
