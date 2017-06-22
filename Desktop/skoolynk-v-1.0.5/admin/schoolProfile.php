<?php include "includes/header.php"; ?>
<div id="page-wrapper" style="padding:2px;">
	<div class="container-fluid" style="margin:0px; background:none;">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="page-header">
				<div id="free-20"></div>
					Edit School Profile
				</h4>
			</div>
		</div>
<style>
#topwords{border-radius:0px; padding:10px; font-weight:bold; color:#333; margin-bottom:3px;}
#well-edit{background:#fff; border-radius:0px; margin-bottom:2px; box-shadow:none;}
#outter-badge{position:absolute; top:20px; right:0px; left:0px; background:none; color:#fff; font-size:15px; padding:10px 15px; 0px;}
#innerDiv{padding:0px; margin:0px; position:relative; width:130px; height:130px;}
#innerDiv > img{height:130px; border:1px solid #aaa; width:130px; background:rgba(253,253,253,.3); padding:7px;}
#innerDiv > a{border-radius:0px; border-top-left-radius:10px; position:absolute; bottom:0px; right:0px; z-index:5; font-size:12px; line-height:8px;}
#small-menu{position:absolute; bottom:0px; right:0px; left:0px; z-index:10; padding:0px; width:100%; background:none; color:#fff; font-size:15px;}
#schoolname{border-radius:0px;  font-size:14px; font-weight:bold; color:#333; }
#schoolbtn{font-size:12px; font-weight:bold; color:#286090;border-radius:0px; line-height:20px; }
#horizontal{margin-top:3px; margin-bottom:3px;}
#myModal #btn{border-radius:0px; font-size:12px; line-height:20px;}
#btn-add{border-radius:0px; font-size:12px; line-height:12px;}
#btn-cancel{border-radius:0px; font-size:12px; line-height:12px;}
#text{border-radius:0px; box-shadow:none; font-size:12px; color:#777; border:1px solid #f1f1f1;}
</style>
		<style type="text/css">
			#box{position:absolute;
			opacity:.5;
			top:0;
			left: 0;
			width:150px;
			height:150px;
			display:none;
			background:#fff;
		}
			#boxCover{position:absolute;
			opacity:.5;
			top:0;
			left: 0;
			width:330px;
			height:230px;
			display:none;
			background:#fff;
		}
		</style>
	<div>
		<div class="jumbotron" id="top-jumbotron-school" style="background:url(<?php echo $schoolInfo['slider'];?>); background-size:100%;">
					<div class="rows" id="outter-badge">
						<div id="innerDiv">
						<img src="<?php echo $schoolInfo['badge'];?>" alt="skoolynk"/>
						<a href="#myModal" role="button" class="btn btn-default" title="advertise with skoolynk" data-toggle="modal"><i class="fa fa-pencil"></i></a>
						</div>
					</div>
					<div class="rows" id="small-menu">
						<nav id="edit-header" role="navigation">
							<ul class="nav navbar-nav">
							 <li class="active"><a href="#myModal3" role="button" data-toggle="modal">Add HM's word</a></li>
							 <li><a href="#myModal2" role="button" data-toggle="modal"><i class="fa fa-pencil"></i> Edit cover photo</a></li>
							 <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								   Mission..<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
								<li><a href="#myModal5" role="button" data-toggle="modal">Mission & Vision of <?php echo $schoolInfo['name']; ?></a></li>
								</ul>
								</li>
							</ul>
						  <div id="free-0"></div>
						</nav>
					</div>
				</div>		
		<div class="rows" id="well-edit" >
					<h4>Edit School info</h4><hr style="margin:;" />
		<div class="col-md-7" >
					<h6>Edit School Name</h6>
					<form action="edit-school-content.php" method="post">
						<div class="input-group">
						<input type="text" autoforcus="none" name="name" id="schoolname" value="<?php echo $schoolInfo['name']; ?>" class="form-control"/>
						<div id="error" style="color: red; font-weight: bold;"></div>
							<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
							<input type="submit" name="change_name" id="schoolbtn" class="btn btn-info" value="save changes"/>
							</span>
						</div>	
					</form>
					<div id="free-10"></div>
							<h6>Edit School Motto</h6>
							<form action="edit-school-content.php" method="post">
								<div class="input-group">
								<input type="text"  name="motto" autoforcus="none" value="<?php echo $schoolInfo['motto']; ?>" class="form-control" id="schoolname"/>
						<div id="error" style="color: red; font-weight: bold;"></div>
									<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
									<input type="submit" name="change_motto" class="btn btn-default"  id="schoolbtn" value="save changes">
									</span>
								</div>	
							</form>
							<h6>Center number</h6>
							<form action="edit-school-content.php" method="post">
								<div class="input-group">
								<input type="text"  name="centerNo" autoforcus="none" value="<?php echo $schoolInfo['centerNo']; ?>" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
									<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
									<input type="submit" name="change_centerNo" class="btn btn-default" id="schoolbtn"  value="save changes">
									</span>
								</div>	
							</form>
					</div>
					<div class="col-md-5">
						<div class="col-md-12">
							<h6>Ownership</h6>
							<form action="edit-school-content.php" method="post">
								<div class="input-group">
								<select  name="ownership"  class="form-control" id="schoolname">
									<option><?php echo ucfirst($schoolInfo['ownership']); ?></option>
									<option value="government">Govnernment</option>
									<option value="private">Private</option>
								</select>	
						<div id="error" style="color: red; font-weight: bold;"></div>
									<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
									<input type="submit" name="change_ownership" class="btn btn-default" id="schoolbtn"  value="save changes">
									</span>
								</div>	
							</form>
						</div>
						<div class="col-md-12">
							<h6>Boarding / day</h6>
							<form action="edit-school-content.php" method="post">
								<div class="input-group">
								<select  name="boarding" class="form-control" id="schoolname">
									<option><?php echo ucfirst($schoolInfo['boarding']); ?></option>
									<option value="day">Day</option>
									<option value="boarding">Boarding</option>
									<option value="Mixed">Mixed</option>
								</select>
						<div id="error" style="color: red; font-weight: bold;"></div>
									<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
									<input type="submit" name="change_boarding" class="btn btn-default" id="schoolbtn"  value="save changes">
									</span>
								</div>	
							</form>
						</div>
						<div class="col-md-12">
							<h6>P.O BOX</h6>
							<form action="edit-school-content.php" method="post">
								<div class="input-group">
								<input type="text"  name="pobox" value="<?php echo ucfirst($schoolInfo['pobox']); ?>" autoforcus="none" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
									<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
									<input type="submit" name="change_pobox" class="btn btn-default" id="schoolbtn"  value="save changes">
									</span>
								</div>	
							</form>
						</div>
					</div>
		</div>
		<div id="free-10"></div>
		<div class="well" id="well-edit" style="background: #f1f1f1; border-radius:6px;">
					<h4>School Contacts and Location</h4>
					<div class="row">
					<div class="col-md-6">
						<h6>CONTACT INFO</h6><hr  id="horizontal"/>
						<h6>Email</h6>
						<form action="edit-school-content.php" method="post">
							<div class="input-group">
								<input type="text"  autoforcus="none" value="<?php echo ucfirst($schoolInfo['email']); ?>" name="email" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
								<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
								<input type="submit" name="change_email" class="btn btn-info" id="schoolbtn"  value="save changes"/>
								</span>
							</div>	
						</form><br/>
						<h6>Phone</h6>
						<form action="edit-school-content.php" method="post">
							<div class="input-group">
								<input type="text"  autoforcus="none" value="<?php echo ucfirst($schoolInfo['phone']); ?>" name="phone" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
								<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
								<input type="submit" name="change_phone" class="btn btn-info" id="schoolbtn"  value="save changes"/>
								</span>
							</div>	
						</form><br/>
						<h6>Website</h6>
						<form action="edit-school-content.php" method="post">
						<div class="input-group">
						<input type="text"  autoforcus="none" value="<?php echo ucfirst($schoolInfo['website']); ?>" name="website" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
							<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
							<input type="submit" name="change_website" class="btn btn-info" id="schoolbtn"  value="save changes"/>
							</span>
						</div>	
					</form><br/>
					</div>
					<div class="col-md-6">
						<h6>LOCATION INFO</h6><hr style="margin-top:3px; margin-bottom:3px;"/>
						<h6>District</h6>
						<form action="edit-school-content.php" method="post">
							<div class="input-group">
								<input type="text"  autoforcus="none" value="<?php echo ucfirst($schoolInfo['district']); ?>" name="district" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
								<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
								<input type="submit" name="change_district" class="btn btn-info" id="schoolbtn"  value="save changes"/>
								</span>
							</div>	
						</form><br/>
						<h6>Address</h6>
						<form action="edit-school-content.php" method="post">
							<div class="input-group">
								<input type="text"  value="<?php echo ucfirst($schoolInfo['location']); ?>" autoforcus="none" name="location" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
								<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
								<input type="submit" name="change_address" class="btn btn-info" id="schoolbtn"  value="save changes"/>
								</span>
							</div>	
						</form>
						<br/>
						<h6>co-ordinates for school location </h6>
						<form action="edit-school-content.php" method="post">
							<div class="input-group">
								<input type="text"  autoforcus="none" disabled name="cordinates" class="form-control" id="schoolname" />
						<div id="error" style="color: red; font-weight: bold;"></div>
								<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
								<input type="submit" name="cordinates" class="btn btn-info" id="schoolbtn"  value="save changes"/>
								</span>
							</div>	
						</form>
						<br/>
					</div>
					</div>
				</div>
		<div class="well" id="well-edit">
			<h4>Religious background and School gender</h4>
				<div class="row">
					<div class="col-md-6">
						<h6>Religion</h6>
						<form action="edit-school-content.php" method="post">
							<div class="input-group">
									<select name="religion" class="form-control" style="border-radius:0px;">
										<option ><?php echo ucfirst($schoolInfo['religion']); ?></option>
										<option value="Anglican">Anglican</option>
										<option value="Seventh day ads">Seventh day ads</option>
										<option value="Muslim">Muslim</option>
										<option value="Catholic">Catholic</option>
										<option value="All Religions">All Religions</option>
									</select>
						<div id="error" style="color: red; font-weight: bold;"></div>
									<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
										<input type="submit" name="change_religion" class="btn btn-info" id="schoolbtn"  value="save changes"/>
									</span>
							</div>	
						</form>
						<br/>
					</div>
					<div class="col-md-6">
						<h6>Gender  School</h6>
						<form action="edit-school-content.php" method="post">	
							<div class="input-group">
								<select name="gender" class="form-control" style="border-radius:0px;">
										<option ><?php echo ucfirst($schoolInfo['gender']); ?></option>
										<option value="mixed">Mixed</option>
										<option value="Boys"> Boys </option>
										<option value="Girls">Girls</option>
								</select>
						<div id="error" style="color: red; font-weight: bold;"></div>
								<span class="input-group-btn">
							<div class="mdl-spinner mdl-js-spinner is-active" style="display: none;" id="spinner"></div>
								<input type="submit" name="change_gender" class="btn btn-info" id="schoolbtn"  value="save changes"/>
								</span>
							</div>
						</form>
					</div>
				</div>
	</div>	
	<div style="color:#999; "><hr/>&copy Copyright skoolynk 2016 Developed by XAEXIA<div id="free-20"></div></div>
	</div>
	

<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="color:royalblue;"><img src="../images/skoolynk.png" style="height:20px;" alt="skoolynk ads"/></h4>
            </div>
            <div class="modal-body">
	<img class="img-responsive" src="<?php echo $schoolInfo['slider'];?>" width="100%" alt=""/>
	 <form method="post" enctype="multipart/form-data">
         <div class="modal-body">
		<h5 style="color:#286090; font-weight:bold;">Edit The Seeta high school cover photo</h5>
         <div class="rows">
         	<div class="col-md-12" id="tempImgCover" style="position:relative; padding:0px;">
         		<img id="previewCover">
         		<div id="boxCover"></div>
         	</div>
         	<div id="free-10"></div>
         </div>


		<input type="file" name="file" id="uploadimageCover"/><br/>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:1px; line-height:12px; font-size:12px;">cancel</button>          
              <button type="button" class="btn btn-primary" id="uploadCover" style="border-radius:1px; line-height:12px; font-size:12px;">Upload</button>
         </div>
	 </form>

				<br/>
            </div>
            <div class="modal-footer">
                <h6 style="color:#888; font-size:11px;">&copy skoolynk 2015 All rights reserved</h6>
            </div>
        </div>
    </div>
</div>
<div id="myModal3" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="color:royalblue;"><img src="../images/skoolynk.png" style="height:20px;" alt="skoolynk ads"/></h4>
            </div>
            <div class="modal-body">
            <h6><b>A WORD FROM THE HEAD TEACHER.</b></h6>
			<form action="edit-school-content.php" method="post">
			<input type="text" name="heading" placeholder="enter Heading" class="form-control" style="border-radius:0; box-shadow: none; background:#f8f8f8; margin-bottom: 10px; font-size:12px;"/>
                <textarea class="form-control" name="word" rows="12" id="text" placeholder="Type HeadTeacher's message here..."></textarea><br/>
                    <input type="submit" name="addword" value="Add head master's word" id="btn-add" class="btn btn-success"/>
                    <button class="btn btn-info" data-dismiss="modal" id="btn-cancel">cancel</button>
            </form>
            <br style="clear:both;"/>
            </div>
            <div class="modal-footer">
                <h6 style="color:#888; font-size:11px;">&copy skoolynk 2015 All rights reserved</h6>
            </div>
        </div>
    </div>
</div>
<div id="myModal5" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="color:royalblue;"><img src="../images/skoolynk.png" style="height:20px;" alt="skoolynk ads"/></h4>
            </div>
            <div class="modal-body">
            <h5><b><?php echo $schoolInfo['name']; ?>'s vision and mission</b></h5>
			<form action="edit-school-content.php"  method="post">
	                  <label>vision </label><br/><textarea name='vision' class='form-control' rows="3" style="border-radius: 0px;font-size: 12px; color:green; box-shadow: none;"><?php echo $schoolInfo['vision']; ?></textarea><br/>
					  <label>Mission </label><br/><textarea name='mission' class='form-control' rows="3" style="border-radius: 0px; box-shadow: none; font-size: 12px; color:green;"><?php echo $schoolInfo['mission']; ?></textarea><br/>
                <input type="submit" name="change_vm" value="Save changes" class="btn btn-success" id="btn-add" />
                <button class="btn btn-info" data-dismiss="modal" id="btn-cancel">cancel</button>
            </form>
            </div>
            <div class="modal-footer">
                <h6 style="color:#888; font-size:11px;">&copy skoolynk 2015 All rights reserved</h6>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="border-radius:2px;">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">x
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Upload your profile picture
            </h4>
         </div>
	 <form method="post" enctype="multipart/form-data">
         <div class="modal-body">
         <div class="rows">
         	<div class="col-md-7" id="tempImg" style="position:relative; padding:0px;">
         		<img id="preview">
         		<div id="box"></div>
         	</div>
         	<div class="col-md-5"></div>
         	<div id="free-10"></div>
         </div>


		<input type="file" name="file" id="uploadimage"/><br/>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:1px; line-height:12px; font-size:12px;">cancel</button>          
              <button type="button" class="btn btn-primary" id="upload" style="border-radius:1px; line-height:12px; font-size:12px;">Upload</button>
         </div>
	 </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>
	</div>
</div>    
</div>
    <script src="js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/material.min.js"></script>
    <script type="text/javascript" src="js/activeLink.js"></script>
	<script type="text/javascript" src="js/cropImage.js"></script>
	<script type="text/javascript" src="js/cropImageCover.js"></script>
    <script type="text/javascript">
    	$("#addStaff").click(function(){
    		$("#addThem").toggle();
    		$("#addThem").addClass('animated bounceIn');
    	});

    	$('document').ready(function(){
    		$('form').on('submit', function(e){
    			$(this).find('#schoolbtn').hide();
    			$(this).find('#spinner').show();
    			var thisForm = $(this);
    			var formData = $(this).serialize();
    			var arrayData = formData.split("=");
    			var name = arrayData[0];
    			var value = arrayData[1];
     			$.ajax({url:"edit-school-content.php", type:"post",dataType:"text", data:{"name":name, "value":value},success: function(back){
     				if(back){
    			thisForm.find('#spinner').hide();
    			thisForm.find('#schoolbtn').show();
    			thisForm.find('#error').addClass('animated bounceIn');
    			thisForm.find('#error').html('your changes were saved');
    			thisForm.find('#error').delay(3000).fadeOut();
    			}else{
    				alert(back);
    			}
    		}
    			});   			
    			e.preventDefault();

    		});
    	});
    </script>
</body>
</html>
