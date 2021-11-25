<?php
require_once "inc/autoload.php";

$view = new View();

$url = [];
$request = explode('?', $_SERVER['REQUEST_URI'])[0];

$prefix = '/api/';
$request = str_replace($prefix, '', $request);

foreach (explode('/', $request) as $value) {
    if ($value) array_push($url, $value);
}

if (count($url) < 2) {
    $view->erro('Nenhum modulo encontrado', 'module_not_found', true);
}

$module = $url[0];
$function = $url[1];

unset($url[0]);
unset($url[1]);
$args = array_merge($url);

$control = new Control($args);

if (!method_exists($control, $module)) {
    $view->erro('Nenhum modulo encontrado', 'module_not_found', true);
}

if (!method_exists($control->$module, $function)) {
    $view->erro('Nenhum método encontrado', 'method_not_found', true);
}

$view = $control->$module->$function($args);
$view->show();
