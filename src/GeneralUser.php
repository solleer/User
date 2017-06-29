<?php
namespace Solleer\User;
use Respect\Validation\Rules\AllOf as ValidationAllOf;
class GeneralUser implements User {
    private $maphper;
    private $validator;
    private $userAttributes;

    public function __construct(\ArrayAccess $maphper, ValidationAllOf $validator, $userAttributes = ['id']) {
        $this->maphper = $maphper;
        $this->validator = $validator;
        $this->userAttributes = $userAttributes;
    }

    public function save(array $data, $id = null) {
        $data = (object) $this->removeExcessAttributes($data);
        // If the user is being updated then add missing properties so it passes validation
        if ($id !== null && $this->getUser($id)) $data = (object) array_merge((array)$this->getUser($id), (array)$data);
        if (!$this->validator->validate((array)$data)) return false;
        $this->maphper[$id] = $data;
        return $data;
    }

    private function removeExcessAttributes(array $data): array {
        return array_filter($data, function ($key) {
            return in_array($key, $this->userAttributes);
        }, ARRAY_FILTER_USE_KEY);
    }

    public function getUser($selector) {
        return $this->maphper[$selector] ?? false;
    }
}
