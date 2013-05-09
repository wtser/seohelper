$(function(){

	$("#empty").click(function(){
		localStorage.clear();
	})

	function orderAjax(site,keywords){
		$.ajax({
			  url: "getOrder.php?site="+sites[key]+"&keyWords="+keyWords[key],
			  cache: false,
			  beforeSend: function (XMLHttpRequest) {
			  		//$("#site-index-result").html('查询中，请稍后');
			  		//$("#site-indexs-result").append(sites[key]);
	                },
	                success: function (data, textStatus) {
	                	//$("#site-index-result").html(data);
	                	//html=html+data;
	                	//console.log(html);
	                	var html='<tr><td>'+site+'</td><td>'+data+'</td></tr>';

	                	$("#order tbody").append(html);
	                }
			});
	}

	$(".order").click(function(){
		$("#order-result").html('查询中，请稍后');
		$("#order tbody").html('');
		var getSites = localStorage["sites"];  
		var getKeywords = localStorage["keyWords"];  
		getSites=getSites.substring(0,getSites.length-1);
		getKeywords=getKeywords.substring(0,getKeywords.length-1);
		sites=getSites.split(",");
		keyWords = getKeywords.split(",");
		html='';
		for(key in sites){
	
				orderAjax(sites[key],keyWords[key]);
			

				

			//html=html+'<tr><td>'+attr[0]+'</td><td>'+attr[1]+'</td><td>删</td></tr>';

		}
		//$("#order-result").html('');
		//$("#order-result").append('<br />查询结束');
		
		//$("#order-result").html(html);
		//$("#order tbody").html(html);

	})

	function indexAjax(site){
		$.ajax({
			  url: "getIndex.php?site="+site,
			  cache: false,
			  beforeSend: function (XMLHttpRequest) {
			  		//$("#site-index-result").html('查询中，请稍后');
			  		//$("#site-indexs-result").append(sites[key]);
	                },
	                success: function (data, textStatus) {
	                	//$("#site-index-result").html(data);
	                	//html=html+data;
	                	//console.log(html);
	                	var html='<tr><td>'+site+'</td><td>'+data+'</td></tr>';

	                	$("#indexs tbody").append(html);
	                }
			});
	}

	$(".indexs").click(function(){
		$("#site-indexs-result").html('查询中，请稍后')
		$("#indexs tbody").html('');
		var getSites = localStorage["sites"];  
		getSites=getSites.substring(0,getSites.length-1);
		sites=getSites.split(",");
		for(key in sites){
			$siteNow=sites[key];

			html='';
			indexAjax(sites[key]);
			//console.log(key);
			

		}
		//$("#site-indexs-result").html('')
		
	})

	$(".setting").click(function(){
		var storage = window.localStorage;
		
		var getSites = localStorage["sites"]; 
		var getKeywords = localStorage["keyWords"];   
		getSites=getSites.substring(0,getSites.length-1);
		sites=getSites.split(",");
		keyWords=getKeywords.split(",");
		html='';
		for(key in sites){
			//attr=sites[key].split(",");
			html=html+'<tr><td>'+sites[key]+'</td><td>'+keyWords[key]+'</td><td><a class="del" href="#" data-site='+sites[key]+' data-keyword="'+keyWords[key]+'" data-role="button" data-inline="true">删</a></td></tr>';

		}
		
		$("#setting tbody").html(html);

		$(".del").click(function(){
			$site = $(this).attr('data-site');
			$keyword = $(this).attr('data-keyword');
			var getSites = localStorage["sites"]; 
			var getKeywords = localStorage["keyWords"]; 
			getSites=getSites.replace($site+',','');
			getKeywords=getKeywords.replace($keyword+',','');
			success=1;
			try{
			  localStorage.setItem("sites",getSites);
			}catch(e){
				success=0;
			  alert('删除失败');
			}
			try{
			  localStorage.setItem("keyWords",getKeywords);;
			}catch(e){
				success=0;
			  alert('删除失败');
			}
			if(success){
				alert('删除成功')
				$(this).parent().parent().remove();

			}

			console.log(getSites);
			console.log(getKeywords);
			//localStorage.removeItem("sites")
			 
		})
		
	})

	$("#addSiteAction").click(function(){
		var getSites = localStorage["sites"]; 
		var getKeywords = localStorage["keyWords"];  
		if(!getSites){getSites='';};
		if(!getKeywords){getKeywords='';};
		if($("#site-for-add").val()){
			var addSite = getSites+$("#site-for-add").val()+',';
			var addKeywords = getKeywords+$("#keyword-for-add").val()+',';
			var success=1;
			try{
			  localStorage.setItem("sites",addSite);
			}catch(e){
				success=0;
			  alert('添加失败');
			}
			try{
			  localStorage.setItem("keyWords",addKeywords);;
			}catch(e){
				success=0;
			  alert('添加失败');
			}
			if(success){
				alert('添加成功')
			}
			
			
		}else{
			alert('网站域名必须填写')
		}
		
		
		
		
		
			/*$setp1 =  
			$setp2 = 
			*/
		
	})

	$("#getIndex").click(function(){
		if($site=$("#site-for-index").val()){
			$.ajax({
			  url: "getIndex.php?site="+$site,
			  cache: false,
			  beforeSend: function (XMLHttpRequest) {
			  		$("#site-index-result").html('查询中，请稍后');
	                },
	                success: function (data, textStatus) {
	                	$("#site-index-result").html(data);
	                }
			});
		}else{
			$("#site-index-result").html('网址不能为空！');
			
		};

			
		

	});
	$("#getOrder").click(function(){

		$site=$("#site-for-order").val();
		$wd=$("#keyword-for-order").val();
		if($site && $wd){
			$.ajax({
			  url: "getOrder.php?site="+$site+"&keyWords="+$wd,
			  cache: false,
			  beforeSend: function (XMLHttpRequest) {
			  		$("#site-order-result").html('查询中，请稍后');
	                },
	                success: function (data, textStatus) {
	                	$("#site-order-result").html(data);
	                }

			  
			});
		}else{
			$("#site-order-result").html('关键词和网站必须填写');
		}
		
	});

	});