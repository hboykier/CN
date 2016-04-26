<?php
function getAction()
{
    $action = app('request')->route()->getAction();

    $controller = class_basename($action['controller']);

    list($controller, $action) = explode('@', $controller);

    $result = $action;

    return $result;
}

function getController()
{
    $action = app('request')->route()->getAction();

    $controller = class_basename($action['controller']);

    list($controller, $action) = explode('@', $controller);

    $result = $controller;

    return $result;
}