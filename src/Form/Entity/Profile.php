<?php

namespace Bolt\Extension\Jadwigo\WmMemberTag\Form\Entity;

use Bolt\Extension\Bolt\Members\Form\Entity\Profile as BaseProfile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User profile object class
 *
 * @author Lodewijk Evers <lodewijk@twokings.nl>
 */
class Profile extends BaseProfile
{
    /** @var string */
    protected $wmMemberTag;

    /**
     * @return string
     */
    public function getWmMemberTag()
    {
        return $this->wmMemberTag;
    }

    /**
     * @param string $addressStreet
     *
     * @return Profile
     */
    public function setWmMemberTag($wmMemberTag)
    {
        $this->wmMemberTag = $wmMemberTag;

        return $this;
    }
}
