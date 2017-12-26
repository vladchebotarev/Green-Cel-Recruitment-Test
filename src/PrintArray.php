<?php
/**
 * Created by PhpStorm.
 * User: Vlad Chebotarev
 * Date: 25.12.2017
 * Time: 19:32
 */

namespace Src;


final class PrintArray
{
    /**
     * @param $array
     * Method to print multidimensional array
     *
     */
    public static function printArray($array)
    {
        echo '<div class="container"><table class="table table-bordered">';
        for ($i = 0; $i < count($array); $i++) {
            echo '<tr>';
            for ($j = 0; $j < count($array[$i]); $j++) {
                echo '<td>' . $array[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table></div>';
    }
}