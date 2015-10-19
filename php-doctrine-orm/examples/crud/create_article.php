<?php

require_once __DIR__.'/../bootstrap/bootstrap.php';

$article = new Entity\Article();
$article->setTitle('Article title - '.time());
$article->setIntroduction('Introduction...');
$article->setBody('Content of new article.');

$entityManager->persist($article);
$entityManager->flush();

echo 'Created Article with ID = '.$article->getId().PHP_EOL;