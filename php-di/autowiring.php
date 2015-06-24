<?php

require_once 'vendor/autoload.php';

// class definition
class Author {
    public $firstName = 'Adrian';
    public $lastName = 'Pietka';
}

class Head {
    public function __construct(Author $author) {
        $this->author = $author;
    }
}

class Body {
    
}

class Document {
    public function __construct(Head $head, Body $body) {
        $this->head = $head;
        $this->body = $body;
    }
}

// create a container instance 
$builder = new DI\ContainerBuilder();
// $builder->useAutowiring(false); // disabling autowiring
$container = $builder->build();

// get instance of Document class
$document = $container->get('Document');
var_dump($document);