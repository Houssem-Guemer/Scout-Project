<?php
class Mockable
{
    public $constructorArgs;
    public $cloned;

    public function __construct($arg1 = null, $arg2 = null)
    {
        $this->constructorArgs = [$arg1, $arg2];
    }

<<<<<<< HEAD
    public function __clone()
    {
        $this->cloned = true;
    }

    public function mockableMethod()
=======
    public function foo()
>>>>>>> dashboard-test
    {
        // something different from NULL
        return true;
    }

    public function anotherMockableMethod()
    {
        // something different from NULL
        return true;
    }

    public function __clone()
    {
        $this->cloned = true;
    }
}
