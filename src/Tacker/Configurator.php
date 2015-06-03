<?php

namespace Tacker;

use Symfony\Component\Config\Loader\LoaderInterface;
use Pimple;

class Configurator
{
    protected $loader;

    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public function configure(Pimple $pimple, $resource)
    {
        $parameters = $this->loader->load($resource);

        foreach ($parameters as $k => $v) {
			if (isset($pimple[$k]) && is_array($pimple[$k])) {
				$v = array_replace_recursive ((array)$pimple[$k], $v);
			}			
            $pimple->offsetSet($k, $v);
        }
    }
}
