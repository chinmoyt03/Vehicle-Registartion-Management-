<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	$sql="INSERT INTO enroller (name, emailid, password,contactno,status)VALUES ('$_POST[name]','$_POST[emailid]','$_POST[password]','$_POST[contactno]','Active')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Enroller Registration done successfully');</script>";
		echo "<script>window.location='register.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
//Insert statement ends here


?>
      <!--banner -->
      <!-- Slideshow 4 -->
      <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
            <li style="background-color:black;height:150px;">

            </li>
			</ul>
        </div>
        <!-- This is here just to demonstrate the callbacks -->
        <!-- <ul class="events">
          <li>Example 4 callback events</li>
          </ul>-->
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //banner -->
    <!--about-->
	<section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <!--Horizontal Tab-->
        <div id="horizontalTab">
          <ul class="resp-tabs-list justify-content-center">
            <li data-blast="bgColor">Register</li>
            <li data-blast="bgColor">Login</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/register.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color"> Registration Panel</h5>
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">Name:<span class="classvalidate" id="idname"></span></label>
      <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
    </div>
	<div class="form-group">
      <label for="email">Email ID:<span class="classvalidate" id="idemailid"></span></label>
      <input type="text" class="form-control" placeholder="Enter Email ID" id="emailid" name="emailid">
    </div>
    <div class="form-group">
      <label for="pwd">Password:<span class="classvalidate" id="idpassword"></span></label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:<span class="classvalidate" id="idcpassword"></span></label>
      <input type="password" class="form-control" id="cpassword" placeholder="Enter Cofirm password" name="cpassword">
    </div>
    <div class="form-group">
      <label for="pwd">Contact Number:<span class="classvalidate" id="idcontactno"></span></label>
      <input type="text" class="form-control" id="contactno" placeholder="Enter Contact number" name="contactno">
    </div>
	
    <button type="submit" name="submit" class="btn btn-info">Click here to Register</button>
  </form>
					
					</p>
                  </div>
                </div>
              </div>
            </div>
            
			<div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/login.jpg" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color"> LOGIN Panel</h5>
                    <p>
<form onsubmit="return validateform()">
	<div class="form-group">
      <label for="email">Email ID:</label>
      <input type="text" class="form-control" placeholder="Enter Email ID" id="emailid" name="emailid">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
	<button type="submit" name="btnlogin" class="btn btn-info">LOGIN</button>
</form>
					
					</p>
                   
                  </div>
                </div>
              </div>
            </div>
            
			</div>
        </div>
      </div>
    </section>
    <!--//about-->

	

<?php
include("footer.php");
?>
<script>
function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaspaceExp = /^[a-zA-Z\s]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
	var validateform="true";
	$( ".classvalidate" ).empty();
	
	if(!document.getElementById("name").value.match(alphaspaceExp))
	{
		document.getElementById("idname").innerHTML="Name should contain alphabets and characters...";
		validateform="false";
	}
		
	if(document.getElementById("name").value=="")
	{
		document.getElementById("idname").innerHTML="Name Should not be empty...";
		validateform="false";
	}
		
	if(!document.getElementById("emailid").value.match(emailExp))
	{
		document.getElementById("idemailid").innerHTML="Entered Email ID is not in a valid format....";
		validateform="false";
	}
		
	if(document.getElementById("emailid").value=="")
	{
		document.getElementById("idemailid").innerHTML="Email ID Should not be empty...";
		validateform="false";
	}
	
	if(document.getElementById("password").value != document.getElementById("cpassword").value)
	{	
		document.getElementById("idpassword").innerHTML="Password and Confirm password not matching...";
		validateform="false";
	}
	
	if(document.getElementById("password").value=="")
	{
		document.getElementById("idpassword").innerHTML="Password Should not be empty...";
		validateform="false";
	}
		
	if(document.getElementById("cpassword").value=="")
	{
		document.getElementById("idcpassword").innerHTML="Confirm password Should not be empty...";
		validateform="false";
	}
	
	if(document.getElementById("password").value.length <6)
	{
		document.getElementById("idpassword").innerHTML="Password Should contain more than 6 characters...";
		validateform="false";
	}
	
	if(document.getElementById("contactno").value=="")
	{
		document.getElementById("idcontactno").innerHTML="Contact number Should not be empty...";
		validateform="false";
	}
	   
	if(document.getElementById("contactno").value.length != 10)
	{
		document.getElementById("idcontactno").innerHTML="Contact number should contain 10 digits...";
		validateform="false";
	}
	if(validateform=="true")
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script> 