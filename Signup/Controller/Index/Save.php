<?php

declare(strict_types=1);

namespace Nini\Signup\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\ResultFactory;
use Nini\Signup\Model\FormFactory;

class Save extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{
    /**
     * @var FormFactory
     */
    private FormFactory $formFactory;

    /**
     * @param Context $context
     * @param FormFactory $formFactory
     */
    public function __construct(
        Context $context,
        FormFactory $formFactory,
    ){
        parent::__construct($context);
        $this->formFactory = $formFactory;
    }

    /**
     * @return ResponseInterface|Redirect|Redirect&ResultInterface|ResultInterface
     */
    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $model = $this->formFactory->create();
                $model->setName($data['name']);
                $model->setDate($data['date']);
                $model->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());

        return $resultRedirect;
    }
}
