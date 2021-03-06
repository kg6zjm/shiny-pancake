<?php
namespace Swissup\Easybanner\Controller\Adminhtml\Placeholder;

class Delete extends \Magento\Backend\App\Action
{
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Swissup_Easybanner::placeholder_delete');
    }
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('placeholder_id');
        if ($id) {
            try {
                $placeholderModel = $this->_objectManager->create('Swissup\Easybanner\Model\Placeholder');
                $placeholderModel->load($id);
                $placeholderModel->delete();
                $this->messageManager->addSuccess(__('Placeholder was deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['placeholder_id' => $id]);
            }
        }
        $this->messageManager->addError(__('Can\'t find a placeholder to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
