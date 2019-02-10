<?php

namespace hleb\Scheme\Home\Constructor\Routes;


abstract class DataRoute
{
    protected $data_name;

    protected $data_path;

    protected $data_params;

    protected $type;

    protected $types;

    protected $actions;

    protected $method_name;

    protected  $method_type_name;

    protected $method_data;

    protected $errors;

    protected function  create_method_data(){}


}