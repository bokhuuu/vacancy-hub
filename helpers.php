<?php

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}


function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found!";
    }
}


function loadPartial($name)
{
    $partialPath = basePath("App/views/partials/{$name}.php");


    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found!";
    }
}


function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}


function inspectAndDie($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}


function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}

function sanitize($dirty)
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}
