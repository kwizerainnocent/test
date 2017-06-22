$('document').ready(function(){
	var size_li = $('#myList li').size();
	var x = 7;
	$("#myList li:lt("+x+")").show();
	$("#loadMore").click(function(){
		x = (x+5<=size_li)? x+5: size_li;
		$("#myList li:lt("+x+")").show();
		$("#myList li").addClass('animated bounceInLeft');
	});
	$("#showLess").click(function(){
		x = (x-5<0)?8:x-5;
		$("#myList li").not(":lt("+x+")").hide();
	});
//second lists
	var size_li = $('#myListSec li').size();
	var x = 7;
	$("#myListSec li:lt("+x+")").show();
	$("#loadMoreSec").click(function(){
		x = (x+5<=size_li)? x+5: size_li;
		$("#myListSec li:lt("+x+")").show();
		$("#myListSec li").addClass('animated bounceInLeft');
	});
	$("#showLessSec").click(function(){
		x = (x-5<0)?8:x-5;
		$("#myListSec li").not(":lt("+x+")").hide();
	});

//third lists
	var size_li = $('#myListThr li').size();
	var x = 7;
	$("#myListThr li:lt("+x+")").show();
	$("#loadMoreThr").click(function(){
		x = (x+5<=size_li)? x+5: size_li;
		$("#myListThr li:lt("+x+")").show();
		$("#myListThr li").addClass('animated bounceInLeft');
	});
	$("#showLessThr").click(function(){
		x = (x-5<0)?8:x-5;
		$("#myListThr li").not(":lt("+x+")").hide();
	});

//Fourth lists
	var size_li = $('#myListFor li').size();
	var x = 7;
	$("#myListFor li:lt("+x+")").show();
	$("#loadMoreFor").click(function(){
		x = (x+5<=size_li)? x+5: size_li;
		$("#myListFor li:lt("+x+")").show();
		$("#myListFor li").addClass('animated bounceInLeft');
	});
	$("#showLessFor").click(function(){
		x = (x-5<0)?8:x-5;
		$("#myListFor li").not(":lt("+x+")").hide();
	});
		
});