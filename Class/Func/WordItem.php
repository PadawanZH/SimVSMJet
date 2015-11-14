<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/12
 * Time: 11:50
 */
namespace SimVSMJet;

class WordItem
{
    public $word, $off, $len, $tf, $idf, $attr;

    function __construct($word, $off, $len, $tf, $idf, $attr)
    {
        $this->word = $word;
        $this->off = $off;
        $this->len = $len;
        $this->tf = $tf;
        $this->idf = $idf;
        $this->attr = $attr;
    }
}