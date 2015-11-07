<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-11-5
 * Time: 下午4:59
 */
namespace SimVSMJet;
include 'WordSplit.php';
header("Content-type: text/html; charset=utf-8");

$sentence = '周杰伦是一个歌手，不是一个演员。';
$wordSplit = new WordSplit($sentence);
$result = $wordSplit->send_post();

var_dump($result);