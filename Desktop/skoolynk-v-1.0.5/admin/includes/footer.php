    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/activeLink.js"></script>
    <script type="text/javascript" src="js/upload.js"></script>
    <script type="text/javascript">
    	$("#addStaff").click(function(){
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    		$("#addThem").show();
    		$("#addThem").addClass('animated bounceIn').one(animationEnd, function(){
                $('#addThem').removeClass('animated bounceIn'); 
            });
            $('#close').click(function(){
                $('#addThem').addClass('animated bounceOut').one(animationEnd, function(){
                $('#addThem').removeClass('animated bounceOut'); 
                $('#addThem').hide(); 
            });
            });
    	});
    </script>
    <script type="text/javascript">
$('document').ready(function(){



$('input:checkbox').change(function(){
        var letter=0;
        var newletter="";

        if($(this).is(":checked"))
        {
        var sub = $(this).attr("value");
        letter = $('#generated_comb').attr("value");
            if(letter==null||letter=="")
            {
            newletter=sub;
            }
            else
            {
            newletter=letter+""+sub;
            }

        $('#generated_comb').attr("value",newletter);
            if(letter.length==2)
            {
            newletter=newletter+"\/";
            }

        $('#generated_comb').attr("value",newletter);
        if(letter.length==4)
        {
            $.ajax({url:"acadmicsfun.php",type:"post",dataType:"text", data:{"SECONDARY":"set","combination":newletter},
             success: function(info){
            if(info)
            {
                $('#generated_comb').attr("value","");
                $('#status').html("Success");
                $('#combine').append("<li>"+newletter+"</li>");
            }
            }
            });
        }}

});
    $(document).on('click','#topic',function(){
        $('#topic_form').toggle();
        $('#spaned').html("<a href='#' id='hide'>Hide form</a>");
    });
    $(document).on('click','#hide',function(){
        $('#topic_form').toggle();
        $('#spaned').html("<a href='#' id='topic'>Add topic form</a>");
    });


});

</script>
</body>
</html>
''.$xls.''