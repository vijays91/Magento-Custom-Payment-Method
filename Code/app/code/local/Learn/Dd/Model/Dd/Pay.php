<?php
class Learn_Dd_Model_Dd_Pay extends Mage_Payment_Model_Method_Abstract 
{
    protected $_code = 'dd_pay';
    protected $_formBlockType = 'dd_pay/form_dd_pay';
    protected $_infoBlockType = 'dd_pay/info_dd_pay';
    
    /*
        Assign the values
    */
    public function assignData($data)
    {
        if (!($data instanceof Varien_Object)) {
            $data = new Varien_Object($data);
        }
        $info = $this->getInfoInstance();
        $info->setDdNumber($data->getDdNumber());
        $info->setMicrCode($data->getMicrCode());
        return $this;
    }
    
    /*
        Validate the Payment methods
    */
    public function validate()
    {
        parent::validate();
        $info = $this->getInfoInstance(); 
        $dd_number = $info->getDdNumber();
        $micr_code = $info->getMicrCode();
        if(empty($dd_number) || empty($micr_code)){
            $errorCode = 'invalid_data';
            $errorMsg = $this->_getHelper()->__('DD Number and MICR Code are required fields');
        }
        
        if(!is_numeric($dd_number) || !is_numeric($micr_code)){
            $errorCode = 'invalid_data';
            $errorMsg = $this->_getHelper()->__('DD Number and MICR Code are numeric format');
        }
        
        if(strlen($dd_number) <= 10 || strlen($micr_code) <= 10){
            $errorCode = 'invalid_data';
            $errorMsg = $this->_getHelper()->__('DD Number and MICR Code are greater than 10 characters');
        }
        if($errorMsg){
            Mage::throwException($errorMsg);
        }
        return $this;
    }
}