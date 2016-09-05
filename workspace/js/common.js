	$(function() {
  	var h = $(window).height();
	 $('#loader-bg ,#loader').height(h).css('display','block');
	 $('#wrap').css('display','none');
});

$(window).load(function () { //全ての読み込みが完了したら実行

	$('#loader-bg').delay(900).fadeOut(800);
	$('#loader').delay(600).fadeOut(300);
	$('#wrap').css('display', 'block');

});


//10秒たったら強制的にロード画面を非表示
$(function(){
  setTimeout('stopload()',10000);
});



		
	//ｽﾗｲﾄﾞｼｮｰ(swiper)起動
	$(function(){
	  var mySwiper = $('.swiper-container').swiper({
	    //オプションをここに:
	    mode:'horizontal',
	    pagination:'.swiper-pagination',
	    prevButton:'.swiper-button-prev',
	    nextButton:'.swiper-button-next',
	    loop: true,
	    speed:1000,
	    autoplay: 3000,
	    autoResize:true,
	    calculateHeight: true,
	    resizeReInit: true
	  });
	});
	
	function stopload(){
  $('#wrap').css('display','block');
  $('#loader-bg').delay(900).fadeOut(800);
  $('#loader').delay(600).fadeOut(300);
};
