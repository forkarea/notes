<?php

require_once __DIR__.'/../bootstrap/bootstrap.php';

$articleRepository = $entityManager->getRepository('Entity\Article');

// find all
$articles = $articleRepository->findAll();
foreach($articles as $article) {
    echo '- #'.$article->getId().' - '.$article->getTitle().PHP_EOL;   
}

// fetch article by id
$article = $entityManager->find('Entity\Article', 5);

// fetch article
$aricle = $entityManager->getRepository('Entity\Article')
    ->findOneBy(['title' => 'Article title']);

// find all articles for author id = 1
$articles = $entityManager->getRepository('Entity\Article')
    ->findBy(['author' => 1]);