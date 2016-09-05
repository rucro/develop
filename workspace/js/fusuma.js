
$(window).load(function() {
	/*
	setTimeout(function(){
		$(".left-pos2").animate({left: '-260px' }, {queue:false,duration:2000});
		$(".right-pos2").animate({left: '740px' }, {queue:false,duration:2000});	
	},1000);
	
	setTimeout(function(){
  		$('.in2 img:gt(0)').hide();
  			setInterval(function() {
  		   	 $('.in2 :first-child').fadeOut(2000).next('img').fadeIn(2000).end().appendTo('.in2');
  			}, 4000);
	},0);
	*/
	
	/* 襖ｽﾗｲﾄ ﾞ*/
	setTimeout(function(){
		$(".left-pos2").animate({left: '-350px' }, {queue:false,duration:2000});
		$(".right-pos2").animate({left: '820px' }, {queue:false,duration:2000});	
	},1000);
	
	/* 画像切替 */
	setTimeout(function(){
  		$('.in2 img:gt(0)').hide();
  			setInterval(function() {
  		   	 $('.in2 :first-child').fadeOut(2000).next('img').fadeIn(2000).end().appendTo('.in2');
  			}, 4000);
	},0);
	
});
	