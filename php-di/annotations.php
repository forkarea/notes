<?php

require_once 'vendor/autoload.php';

/**
 * @Annotation
 */
class Author {
    
    /**
     * @Inject("firstName")
     */
    public $firstName;
    
    /**
     * @Inject("lastName")
     */
    public $lastName;

}

class Head {

    private $author;
    
    /**
     * @Inject
     * @param Author $author
     */
    public function setAuthor(Author $author) {
        $this->author = $author;
    }

}

class Body {
    
}

class Document {

    /**
     * @Inject
     * @var Head
     */
    private $head;
    
    private $body;
    
    /**
     * @Inject
     * @param Body $body
     */
    public function setBody($body) {
        $this->body = $body;
    }

}

// create a container instance 
$builder = new DI\ContainerBuilder();
$builder->useAutowiring(false);
$builder->useAnnotations(true);
$builder->addDefinitions([
    'firstName' => 'Adrian',
    'lastName' => 'Pietka'
]);

$container = $builder->build();

// get instance of Document class
$document = $container->get('Document');
var_dump($document);