# PHP - SPL - SplStack, SplQueue, SplPriorityQueue

## SplStack (LIFO)

*Stos* - struktura danych, w której dane dok³adane s¹ na wierzch stosu i pobierane s¹ tak¿e z wierzchu stosu (LIFO - Last In, First Out).

```php
$stack = new SplStack();

$stack->push('FooBar 1');
$stack->push('FooBar 2');
$stack->push('FooBar 3');
$stack->push('FooBar 4');

foreach($stack as $item) {
    echo $item . PHP_EOL;
}

/* Result:
FooBar 4
FooBar 3
FooBar 2
FooBar 1
*/
```

## SplQueue (FIFO)

*Kolejka* - struktura danych, w której nowe dane dopisywane s¹ na koñcu kolejki, a pobierane s¹ z pocz¹tku kolejki (FIFO - First In, First Out).

```php
$queue = new SplQueue();

$queue->push('FooBar 1');
$queue->push('FooBar 2');
$queue->push('FooBar 3');
$queue->push('FooBar 4');

foreach($queue as $item) {
    echo $item . PHP_EOL;
}

/* Result:
FooBar 1
FooBar 2
FooBar 3
FooBar 4
*/
```

## SplPriorityQueue

*Kolejka priorytetowa* - abstrakcyjny typ danych w którym elementy zbioru posiadaj¹ okreœlon¹ relacjê porz¹dku.

```php
<?php

$queue = new SplPriorityQueue();

$queue->insert('FooBar 1', 3);
$queue->insert('FooBar 2', 0);
$queue->insert('FooBar 3', 4);
$queue->insert('FooBar 4', 2);

foreach($queue as $item) {
    echo $item . PHP_EOL;
}

/* Result:
FooBar 3
FooBar 1
FooBar 4
FooBar 2
*/
```

Elementy wyœwietlane s¹ wzgêdem priorytetu (od najwy¿szego do najni¿szego) nadanego w metodzie insert().