<?php

/**
 * Created by PhpStorm.
 * User: zhangan
 * Date: 15-12-4
 * Time: 上午10:56
 */
namespace SimVSMJet;
$dir = dirname(__FILE__);
include $dir . '../Func/SimCalculator.php';

class MainSearch
{
    public function  __construct()
    {

    }

    /**
     * @param $queryString
     * @param $simType  String ["innerProduct","$cosine","jaccard"]
     * @param $sortBy   String ["similarity","time"]
     * @return array : list of result
     */
    public function search($queryString, $simType, $sortBy)
    {
        $resList = "";//simVal(similarity Value), title, url, time, abstract}
        $wordSplit = new WordSplit($queryString);
        $queryTermArray = $wordSplit->send_post();

        $simCalculator = new SimCalculator();
        $queryVector = array();
        $simCalculator->loadVector($queryTermArray, $queryVector, true);

        $resList = $this->SelDocByQueryTerm($queryTermArray);
        $this->assignSimValue($queryVector, $resList);

        $this->sortResultList($resList, $sortBy);
        return $resList;
    }

    /**
     * !!!!!!!!!!!!!!!
     * @param $queryTermArray
     * @return null
     */
    private function SelDocByQueryTerm($queryTermArray)
    {
        return null;
    }

    /**
     * @param $queryVector
     * @param $resultList
     */
    private function assignSimValue($queryVector, &$resultList)
    {

    }

    /**
     * @param $resultList
     * @param $sortBy
     */
    private function sortResultList(&$resultList, $sortBy)
    {
        switch ($sortBy) {
            case 'simVal' :
                usort($resultList, "docComparator_simVal");
                break;
            case 'time' :
                usort($resultList, "docComparator_time");
        }
    }

    function docComparator_time($a, $b)
    {
        if ($a->time > $b->time) {
            return 1;
        } else if ($a->time < $b->time) {
            return -1;
        } else if ($a->time == $b->time) {
            return 0;
        }
    }

    function docComparator_simVal($a, $b)
    {
        if ($a->simVal > $b->simVal) {
            return -1;
        } else if ($a->simVal < $b->simVal) {
            return 1;
        } else if ($a->simVal == $b->simVal) {
            return 0;
        }
    }
}