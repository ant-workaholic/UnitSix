<?php
namespace Training\SixUnit\Block\Adminhtml\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Training\SixUnit\Block\Adminhtml\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Game'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
