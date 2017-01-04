<?php

namespace Bolt\Extension\Jadwigo\WmMemberTag;

/**
 * Config class.
 *
 * @author Lodewijk Evers <lodewijk@twokings.nl>
 */
class Config
{
    /** @var boolean */
    protected $wmMemberTagRequired;


    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $profileFields = $config['meta_fields']['profile'];
        $this->wmMemberTagRequired = $profileFields['wm_member_tag']['required'];
    }

    /**
     * @return boolean
     */
    public function isMemberTagRequired()
    {
        return $this->wmMemberTagRequired;
    }
}
