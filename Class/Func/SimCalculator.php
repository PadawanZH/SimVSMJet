<?php
/**
 * Created by PhpStorm.
 * User: zhangan
 * Date: 15-11-8
 * Time: 下午7:10
 */

namespace SimVSMJet;


class SimCalculator
{

    /**
     *
     * @param $queryArray
     * @param $DocID
     * @param $innerProduct
     * @param $cosine
     * @param $Jaccard
     */
    public function GetSimOfTwoVector($firVector, $secVector, $simType)
    {
        switch ($simType) {
            case 'innerProduct' :
                return $this->InnerProduct($firVector, $secVector);
            case '$cosine':
                return $this->Cosine($firVector, $secVector);
            case '$jaccard':
                return $this->Jaccard($firVector, $secVector);
        }
    }

    function getSimWithTwoTermArrays($firstTermArray, $secTermArray, &$innerProduct, &$cosine, &$jaccard)
    {

        $firstVector = array();
        $secVector = array();
        $this->loadVector($firstTermArray, $firstVector, true);
        $this->loadVector($secTermArray, $firstVector, false);
        $this->loadVector($secTermArray, $secVector, true);
        $this->loadVector($firstTermArray, $secVector, false);

        echo '<div class="resultArea col-md-12" style="font-size: 20px;color: #ff0025">';
        var_dump($firstVector);
        echo '<br />';
        var_dump($secVector);
        echo '</div>';

        $innerProduct = $this->InnerProduct($firstVector,$secVector);
        $cosine = $this->Cosine($firstVector,$secVector);
        $jaccard = $this->Jaccard($firstVector, $secVector);
    }

    function __construct()
    {
    }

    public function loadVector($termArray, &$termVector, $myTerm)
    {
        foreach ($termArray as $item) {
            if ($myTerm == true && array_key_exists($item->word, $termVector)) {
                $termVector[$item->word] += $item->idf;
            } else if ($myTerm == true) {
                $termVector[$item->word] = $item->idf;
            } else if ($myTerm == false && !array_key_exists($item->word, $termVector)) {
                $termVector[$item->word] = 0;
            }
        }
    }

    //内积计算
    private function InnerProduct($vector1, $vector2)
    {
        $result = 0.0;
        foreach ($vector1 as $index => $item) {
            $result += $item * $vector2[$index];
        }
        return $result;
    }

    //余弦计算
    private function Cosine($vector1, $vector2)
    {
        $innerProduct = $this->InnerProduct($vector1, $vector2);

        $result = $innerProduct / (sqrt($this->QuadraticSum($vector1)) * sqrt($this->QuadraticSum($vector2)));
        return $result;
    }

    //Jaccard计算
    private function Jaccard($vector1, $vector2)
    {
        $innerProduct = $this->InnerProduct($vector1, $vector2);

        $result = $innerProduct / ($this->QuadraticSum($vector1) + $this->QuadraticSum($vector2) - $innerProduct);
        return $result;
    }

    //平方和
    private function QuadraticSum($vector)
    {
        $result = 0.0;
        foreach ($vector as $item) {
            $result += ($item * $item);
        }
        return $result;
    }
}