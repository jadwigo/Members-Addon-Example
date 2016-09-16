<?php

namespace Bolt\Extension\Bolt\MembersAddonExample\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\ProfileEditType as MembersProfileEditType;
use Bolt\Extension\Bolt\MembersAddonExample\Config;
use Bolt\Translation\Translator as Trans;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profile type
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class ProfileEditType extends MembersProfileEditType
{
    /** @var Config */
    protected $localConfig;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('address_street', Type\TextType::class,   [
                'label'       => Trans::__('Street Address:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStreetRequired(),
            ])
            ->add('address_street_meta', Type\TextType::class,   [
                'label'       => null,
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStreetMetaRequired(),
            ])
            ->add('address_city', Type\TextType::class,   [
                'label'       => Trans::__('City:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressCityRequired(),
            ])
            ->add('address_state', Type\TextType::class,   [
                'label'       => Trans::__('Province / state / arrondissement:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStateRequired(),
            ])
            ->add('address_country', Type\TextType::class,   [
                'label'       => Trans::__('Country:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressCountryRequired(),
            ])
            ->add('phone_number', Type\TextType::class,   [
                'label'       => Trans::__('Phone number:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isPhoneNumberRequired(),
            ])
            ->add('submit',      'submit', [
                'label'   => Trans::__('Save & continue'),
            ]);
    }

    public function setLocalConfig(Config $config)
    {
        $this->localConfig = $config;
    }
}
