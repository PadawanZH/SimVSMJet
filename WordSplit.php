<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-11-6
 * Time: 下午5:55
 */
namespace SimVSMJet;
class WordSplit
{
    private $data_to_post = array(
        'data' => '',
        'respond' => 'json',
        'ignore' => 'yes'
    );

    private $url = 'http://www.xunsearch.com/scws/api.php';

    function __construct($sentence)
    {
        $this->data_to_post['data'] = $sentence;
    }

    function send_post()
    {
        $postData = http_build_query($this->data_to_post);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => $postData,
                'timeout' => 15 * 60
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($this->url, false, $context);

        $de_json = json_decode($result);

        $status = $de_json->status;
        $message = $de_json->message;
        if ($status == 'ok') {
            $words = $de_json->words;
            var_dump($words);
            echo '<br/>';
            foreach ($words as $word) {
                echo $word->word . ' ';
            }
        } else {
            echo $message;
        }
    }
}