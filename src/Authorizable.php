<?php
namespace Solleer\User;
interface Authorizable {
    public function authorize($user, array $args): bool;
}
