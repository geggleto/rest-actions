<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-07-25
 * Time: 11:57 AM
 */

namespace Geggleto\Rest;


use Illuminate\Database\Eloquent\Model;

abstract class GetAction extends Action
{
    /**
     * @param $param1
     *
     * @return Model
     */
    abstract public function locate($param1);

    public function invoke($param1) {
        try {
            $object = $this->locate($param1);
            print $object->toJson();
        } catch (\Exception $e) {
            $response = array("message" => $e->getMessage());
            if (!empty($this->errorMessage)) {
                $response['message'] = $this->errorMessage;
            }
            print json_encode($response);
        }
    }
}