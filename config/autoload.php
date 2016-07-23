<?php
spl_autoload_register(function($class) {
	include "src/$class.php";
});

require __DIR__.'/../vendor/autoload.php';

?>