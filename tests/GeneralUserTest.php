<?php
use Solleer\User\{GeneralUser};
use Respect\Validation\Rules\AllOf;
class GeneralUserTest extends UserTest {
    private function getIdField(): string {
        return 'id';
    }

    protected function getSampleUser($id = null): array {
        $user = [
            'username' => 'test1',
            'first_name' => 'foo',
            'last_name' => 'bar',
            'password' => 'test',
            'email' => 'foo@bar.com',
            'security_question' => 'What is the module name?',
            'security_answer' => 'user'
        ];
        if ($id !== null) $user[$this->getIdField()] = $id;
        return $user;
    }

    private function getMockValidation() {
        $stub = $this->createMock(AllOf::class);
        $stub->method('validate')->willReturn(true);
        return $stub;
    }

    protected function getUser($storage): \Solleer\User\User {
        $user = new GeneralUser($storage, $this->getMockValidation());
        return $user;
    }
}
