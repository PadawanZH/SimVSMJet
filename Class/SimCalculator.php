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
    private $firstVector, $secVector;

    function __construct($firstTermArray, $secTermArray)
    {
        $this->resetTheContents($firstTermArray, $secTermArray);
    }

    private function loadVector($termArray, &$termVector, $myTerm)
    {
        foreach ($termArray as $item) {
            if ($myTerm == true && array_key_exists($item->word, $termVector)) {
                $termVector[$item->word]++;
            } else if ($myTerm == true) {
                $termVector[$item->word] = 1;
            } else if ($myTerm == false && !array_key_exists($item->word, $termVector)) {
                $termVector[$item->word] = 0;
            }
        }
    }

    function resetTheContents($firstTermArray, $secTermArray)
    {
        $this->clearVectors();
        $this->loadVector($firstTermArray, $this->firstVector, true);
        $this->loadVector($secTermArray, $this->firstVector, false);
        $this->loadVector($firstTermArray, $this->secVector, false);
        $this->loadVector($secTermArray, $this->secVector, true);

        echo '<br />';
        var_dump($this->firstVector);
        echo '<br />';
        var_dump($this->secVector);
    }

    function clearVectors()
    {
        $this->firstVector = array();
        $this->secVector = array();
    }

    /**
     * call this func to get the result of Two Array
     * @param $SimKind {"InnerProduct" , "Cosine" , "Jaccard"}
     */
    function getSimResult($SimKind)
    {
        if ($SimKind == "InnerProduct") {
            return $this->InnerProduct($this->firstVector, $this->secVector);
        } else if ($SimKind == "Cosine") {
            return $this->Cosine($this->firstVector, $this->secVector);
        } else if ($SimKind == "Jaccard") {
            return $this->Jaccard($this->firstVector, $this->secVector);
        } else {
            return "No_Such_Way";
        }
    }

    private function InnerProduct($vector1, $vector2)
    {
        $result = 0.0;
        foreach ($vector1 as $index => $item) {
            $result += $item * $vector2[$index];
        }
        return $result;
    }

    private function Cosine($vector1, $vector2)
    {
        $innerProduct = $this->InnerProduct($vector1, $vector2);

        $result = $innerProduct / (sqrt($this->QuadraticSum($vector1)) * sqrt($this->QuadraticSum($vector2)));
        return $result;
    }

    private function Jaccard($vector1, $vector2)
    {
        $innerProduct = $this->InnerProduct($vector1, $vector2);

        $result = $innerProduct / ($this->QuadraticSum($vector1) + $this->QuadraticSum($vector2) - $innerProduct);
        return $result;
    }

    private function QuadraticSum($vector)
    {
        $result = 0.0;
        foreach ($vector as $item) {
            $result += ($item * $item);
        }
        return $result;
    }
}