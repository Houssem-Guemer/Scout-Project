<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Matcher\Dumper;

use Symfony\Component\Routing\RouteCollection;

/**
 * Prefix tree of routes preserving routes order.
 *
 * @author Frank de Jonge <info@frankdejonge.nl>
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
class StaticPrefixCollection
{
    private $prefix;

    /**
     * @var string[]
     */
    private $staticPrefixes = array();

    /**
     * @var string[]
     */
    private $prefixes = array();

    /**
     * @var array[]|self[]
     */
    private $items = array();

<<<<<<< HEAD
    public function __construct(string $prefix = '/')
=======
    public function __construct($prefix = '')
>>>>>>> dashboard-test
    {
        $this->prefix = $prefix;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return array[]|self[]
     */
<<<<<<< HEAD
    public function getRoutes(): array
=======
    public function getItems()
>>>>>>> dashboard-test
    {
        return $this->items;
    }

    /**
     * Adds a route to a group.
     *
     * @param array|self $route
     */
<<<<<<< HEAD
    public function addRoute(string $prefix, $route, string $staticPrefix = null)
=======
    public function addRoute($prefix, $route)
>>>>>>> dashboard-test
    {
        if (null === $staticPrefix) {
            list($prefix, $staticPrefix) = $this->getCommonPrefix($prefix, $prefix);
        }

        for ($i = \count($this->items) - 1; 0 <= $i; --$i) {
            $item = $this->items[$i];

            list($commonPrefix, $commonStaticPrefix) = $this->getCommonPrefix($prefix, $this->prefixes[$i]);

            if ($this->prefix === $commonPrefix) {
                // the new route and a previous one have no common prefix, let's see if they are exclusive to each others

                if ($this->prefix !== $staticPrefix && $this->prefix !== $this->staticPrefixes[$i]) {
                    // the new route and the previous one have exclusive static prefixes
                    continue;
                }

                if ($this->prefix === $staticPrefix && $this->prefix === $this->staticPrefixes[$i]) {
                    // the new route and the previous one have no static prefix
                    break;
                }

                if ($this->prefixes[$i] !== $this->staticPrefixes[$i] && $this->prefix === $this->staticPrefixes[$i]) {
                    // the previous route is non-static and has no static prefix
                    break;
                }

                if ($prefix !== $staticPrefix && $this->prefix === $staticPrefix) {
                    // the new route is non-static and has no static prefix
                    break;
                }

                continue;
            }

<<<<<<< HEAD
            if ($item instanceof self && $this->prefixes[$i] === $commonPrefix) {
                // the new route is a child of a previous one, let's nest it
                $item->addRoute($prefix, $route, $staticPrefix);
            } else {
                // the new route and a previous one have a common prefix, let's merge them
                $child = new self($commonPrefix);
                list($child->prefixes[0], $child->staticPrefixes[0]) = $child->getCommonPrefix($this->prefixes[$i], $this->prefixes[$i]);
                list($child->prefixes[1], $child->staticPrefixes[1]) = $child->getCommonPrefix($prefix, $prefix);
                $child->items = array($this->items[$i], $route);

                $this->staticPrefixes[$i] = $commonStaticPrefix;
                $this->prefixes[$i] = $commonPrefix;
                $this->items[$i] = $child;
            }
=======
        // No optimised case was found, in this case we simple add the route for possible
        // grouping when new routes are added.
        $this->items[] = array($prefix, $route);
    }

    /**
     * Tries to combine a route with another route or group.
     *
     * @param StaticPrefixCollection|array $item
     * @param string                       $prefix
     * @param mixed                        $route
     *
     * @return null|StaticPrefixCollection
     */
    private function groupWithItem($item, $prefix, $route)
    {
        $itemPrefix = $item instanceof self ? $item->prefix : $item[0];
        $commonPrefix = $this->detectCommonPrefix($prefix, $itemPrefix);
>>>>>>> dashboard-test

            return;
        }

<<<<<<< HEAD
        // No optimised case was found, in this case we simple add the route for possible
        // grouping when new routes are added.
        $this->staticPrefixes[] = $staticPrefix;
        $this->prefixes[] = $prefix;
        $this->items[] = $route;
    }

    /**
     * Linearizes back a set of nested routes into a collection.
     */
    public function populateCollection(RouteCollection $routes): RouteCollection
=======
        $child = new self($commonPrefix);

        if ($item instanceof self) {
            $child->items = array($item);
        } else {
            $child->addRoute($item[0], $item[1]);
        }

        $child->addRoute($prefix, $route);

        return $child;
    }

    /**
     * Checks whether a prefix can be contained within the group.
     *
     * @param string $prefix
     *
     * @return bool Whether a prefix could belong in a given group
     */
    private function accepts($prefix)
    {
        return '' === $this->prefix || 0 === strpos($prefix, $this->prefix);
    }

    /**
     * Detects whether there's a common prefix relative to the group prefix and returns it.
     *
     * @param string $prefix
     * @param string $anotherPrefix
     *
     * @return false|string A common prefix, longer than the base/group prefix, or false when none available
     */
    private function detectCommonPrefix($prefix, $anotherPrefix)
>>>>>>> dashboard-test
    {
        foreach ($this->items as $route) {
            if ($route instanceof self) {
                $route->populateCollection($routes);
            } else {
                $routes->add(...$route);
            }
        }

        return $routes;
    }

    /**
     * Gets the full and static common prefixes between two route patterns.
     *
     * The static prefix stops at last at the first opening bracket.
     */
<<<<<<< HEAD
    private function getCommonPrefix(string $prefix, string $anotherPrefix): array
=======
    public function optimizeGroups()
>>>>>>> dashboard-test
    {
        $baseLength = \strlen($this->prefix);
        $end = min(\strlen($prefix), \strlen($anotherPrefix));
        $staticLength = null;
        set_error_handler(array(__CLASS__, 'handleError'));

        for ($i = $baseLength; $i < $end && $prefix[$i] === $anotherPrefix[$i]; ++$i) {
            if ('(' === $prefix[$i]) {
                $staticLength = $staticLength ?? $i;
                for ($j = 1 + $i, $n = 1; $j < $end && 0 < $n; ++$j) {
                    if ($prefix[$j] !== $anotherPrefix[$j]) {
                        break 2;
                    }
                    if ('(' === $prefix[$j]) {
                        ++$n;
                    } elseif (')' === $prefix[$j]) {
                        --$n;
                    } elseif ('\\' === $prefix[$j] && (++$j === $end || $prefix[$j] !== $anotherPrefix[$j])) {
                        --$j;
                        break;
                    }
                }
                if (0 < $n) {
                    break;
                }
                if (('?' === ($prefix[$j] ?? '') || '?' === ($anotherPrefix[$j] ?? '')) && ($prefix[$j] ?? '') !== ($anotherPrefix[$j] ?? '')) {
                    break;
                }
                $subPattern = substr($prefix, $i, $j - $i);
                if ($prefix !== $anotherPrefix && !preg_match('/^\(\[[^\]]++\]\+\+\)$/', $subPattern) && !preg_match('{(?<!'.$subPattern.')}', '')) {
                    // sub-patterns of variable length are not considered as common prefixes because their greediness would break in-order matching
                    break;
                }
                $i = $j - 1;
            } elseif ('\\' === $prefix[$i] && (++$i === $end || $prefix[$i] !== $anotherPrefix[$i])) {
                --$i;
                break;
            }
        }
<<<<<<< HEAD
        restore_error_handler();
=======
    }

    private function shouldBeInlined()
    {
        if (count($this->items) >= 3) {
            return false;
        }

        foreach ($this->items as $item) {
            if ($item instanceof self) {
                return true;
            }
        }

        foreach ($this->items as $item) {
            if (is_array($item) && $item[0] === $this->prefix) {
                return false;
            }
        }
>>>>>>> dashboard-test

        return array(substr($prefix, 0, $i), substr($prefix, 0, $staticLength ?? $i));
    }

<<<<<<< HEAD
    public static function handleError($type, $msg)
=======
    /**
     * Guards against adding incompatible prefixes in a group.
     *
     * @param string $prefix
     *
     * @throws \LogicException when a prefix does not belong in a group
     */
    private function guardAgainstAddingNotAcceptedRoutes($prefix)
>>>>>>> dashboard-test
    {
        return 0 === strpos($msg, 'preg_match(): Compilation failed: lookbehind assertion is not fixed length');
    }
}
