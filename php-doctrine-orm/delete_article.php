<?php

require_once __DIR__.'/sources/bootstrap.php';

$article = $entityManager->find('Entity\Article', 5);

$entityManager->remove($article);
$entityManager->flush();