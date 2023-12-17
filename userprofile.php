<?php
include("header.php");
//Insert statement starts
if(isset($_POST['submit']))
{
		$sql="UPDATE enroller SET  name='$_POST[name]',emailid='$_POST[emailid]',contactno='$_POST[contactno]' WHERE enrollerid='$_SESSION[enrollerid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('User Profile updated successfully');</script>";
		}
}
//Insert statement ends
//Edit statement starts
if(isset($_SESSION['enrollerid']))
{
	$sqledit ="SELECT * FROM enroller WHERE enrollerid='$_SESSION[enrollerid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//Edit statement ends

?>

      <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
            <li style="background-color:black;height:150px;">

            </li>
			</ul>
        </div>

        <div class="clearfix"></div>
      </div>
    </div>

	<section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">

        <div id="horizontalTab">
          <ul class="resp-tabs-list justify-content-center">
            <li data-blast="bgColor">MY PROFILE</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/register.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <p>
					
<form action="" method="post">
    <div class="form-group">
      <label for="email">Full name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="<?php echo $rsedit['name']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Email ID:</label>
      <input type="text" class="form-control" placeholder="Enter Email ID" id="emailid" name="emailid" value="<?php echo $rsedit['emailid']; ?>">
    </div>
    
    <div class="form-group">
      <label for="pwd">Contact Number:</label>
      <input type="text" class="form-control" id="contactno" placeholder="Enter Contact number" name="contactno" value="<?php echo $rsedit['contactno']; ?>" >
    </div>
	
    <button type="submit" name="submit" class="btn btn-info">Submit</button>
  </form>
					
					</p>
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