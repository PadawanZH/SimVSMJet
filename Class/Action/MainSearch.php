<?php

$dir = dirname(__file__);
require_once $dir . '/../Func/DocumentQuery.php';
require_once $dir . '/../Func/SimCalculator.php';
require_once $dir . '/../Func/DocumentContent.php';
require_once $dir . '/../Func/WordSplit.php';

/**
 * Created by PhpStorm.
 * User: zhangan
 * Date: 15-12-4
 * Time: 上午10:56
 */

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
    public function search($queryString, $simType, $sortBy, $topN, &$actualResultCount)
    {
        $resList = "";//simVal(similarity Value), title, url, time, abstract}
        $wordSplit = new WordSplit($queryString);
        $queryTermArray = $wordSplit->send_post();

        $termsDocList = $this->SelDocByQueryTerm($queryTermArray);

        $resList = $this->formDocsVectorList($termsDocList);

        $this->assignSimValue($queryTermArray, $resList, $simType);

        $this->sortResultList($resList, $sortBy);

        $actualResultCount = count($resList);
        $resList = $this->getTopNResult($resList, $topN);

        //get True content of topN resList
        $docmentContent = new DocumentContent($resList);
        $resList = $docmentContent->getDocumentContents();

        return $resList;
    }

    /**
     * !!!!!!!!!!!!!!!
     * @param $queryTermArray
     * @return null
     */
    private function SelDocByQueryTerm($queryTermArray)
    {
        $docmentquery = new DocumentQuery($queryTermArray);
        return $docmentquery->getDocuments();
    }

    private function formDocsVectorList($termsDocList)
    {
        $resList = array();

        foreach ($termsDocList as $term => $term_docList) {
            foreach ($term_docList as $docID => $tf_idf) {
                $resList[$docID][$term] = $tf_idf;
            }
        }
        return $resList;
    }

    /**
     * @param $queryVector
     * @param $resultList
     */
    private function assignSimValue($queryTermArray, &$resultList, $simType)
    {
        $simCalculator = new SimCalculator();
        $queryVector = array();
        $simCalculator->loadVector($queryTermArray, $queryVector, true);

        foreach ($resultList as $docID => $vector) {
            $resultList[$docID]['simVal'] = $simCalculator->GetSimOfTwoVector($queryVector, $resultList[$docID], $simType);
        }
    }

    /**
     * @param $resultList
     * @param $sortBy
     */
    private function sortResultList(&$resultList, $sortBy)
    {
        switch ($sortBy) {
            case 'simVal' :
                uasort($resultList, array($this, 'docComparator_simVal'));
                break;
            case 'time' :
                uasort($resultList, array($this, 'docComparator_time'));
        }
    }

    function docComparator_time($a, $b)
    {
        if ($a['time'] > $b['time']) {
            return 1;
        } else if ($a['time'] < $b['time']) {
            return -1;
        } else if ($a['time'] == $b['time']) {
            return 0;
        }
    }

    function docComparator_simVal($a, $b)
    {
        if ($a['simVal'] > $b['simVal']) {
            return -1;
        } else if ($a['simVal'] < $b['simVal']) {
            return 1;
        } else if ($a['simVal'] == $b['simVal']) {
            return 0;
        }
    }

    private function getTopNResult($requestList, $N)
    {
        $resList = array();

        $requestList = array_slice($requestList, 0, $N, true);

        foreach ($requestList as $docID => $item) {
            $resList[$docID] = $item['simVal'];
        }

        return $resList;
    }
}