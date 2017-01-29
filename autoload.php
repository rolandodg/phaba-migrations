<?php

spl_autoload_register(function ($class) {
    $map  = require __DIR__ . '/autoload_namespaces.php';

    $namespace = substr($class, 0, strrpos($class, '\\'));
    $className = substr($class, strrpos($class, '\\')+1).'.php';

    if(file_exists($map[$namespace].'/'.$className)){
        require_once $map[$namespace].'/'.$className;
    }
});
