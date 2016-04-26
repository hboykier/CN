<?php
$action = app('request')->route()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);
?>