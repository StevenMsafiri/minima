<?php

// Holds the functions common to al controllers
class Controller
{
    protected function view($view)
    {
        if (file_exists("../app/views/" . $view . ".php")) {
            include "../app/views/" . $view . ".php";
        } else
        {
            include "../app/views/404.php";
        }
    }

    protected function loadModel($model)
    {
        if (file_exists("../app/views/" . $model . ".php")) {
            include "../app/views/" . $model. ".php";

            return $model = new $model();
        } else {
            return false;
        }
    }
}