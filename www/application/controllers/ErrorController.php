<?php
 
/**
* Класс контроллер должен в названии иметь слово Controller и
* быть наследником класса Zend_Controller_Action
*/
 
class ErrorController extends Zend_Controller_Action {
 
/**
* это так называемы error "акшин", который вызывается в
* случае возникновения ошибки
*/
 
public function errorAction(){
$this->_helper->viewRenderer->setViewSuffix('phtml');
 
/**
* собираем информацию об ошибке
*/
 
$errors = $this->_getParam('error_handler');
 
/**
* будем выводить информацию в зависимости от ошибки
*/
 
switch($error->type){
 
/**
* Если нет контролера или экшена, то выводим ошибку 404
*/
 
case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
$this->getResponse()->setHttpResponseCode(404);
$this->view->message = 'Страница не найдена';
 
/**
* в других случаях выводим ошибку 500
*/
 
default:
$this->getResponse()->setHttpResponseCode(500);
$this->view->message = 'Ошибка приложения';
 
}
 
$this->view->env = $this->getInvokeArg('env');
$this->view->exception = $errors->exception;
$this->view->request = $errors->request;
 
}
}
