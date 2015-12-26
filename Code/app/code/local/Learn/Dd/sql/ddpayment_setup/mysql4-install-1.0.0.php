<?php
$installer = $this;
$installer->startSetup();
$installer->run("
ALTER TABLE `{$installer->getTable('sales/quote_payment')}` 
ADD `dd_number` VARCHAR( 255 ) NOT NULL,
ADD `micr_code` VARCHAR( 255 ) NOT NULL;
  
ALTER TABLE `{$installer->getTable('sales/order_payment')}` 
ADD `dd_number` VARCHAR( 255 ) NOT NULL,
ADD `micr_code` VARCHAR( 255 ) NOT NULL;
");
$installer->endSetup();