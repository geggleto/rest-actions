<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-07-25
 * Time: 1:07 PM
 */

namespace Geggleto\Rest;


use Illuminate\Database\Eloquent\Collection;

abstract class ListAction extends Action
{
    protected $pagination = 25;
    
    public function invoke($page = 0) {
        $collection = $this->listObjects($page);

        print json_encode($collection);
    }

    /**
     * @param $page
     * @return array
     */
    abstract public function listObjects($page);
}