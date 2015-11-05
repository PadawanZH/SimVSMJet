<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-11-5
 * Time: 下午4:59
 */
header("Content-type: text/html; charset=utf-8");

function send_post($url, $post_data)
{
    $postData = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => $postData,
            'timeout' => 15 * 60
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    $de_json = json_decode($result);

    $status = $de_json->status;
    $message = $de_json->message;
    $words = $de_json->words;

    foreach ($words as $word) {
        echo $word->word;
    }
}

$dataToPost = array(
    'data' => '我讨厌中国，做个大死',
    'respond' => 'json',
    'ignore' => 'true'
);

send_post('http://www.xunsearch.com/scws/api.php', $dataToPost);