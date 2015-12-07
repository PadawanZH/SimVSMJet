<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/12
 * Time: 11:50
 */

class WordItem
{
    public $word, $off, $len, $tf, $idf, $attr;

    function __construct($word, $len, $tf, $idf, $attr)
    {
        $this->word = $word;
        $this->len = $len;
        $this->tf = $tf;
        $this->idf = $idf;
        $this->attr = $attr;
    }
}