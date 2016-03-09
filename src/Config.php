<?php

namespace Bolt\Extension\Bolt\MembersAddonExample;

/**
 * Config class.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class Config
{
    /** @var boolean */
    protected $addressStreetRequired;
    /** @var boolean */
    protected $addressStreetMetaRequired;
    /** @var boolean */
    protected $addressCityRequired;
    /** @var boolean */
    protected $addressStateRequired;
    /** @var boolean */
    protected $addressCountryRequired;
    /** @var boolean */
    protected $phoneNumberRequired;

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $profileFields = $config['meta_fields']['profile'];
        $this->addressStreetRequired = $profileFields['address_street']['required'];
        $this->addressStreetMetaRequired = $profileFields['address_street_meta']['required'];
        $this->addressCityRequired = $profileFields['address_city']['required'];
        $this->addressStateRequired = $profileFields['address_state']['required'];
        $this->addressCountryRequired = $profileFields['address_country']['required'];
        $this->phoneNumberRequired = $profileFields['phone_number']['required'];
    }

    /**
     * @return boolean
     */
    public function isAddressStreetRequired()
    {
        return $this->addressStreetRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressStreetMetaRequired()
    {
        return $this->addressStreetMetaRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressCityRequired()
    {
        return $this->addressCityRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressStateRequired()
    {
        return $this->addressStateRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressCountryRequired()
    {
        return $this->addressCountryRequired;
    }

    /**
     * @return boolean
     */
    public function isPhoneNumberRequired()
    {
        return $this->phoneNumberRequired;
    }
}
