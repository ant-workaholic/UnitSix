<?php
namespace Training\SixUnit\Controller\Adminhtml\Game;

use Magento\Framework\App\ResponseInterface;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var
     */
    protected $_gamesRepository;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Training\SixUnit\Model\ResourceModel\ComputerGamesRepository $gamesRepository
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Training\SixUnit\Model\ResourceModel\ComputerGamesRepository $gamesRepository
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_gamesRepository = $gamesRepository;
        parent::__construct($context);
    }
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('game_id');
        if ($id) {
            try {
                $this->_gamesRepository->deleteById($id);
                // display success message
                $this->messageManager->addSuccess(__('You deleted the game.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a block to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }

}