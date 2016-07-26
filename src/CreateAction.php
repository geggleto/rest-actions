<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-07-25
 * Time: 10:15 AM
 */

namespace Geggleto\Rest;


use Illuminate\Database\Eloquent\Model;

abstract class CreateAction extends Action
{
    protected $createdMessage;
    
    public function invoke() {
        try {
            $model = $this->create($this->request->post());

            $this->app->flash('message', $this->createdMessage);

            print $model->toJson();

        } catch (\Exception $e) {
            $response = array("message" => $e->getMessage());
            if (!empty($this->errorMessage)) {
                $response['message'] = $this->errorMessage;
            }

            print json_encode($response);
        }
    }

    /**
     * @param string $createdMessage
     */
    public function setCreatedMessage($createdMessage)
    {
        $this->createdMessage = $createdMessage;
    }

    /**
     * @param $attributes
     * @return Model
     */
    abstract public function create(array $attributes);
}