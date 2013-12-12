<?
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Los_Angeles');
define('ROOT_DIR', realpath(dirname(__DIR__)).'/');


require_once('../base/App.php');

App::startup();