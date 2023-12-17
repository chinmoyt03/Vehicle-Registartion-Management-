<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql="UPDATE state SET state='$_POST[state]', statecode='$_POST[statecode]',
		discription='$_POST[discription]',status='$_POST[status]' WHERE stateid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('state updated successfully');</script>";
			echo "<script>window.location='state.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}		
	}
	else
	{
		
		$sql="INSERT INTO state (state, statecode, discription,status)VALUES 
		('$_POST[state]','$_POST[statecode]','$_POST[discription]',
		'$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Registration done successfully');</script>";
			echo "<script>window.location='state.php';</script>";
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
	$sql ="DELETE FROM state WHERE stateid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('State record deleted successfully');</script>";
		echo "<script>window.location='state.php';</script>";
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
	$sqledit ="SELECT * FROM state WHERE stateid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//Edit statement ends here
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
            <li data-blast="bgColor">State</li>
            <li data-blast="bgColor">View State</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/register.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color">State Registration </h5>
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">State:<span class="classvalidate" id="idstate"></span></label>
	  <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" value="<?php echo $rsedit['state']; ?>">
    </div>
	<div class="form-group">
      <label for="email">StateCode :<span class="classvalidate" id="idstatecode"></span></label>
     <input type="text" class="form-control" id="statecode" placeholder="Enter StateCode" name="statecode" value="<?php echo $rsedit['statecode']; ?>">
    </div>
    
    <div class="form-group">
      <label for="email">Description:<span class="classvalidate" id="iddiscription"></span></label>
	  <textarea class="form-control" id="discription" placeholder="Enter Discription" name="discription"><?php echo $rsedit['discription']; ?></textarea>
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
				echo "<option value='$val'>$val</option>";
				}
			}
		?>
	  </select>
    </div>
    <button type="submit" name="submit" class="btn btn-info">Click here to Submit</button>
  </form>
					
					</p>
                  </div>
                </div>
              </div>
            </div>
            
			<div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 about-txt-img">
                 
	 <table border="1" id="myTable"  class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>State</th>
				<th>Statecode</th>
				<th>Discription</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
					$sql = "SELECT * FROM state";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[state]</td>
							<td>$rs[statecode]</td>
							<td>$rs[discription]</td>
							<td>$rs[status]</td>
							<td><a href='state.php?editid=$rs[0]' class='btn btn-info'>Edit</a> 
							<a href='state.php?delid=$rs[0]'  class='btn btn-danger' onclick='return confirmdel()'>Delete</a></td>
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
    </section>
    <!--//about-->

	
	
    <!--footer-->
	<div class="nav-footer py-sm-4 py-3">
      <div class="container-fluid">
        <div class="buttom-nav ">
          <nav class="border-line py-2">
            <ul class="nav justify-content-center">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a href="#about" class="nav-link scroll">About</a>
              </li>
              <li class="nav-item">
                <a href="#service" class="nav-link scroll">Services</a>
              </li>
              <li class="nav-item">
                <a href="#blog" class="nav-link scroll">Blog</a>
              </li>
              <li class="nav-item">
                <a href="#contact" class="nav-link scroll">Contact</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
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
	
	if(document.getElementById("state").value=="")
	{
		document.getElementById("idstate").innerHTML="State Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("discription").value=="")
	{
		document.getElementById("iddiscription").innerHTML="Discription Should not be empty...";
		validateform="false";
	}
	if(!document.getElementById("statecode").value.match(numericExpression))
	{
		document.getElementById("idstatecode").innerHTML="Statecode should contain numbers...";
		validateform="false";
	}
		
	if(document.getElementById("statecode").value=="")
	{
		document.getElementById("idstatecode").innerHTML="Statecode Should not be empty...";
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