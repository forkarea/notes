<?php

class MyFirstObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo MyFirstObserver::class . PHP_EOL;
    }
}

class MySecondObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo MySecondObserver::class . PHP_EOL;
    }
}

class FooSubject implements SplSubject
{
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

$firstObserver = new MyFirstObserver;
$secondObserver = new MySecondObserver;
$fooSubject = new FooSubject;

$fooSubject->attach($firstObserver);
$fooSubject->attach($secondObserver);

$fooSubject->notify();