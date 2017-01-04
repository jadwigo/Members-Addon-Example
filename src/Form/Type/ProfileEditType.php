<?php

namespace Bolt\Extension\Jadwigo\WmMemberTag\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\ProfileEditType as MembersProfileEditType;
use Bolt\Extension\Jadwigo\WmMemberTag\Config;
use Bolt\Translation\Translator as Trans;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profile type
 *
 * @author Lodewijk Evers <lodewijk@twokings.nl>
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
            ->add('wm_member_tag', Type\TextType::class,   [
                'label'       => Trans::__('Member Tag:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isMemberTagRequired(),
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
