<?php

declare(strict_types=1);

namespace Nini\Signup\Model;

use Magento\Framework\Model\AbstractModel;
use Nini\Signup\Model\ResourceModel\Form as ResourceModel;

class Form extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'nini_signup_form_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
