<?php
	//$db=mysql_connect("localhost","root","");
	$db=mysql_connect("hdm-128.hichina.com","hdm1280189","Orange211");
	//$sqlname="timeaxis";
	$sqlname="hdm1280189_db";
	mysql_select_db($sqlname,$db);
	mysql_query("SET NAMES 'UTF8'",$db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang='zh-CN' xml:lang='zh-CN' xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>铁路百年大记事</title>
<link rel="stylesheet" type="text/css" href="css/reset_y.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script id="jquery_183" type="text/javascript" class="library" src="js/jquery-1.8.3.min.js"></script>
<script> 
   (function() {
     if (! 
     /*@cc_on!@*/
     0) return;
     var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video".split(', ');
     var i= e.length;
     while (i--){
         document.createElement(e[i])
     } 
})() 
</script>
<script>
/*
    $(document).ready(function(){
	   $(".select").hover(function(){
		   $("#key").css("display","inline");
	   });
    });
	$(document).ready(function(){
	   $(".select").mouseleave(function(){
		   $("#key").css("display","none");
	   });
    });
*/
</script>
</head>
<body class="impress-not-supported">

<div class="bg"><img src="images/bg04.jpg" width="100%" /></div>

<header class="top" id="top">
	<div style="width:320px;height:72px;float:left;"><img src="images/logo.png" width="320" height="72" /></div>
	    <div class="select">
    <form name="form" action="search.php" method="post">
<script>
var inputText=function(o,e,e2){if(!o)return;var txt=o.value;
function inputTextChange(o,e,e2,txt){
o[e]=function(){var txt2=o.value;if(txt==txt2)o.value=""}
o[e2]=function(){var txt2=o.value;if(txt2=="")o.value=txt}}
new inputTextChange(o,e,e2,txt)
}
</script>
    <input name="key" type="text" id="key"  value="请输入关键字" />
<script>
var inputArr=document.getElementsByTagName("input")
for(var i in inputArr){
if(!inputArr[i].type=="text") continue;
inputText(inputArr[i],"onfocus","onblur")
}
</script>
    <input name="select" id="select" type="image"  src="images/select.png" width="35" height="35"/>
    </form>
    </div>
    <div style="clear:both;"></div>
</header>

<section id="timeline" class="timeline">
<div id="line" class="line_white"></div>
	<div id="impress">
		<div id="timeList">
			<div class="step year" data-x="-600" data-y="0" data-scale ="0.5" id="0">
				<div class="year2012">序言</div>
				<div class="list_show">铁路百年大记事<br/></div>
			</div>
			
			<?php
				$sql="SELECT * FROM tbl_event ORDER BY year asc,month asc,day asc"; 
				$conn=mysql_query($sql);
				global $i;
				while($rs=mysql_fetch_array($conn))
				{	
					if($rs['type']==1){		
			?>
					<div class="timeList_item step" data-x="<?php $k = $i*400; echo $k; ?>" data-y="0" id="<?php echo $rs['id']; ?>">
						<div class="circle"><?php echo $rs['month']."/".$rs['day']; ?></div>
						<h2 class="timeList_item_title"><?php echo $rs['name']; ?></h2>
						<div class="list_show show1" >
							<img src="<?php echo $rs['img']; ?>"  style="top:80px; left:530px; position:absolute;width:420px; height:320px; _width:320px; *width:320px; width:320px \0/IE9;" />
							<div style="width:490px; height:350px; position:relative; "><?php echo $rs['intro']; ?></div>
						</div>
					</div>
				<?php
					}else{
				?>
						<div class="step" data-x="<?php $k = $i*400; echo $k; ?>" data-y="0" data-scale ="0.5" id="<?php echo $rs['id']; ?>">
							<div class="year2013"> <?php echo $rs['year']; ?> </div>
							<div class="list_show year" style=" margin-left:450px; _margin-left:0px; *margin-left:0px; margin-left:0px \0/IE9;"> <?php echo $rs['year']; ?>的铁路记事 </div>
						</div>
			<?php
					}
					$i++;
				}
			
				require_once("../global.inc.php");
				r_require_once("/lib/MultiActions.php");
				require_once("DAL/Event.php");
				$event = new Event();
				$cnt = $event->getLastId();
				$cnt = $cnt + 1;
			?>
			
			
			<div class="timeList_item step refresh" data-x="<?php $i=$i+1; $k = $i*400; echo $k; ?>" data-y="0" id="<?php echo $cnt; ?>">
				<div class="list_show">
					<a href='javascript:replay();'><img src="images/refress.png" width="128" height="128" /></a>
					<p class="end">谢谢观看！</p>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="gotop"> <a href="#top"><img src="images/top.png" title="回顶部"/></a></div>

<script type="text/javascript" src="js/impress.js"></script>
</body>
</html>

<script>var impress = $.browser.msie?undefined:impress();

//预加载图片
new Image().src = "images/bg04.jpg";
new Image().src = "images/bg01.jpg";
new Image().src = "images/bg02.jpg";
new Image().src = "images/bg03.jpg";

var replay = function(){
	if(impress){
		impress.goto($("#0")[0]);
	}else{
		location.reload();
	}
};


var event_cache = null;

var loop = true,timing=null;

$(function(){			
	
	 $(window).bind('scroll resize',function(){
        if($(window).scrollTop() >= 1)
            $('.gotop').css('display','block');
        else
            $('.gotop').css('display','none');
    });   
	
	var cache_event_top = function(){
		if(event_cache!=null)
			return;
		event_cache = new Array(24);
		var i = 0;
		var length = event_cache.length;
		for(;i<length;i++){
			var id = i+1;
			event_cache[i] = $("#"+id).position().top;
		}
	}
		
	var resize = function(){
		
		var width = $(window).width();
		var height = $(window).height();
		$(".bg img").css("width",width);
		$(".bg img").css("height",height);
		
	};
		
	var cur_month = 2;

	var getMonthByTop = function(top){
		for(var i=0,event=event_cache[i];i<event_cache.length;i++){
				if(i==event_cache.length-1 && top>=event || top>=event && top<event_cache[i+1]){
					var date = $("#"+(i+1)).find(".circle").html();
					if(date){
						var month = +date.split("/")[0];
						return month;
					}
				}
		}
		return cur_month;
	};
		
	var scroll = function(){
		if($.browser.msie){
			cache_event_top();
			var st = $(window).scrollTop();
			var month = getMonthByTop(st);
			if(month!=cur_month){
				changeBackground(month);
				cur_month = month;
			}
		}
	};
	
	resize();
	
	$(window).resize(function(){
		resize();
	});
	
	$(window).scroll(function(){
		scroll();
	});
	
	$(".circle").click(function(){
			loop = false;
		if(timing)
			clearInterval(timing);
	});
	$(".refresh img").click(function(){
		loop = true;
		$(".refresh img").addClass("rotate45");
		setTimeout(function(){
			$(".refresh img").removeClass("rotate45");
		},2000);	
	});
	if(!$.browser.msie){
		if($.browser.safari)
			bgMusic = new Audio('music/music.mp3');
		else
			bgMusic = new Audio('music/music.ogg');
		bgMusic.loop = true;
		bgMusic.volume = 0.7;
		$('#bgMusicSwitch').click(function(){
			if(bgMusic.paused){
				bgMusic.play();
				$(".triangle").css("display","none");
				$(".pause").css("display","block");
				$("#bgMusicSwitch").attr("title","暂停背景音乐");
			}else{
				bgMusic.pause();
				$(".pause").css("display","none");
				$(".triangle").css("display","block");
				$("#bgMusicSwitch").attr("title","播放背景音乐");
			}});
		var bgSwitch = function(){
			$('#bgMusicSwitch').trigger('click');
		}
				
		bgSwitch();
	}else{
		$(".music").hide();
	}		
	
});


if(impress)impress.init();

var last_month = 4;

var changeBackground = function(month){
	var body = $("body");
	var url = "";
	if(month == 12 || month == 1 || month==2){
		if(last_month==4)
			return;
		last_month = 4;
		url = "images/bg04.jpg";
		$("header").css("background-color","rgba(255,255,255,0.2)");
		$(".impress-supported .list_show h2").css("color","#0087f1");
		$(".impress-not-supported .timeList_item_title").css("color","#0087f1");
	}else if(month>=3 && month<=5){
		if(last_month==1)
			return;
		last_month = 1;
		url = "images/bg01.jpg";
		$("header").css("background-color","rgba(255,255,255,0.2)");
		$(".impress-supported .list_show h2").css("color","#fff");
		$(".impress-not-supported .timeList_item_title").css("color","#eca200");
	}else if(month>=6 && month<=8){
		if(last_month==2)
			return;
		last_month = 2;
		url = "images/bg02.jpg";
		$("header").css("background-color","rgba(0,0,0,0.2)");
		$(".impress-supported .list_show h2").css("color","#82e211");
		$(".impress-not-supported .timeList_item_title").css("color","#82e211");
	}else{
		if(last_month==3)
			return;
		last_month = 3;
		url = "images/bg03.jpg";
		$("header").css("background-color","rgba(255,255,255,0.2)");
		$(".impress-supported .list_show h2").css("color","#ffca00");
		$(".impress-not-supported .timeList_item_title").css("color","#ffca00");
	}
	$(".bg img").attr("src",url);
};

if(!$.browser.msie){
	document.addEventListener('impress:stepenter', function(e){
		var cur = arguments[0].target;
		var date = $(cur).find(".circle").html();
		if(date){
			var month = +date.split("/")[0];
			changeBackground(month);
		}
		if(!loop)
			return;
		if (typeof timing !== 'undefined') clearInterval(timing);
		var duration = 4000;
		timing = setInterval(function(){
			var dom = impress.next();
			var id = +$(dom).attr("id");
			if(id==25){
				clearInterval(timing);
				loop = false;
			}
		}, duration);
	});
}
</script>