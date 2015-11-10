<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-11-5
 * Time: 下午4:59
 */
namespace SimVSMJet;
include 'Class/Func/WordSplit.php';
include 'Class/Func/SimCalculator.php';
header("Content-type: text/html; charset=utf-8");

$sentence = '周杰伦是一个歌手，不是一个演员。';
$wordSplit = new WordSplit($sentence);
$result1 = $wordSplit->send_post();

$sentence = '周杰伦是一个歌手';
$wordSplit = new WordSplit($sentence);
$result2 = $wordSplit->send_post();

$simcal = new SimCalculator($result1, $result2);
$innerProduct = $simcal->getSimResult("InnerProduct");
$cosine = $simcal->getSimResult("Cosine");
$jaccard = $simcal->getSimResult("Jaccard");
echo $innerProduct . "  " . $cosine . "  " . $jaccard;