<?php
class Learn_Dd_Block_Info_Dd_Pay extends Mage_Payment_Block_Info 
{
    /*- Design for the -> Your Checkout Progress (Left side)-*/
    /*protected function _construct() {
        parent::_construct();
        $this->setTemplate('ddpay/info/ddpay.phtml');
    }*/

    protected function _prepareSpecificInformation($transport = null)
    {
        if (null !== $this->_paymentSpecificInformation) {
            return $this->_paymentSpecificInformation;
        }
            $info = $this->getInfo();
            $transport = new Varien_Object();
            $transport = parent::_prepareSpecificInformation($transport);
            $transport->addData(array(
            Mage::helper('payment')->__('DD Number') => $info->getDdNumber(),
            Mage::helper('payment')->__('MICR Code') => $info->getMicrCode()
        ));
        return $transport;
    }

}