<?php

namespace PhpParser\Node;

use PhpParser\NodeAbstract;

class Param extends NodeAbstract
{
    /** @var null|string|Name|NullableType Typehint */
    public $type;
    /** @var bool Whether parameter is passed by reference */
    public $byRef;
    /** @var bool Whether this is a variadic argument */
    public $variadic;
<<<<<<< HEAD
    /** @var Expr\Variable|Expr\Error Parameter variable */
    public $var;
=======
    /** @var string Name */
    public $name;
>>>>>>> dashboard-test
    /** @var null|Expr Default value */
    public $default;

    /**
     * Constructs a parameter node.
     *
<<<<<<< HEAD
     * @param Expr\Variable|Expr\Error      $var        Parameter variable
=======
     * @param string                        $name       Name
>>>>>>> dashboard-test
     * @param null|Expr                     $default    Default value
     * @param null|string|Name|NullableType $type       Typehint
     * @param bool                          $byRef      Whether is passed by reference
     * @param bool                          $variadic   Whether this is a variadic argument
     * @param array                         $attributes Additional attributes
     */
<<<<<<< HEAD
    public function __construct(
        $var, Expr $default = null, $type = null,
        bool $byRef = false, bool $variadic = false, array $attributes = []
    ) {
=======
    public function __construct($name, Expr $default = null, $type = null, $byRef = false, $variadic = false, array $attributes = array()) {
>>>>>>> dashboard-test
        parent::__construct($attributes);
        $this->type = $type;
        $this->byRef = $byRef;
        $this->variadic = $variadic;
        $this->name = $name;
        $this->default = $default;
    }

    public function getSubNodeNames() {
        return array('type', 'byRef', 'variadic', 'name', 'default');
    }
}
