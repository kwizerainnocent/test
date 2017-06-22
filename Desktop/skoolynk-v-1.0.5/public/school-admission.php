<?php include("includes/header.php");?>
<div class="rows" id="main-rows">
<div class="col-md-3 col-sm-3 col-xs-12" id="general-col-md-d-3">
	<?php include("includes/side.php");?>
</div>
<div class="col-md-9 col-sm-9 col-xs-12" id="general-col-md-d-9">
<div class="thumbnail" id="toned-header"><h4>Admissions at <?php echo ucfirst($rows['name']); ?></h4></div>
<div class="thumbnail" id="white-thumbnail">
   <div class="row">
      <div class="col-md-6" id="admissions-left">
		<h5><?php  echo strtoupper($rows['name']); ?></h5><hr/>
		<p><img src="<?php echo $rows['badge'];?>"/></p>
		<h1>Online Admissions</h1>
		<h6>Fill in the form to get admitted to <br/><?php echo ucfirst($rows['name']); ?></h6>
		<div id="free-30"></div>

			<div style="text-align:left;">
						<h5>Download your application form here and apply mannually:</h5>
						<a href="/appAndRules/<?php echo $application;?>" download="<?php echo $application;?>"><i class="fa fa-file" style="font-size:30px;"></i> click here to download</a><hr/>
						<h5>Download rules and regulations: </h5>
						<a href="/appAndRules/<?php echo $rules;?>" download="<?php echo $rules;?>"><i class="fa fa-file" style="font-size:30px;"></i>  click here to download</a><hr/>
					    <p style="text-align:center;"> 
							<h5><center>No application forms added yet</center></h5>
							<center><a class="btn btn-info" href="school-admission.php?skoolid=<?php echo $rows['id']; ?>&send=<?php echo $rows['id']; ?>">Please request form here</a></center>
						</p>
		    </div>
	  </div>
 <div class="col-md-6" id="admissions-right">
    <div class="thumbnail">
					<form action="" method="post"> 
                    <p><b>Personal Information:</b></p>
					<label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Enter full name" />
					<div id="free-10"></div>
					<label>Gender</label>
					<div class="rows">
					<div class="col-md-3" style="padding:0px;">
						<input type="radio" name="gender" value="male"/> Male 
					</div>
					<div class="col-md-9" style="padding:0px;">
						<input type="radio" name="gender" value="female"/> Female
					</div>
					</div>
					<div id="free-10"></div>
					<label>Phone</label>
                    <input type="text" name="telphone" class="form-control" placeholder="Telephone Number"/><br/>
					<label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email address"/><br/>
                    <p><b>Academic Information:</b></p>
					<label>Former school</label>
					<select name="former_school_select" class="form-control"  >
					<option> choose your school</option>
					<?php 
						$get = mysql_query("SELECT name FROM schools WHERE activated='yes' order by name asc");
						while($school = mysql_fetch_array($get)){ echo "<option  value='{$school['name']}'>{$school['name']}</option>";}
					?></select>
                    <input type="text" name="former_school" class="form-control" placeholder="if not in the list please write here"/>
					<br/>
					<label>Joining class</label>
                    <select name="class" class="form-control" >
						<option> choose class</option>
						<option value="1"> senior 1</option>
						<option value="2"> senior 2</option>
						<option value="3"> senior 3</option>
						<option value="4"> senior 4</option>
						<option value="5"> senior 5</option>
						<option value="6"> senior 6</option>
				    </select><br/>
					<label>Result attained</label>
                    <input type="text" name="result" class="form-control" placeholder="Result attained" /><br/>
						<p>By submiting this form, it certifies that you have agreed to our <br/><a href="terms-and-conditions.html" title="terms and policies">Terms and policies</a><p>
				   <input type="submit" name="apply" value="Submit Application" class="btn btn-info"/>
                </form>
				</div>
                </div>
				
				<?php
					if(isset($_POST['apply'])){
						$full_name = $_POST['full_name'];
						$gender = $_POST['gender'];
						$email = $_POST['email'];
						$telphone = $_POST['telphone'];
						if(empty($_POST['former_school'])){
							$school=$_POST['former_school_select'];
						}else{
							$school= $_POST['former_school'];
						}
						$class = $_POST['class'];
						$result = $_POST['result'];
						$school_id = $rows['id'];
						
						$send_application = mysql_query("insert into admission(school_id, name, class, results,gender,former_school,phone,email)
						                                 values('$school_id', '$full_name','$class','$result','$gender','$school','$telphone','$email')");
						if(!$send_application){echo mysql_error();}else{
							header("Location:school-admission.php?skoolid={$school_id}");
							exit();
						}
					}
					if(isset($_GET['send'])){
						$id = $_GET['send'];
						$date = time();
						$query = mysql_query("INSERT INTO notification(school_id, message, date) VALUES('$id', 'Please users are requesting you to provide your application form' ,'$date')");
						if($query){header("Location: school-admission.php?skoolid={$id}"); exit();}
					}
				?>
            </div>
		
</div>
</div>
</div>
</div>
</div>
<?php include "includes/footer.php"; ?>