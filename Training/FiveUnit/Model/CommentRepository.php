<?php
namespace Training\FiveUnit\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Training\FiveUnit\Api\Data;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Training\FiveUnit\Model\ResourceModel\Comment as CommentResource;
use Training\FiveUnit\Model\ResourceModel\Comment\CollectionFactory as CommentCollectionFactory;

/**
 * Class CommentRepository
 * @package Training\FiveUnit\Model
 */
class CommentRepository implements \Training\FiveUnit\Api\CommentRepositoryInterface
{
    /**
     * @var ResourceModel\Comment
     */
    protected $_resource;

    /**
     * @var CommentCollectionFactory
     */
    protected $_commentCollectionFactory;

    /**
     * @var
     */
    protected $_commentFactory;

    /**
     * @var \Training\FiveUnit\Api\Data\CommentSearchResultsInterfaceFactory
     */
    protected $_searchResultsFactory;

    /**
     * @var \Training\FiveUnit\Api\Data\CommentInterfaceFactory
     */
    protected $_commentDataFactory;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $_dataObjectHelper;

    /**
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $_dataObjectProcessor;

    /**
     * @param Data\CommentSearchResultsInterfaceFactory $searchResultsInterfaceFactory
     * @param CommentCollectionFactory $commentCollectionFactory
     * @param Data\CommentInterfaceFactory $commentDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param CommentResource $commentResource
     */
    function __construct(
        Data\CommentSearchResultsInterfaceFactory $searchResultsInterfaceFactory,
        CommentCollectionFactory $commentCollectionFactory,
        \Training\FiveUnit\Api\Data\CommentInterfaceFactory $commentDataFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        CommentResource $commentResource
    )
    {
        $this->_commentDataFactory = $commentDataFactory;
        $this->_searchResultsFactory = $searchResultsInterfaceFactory;
        $this->_commentCollectionFactory = $commentCollectionFactory;
        $this->_dataObjectHelper = $dataObjectHelper;
        $this->_dataObjectProcessor = $dataObjectProcessor;
        $this->_resource = $commentResource;
    }

    /**
     * @param Data\CommentInterface $comment
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(Data\CommentInterface $comment)
    {
        try{
            $this->_resource->delete($comment);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param $commentId
     * @return bool
     */
    public function deleteById($commentId)
    {
        return $this->_resource->delete($this->getById($commentId));
    }

    /**
     * @param $id
     * @return Data\CommentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $comment = $this->_commentFactory->create();
        $this->_resource->load($comment, $id);
        if (!$comment->getId()) {
            throw new NoSuchEntityException(__('Comment with id "%1" does not exist.', $id));
        }
        return $comment;
    }

    /**
     * @param SearchCriteriaInterface $criteria
     * @return \Training\FiveUnit\Api\Data\CommentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $searchResults = $this->_searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $collection = $this->_commentCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $collection->load();
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setSearchCriteria($criteria);
        return $searchResults;
    }

    /**
     * @param Data\CommentInterface $comment
     * @return Data\CommentInterface
     */
    public function save(Data\CommentInterface $comment)
    {
        $this->_resource->save($comment);
        return $comment;
    }
}