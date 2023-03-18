<?php
function autoload($class_name)
{
    require_once __DIR__ . '/classes/' . $class_name . '.php';
}

?>