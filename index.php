<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-11-5
 * Time: 下午4:59
 */

include 'Class/Func/WordSplit.php';

include 'Class/Action/MainSearch.php';

header("Content-type: text/html; charset=utf-8");

//$mainSearch = new MainSearch();
//var_dump($mainSearch->search("俄罗斯", "innerProduct", "simVal", 100));

include 'Class/Func/DocumentContent.php';

$test = new DocumentContent(["2660333" => 9.0, "2692956" => 10.0]);
$test->getDocumentContents();