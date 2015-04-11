var impress = $.browser.msie?undefined:impress();

//Ô¤¼ÓÔØÍ¼Æ¬
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
				$("#bgMusicSwitch").attr("title","ÔÝÍ£±³¾°ÒôÀÖ");
			}else{
				bgMusic.pause();
				$(".pause").css("display","none");
				$(".triangle").css("display","block");
				$("#bgMusicSwitch").attr("title","²¥·Å±³¾°ÒôÀÖ");
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