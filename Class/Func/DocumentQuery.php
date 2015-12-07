<?php
/**
 * Created by PhpStorm.
 * User: tevenfeng
 * Date: 15-12-6
 * Time: 下午8:09
 */

require_once 'medoo.php';

class DocumentQuery
{
    private $query;

    private $db;

    public function __construct($queryItem)
    {
        $this->query = $queryItem;
        $this->db = new medoo([
            'database_type' => 'mysql',
            'database_name' => 'InformationRetrival',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '000417',
            'charset' => 'utf8'
        ]);
    }

    public function getDocuments()
    {
        $term_docList = array();

        foreach ($this->query as $queryItem) {
            $result = $this->db->select("doc_terms", ["[>]terms" => "WORD"], ["WORD", "ID", "TF", "IDF"], ["WORD" => $queryItem->word]);

            //var_dump($result);

            $docList = array();
            foreach ($result as $resultItem) {
                $docList[$resultItem["ID"]] = $resultItem["TF"] * $resultItem["IDF"];
            }
            //var_dump($docList);
            $term_docList[$queryItem->word] = $docList;
        }
        //var_dump($term_docList);

        return $term_docList;
    }
}