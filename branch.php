<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql="UPDATE branch SET branchname='$_POST[branchname]', branchaddress='$_POST[branchaddress]',
		cityid='$_POST[cityid]',pin='$_POST[pin]',stateid='$_POST[stateid]',status='$_POST[status]' WHERE branchid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('RTO office record updated successfully');</script>";
			echo "<script>window.location='branch.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}		
	}
	else
	{
		$sql="INSERT INTO branch (branchname, branchaddress, cityid,pin,stateid,status)VALUES ('$_POST[branchname]','$_POST[branchaddress]','$_POST[cityid]','$_POST[pin]','$_POST[stateid]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('RTO office record inserted successfully');</script>";
			echo "<script>window.location='branch.php';</script>";
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
	$sql ="DELETE FROM branch WHERE branchid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Branch record deleted successfully');</script>";
		echo "<script>window.location='branch.php';</script>";
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
	$sqledit ="SELECT * FROM branch WHERE branchid='$_GET[editid]'";
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
            <li data-blast="bgColor">Add new Office  </li>
            <li data-blast="bgColor">View Office</li>
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
					
					<form action="" method="post"  onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">Branch Name:<span class="classvalidate" id="idbranchname"></span></label>
      <input type="text" class="form-control" placeholder="Enter BranchName" id="branchname" name="branchname" value="<?php echo $rsedit['branchname']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Branch Address:<span class="classvalidate" id="idbranchaddress"></span></label>
	 <textarea name="branchaddress" id="branchaddress" class="form-control" placeholder="Enter Branch Address"><?php echo $rsedit['branchaddress']; ?></textarea>
    </div>
	<div class="form-group">
      <label for="email">State:<span class="classvalidate" id="idstateid"></span></label>
    <select name="stateid" id="stateid" class="form-control"  onchange="loadcity(this.value)">
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
	<div class="form-group" id="ajaxcity">
      <label for="email">City:<span class="classvalidate" id="idcityid"></span></label>
		<select name="cityid" id="cityid" class="form-control" >
			<option value=''>Select City</option>
			<?php
				$sqlstateid ="SELECT * FROM city WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					if($rsstateid['cityid'] == $rsedit['cityid'])
					{
					echo "<option value='$rsstateid[cityid]' selected>$rsstateid[city]</option>";
					}
					else
					{
					echo "<option value='$rsstateid[cityid]'>$rsstateid[city]</option>";
					}
				}
			?>
		</select>
    </div>
    <div class="form-group">
      <label for="email">PIN Code:<span class="classvalidate" id="idpin"></span></label>
      <input type="text" class="form-control" id="pin" placeholder="Enter Pin" name="pin" value="<?php echo $rsedit['pin']; ?>">
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
                 
	 <table border="1" id="myTable"  class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Branch name</th>
				<th>Branch Address</th>
				<th>City</th>
				<th>PIN Code</th>
				<th>State</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
					$sql = "SELECT branch.*,city.city,state.state FROM branch LEFT JOIN city ON branch.cityid=city.cityid LEFT JOIN state ON state.stateid=branch.stateid";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[branchname]</td>
							<td>$rs[branchaddress]</td>
							<td>$rs[city]</td>
							<td>$rs[pin]</td>
							<td>$rs[state]</td>
							<td>$rs[status]</td>
							<td><a href='branch.php?editid=$rs[0]' class='btn btn-info'>Edit</a>  <a href='branch.php?delid=$rs[0]'  class='btn btn-danger' onclick='return confirmdel()'>Delete</a></td>
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
<script type="text/javascript">
function loadcity(stateid)
{
    if (stateid == "") 
	{
        document.getElementById("ajaxcity").innerHTML = "<select id='status' name='status' class='form-control'><option value=''>Select City</option></select>";
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajaxcity").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxcity.php?stateid="+stateid,true);
        xmlhttp.send();
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
	
	if(!document.getElementById("branchname").value.match(alphaspaceExp))
	{
		document.getElementById("idbranchname").innerHTML=" BranchName should contain alphabets and characters...";
		validateform="false";
	}
		
	if(document.getElementById("branchname").value=="")
	{
		document.getElementById("idbranchname").innerHTML="BranchName Should not be empty...";
		validateform="false";
	}
		
	
		
	if(document.getElementById("branchaddress").value=="")
	{
		document.getElementById("idbranchaddress").innerHTML="Branchaddress  Should not be empty...";
		validateform="false";
	}
	 
	if(document.getElementById("stateid").value=="")
	{
		document.getElementById("idstateid").innerHTML="State Should not be empty...";
		validateform="false";
	}
		
	if(document.getElementById("cityid").value=="")
	{
		document.getElementById("idcityid").innerHTML="City Should not be empty...";
		validateform="false";
	}
	 idstatus
	
	
	if(document.getElementById("pin").value=="")
	{
		document.getElementById("idpin").innerHTML="Pin Should not be empty...";
		validateform="false";
	}
	   
	if(document.getElementById("status").value=="")
	{
		document.getElementById("idstatus").innerHTML="Status should not be empty...";
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