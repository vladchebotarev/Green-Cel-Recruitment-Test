<?php
/**
 * Created by PhpStorm.
 * User: Vlad Chebotarev
 * Date: 25.12.2017
 * Time: 20:39
 */

namespace Src;


final class Transpose
{
    /**
     * @param $data
     * @return array
     *
     * Method to transpose multidimensional array
     */
    public static function transposeData($data)
    {
        $retData = array();
        foreach ($data as $row => $columns) {
            foreach ($columns as $row2 => $column2) {
                $retData[$row2][$row] = $column2;
            }
        }
        return $retData;
    }

}