<?php
namespace Solleer\User\Authorize;
class User implements \Solleer\User\Authorizable {
    public function authorize($user, array $args): bool {
        if (!empty($user)) return true;
        else return false;
    }
}
