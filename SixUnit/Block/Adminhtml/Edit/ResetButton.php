<?php
namespace Training\SixUnit\Block\Adminhtml\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Training\SixUnit\Block\Adminhtml\Edit\GenericButton;

class ResetButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }

}
