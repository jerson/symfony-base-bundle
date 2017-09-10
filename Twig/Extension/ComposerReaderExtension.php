<?php

namespace BaseBundle\Twig\Extension;

use BaseBundle\Services\ComposerReaderService;
use Twig_Extension_GlobalsInterface;

/**
 * {@inheritDoc}
 */
class ComposerReaderExtension extends \Twig_Extension implements Twig_Extension_GlobalsInterface
{

    protected $composerReaderService;

    public function __construct(ComposerReaderService $composerReaderService)
    {
        $this->composerReaderService = $composerReaderService;
    }

    /**
     * {@inheritDoc}
     */
    public function getGlobals()
    {
        return [
            'composer' => $this->composerReaderService
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'BaseBundle:ComposerReaderExtension';
    }

}
