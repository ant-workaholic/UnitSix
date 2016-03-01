<?php
namespace Training\SixUnit\Block\Adminhtml\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Training\SixUnit\Block\Adminhtml\Edit\GenericButton;

class BackButton extends GenericButton implements ButtonProviderInterface
{
   /**
    * @return array
    */
        public function getButtonData()
        {
            return [
                'label' => __('Back to Game list'),
                'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
                'class' => 'back',
                'sort_order' => 10
            ];
        }
        /**
         * Get URL for back (reset) button
         *
         * @return string
         */
        public function getBackUrl()
        {
            return $this->getUrl('*/*/');
        }
}
