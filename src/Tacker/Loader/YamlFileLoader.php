<?php

namespace Tacker\Loader;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser as YamlParser;
/**
 * @package Tacker
 */
class YamlFileLoader extends AbstractLoader
{
    /**
     * @param  $resource
     * @return array
     */
    protected function read($resource)
    {
        $yamlParser = new YamlParser();
        return $yamlParser->parse(file_get_contents($resource));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'yml' === pathinfo($resource, PATHINFO_EXTENSION);
    }
}
