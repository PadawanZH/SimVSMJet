<?php

/**
 * Created by PhpStorm.
 * User: zhangan
 * Date: 15-12-4
 * Time: 上午10:56
 */
$dir = dirname(__FILE__);
include $dir.'../Func/SimCalculator.php';
class MainSearch
{
    public function  __construct(){

    }

    /**
     * @param $queryString
     * @param $simType  String ["innerProduct","$cosine","jaccard"]
     * @param $sortBy   String ["similarity","time"]
     * @return array : list of result
     */
    public function search($queryString, $simType, $sortBy){
        $resList = "";


        return $resList;
    }
}