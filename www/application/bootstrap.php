<?php
 
/**
* Задаем значение переменым
*/
 
define('APPLICATION_PATH')
or define('APPLICATION_PATH' , dirname(__FILE__));
define('APPLICATION_ENVIRONMENT')
or define('APPLICATION_ENVIRONMENT' , 'development');
$frontController = Zend_Controller_Front::getInstance();
 
/**
* Указываем путь к контроллерам
*/
 
$frontController->setControllerDirectory(APPLICATION_PATH . "/controllers");
$frontController->setParam('env', APPLICATION_ENVIRONMENT);
 
/**
* Указываем путь куда будем клать шаблоны для отображения
*/
 
Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/scripts');
$view = Zend_Layout::getMvcInstance()->getView();
 
/**
* Указываем тип будущих документов
*/
$view->doctype('XHTML1_STRICT');
unset($frontController);
