<?php

namespace BaseBundle\Twig\Extension;

use BaseBundle\Services\PreferenceService;
use Twig_Extension_GlobalsInterface;

/**
 * {@inheritDoc}
 */
class DatabasePreferencesExtension extends \Twig_Extension implements Twig_Extension_GlobalsInterface
{

    protected $preferenceService;

    public function __construct(PreferenceService $preferenceService)
    {
        $this->preferenceService = $preferenceService;
    }

    /**
     * {@inheritDoc}
     */
    public function getGlobals()
    {
        return [
            'Constants' => $this->preferenceService
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'BaseBundle:DatabasePreferencesExtension';
    }

}
