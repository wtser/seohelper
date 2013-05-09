
<meta charset="utf-8">
<?php
/*定义字段*/
$site=$_GET['site'];
$searchEngine['百度']=('http://www.baidu.com/s?wd=site:');
$searchEngine['谷歌']=('http://www.google.com.hk/search?newwindow=1&safe=strict&site=&source=hp&q=site:');

//$getIndexUrl=
//var_dump($searchEngine);
require('phpQuery/phpQuery.php');
//实例化phpQuery
phpQuery::newDocumentFile($searchEngine['百度'].$site);
$index = pq(".site_tip > strong")->text();
//echo $index;
preg_match("/([0-9,]+)/i",$index,$match);
//var_dump($match);
//echo '<br />'.$site.': '.$match[1];
echo $match[1];

/*phpQuery::newDocumentFile($searchEngine['谷歌'].$site);
$index = pq("#resultStats")->text();
echo $index;*/


 
//echo '网站:'.$site.'<br />';
    //set_time_limit(0);    //设置程序的运行上限时间为不限，稍大规模的采集必备，不然默认运行5分钟后强制退出
    

//$url="http://www.baidu.com/s?wd=site:".$site;
//$content = file_get_contents($url);
/*preg_match("/(<span class=\"nums.*?>[^\d]+)([0-9,]*)([^\d]+<\/span><\/p>)/i",$content,$match);
*/
//$index = $match[2];

//echo $site.'收录量:'.$index.'<br />';   //在屏幕上直接依次输出这些网站的收录量
?>