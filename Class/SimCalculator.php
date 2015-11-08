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
    private $firstVector,$secVector;
    function __construct($firstTermArray, $secTermArray)
    {
        $this->firstVector = $this->loadVector($firstTermArray);
        $this->secVector = $this->loadVector($secTermArray);
    }

    function loadVector($termArray){
        $termVector = array();
        foreach ($termArray as $item) {
            if( array_key_exists($item->word, $termArray) ){
                $termVector[$item->word] ++;
            }else{
                $termVector[$item->word] = 0;
            }
        }
        return $termArray;
    }

    function resetTheContents($firstTermArray, $secTermArray){
        $this->firstVector = $this->loadVector($firstTermArray);
        $this->secVector = $this->loadVector($secTermArray);
    }

    //call this func to get the result of Two Array
    function getSimResult(){
        $SimRes = 0.0;
    }
}