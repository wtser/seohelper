
<meta charset="utf-8">
<?



/*--------*/
//$site="www.kanni.com";
//$wd="小品";
$site=$_GET['site'];
if(!($wd=@$_GET['wd'])){die();}

//$wd="小品";
$pn="0";
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
}

?>
<!--

<script type="text/javascript">
	var db = window.openDatabase("seosky", "1.0","数据库描述",20000);
//window.openDatabase("数据库名字", "版本","数据库描述",数据库大小);
if(db)  
     alert("新建数据库成功！");
</script>
-->