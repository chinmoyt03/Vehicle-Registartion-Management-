<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		echo $sql="UPDATE employee SET emptype='$_POST[emptype]', branchid=
		'$_POST[branchid]',empname='$_POST[empname]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[status]' WHERE empid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('employee updated successfully');</script>";
			echo "<script>window.location='employee.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}		
	}
	else
	{
		$sql="INSERT INTO employee (emptype, branchid, empname,loginid,password,status)VALUES ('$_POST[emptype]','$_POST[branchid]','$_POST[empname]','$_POST[loginid]','$_POST[password]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Registration done successfully');</script>";
			echo "<script>window.location='employee.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
//Insert statement ends here
//Delete statement starts here
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM employee WHERE empid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('employee record deleted successfully');</script>";
		echo "<script>window.location='employee.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
//Delete statement ends here
//Edit statement starts here
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM employee WHERE empid='$_GET[editid]'";
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
            <li data-blast="bgColor">Add Employee</li>
            <li data-blast="bgColor">View Employee</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/register.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color">Add Employee</h5>
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">Employee Type: <span class="classvalidate" id="idemptype"></span></label>
      <select id="emptype" name="emptype" class="form-control">
		<option value="">Select Employee Type</option>
		<?php
			$arr = array("Employee","Admin");
			foreach($arr as $val)
			{
				if($val == $rsedit['emptype'])
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
	<div class="form-group">
      <label for="email">District:<span class="classvalidate" id="idbranchid"></span></label>
     <select id="branchid" name="branchid" class="form-control">
		<option value="">Select District</option>
		<?php
			$sqlbranchid ="SELECT * FROM branch WHERE status='Active'";
			$qsqlbranchid = mysqli_query($con,$sqlbranchid);
			while($rsbranchid= mysqli_fetch_array($qsqlbranchid) )
			{
				if($rsbranchid['branchid'] == $rsedit['branchid'])
				{
				echo "<option value='$rsbranchid[branchid]' selected>$rsbranchid[branchname]</option>";
				}
				else
				{
				echo "<option value='$rsbranchid[branchid]'>$rsbranchid[branchname]</option>";
				}
			}
		?>
	  </select>
    </div>
    <div class="form-group">
      <label for="pwd">Employee Name:<span class="classvalidate" id="idempname"></span></label>
      <input type="text" class="form-control" id="empname" placeholder="Enter EmpName" name="empname" value="<?php echo $rsedit['empname']; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Login ID:<span class="classvalidate" id="idloginid"></span></label>
      <input type="text" class="form-control" id="loginid" placeholder="Enter LoginId" name="loginid" value="<?php echo $rsedit['loginid']; ?>">
    </div>
	
    <div class="form-group">
      <label for="pwd">Password:<span class="classvalidate" id="idpassword"></span></label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $rsedit['password']; ?>">
    </div>
	
    <div class="form-group">
      <label for="pwd">Confirm Password:<span class="classvalidate" id="idcpassword"></span></label>
      <input type="password" class="form-control" id="cpassword" placeholder="Enter password" name="cpassword" value="<?php echo $rsedit['password']; ?>">
    </div>
	
	<div class="form-group">
      <label for="email">Status:<span class="classvalidate" id="idstatus"></span></label>
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
    <button type="submit" name="submit" class="btn btn-info">Click here to Register</button>
  </form>
					
					</p>
                  </div>
                </div>
              </div>
            </div>
            
			<div class="tab2">
              <div class="row mt-lg-4 mt-3">
				<div class="col-md-12 latest-list">
                 
				 <h5><center> Employee View Panel</h5></center> 
                     <table id="myTable"  class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Employee Type</th>
							<th>Branch</th>
							<th>Employee Name</th>
							<th>Login ID</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "SELECT employee.*,branch.branchname FROM employee LEFT JOIN branch ON employee.branchid =branch.branchid";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[emptype]</td>
							<td>$rs[branchname]</td>
							<td>$rs[empname]</td>
							<td>$rs[loginid]</td>
							<td>$rs[status]</td>
							<td><a href='employee.php?editid=$rs[0]' class='btn btn-info'>Edit</a>  | <a href='employee.php?delid=$rs[0]'  class='btn btn-danger' onclick='return confirmdel()'>Delete</a></td>
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
    <!--//about-->

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
	 
	
	if(document.getElementById("emptype").value=="")
	{
		document.getElementById("idemptype").innerHTML="Employee Type Should not be empty...";
		validateform="false";
	}
	
	if(document.getElementById("branchid").value=="")
	{
		document.getElementById("idbranchid").innerHTML="Branch Id Should not be empty...";
		validateform="false";
	}
	if(!document.getElementById("empname").value.match(alphaspaceExp))
	{
		document.getElementById("idempname").innerHTML="Employee Name should contain alphabets and characters...";
		validateform="false";
	}
		
	if(document.getElementById("empname").value=="")
	{
		document.getElementById("idempname").innerHTML="Employee Name Should not be empty...";
		validateform="false";
	}
		
	
		
	if(document.getElementById("loginid").value=="")
	{
		document.getElementById("idloginid").innerHTML="Login ID Should not be empty...";
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
	
