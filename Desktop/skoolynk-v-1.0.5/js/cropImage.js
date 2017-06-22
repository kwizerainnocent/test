$(document).ready(function(){
         		var picture ="";
         		var temp;
         		var type, name, size;
         		$("#uploadimage").on("change", function (e){
         			var reader = new FileReader();
         			reader.onload = function(e){
         			temp = e.target.result;
         			$("#preview").attr("src",temp);
         		}
         		reader.readAsDataURL(this.files[0]);
         		$("#box").css({"display":"block"});
         		type = this.files[0]['type'];
         		name = this.files[0]['name'];
         		size = this.files[0]['size'];

         	});

         		$("#box").draggable({containment: "#preview"});

         		$("#box").resizable({aspectRatio:1,containment:"#preview"});
         		$("#upload").click(function(){
	         		var x = $("#box").position().left;
	         		var y = $("#box").position().top;
	         		var height = $("#box").height();
	         		var width = $("#box").width();
	         		
	         		$.ajax({
		         		url:"upload.php",
		         		type:"Post",
		         		data:{y:y, x:x, height:height, width:width, temp:temp, type:type, name:name, size:size},
		         		success:function(data){
		         			window.location='student-startup.php'
		         		}
	         		});

         		});

         	});