<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class ProjectUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $host = strtolower($context->getHost());

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($pathinfo) {
            default:
                $routes = array(
                    '/test/baz' => array(array('_route' => 'baz'), null, null, null),
                    '/test/baz.html' => array(array('_route' => 'baz2'), null, null, null),
                    '/test/baz3/' => array(array('_route' => 'baz3'), null, null, null),
                    '/foofoo' => array(array('_route' => 'foofoo', 'def' => 'test'), null, null, null),
                    '/spa ce' => array(array('_route' => 'space'), null, null, null),
                    '/multi/new' => array(array('_route' => 'overridden2'), null, null, null),
                    '/multi/hey/' => array(array('_route' => 'hey'), null, null, null),
                    '/ababa' => array(array('_route' => 'ababa'), null, null, null),
                    '/route1' => array(array('_route' => 'route1'), 'a.example.com', null, null),
                    '/c2/route2' => array(array('_route' => 'route2'), 'a.example.com', null, null),
                    '/route4' => array(array('_route' => 'route4'), 'a.example.com', null, null),
                    '/c2/route3' => array(array('_route' => 'route3'), 'b.example.com', null, null),
                    '/route5' => array(array('_route' => 'route5'), 'c.example.com', null, null),
                    '/route6' => array(array('_route' => 'route6'), null, null, null),
                    '/route11' => array(array('_route' => 'route11'), '#^(?P<var1>[^\\.]++)\\.example\\.com$#sDi', null, null),
                    '/route12' => array(array('_route' => 'route12', 'var1' => 'val'), '#^(?P<var1>[^\\.]++)\\.example\\.com$#sDi', null, null),
                    '/route17' => array(array('_route' => 'route17'), null, null, null),
                );

                if (!isset($routes[$pathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes) = $routes[$pathinfo];

                if ($requiredHost) {
                    if ('#' !== $requiredHost[0] ? $requiredHost !== $host : !preg_match($requiredHost, $host, $hostMatches)) {
                        break;
                    }
                    if ('#' === $requiredHost[0] && $hostMatches) {
                        $hostMatches['_route'] = $ret['_route'];
                        $ret = $this->mergeDefaults($hostMatches, $ret);
                    }
                }

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $host.$pathinfo;
        $regexList = array(
            0 => '{^(?'
                .'|[^/]*+(?'
                    .'|/foo/(baz|symfony)(*:34)'
                    .'|/bar(?'
                        .'|/([^/]++)(*:57)'
                        .'|head/([^/]++)(*:77)'
                    .')'
                    .'|/test/([^/]++)/(?'
                        .'|(*:103)'
                    .')'
                    .'|/([\']+)(*:119)'
                    .'|/a/(?'
                        .'|b\'b/([^/]++)(?'
                            .'|(*:148)'
                            .'|(*:156)'
                        .')'
                        .'|(.*)(*:169)'
                        .'|b\'b/([^/]++)(?'
                            .'|(*:192)'
                            .'|(*:200)'
                        .')'
                    .')'
                    .'|/multi/hello(?:/([^/]++))?(*:236)'
                    .'|/([^/]++)/b/([^/]++)(?'
                        .'|(*:267)'
                        .'|(*:275)'
                    .')'
                    .'|/aba/([^/]++)(*:297)'
                .')|(?i:([^\\.]++)\\.example\\.com)(?'
                    .'|/route1(?'
                        .'|3/([^/]++)(*:357)'
                        .'|4/([^/]++)(*:375)'
                    .')'
                .')|(?i:c\\.example\\.com)(?'
                    .'|/route15/([^/]++)(*:425)'
                .')|[^/]*+(?'
                    .'|/route16/([^/]++)(*:460)'
                    .'|/a/(?'
                        .'|a\\.\\.\\.(*:481)'
                        .'|b/(?'
                            .'|([^/]++)(*:502)'
                            .'|c/([^/]++)(*:520)'
                        .')'
                    .')'
                .')'
                .')$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    case 103:
                        $matches = array('foo' => $matches[1] ?? null);

                        // baz4
                        return $this->mergeDefaults(array('_route' => 'baz4') + $matches, array());

                        // baz5
                        $ret = $this->mergeDefaults(array('_route' => 'baz5') + $matches, array());
                        if (!isset(($a = array('POST' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_baz5;
                        }

                        return $ret;
                        not_baz5:

                        // baz.baz6
                        $ret = $this->mergeDefaults(array('_route' => 'baz.baz6') + $matches, array());
                        if (!isset(($a = array('PUT' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_bazbaz6;
                        }

                        return $ret;
                        not_bazbaz6:

                        break;
                    case 148:
                        $matches = array('foo' => $matches[1] ?? null);

                        // foo1
                        $ret = $this->mergeDefaults(array('_route' => 'foo1') + $matches, array());
                        if (!isset(($a = array('PUT' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_foo1;
                        }

                        return $ret;
                        not_foo1:

                        break;
                    case 192:
                        $matches = array('foo1' => $matches[1] ?? null);

                        // foo2
                        return $this->mergeDefaults(array('_route' => 'foo2') + $matches, array());

                        break;
                    case 267:
                        $matches = array('_locale' => $matches[1] ?? null, 'foo' => $matches[2] ?? null);

                        // foo3
                        return $this->mergeDefaults(array('_route' => 'foo3') + $matches, array());

                        break;
                    default:
                        $routes = array(
                            34 => array(array('_route' => 'foo', 'def' => 'test'), array('bar'), null, null),
                            57 => array(array('_route' => 'bar'), array('foo'), array('GET' => 0, 'HEAD' => 1), null),
                            77 => array(array('_route' => 'barhead'), array('foo'), array('GET' => 0), null),
                            119 => array(array('_route' => 'quoter'), array('quoter'), null, null),
                            156 => array(array('_route' => 'bar1'), array('bar'), null, null),
                            169 => array(array('_route' => 'overridden'), array('var'), null, null),
                            200 => array(array('_route' => 'bar2'), array('bar1'), null, null),
                            236 => array(array('_route' => 'helloWorld', 'who' => 'World!'), array('who'), null, null),
                            275 => array(array('_route' => 'bar3'), array('_locale', 'bar'), null, null),
                            297 => array(array('_route' => 'foo4'), array('foo'), null, null),
                            357 => array(array('_route' => 'route13'), array('var1', 'name'), null, null),
                            375 => array(array('_route' => 'route14', 'var1' => 'val'), array('var1', 'name'), null, null),
                            425 => array(array('_route' => 'route15'), array('name'), null, null),
                            460 => array(array('_route' => 'route16', 'var1' => 'val'), array('name'), null, null),
                            481 => array(array('_route' => 'a'), array(), null, null),
                            502 => array(array('_route' => 'b'), array('var'), null, null),
                            520 => array(array('_route' => 'c'), array('var'), null, null),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes) = $routes[$m];

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (520 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
<<<<<<< HEAD
        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw $allow ? new MethodNotAllowedException(array_keys($allow)) : new ResourceNotFoundException();
=======

        if (0 === strpos($pathinfo, '/aba')) {
            // ababa
            if ('/ababa' === $pathinfo) {
                return array('_route' => 'ababa');
            }

            // foo4
            if (preg_match('#^/aba/(?P<foo>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo4')), array ());
            }

        }

        $host = $context->getHost();

        if (preg_match('#^a\\.example\\.com$#sDi', $host, $hostMatches)) {
            // route1
            if ('/route1' === $pathinfo) {
                return array('_route' => 'route1');
            }

            // route2
            if ('/c2/route2' === $pathinfo) {
                return array('_route' => 'route2');
            }

        }

        if (preg_match('#^b\\.example\\.com$#sDi', $host, $hostMatches)) {
            // route3
            if ('/c2/route3' === $pathinfo) {
                return array('_route' => 'route3');
            }

        }

        if (preg_match('#^a\\.example\\.com$#sDi', $host, $hostMatches)) {
            // route4
            if ('/route4' === $pathinfo) {
                return array('_route' => 'route4');
            }

        }

        if (preg_match('#^c\\.example\\.com$#sDi', $host, $hostMatches)) {
            // route5
            if ('/route5' === $pathinfo) {
                return array('_route' => 'route5');
            }

        }

        // route6
        if ('/route6' === $pathinfo) {
            return array('_route' => 'route6');
        }

        if (preg_match('#^(?P<var1>[^\\.]++)\\.example\\.com$#sDi', $host, $hostMatches)) {
            if (0 === strpos($pathinfo, '/route1')) {
                // route11
                if ('/route11' === $pathinfo) {
                    return $this->mergeDefaults(array_replace($hostMatches, array('_route' => 'route11')), array ());
                }

                // route12
                if ('/route12' === $pathinfo) {
                    return $this->mergeDefaults(array_replace($hostMatches, array('_route' => 'route12')), array (  'var1' => 'val',));
                }

                // route13
                if (0 === strpos($pathinfo, '/route13') && preg_match('#^/route13/(?P<name>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($hostMatches, $matches, array('_route' => 'route13')), array ());
                }

                // route14
                if (0 === strpos($pathinfo, '/route14') && preg_match('#^/route14/(?P<name>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($hostMatches, $matches, array('_route' => 'route14')), array (  'var1' => 'val',));
                }

            }

        }

        if (preg_match('#^c\\.example\\.com$#sDi', $host, $hostMatches)) {
            // route15
            if (0 === strpos($pathinfo, '/route15') && preg_match('#^/route15/(?P<name>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'route15')), array ());
            }

        }

        // route16
        if (0 === strpos($pathinfo, '/route16') && preg_match('#^/route16/(?P<name>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'route16')), array (  'var1' => 'val',));
        }

        // route17
        if ('/route17' === $pathinfo) {
            return array('_route' => 'route17');
        }

        // a
        if ('/a/a...' === $pathinfo) {
            return array('_route' => 'a');
        }

        if (0 === strpos($pathinfo, '/a/b')) {
            // b
            if (preg_match('#^/a/b/(?P<var>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'b')), array ());
            }

            // c
            if (0 === strpos($pathinfo, '/a/b/c') && preg_match('#^/a/b/c/(?P<var>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'c')), array ());
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
>>>>>>> dashboard-test
    }
}
