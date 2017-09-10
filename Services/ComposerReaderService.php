<?php

namespace BaseBundle\Services;


class ComposerReaderService
{
    protected $rootDir;
    private $vars;

    public function __construct($rootDir)
    {
        $this->rootDir = $rootDir;
    }

    /**
     * @return array
     */
    public function getVars()
    {

        if (!empty($this->vars)) {
            return $this->vars;
        }
        $path = $this->rootDir . '/../composer.json';
        $string = file_get_contents($path);
        $this->vars = json_decode($string, true);
        return $this->vars;
    }


}