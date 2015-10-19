<?php

require_once __DIR__.'/../bootstrap/bootstrap.php';

$article = $entityManager->find('Entity\Article', 5);
$article->setTitle('New title');

$entityManager->flush();