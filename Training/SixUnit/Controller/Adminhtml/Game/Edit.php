<?php
namespace Training\SixUnit\Controller\Adminhtml\Game;

use Magento\Framework\App\ResponseInterface;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Training\SixUnit\Model\ResourceModel\ComputerGamesRepository
     */
    protected $repository;

    /**
     * @var \Training\SixUnit\Model\ComputerGamesFactory
     */
    protected $computerGamesDataFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var
     */
    protected $computerGamesInterfaceFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Training\SixUnit\Model\ResourceModel\ComputerGamesRepository $repository
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Training\SixUnit\Api\Data\ComputerGamesInterfaceFactory $computerGamesInterfaceFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Training\SixUnit\Model\ResourceModel\ComputerGamesRepository $repository,
        \Magento\Framework\Registry $coreRegistry,
        \Training\SixUnit\Api\Data\ComputerGamesInterfaceFactory $computerGamesInterfaceFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->repository = $repository;
        $this->_coreRegistry = $coreRegistry;
        $this->computerGamesInterfaceFactory = $computerGamesInterfaceFactory;
    }


    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('game_id');
        $computerGame = $this->computerGamesInterfaceFactory->create();
        if ($id) {
            $computerGame = $this->repository->getById($id);
            if (!$computerGame->getGameId()) {
                $this->messageManager->addError(__('This block no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        // 3. Set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
                $computerGame->setData($data);
        }
        // 4. Register model to use later in blocks
        $this->_coreRegistry->register('computer_games', $computerGame);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
