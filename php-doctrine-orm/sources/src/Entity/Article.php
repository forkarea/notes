<?php

namespace Entity;

/**
 * @Entity
 **/
class Article {
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     **/
    protected $id;
    
    /**
     * @Column(type="string")
     **/
    protected $title;
    
    protected $introduction;
    
    /**
     * @Column(type="text")
     **/
    protected $body;
    
    protected $createdDate;
    
    public function getId() {
        return $this->id;
    }
    
    public function setBody($body) {
        $this->body = $body;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
}