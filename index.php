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

$sentence = '这是一句话，用来测试分词。';
$wordSplit = new WordSplit($sentence);
$wordSplit->send_post();