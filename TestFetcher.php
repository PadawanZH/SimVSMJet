<?php
require_once('phpfetcher.php');

class PageClawler extends Phpfetcher_Crawler_Default{
    public function handlePage($objPage)
    {
        // TODO: Implement handlePage() method.
        $res = $objPage->sel('//span[@class=\'title\']'); //使用的是xpath
        for ($i = 0; $i < count($res); ++$i) {
            echo $res[$i]->plaintext;
            echo "\n";
        }
    }
}

class MovieClawler extends Phpfetcher_Crawler_Default {
    public function handlePage($page) {
        //打印处当前页面的title
        $res = $page->sel('//title');
        for ($i = 0; $i < count($res); ++$i) {
            echo $res[$i]->plaintext;
            echo "\n";
        }
    }
}




class ReviewClawler extends  Phpfetcher_Crawler_Default {
    public function handlePage($objPage)
    {
        // TODO: Implement handlePage() method.
    }
}

$pageCrawler = new PageClawler();
$pageJobs = array(
    //任务的名字随便起，这里把名字叫qqnews
    //the key is the name of a job, here names it qqnews
    'getPages' => array(
        'start_page' => 'http://movie.douban.com/top250', //起始网页
        'link_rules' => array(
            /*
             * 所有在这里列出的正则规则，只要能匹配到超链接，那么那条爬虫就会爬到那条超链接
             * Regex rules are listed here, the crawler will follow any hyperlinks once the regex matches
             */
            '#movie\.douban\.com/top250\?start=\d+.+#',
        ),
        //爬虫从开始页面算起，最多爬取的深度，设置为1表示只爬取起始页面
        //Crawler's max following depth, 1 stands for only crawl the start page
        'max_depth' => 2,

    ) ,
);

$pageCrawler->setFetchJobs($pageJobs);
$pageCrawler->run();