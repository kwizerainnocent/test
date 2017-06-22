$('document').ready(function(){
	$('#searchField').keyup(function(){
		var user_search = $('#searchField').val();
		if(user_search.length==0){
			$('#autoFill').hide();
		}else{
		$('#autoFill').show();
		$.ajax({ type: 'GET', url: 'public/search.php', data:{result: user_search}, success: function(info){
				$('#autoFill').html("<ul class='nav'>"+info+"</ul>");
				$('#autoFill').addClass('animated fadeIn');
				$('#error_search').addClass('animated tada');
		}
		});
	}
	});
});