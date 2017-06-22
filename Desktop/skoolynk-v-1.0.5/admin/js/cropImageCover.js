$(document).ready(function(){
               var picture ="";
               var temp;
               var type, name, size;
               $("#uploadimageCover").on("change", function (e){
                  var reader = new FileReader();
                  reader.onload = function(e){
                  temp = e.target.result;
                  $("#previewCover").attr("src",temp);
               }
               reader.readAsDataURL(this.files[0]);
               $("#boxCover").css({"display":"block"});
               type = this.files[0]['type'];
               name = this.files[0]['name'];
               size = this.files[0]['size'];

            });

               $("#boxCover").draggable({containment: "#previewCover"});

               $("#boxCover").resizable({aspectRatio:1.5,containment:"#previewCover"});

               $("#uploadCover").click(function(){
                  var x = $("#boxCover").position().left;
                  var y = $("#boxCover").position().top;
                  var height = $("#boxCover").height();
                  var width = $("#boxCover").width();
                  
                  $.ajax({
                     url:"uploadCover.php",
                     type:"Post",
                     data:{y:y, x:x, height:height, width:width, temp:temp, type:type, name:name, size:size},
                     success:function(data){
                       //alert(data);
                        window.location='schoolProfile.php'
                     }
                  });

               });

            });