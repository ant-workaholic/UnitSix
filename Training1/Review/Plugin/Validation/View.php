<?php
namespace Training1\Review\Plugin\Validation;

/**
 * Class View
 * @package Training1\Review\Plugin\Validation
 */
class View
{
    /**
     * Validate nickname after main review validation.
     *
     * @param \Magento\Review\Model\Review $subject
     * @param $result
     * @return array
     */
    public function afterValidate($subject, $result)
    {
        $errors = [];
        $nickName = $subject->getNickname();
        if (strpos($nickName, '-') !== false) {
            $errors[] = __('Your nickname in the review contains dash(es), please correct this and try again.');
            return $errors;
        }
        return $result;
    }
}
