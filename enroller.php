<?php
include("header.php");
//Delete statement starts here
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM enroller WHERE enrollerid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Enroller record deleted successfully..');</script>";
		echo "<script>window.location='enroller.php';</script>";
	}
}
//Delete statement ends here
//Insert statement starts here
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		echo $sql="UPDATE enroller SET name='$_POST[name]', emailid=
		'$_POST[emailid]',password='$_POST[password]',contactno='$_POST[contactno]',status='$_POST[status]' WHERE enrollerid ='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Enroller Profile updated successfully');</script>";
			echo "<script>window.location='enroller.php';</script>";
		}		
	}
	else
	{
		$sql="INSERT INTO enroller (name, emailid, password,contactno,status)VALUES ('$_POST[name]','$_POST[emailid]','$_POST[password]','$_POST[contactno]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Enroller Registration done successfully');</script>";
			echo "<script>window.location='enroller.php';</script>";
		}
	}
}
//Insert statement ends here
//Edit statement starts here
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM enroller WHERE enrollerid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//Edit statement ends here
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
            <li data-blast="bgColor">Add user</li>
            <li data-blast="bgColor">View existing users</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/login.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">Full Name: <span class="classvalidate" id="idname"></span></label>
      <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="<?php echo $rsedit['name']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Email ID: <span class="classvalidate" id="idemailid"></span></label>
      <input type="text" class="form-control" placeholder="Enter Email ID" id="emailid" name="emailid" value="<?php echo $rsedit['emailid']; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password: <span class="classvalidate" id="idpassword"></span></label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $rsedit['password']; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password: <span class="classvalidate" id="idcpassword"></span></label>
      <input type="password" class="form-control" id="cpassword" placeholder="Enter Cofirm password" name="cpassword" value="<?php echo $rsedit['password']; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Contact Number: <span class="classvalidate" id="idcontactno"></span></label>
      <input type="text" class="form-control" id="contactno" placeholder="Enter Contact number" name="contactno" value="<?php echo $rsedit['contactno']; ?>">
    </div>
	
	<div class="form-group">
      <label for="email">Status: <span class="classvalidate" id="idstatus"></span></label>
      <select id="status" name="status" class="form-control">
		<option value="">Select status</option>
		<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				if($val == $rsedit['status'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val' >$val</option>";
				}
			}
		?>
	  </select>
    </div>
    <button type="submit" name="submit" class="btn btn-info">Submit</button>
  </form>
					
					</p>
                  </div>
                </div>
              </div>
            </div>
            
			<div class="tab2">
              <div class="row mt-lg-4 mt-3">
				<div class="col-md-12 latest-list">
                 
				 <h5><center> View Enroller  Records</h5></center> 
                     <table id="myTable"  class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Owner name</th>
							<th>Email ID</th>
							<th>Contact No.</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "SELECT * FROM enroller";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[name]</td>
							<td>$rs[emailid]</td>
							<td>$rs[contactno]</td>
							<td>$rs[status]</td>
							<td><a href='enroller.php?editid=$rs[0]' class='btn btn-info'>Edit</a>  | <a href='enroller.php?delid=$rs[0]'  class='btn btn-danger' onclick='return confirmdel()'>Delete</a></td>
						</tr>";
					}
					?>
					</tbody>
				  </table>
                </div>
              </div>
                </div>
              </div>
            </div>
			</div>
        </div>
      </div>
    </section>

<?php
include("footer.php");
?>
 <script>
 $(document).ready( function () {
    $('#myTable').DataTable();
 } );
</script>
<script>
		function confirmdel()
		{
			if(confirm("Are you sure want to delete this record?") == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	</script> 
	
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
	
    if(document.getElementById("contactno").value.match(alphaspaceExp))
	{
		document.getElementById("idcontactno").innerHTML="Contact number  should not  contain alphabets....";
		validateform="false";
	}	
	if(document.getElementById("contactno").value.length != 10)
	{
		document.getElementById("idcontactno").innerHTML="Contact number should contain 10 digits...";
		validateform="false";
	}
	if(document.getElementById("status").value=="")
	{
		document.getElementById("idstatus").innerHTML="Status Should not be empty...";
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
	
