<?php
include("header.php");
if(isset($_SESSION["enrollerid"]))
{
	echo "<script>window.location='userpanel.php';</script>";
}
if(isset($_POST["btnlogin"]))
{
	$sql = "SELECT * FROM enroller WHERE emailid='$_POST[emailid]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rs= mysqli_fetch_array($qsql);
		$_SESSION["enrollerid"] = $rs["enrollerid"];
		echo "<script>alert('Login Successfull...');</script>";
		echo "<script>window.location='userpanel.php';</script>";	
	}
	else
	{
		echo "<script>alert('Failed to Login');</script>";
	}
}
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
            <li data-blast="bgColor">LOGIN here</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/login.jpg" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <p>
<form method="post" action="" onsubmit="return validateform()">
	<div class="form-group">
      <label for="email">Email ID:<span class="classvalidate" id="idemailid"></span></label>
      <input type="text" class="form-control" placeholder="Enter Email ID" id="emailid" name="emailid">
    </div>
    <div class="form-group">
      <label for="pwd">Password:<span class="classvalidate" id="idpassword"></span></label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
	<button type="submit" name="btnlogin" class="btn btn-info">SUBMIT</button>
</form>
				  <hr>
				  New User !! Register Now<br>
				  <a href="userregister.php"><button type="button" name="loginbutton" class="btn btn-success">Click here to register </button></a>
				  <hr>
				  ADMIN!! Click here<br>
				  <a href="emplogin.php"><button type="button" name="loginbutton" class="btn btn-danger">ADMIN login </button></a>
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
	
	if(document.getElementById("emailid").value=="")
	{
		document.getElementById("idemailid").innerHTML="Email ID Should not be empty...";
		validateform="false";
	}
	
	
	if(document.getElementById("password").value=="")
	{
		document.getElementById("idpassword").innerHTML="Password Should not be empty...";
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