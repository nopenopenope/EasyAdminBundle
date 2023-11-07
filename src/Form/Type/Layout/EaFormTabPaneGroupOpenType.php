<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Form\Type\Layout;

use Symfony\Component\Form\AbstractType;

/**
 * This is a special form type used to render the form layout when using form tabs.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 *
 * @internal don't use this type in your applications
 */
final class EaFormTabPaneGroupOpenType extends AbstractType
{
    public const BLOCK_PREFIX = 'ea_form_tabpane_group_open';

    public function getBlockPrefix(): string
    {
        return self::BLOCK_PREFIX;
    }
}
