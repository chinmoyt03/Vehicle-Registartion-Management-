<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		echo $sql="UPDATE city SET city='$_POST[city]', stateid=
		'$_POST[stateid]',citycode='$_POST[citycode]',discription='$_POST[discription]',status='$_POST[status]' WHERE cityid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('City Records updated successfully');</script>";
			echo "<script>window.location='city.php';</script>";
		}		
	}
	else
	{
		$sql="INSERT INTO city (city, stateid, citycode,discription,status)VALUES 
		('$_POST[city]','$_POST[stateid]','$_POST[citycode]','$_POST[discription]',
		'$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('City record inserted successfully');</script>";
			echo "<script>window.location='city.php';</script>";
		}
	}
}
//Insert statement ends here
//Delete statement starts here
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM city WHERE cityid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('City record deleted successfully');</script>";
		echo "<script>window.location='city.php';</script>";
	}
}
//Delete statement ends here
//Edit statement starts here
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM city WHERE cityid='$_GET[editid]'";
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
            <li data-blast="bgColor">City</li>
            <li data-blast="bgColor">View City</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/register.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color">City Registration </h5>
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">City:<span class="classvalidate" id="idcity"></span></label>
	  <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="<?php echo $rsedit['city']; ?>">
    </div>
	<div class="form-group">
      <label for="email">State:<span class="classvalidate" id="idstateid"></span></label>
    <select name="stateid" id="stateid" class="form-control" >
		<option value=''>Select state</option>
		<?php
			$sqlstateid ="SELECT * FROM state WHERE status='Active'";
			$qsqlstateid = mysqli_query($con,$sqlstateid);
			while($rsstateid = mysqli_fetch_array($qsqlstateid) )
			{
				if($rsstateid['stateid'] == $rsedit['stateid'])
				{
				echo "<option value='$rsstateid[stateid]' selected>$rsstateid[state]</option>";
				}
				else
				{
				echo "<option value='$rsstateid[stateid]'>$rsstateid[state]</option>";
				}
			}
		?>
	</select>
    </div>
    <div class="form-group">
      <label for="pwd">City Code:<span class="classvalidate" id="idcitycode"></span></label>
      <input type="text" class="form-control" id="citycode" placeholder="Enter CityCode" name="citycode" value="<?php echo $rsedit['citycode']; ?>">
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
				echo "<option value='$val' >$val</option>";
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
                  <h5><center> City View Panel</h5></center> 
                     <table id="myTable"  class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>City</th>
							<th>State</th>
							<th>City Code</th>
							<th>Discription</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "SELECT city.*,state.state FROM city LEFT JOIN state ON city.stateid =state.stateid";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[city]</td>
							<td>$rs[state]</td>
							<td>$rs[citycode]</td>
							<td>$rs[discription]</td>
							<td>$rs[status]</td>
							<td><a href='city.php?editid=$rs[0]' class='btn btn-info'>Edit</a>  | <a href='city.php?delid=$rs[0]'  class='btn btn-danger' onclick='return confirmdel()'>Delete</a></td>
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
	 
	if(!document.getElementById("city").value.match(alphaspaceExp))
	{
		document.getElementById("idcity").innerHTML="City should contain alphabets and characters...";
		validateform="false";
	}
		
	if(document.getElementById("city").value=="")
	{
		document.getElementById("idcity").innerHTML="City Should not be empty...";
		validateform="false";
	}
		
	
		
	if(document.getElementById("stateid").value=="")
	{
		document.getElementById("idstateid").innerHTML="State Should not be empty...";
		validateform="false";
	}
	
	
	
	if(!document.getElementById("citycode").value.match(numericExpression))
	{
		document.getElementById("idcitycode").innerHTML="citycode Should  be in numbers...";
		validateform="false";
	}
		
	if(document.getElementById("citycode").value=="")
	{
		document.getElementById("idcitycode").innerHTML="citycode Should not be empty...";
		validateform="false";
	}
	
	
	if(document.getElementById("discription").value=="")
	{
		document.getElementById("iddiscription").innerHTML="Discription Should not be empty...";
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