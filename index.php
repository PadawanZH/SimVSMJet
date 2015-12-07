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

$mainSearch = new MainSearch();
var_dump($mainSearch->search("马克西莫夫,斯维尔德洛夫斯克州", "innerProduct", "simVal", 100));
