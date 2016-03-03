<?php
namespace Training\SixUnit\Block\Adminhtml\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Training\SixUnit\Block\Adminhtml\Edit\GenericButton;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getGameId()) {
            $data = [
                'label' => __('Delete Game'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }
    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['game_id' => $this->getGameId()]);
    }
}