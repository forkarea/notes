<?php

require_once __DIR__.'/../bootstrap/bootstrap.php';

$article = $entityManager->find('Entity\Article', 1);

$entityManager->remove($article);
$entityManager->flush();