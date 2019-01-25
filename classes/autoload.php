<?php

spl_autoload_register('classes_autoload');
function classes_autoload($class) {
    require_once 'classes/' . $class .'.php';
}