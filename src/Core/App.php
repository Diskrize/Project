<?php

namespace It20Academy\App\Core;

class App 
{
    public function run()
    {
        $request = new Request();

        if(! $request->validateCommand()){
            dump('Invalid command');

            return ;
        }

        $controllerName = $request->getController();
        $method = $request->getMethod();

        $controller = new $controllerName; // It20Academy\App\Controllers\PostsController
        $controller->$method();
    }

}