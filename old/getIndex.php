
<meta charset="utf-8">
<?

//$site="www.kanni.com";
$site=$_GET['site'];
//$wd="小品";
//$pn="0";
 
//echo '网站:'.$site.'<br />';
    //set_time_limit(0);    //设置程序的运行上限时间为不限，稍大规模的采集必备，不然默认运行5分钟后强制退出
    

$url="http://www.baidu.com/s?wd=site:".$site;
$content = file_get_contents($url);
preg_match("/(<span class=\"nums.*?>[^\d]+)([0-9,]*)([^\d]+<\/span><\/p>)/i",$content,$match);

$index = $match[2];
//echo $index;
echo $site.'收录量:'.$index.'<br />';   //在屏幕上直接依次输出这些网站的收录量
?>