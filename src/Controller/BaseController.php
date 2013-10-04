<?php
namespace Controller;

class BaseController
{
    protected $app;
    protected $request;

    function __construct($app, $request) {
        $this->app = $app;
        $this->request = $request;
    }
}