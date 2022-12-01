<?php

namespace Nini\Signup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Form extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'nini_signup_form_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('nini_signup_form', 'entity_id');
        $this->_useIsObjectNew = true;
    }
}
