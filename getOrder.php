
<meta charset="utf-8">
<?
/*定义字段*/
$site=$_GET['site'];
$keyWords=$_GET['keyWords'];
//$pn=0;

//$searchEngine['谷歌']=('http://www.google.com.hk/search?newwindow=1&safe=strict&site=&source=hp&q=site:');

require('phpQuery/phpQuery.php');
//echo '<br />'.$site.'<br />';

$word=split(' ', $keyWords);

$continue=1;
set_time_limit(0); 
foreach ($word as $key => $value) {

	for($bd=0;$bd<100;$bd+=10){
		$searchEngine['百度']=('http://www.baidu.com/s?pn='.$bd.'&wd='.$value);
		//实例化phpQuery
		phpQuery::newDocumentFile($searchEngine['百度']);
		if( $order = pq("table:contains($site)")->attr("id") ){
			echo $value.' => '.$order.'<br />';
				$continue=0;
			
			break;
		}else{
			$continue=1;
		}
		
	}
	if($continue==1){echo $value.' => 100+<br />';};
}
	
/*for($start=0;$start<200;$start+=10){
	$searchEngine['谷歌']=('http://www.google.com.hk/search?newwindow=1&safe=strict&site=&source=hp&q='.$keyWords.'&start='.$start);
	//实例化phpQuery
	phpQuery::newDocumentFile($searchEngine['谷歌']);
	if( $order = pq("cite:contains($site)")->text()){
		echo $order;
		break;
	}
	
}*/



/*$pn="0";
$wd=split(' ', $wd);

$continue=1;
foreach ($wd as $key => $value) {
	for($pn=0;$pn<50;$pn+=10){

	$url = "http://www.baidu.com/s?wd=".$value."&pn=".$pn."&ie=utf-8";
	$content = file_get_contents($url);
	//preg_match("/($site)/",$content,$matchFirst);
	//var_dump($matchFirst[0]);die();
	//if(!$matchFirst[1]){break;}
			
		for($i=1+$pn;$i<=($pn+10);$i++){
			if(preg_match("/(id=\"$i\".*?class=\"g\">[ ]*)([\w]*[.\w]*)/",$content,$match)){
				if($match[2]==$site){
				  echo  $site.' 关键词：'.$value.' 排名'.$i.'<br />';

				  //echo $i;
				  $continue=0;
				  break;
				}
			}

		}
		if(!$continue){$continue=1;break;}
	}

	if($pn==50){echo ' 排名在50之后';};
}*/

?>
<!--

<script type="text/javascript">
	var db = window.openDatabase("seosky", "1.0","数据库描述",20000);
//window.openDatabase("数据库名字", "版本","数据库描述",数据库大小);
if(db)  
     alert("新建数据库成功！");
</script>
-->