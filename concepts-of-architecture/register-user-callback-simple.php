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
    
    public function getEmail() {
        return $this->email;
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
    
    public function register(array $data, Callable $callback = null) {
        $user = $this->factory->createUser($data);
        
        $this->users->add($user);
        
        if (!is_null($callback)) {
            $callback($user);
        }
    }
}

class SyslogLogger {
    // ...
    
    public function info($message) {
        syslog(LOG_INFO, $message);
    }
}

class FlashMessage {
    // ...
    
    public function success($message) {
        echo $message;
    }
}

///

$data = [
    'username' => 'adrianpietka',
    'password' => 'strong#password',
    'email' => 'adrian@pietka.me'
];

$flash = new FlashMessage;
$logger = new SyslogLogger;

$userRepository = new DoctrineUserRepository;
$userFactory = new RegisterFormUserFactory;
$registerService = new RegisterUserService($userRepository, $userFactory);

$registerService->register($data, function($user) use ($logger, $flash) {
    $logger->info(sprintf('Created new account with email: %s', $user->getEmail()));
    $flash->success('Congratulations your registration has been successful.');
});

// @via zawarstwaabstrakcji.pl