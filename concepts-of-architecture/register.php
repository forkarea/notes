<?php

interface UserFactory {
    public function createUser(array $data);
}
    
interface UserRepository {
    public function add(User $user);
}

class User {
    private $username;
    private $password;
    private $email;
    
    public function __construct($username) {
        $this->username = $username;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
}

class RegisterFormUserFactory implements UserFactory {
    public function createUser(array $data) {
        $user = new User($data['username']);
       
        $user->setPassword(md5($data['password'])); // example
        $user->setEmail($data['email']);
        
        return $user;
    }
}

class DoctrineUserRepository implements UserRepository {
    public function add (User $user) {
        // add user to storage
        
        var_dump($user);
    }
}

class RegisterUserService {
    private $users;
    private $factory;
    
    public function __construct(UserRepository $users, UserFactory $factory) {
        $this->users = $users;
        $this->factory = $factory;
    }
    
    public function register(array $data) {
        $this->users->add($this->factory->createUser($data));
    }
}

///

$data = [
    'username' => 'adrianpietka',
    'password' => 'strong#password',
    'email' => 'adrian@pietka.me'
];

$userRepository = new DoctrineUserRepository;
$userFactory = new RegisterFormUserFactory;
$registerService = new RegisterUserService($userRepository, $userFactory);

$registerService->register($data);

// @via zawarstwaabstrakcji.pl