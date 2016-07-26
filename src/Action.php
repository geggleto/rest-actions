<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 6/16/2016
 * Time: 11:16 PM
 */

namespace Geggleto\Rest;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Slim;

abstract class Action
{
    /** @var Slim */
    protected $app;

    /** @var Request */
    protected $request;

    /** @var Response */
    protected $response;

    /** @var string */
    protected $errorMessage;

    /** @var  array */
    protected $fields;

    
    abstract public function init();

    /**
     * @return Slim
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param Slim $app
     */
    public function setApp(Slim $app)
    {
        $this->app = $app;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @param array $attributes
     * 
     * @return array
     */
    protected function parseFields(array $attributes) {
        $values = [];
        foreach ($this->fields as $field) {
            $values[$field] = $attributes[$field];
        }

        return $values;
    }

}