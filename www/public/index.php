<?php

/**
* Вывод ошибок
*/
 
error_reporting(E_ALL || E_STRICT);
 
/**
* Путь к дириктории application
*/
 
define('APPLICATION_PATH', realpath(dirname(__FILE__)) . '/../application');

/**
* Путь к доп. модулям
*/
 
set_include_path(
APPLICATION_PATH .'/../library'
. PATH_SEPARATOR . get_include_path()
);

/**
* Запуск Zend
*/
 
require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();
 
try{
/**
* Если запуск удался, то идем к bootstrap.php
*/
 
require '../application/bootstrap.php';
 
}catch (Exception $exception){
 
/**
* Если запуск не удался, то вызываем обработчик
*/
 
echo "<html><body> an exception occured while bootstrapping the application";

if(defined('APPLICATION_ENVIRONMENT') && APPLICATION_ENVIRONMENT != 'production'){
 
echo "<br/><br/>". $exception->getMessage()."<br/>"
. "<div align='left'>Stack Trace: "
. "<pre>" . $exception->getTraceAsString()."</pre></div>";
 
}
 
echo "</body></html>";
exit(1);
 
}
 
/**
* Конец обработки
*/
Zend_Controller_Front::getInstance()->dispatch();
