<?php
/**
 * 2007-2018 PrestaShop.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\Module\LinkList\Form\Type;

use PrestaShop\PrestaShop\Core\Form\FormChoiceProviderInterface;
use PrestaShopBundle\Form\Admin\Type\TranslateTextType;
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;

class LinkBlockType extends TranslatorAwareType
{
    /**
     * @var array
     */
    private $hookChoices;

    /**
     * @var array
     */
    private $cmsPageChoices;

    /**
     * @var array
     */
    private $productPageChoices;

    /**
     * @var array
     */
    private $staticPageChoices;

    /**
     * LinkBlockType constructor.
     * @param TranslatorInterface $translator
     * @param array               $locales
     * @param array               $hookChoices
     * @param array               $cmsPageChoices
     * @param array               $productPageChoices
     * @param array               $staticPageChoices
     */
    public function __construct(
        TranslatorInterface $translator,
        array $locales,
        array $hookChoices,
        array $cmsPageChoices,
        array $productPageChoices,
        array $staticPageChoices
    ) {
        parent::__construct($translator, $locales);
        $this->hookChoices = $hookChoices;
        $this->cmsPageChoices = $cmsPageChoices;
        $this->productPageChoices = $productPageChoices;
        $this->staticPageChoices = $staticPageChoices;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_link_block', HiddenType::class)
            ->add('block_name', TranslateTextType::class, [
                'locales' => $this->locales,
                'required' => true,
                'label' => $this->trans('Name of the block', 'Modules.Linklist.Admin')
            ])
            ->add('id_hook', ChoiceType::class, [
                'choices' => $this->hookChoices,
                'label' => $this->trans('Hook', 'Admin.Global'),
            ])
            ->add('cms', ChoiceType::class, [
                'choices' => $this->cmsPageChoices,
                'label' => $this->trans('Content pages', 'Modules.Linklist.Admin'),
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('product', ChoiceType::class, [
                'choices' => $this->productPageChoices,
                'label' => $this->trans('Product pages', 'Modules.Linklist.Admin'),
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('static', ChoiceType::class, [
                'choices' => $this->staticPageChoices,
                'label' => $this->trans('Static content', 'Modules.Linklist.Admin'),
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'label' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'module_link_block';
    }
}
