<?php
/* Настройки */
require_once('config.php');

/* Автозагрузчик классов */
function __autoload($class){
  require_once($class.'.php');
}

/* Инициализация и запуск FrontController */
$front = FrontController::getInstance();
$front->route();

/* Вывод */
echo $front->getBody();