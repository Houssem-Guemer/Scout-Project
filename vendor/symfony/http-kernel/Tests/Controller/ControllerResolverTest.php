<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Tests\Fixtures\Controller\NullableController;
use Symfony\Component\HttpKernel\Tests\Fixtures\Controller\VariadicController;
use Symfony\Component\HttpFoundation\Request;

class ControllerResolverTest extends TestCase
{
    public function testGetControllerWithoutControllerParameter()
    {
        $logger = $this->getMockBuilder('Psr\Log\LoggerInterface')->getMock();
        $logger->expects($this->once())->method('warning')->with('Unable to look for the controller as the "_controller" parameter is missing.');
        $resolver = $this->createControllerResolver($logger);

        $request = Request::create('/');
        $this->assertFalse($resolver->getController($request), '->getController() returns false when the request has no _controller attribute');
    }

    public function testGetControllerWithLambda()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', $lambda = function () {});
        $controller = $resolver->getController($request);
        $this->assertSame($lambda, $controller);
    }

    public function testGetControllerWithObjectAndInvokeMethod()
    {
        $resolver = $this->createControllerResolver();
        $object = new InvokableController();

        $request = Request::create('/');
        $request->attributes->set('_controller', $object);
        $controller = $resolver->getController($request);
        $this->assertSame($object, $controller);
    }

    public function testGetControllerWithObjectAndMethod()
    {
        $resolver = $this->createControllerResolver();
        $object = new ControllerTest();

        $request = Request::create('/');
        $request->attributes->set('_controller', array($object, 'publicAction'));
        $controller = $resolver->getController($request);
        $this->assertSame(array($object, 'publicAction'), $controller);
    }

    public function testGetControllerWithClassAndMethodAsArray()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', array(ControllerTest::class, 'publicAction'));
        $controller = $resolver->getController($request);
        $this->assertInstanceOf(ControllerTest::class, $controller[0]);
        $this->assertSame('publicAction', $controller[1]);
    }

    public function testGetControllerWithClassAndMethodAsString()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', ControllerTest::class.'::publicAction');
        $controller = $resolver->getController($request);
        $this->assertInstanceOf(ControllerTest::class, $controller[0]);
        $this->assertSame('publicAction', $controller[1]);
    }

    public function testGetControllerWithInvokableClass()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', InvokableController::class);
        $controller = $resolver->getController($request);
        $this->assertInstanceOf(InvokableController::class, $controller);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetControllerOnObjectWithoutInvokeMethod()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', new \stdClass());
        $resolver->getController($request);
    }

    public function testGetControllerWithFunction()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', 'Symfony\Component\HttpKernel\Tests\Controller\some_controller_function');
        $controller = $resolver->getController($request);
        $this->assertSame('Symfony\Component\HttpKernel\Tests\Controller\some_controller_function', $controller);
    }

    public function testGetControllerWithClosure()
    {
        $resolver = $this->createControllerResolver();

        $closure = function () {
            return 'test';
        };

        $request = Request::create('/');
        $request->attributes->set('_controller', $closure);
        $controller = $resolver->getController($request);
        $this->assertInstanceOf(\Closure::class, $controller);
        $this->assertSame('test', $controller());
    }

    /**
     * @dataProvider getStaticControllers
     */
    public function testGetControllerWithStaticController($staticController, $returnValue)
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('_controller', $staticController);
        $controller = $resolver->getController($request);
        $this->assertSame($staticController, $controller);
        $this->assertSame($returnValue, $controller());
    }

    public function getStaticControllers()
    {
        return array(
            array(AbstractController::class.'::staticAction', 'foo'),
            array(array(AbstractController::class, 'staticAction'), 'foo'),
            array(PrivateConstructorController::class.'::staticAction', 'bar'),
            array(array(PrivateConstructorController::class, 'staticAction'), 'bar'),
        );
    }

    /**
     * @dataProvider getUndefinedControllers
     */
    public function testGetControllerWithUndefinedController($controller, $exceptionName = null, $exceptionMessage = null)
    {
        $resolver = $this->createControllerResolver();
        if (method_exists($this, 'expectException')) {
            $this->expectException($exceptionName);
            $this->expectExceptionMessage($exceptionMessage);
        } else {
            $this->setExpectedException($exceptionName, $exceptionMessage);
        }

        $request = Request::create('/');
        $request->attributes->set('_controller', $controller);
        $resolver->getController($request);
    }

    public function getUndefinedControllers()
    {
        $controller = new ControllerTest();

        return array(
            array('foo', \Error::class, 'Class \'foo\' not found'),
            array('oof::bar', \Error::class, 'Class \'oof\' not found'),
            array(array('oof', 'bar'), \Error::class, 'Class \'oof\' not found'),
            array('Symfony\Component\HttpKernel\Tests\Controller\ControllerTest::staticsAction', \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Expected method "staticsAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest", did you mean "staticAction"?'),
            array('Symfony\Component\HttpKernel\Tests\Controller\ControllerTest::privateAction', \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Method "privateAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest" should be public and non-abstract'),
            array('Symfony\Component\HttpKernel\Tests\Controller\ControllerTest::protectedAction', \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Method "protectedAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest" should be public and non-abstract'),
            array('Symfony\Component\HttpKernel\Tests\Controller\ControllerTest::undefinedAction', \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Expected method "undefinedAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest". Available methods: "publicAction", "staticAction"'),
            array('Symfony\Component\HttpKernel\Tests\Controller\ControllerTest', \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Controller class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest" cannot be called without a method name. You need to implement "__invoke" or use one of the available methods: "publicAction", "staticAction".'),
            array(array($controller, 'staticsAction'), \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Expected method "staticsAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest", did you mean "staticAction"?'),
            array(array($controller, 'privateAction'), \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Method "privateAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest" should be public and non-abstract'),
            array(array($controller, 'protectedAction'), \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Method "protectedAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest" should be public and non-abstract'),
            array(array($controller, 'undefinedAction'), \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Expected method "undefinedAction" on class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest". Available methods: "publicAction", "staticAction"'),
            array($controller, \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Controller class "Symfony\Component\HttpKernel\Tests\Controller\ControllerTest" cannot be called without a method name. You need to implement "__invoke" or use one of the available methods: "publicAction", "staticAction".'),
            array(array('a' => 'foo', 'b' => 'bar'), \InvalidArgumentException::class, 'The controller for URI "/" is not callable. Invalid array callable, expected array(controller, method).'),
        );
    }

    /**
     * @group legacy
     */
    public function testGetArguments()
    {
        $resolver = $this->createControllerResolver();

        $request = Request::create('/');
        $controller = array(new self(), 'testGetArguments');
        $this->assertEquals(array(), $resolver->getArguments($request, $controller), '->getArguments() returns an empty array if the method takes no arguments');

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $controller = array(new self(), 'controllerMethod1');
        $this->assertEquals(array('foo'), $resolver->getArguments($request, $controller), '->getArguments() returns an array of arguments for the controller method');

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $controller = array(new self(), 'controllerMethod2');
        $this->assertEquals(array('foo', null), $resolver->getArguments($request, $controller), '->getArguments() uses default values if present');

        $request->attributes->set('bar', 'bar');
        $this->assertEquals(array('foo', 'bar'), $resolver->getArguments($request, $controller), '->getArguments() overrides default values if provided in the request attributes');

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $controller = function ($foo) {};
        $this->assertEquals(array('foo'), $resolver->getArguments($request, $controller));

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $controller = function ($foo, $bar = 'bar') {};
        $this->assertEquals(array('foo', 'bar'), $resolver->getArguments($request, $controller));

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $controller = new self();
        $this->assertEquals(array('foo', null), $resolver->getArguments($request, $controller));
        $request->attributes->set('bar', 'bar');
        $this->assertEquals(array('foo', 'bar'), $resolver->getArguments($request, $controller));

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $request->attributes->set('foobar', 'foobar');
        $controller = 'Symfony\Component\HttpKernel\Tests\Controller\some_controller_function';
        $this->assertEquals(array('foo', 'foobar'), $resolver->getArguments($request, $controller));

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $request->attributes->set('foobar', 'foobar');
        $controller = array(new self(), 'controllerMethod3');

        try {
            $resolver->getArguments($request, $controller);
            $this->fail('->getArguments() throws a \RuntimeException exception if it cannot determine the argument value');
        } catch (\Exception $e) {
            $this->assertInstanceOf('\RuntimeException', $e, '->getArguments() throws a \RuntimeException exception if it cannot determine the argument value');
        }

        $request = Request::create('/');
        $controller = array(new self(), 'controllerMethod5');
        $this->assertEquals(array($request), $resolver->getArguments($request, $controller), '->getArguments() injects the request');
    }

    /**
     * @requires PHP 5.6
     * @group legacy
     */
    public function testGetVariadicArguments()
    {
        $resolver = new ControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $request->attributes->set('bar', array('foo', 'bar'));
        $controller = array(new VariadicController(), 'action');
        $this->assertEquals(array('foo', 'foo', 'bar'), $resolver->getArguments($request, $controller));
    }

    public function testCreateControllerCanReturnAnyCallable()
    {
        $mock = $this->getMockBuilder('Symfony\Component\HttpKernel\Controller\ControllerResolver')->setMethods(array('createController'))->getMock();
        $mock->expects($this->once())->method('createController')->will($this->returnValue('Symfony\Component\HttpKernel\Tests\Controller\some_controller_function'));

        $request = Request::create('/');
        $request->attributes->set('_controller', 'foobar');
        $mock->getController($request);
    }

    /**
     * @expectedException \RuntimeException
     * @group legacy
     */
    public function testIfExceptionIsThrownWhenMissingAnArgument()
    {
        $resolver = new ControllerResolver();
        $request = Request::create('/');

        $controller = array($this, 'controllerMethod1');

        $resolver->getArguments($request, $controller);
    }

    /**
     * @requires PHP 7.1
     * @group legacy
     */
    public function testGetNullableArguments()
    {
        $resolver = new ControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('foo', 'foo');
        $request->attributes->set('bar', new \stdClass());
        $request->attributes->set('mandatory', 'mandatory');
        $controller = array(new NullableController(), 'action');
        $this->assertEquals(array('foo', new \stdClass(), 'value', 'mandatory'), $resolver->getArguments($request, $controller));
    }

    /**
     * @requires PHP 7.1
     * @group legacy
     */
    public function testGetNullableArgumentsWithDefaults()
    {
        $resolver = new ControllerResolver();

        $request = Request::create('/');
        $request->attributes->set('mandatory', 'mandatory');
        $controller = array(new NullableController(), 'action');
        $this->assertEquals(array(null, null, 'value', 'mandatory'), $resolver->getArguments($request, $controller));
    }

    protected function createControllerResolver(LoggerInterface $logger = null)
    {
        return new ControllerResolver($logger);
    }
}

function some_controller_function($foo, $foobar)
{
}

class ControllerTest
{
    public function __construct()
    {
    }

    public function __toString()
    {
        return '';
    }

<<<<<<< HEAD
    public function publicAction()
    {
    }
=======
    protected function controllerMethod2($foo, $bar = null)
    {
    }

    protected function controllerMethod3($foo, $bar, $foobar)
    {
    }

    protected static function controllerMethod4()
    {
    }

    protected function controllerMethod5(Request $request)
    {
    }
}
>>>>>>> dashboard-test

    private function privateAction()
    {
    }

    protected function protectedAction()
    {
    }

    public static function staticAction()
    {
    }
}

class InvokableController
{
    public function __invoke($foo, $bar = null)
    {
    }
}

abstract class AbstractController
{
    public static function staticAction()
    {
        return 'foo';
    }
}

class PrivateConstructorController
{
    private function __construct()
    {
    }

    public static function staticAction()
    {
        return 'bar';
    }
}
