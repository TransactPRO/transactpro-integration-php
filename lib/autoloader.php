<?php

function transactproIntegrationAutoload($className)
{
    if (strpos($className, "TransactPRO") === 0) {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require_once $fileName;
    }
}

spl_autoload_register('transactproIntegrationAutoload');