<?php

namespace Bolt\Extension\Bolt\MembersAddonExample;

use Bolt\Extension\Bolt\Members\Event\FormBuilderEvent;
use Bolt\Extension\Bolt\Members\Event\MembersEvents;
use Bolt\Extension\Bolt\Members\Event\MembersProfileEvent;
use Bolt\Extension\Bolt\Members\Form\MembersForms;
use Bolt\Extension\SimpleExtension;
use Silex\Application;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Members add-ons for Bolt.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class MembersAddonExampleExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates/admin'   => ['position' => 'prepend', 'namespace' => 'MembersAdmin'],
            'templates/profile' => ['position' => 'prepend'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function subscribe(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->addListener(MembersEvents::MEMBER_PROFILE_PRE_SAVE, [$this, 'onProfileSave']);
        $dispatcher->addListener(FormBuilderEvent::BUILD, [$this, 'onRequest']);
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
        parent::boot($app);
    }

    /**
     * Tell Members what fields we want to persist.
     *
     * @param MembersProfileEvent $event
     */
    public function onProfileSave(MembersProfileEvent $event)
    {
        $config = $this->getConfig();
        $event->addMetaEntryNames(array_keys($config['meta_fields']['profile']));
    }

    /**
     * @param FormBuilderEvent $event
     */
    public function onRequest(FormBuilderEvent $event)
    {
        if ($event->getName() !== MembersForms::FORM_PROFILE_EDIT && $event->getName() !== MembersForms::FORM_PROFILE_VIEW) {
            return;
        }

        $app = $this->getContainer();
        $localConfig = new Config($this->getConfig());

        $type = new Form\Type\ProfileEditType($app['members.config']);
        $type->setLocalConfig($localConfig);

        $event->setType($type);
        $event->setEntityClass(Form\Entity\Profile::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [
            'meta_fields' => [
                'profile' => [
                    'address_street' => [
                        'required' => false,
                    ],
                    'address_street_meta' => [
                        'required' => false,
                    ],
                    'address_city' => [
                        'required' => false,
                    ],
                    'address_state' => [
                        'required' => false,
                    ],
                    'address_country' => [
                        'required' => false,
                    ],
                    'phone_number' => [
                        'required' => false,
                    ],
                ],
            ],
        ];
    }
}
