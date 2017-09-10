<?php

namespace Solleer\User;

interface User {
    public function save(array $data, $id = null);
    public function getUser($selector);
    public function delete($selector);
}
