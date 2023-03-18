<?php
function autoload($class_name)
{
    require_once __DIR__ . 'Controller/' . $class_name . '.php';
}

?>