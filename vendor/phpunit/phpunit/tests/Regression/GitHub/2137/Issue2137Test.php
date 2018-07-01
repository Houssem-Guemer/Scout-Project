<?php
class Issue2137Test extends PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideBrandService
<<<<<<< HEAD
     *
     * @param mixed $provided
     * @param mixed $expected
     *
     * @throws Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
=======
     * @param $provided
     * @param $expected
>>>>>>> dashboard-test
     */
    public function testBrandService($provided, $expected)
    {
        $this->assertSame($provided, $expected);
    }


    public function provideBrandService()
    {
        return [
            //[true, true]
            new stdClass() // not valid
        ];
    }


    /**
     * @dataProvider provideBrandService
<<<<<<< HEAD
     *
     * @param mixed $provided
     * @param mixed $expected
     *
     * @throws Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
=======
     * @param $provided
     * @param $expected
>>>>>>> dashboard-test
     */
    public function testSomethingElseInvalid($provided, $expected)
    {
        $this->assertSame($provided, $expected);
    }
}
