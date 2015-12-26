<?php
class Learn_Dd_Block_Form_Dd_Pay extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('ddpay/form/ddpay.phtml');
    }
}
