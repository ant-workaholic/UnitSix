<?php

namespace Training\Test\Plugin\Controller\Product;


class View
{
    /**
     * @param $subject
     * @param \Magento\Framework\View\Result\Page $result
     * @return mixed
     */
    public function afterExecute($subject, $result)
    {
        return $result;
    }
}