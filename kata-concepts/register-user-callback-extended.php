<?php

interface UserFactory {
    public function createUser(array $data);
}

interface UserRepository {
    public function add(User $user);
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
    public function add(User $user) {
        // add user to storage

        var_dump($user);
    }
}

class RegisterUserService {
    private $users;
    private $factory;

    private function executeClosures(User $user, array $closures) {
        foreach ($closures as $closure) {
            if (!$closure instanceof RegisterUserClosure) {
                throw new InvalidArgumentException(sprintf('%s not implements %s interface', 
                    get_class($closure), RegisterUserClosure::class));
            }

            $closure->execute($user);
        }
    }

    public function __construct(UserRepository $users, UserFactory $factory) {
        $this->users = $users;
        $this->factory = $factory;
    }

    public function register(array $data, array $closures = []) {
        $user = $this->factory->createUser($data);

        $this->users->add($user);
        $this->executeClosures($user, $closures);
    }
}

interface RegisterUserClosure {
    public function execute(User $user);
}

class LogRegisterUserClosure implements RegisterUserClosure {
    private $logger;

    public function __construct($logger) {
        $this->logger = $logger;
    }

    public function execute(User $user) {
        $this->logger->info(sprintf('Created new account with email: %s', $user->getEmail()));
    }
}

class FlashMessageRegisterUserClosure implements RegisterUserClosure {
    private $flash;

    public function __construct($flash) {
        $this->flash = $flash;
    }

    public function execute(User $user) {
        $this->flash->succes(sprintf('Congratulations %s your registration has been successful.', $user->getEmail()));
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

$logger = new SyslogLogger;
$logRegisterUserClosure = new LogRegisterUserClosure($logger);

$flash = new FlashMessage;
$flashMessageRegisterUserClosure = new FlashMessageRegisterUserClosure($flash);

$registerService = new RegisterUserService($userRepository, $userFactory);
$registerService->register($data, [
    $logRegisterUserClosure, $flashMessageRegisterUserClosure
]);

// @via zawarstwaabstrakcji.pl