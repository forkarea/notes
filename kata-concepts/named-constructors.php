<?php

final class User {
    private function __construct() {}
    
    public static function fromRegisterForm(array $data) {
        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        return $user;
    }
    
    public function fromNameAndEmail($name, $email) {
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        return $user;
    }
    
    public function fromTwitter(TwitterUser $twitter) {
        $user = new User();
        $user->setName($twitter->nick);
        $user->setEmail($twitter->email);
        return $user;
    }
    
    public function setName($name) { /* ... */ }
    public function setEmail($email) { /* ... */ }
}

$user = User::fromRegisterForm($registerFormData);
$user = User::fromNameAndEmail('User Name', 'user.email@dot.com');
$user = User::fromTwitter($twitterUser);
