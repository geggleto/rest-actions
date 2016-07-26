<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-07-25
 * Time: 11:21 AM
 */

namespace Geggleto\Rest;


use Illuminate\Database\Eloquent\Model;

abstract class UpdateAction extends Action
{
    protected $updatedMessage;

    public function invoke($param1) {
        try {
            $object = $this->update($this->locate($param1), $this->app->request()->params());
            print $object->toJson();
        } catch (\Exception $e) {
            $response = array("message" => $e->getMessage());
            if (!empty($this->errorMessage)) {
                $response['message'] = $this->errorMessage;
            }
            print json_encode($response);
        }
    }

    /**
     * @param Model $object|null
     * @param array $attributes
     *
     * @return Model
     */
    abstract public function update(Model $object, array $attributes);

    abstract public function locate($param1);

    /**
     * @param mixed $updatedMessage
     */
    public function setUpdatedMessage($updatedMessage)
    {
        $this->updatedMessage = $updatedMessage;
    }


}