<?php

/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-12-7
 * Time: 下午5:23
 */

require_once 'medoo.php';

class DocumentContent
{
    private $documentList;

    private $db;

    public function __construct($documentList)
    {
        $this->documentList = $documentList;

        $this->db = new medoo([
            'database_type' => 'mysql',
            'database_name' => 'InformationRetrival',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '000417',
            'charset' => 'utf8'
        ]);
    }

    public function getDocumentContents()
    {
        $arr = array();
        foreach ($this->documentList as $docID => $SimVal) {
            $result = $this->db->select("document", ["TITLE", "URL"], ["ID" => $docID]);
            //var_dump($result);

            $arr[$docID] = [
                "SimVal" => $SimVal,
                "title" => $result[0]["TITLE"],
                "url" => $result[0]["URL"]
            ];
        }

        //var_dump($arr);

        return $arr;
    }
}