<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-11-6
 * Time: 下午5:55
 */

include 'WordItem.php';

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
        $result = array();
        if ($status == 'ok') {
            $all_words = $de_json->words;

            //var_dump($all_words);
            //echo '<br/>';
            $wordCount = count($all_words);
            foreach ($all_words as $word) {
                if ($word->idf != 0) {
                    //array_push($result, $word);

                    $tf = 0;
                    foreach ($all_words as $word1) {
                        if ($word->word == $word1->word) {
                            $tf++;
                        }
                    }
                    $item = new WordItem($word->word, $word->len, $tf / $wordCount, $word->idf, $word->attr);
                    array_push($result, $item);
                }
            }
        } else {
            array_push($result, $message);
        }

        return $result;
    }
}