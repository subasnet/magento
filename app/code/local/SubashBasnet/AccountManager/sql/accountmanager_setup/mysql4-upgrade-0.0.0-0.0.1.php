<?php

/* @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();
$this->run("
CREATE TABLE IF NOT EXISTS {$this->getTable('accountmanager/manager')} (
    `manager_id`INTEGER AUTO_INCREMENT PRIMARY KEY UNIQUE,
    `postcode`VARCHAR(255) UNIQUE,
    `name`VARCHAR(255)
    );
    ");


//$this->run("INSERT INTO {$this->getTable('accountmanager/manager')} (
//    `manager_id`, `name`, `postcode`) VALUES
//    (1, 'Dave Lister', 'GU1 1'),
//    (2, 'Arnold Rimmer', 'GU1 2'),
//    (3, 'Arthur Dent', 'GU1 3'),
//    (4, 'Ford Prefect', 'GU1 4'),
//    (5, 'Dave Lister', 'GU1 9');
//    ");



$this->endSetup();