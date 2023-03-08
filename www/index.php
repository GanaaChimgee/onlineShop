<?php
const DS = DIRECTORY_SEPARATOR;
define('ROOT', dirname(dirname(__FILE__)));
const VIEWS_PATH = ROOT . DS . 'views' . DS;

require_once ROOT . DS . 'lib' . DS . 'init.php';


// Session::setMessage("wrong password...");

$app = new App();
$app->run($_SERVER['REQUEST_URI']);
// $rows = App::$db->query("select * from product");
// echo "<pre>";
// print_r($rows);
