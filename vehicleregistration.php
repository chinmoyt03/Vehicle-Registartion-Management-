<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql="UPDATE vehicleregistration SET userid='$_POST[userid]', stateid='$_POST[stateid]',
		cityid='$_POST[cityid]',ownername='$_POST[ownername]',swdof='$_POST[swdof]',regtype='$_POST[regtype]',
		dob='$_POST[dob]',paddr='$_POST[paddr]',taddr='$_POST[taddr]',paddrduration='$_POST[paddrduration]',
		pancardno='$_POST[pancardno]',birthplace='$_POST[birthplace]',vehiclepurchasedfrom='$_POST[vehiclepurchasedfrom]',
		vehicletypeid='$_POST[vehicletypeid]',vehicledetail='$_POST[vehicledetail]',chasisno='$_POST[chasisno]',
		engineno='$_POST[engineno]',seatingcapacity='$_POST[seatingcapacity]',vehicleimg='$_POST[vehicleimg]',
		note='$_POST[note]',
		date='$_POST[date]',vehicleno='$_POST[vehicleno]',
		status='$_POST[status]' WHERE vehicleregid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('vehicleregistration updated successfully');</script>";
			echo "<script>window.location='vehicleregistration.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}		
	}
	else
	{$sql="INSERT INTO vehicleregistration (userid, stateid, cityid,ownername,swdof,regtype,dob,paddr,taddr,
	paddrduration,pancardno,birthplace,vehiclepurchasedfrom,vehicletypeid,vehicledetail,chasisno,engineno,
	seatingcapacity,fuel,vehicleimg,note,date,vehicleno,status)VALUES 
	('$_POST[userid]','$_POST[stateid]','$_POST[cityid]','$_POST[ownername]','$_POST[swdof]','$_POST[regtype]',
	'$_POST[dob]','$_POST[paddr]','$_POST[taddr]','$_POST[paddrduration]','$_POST[pancardno]','$_POST[birthplace]',
	'$_POST[vehiclepurchasedfrom]','$_POST[vehicletypeid]','$_POST[vehicledetail]','$_POST[chasisno]','$_POST[engineno]',
	'$_POST[seatingcapacity]','$_POST[fuel]','$_POST[vehicleimg]',
	'$_POST[note]','$_POST[date]','$_POST[vehicleno]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Registration done successfully');</script>";
		echo "<script>window.location='vehicleregistration.php';</script>";
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
	$sql ="DELETE FROM vehicleregistration WHERE vehicleregid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('vehicleregistration record deleted successfully');</script>";
		echo "<script>window.location='vehicleregistration.php';</script>";
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
	$sqledit ="SELECT * FROM vehicleregistration WHERE vehicleregid='$_GET[editid]'";
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
            <li data-blast="bgColor">Registration Vehicle Registration</li> 
            <li data-blast="bgColor">View Vehicle Registration Details</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/register.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color">Application For Vehicle Registration</h5>
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">
    <div class="form-group">
      <label for="email">UserId:<span class="classvalidate" id="iduserid"></span></label>
	  <input type="text" class="form-control" id="userid" placeholder="Enter UserId" name="userid">
    </div>
	<div class="form-group">
      <label for="email">StateId:<span class="classvalidate" id="idstateid"></span></label>
     <input type="text" class="form-control" id="stateid" placeholder="Enter StateId" name="stateid">
    </div>
    <div class="form-group">
      <label for="email">CityId:<span class="classvalidate" id="idcityid"></span></label>
      <input type="text" class="form-control" id="cityid" placeholder="Enter CityId" name="cityid">
    </div>
    <div class="form-group">
      <label for="email">OwnerName:<span class="classvalidate" id="idownername"></span></label>
      <input type="text" class="form-control" id="ownername" placeholder="Enter OwnerName" name="ownername">
    </div>
    <div class="form-group">
      <label for="email">swdof:<span class="classvalidate" id="idswdof"></span></label>
      <input type="text" class="form-control" id="swdof" placeholder="Enter SWD/of" name="swdof">
    </div>
	<div class="form-group">
      <label for="email">RegType:<span class="classvalidate" id="idregtype"></span></label>
      <input type="text" class="form-control" id="regtype" placeholder="Enter RegType" name="regtype">
    </div>
	<div class="form-group">
      <label for="email">DOB:<span class="classvalidate" id="iddob"></span></label>
      <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob"   max="<?php echo date('Y-m-d', strtotime("-18 years")); ?>" >
    </div>
	<div class="form-group">
      <label for="email">PAddr:<span class="classvalidate" id="idpaddr"></span></label>
      <input type="text" class="form-control" id="paddr" placeholder="Enter Permanent Address" name="paddr">
    </div>
	<div class="form-group">
      <label for="email">TAddr:<span class="classvalidate" id="idtaddr"></span></label>
      <input type="text" class="form-control" id="taddr" placeholder="Enter Temporery Address" name="taddr">
    </div>
	<div class="form-group">
      <label for="email">PAddrDuration:<span class="classvalidate" id="idpaddrduration"></span></label>
      <input type="text" class="form-control" id="paddrduration" placeholder="Enter Permanent Address Duration" name="paddrduration">
    </div>
	<div class="form-group">
      <label for="email">PanCardNo:<span class="classvalidate" id="idpancardno"></span></label>
      <input type="text" class="form-control" id="pancardno" placeholder="Enter PanCardNo" name="pancardno">
    </div>
	<div class="form-group">
      <label for="email">BirthPlace:<span class="classvalidate" id="idbirthplace"></span></label>
      <input type="text" class="form-control" id="birthplace" placeholder="Enter BirthPlace" name="birthplace">
    </div>
	<div class="form-group">
      <label for="email">VehiclePurchasedFrom :<span class="classvalidate" id="idvehiclepurchasedfrom"></span></label>
      <input type="text" class="form-control" id="vehiclepurchasedfrom" placeholder="Enter VehiclePurchasedFrom" name="vehiclepurchasedfrom">
    </div>
	<div class="form-group">
      <label for="email">VehicleTypeId:<span class="classvalidate" id="idvehicletypeid"></span></label>
      <input type="text" class="form-control" id="vehicletypeid" placeholder="Enter VehicleTypeId" name="vehicletypeid">
    </div>
	<div class="form-group">
      <label for="email">VehicleDetail:<span class="classvalidate" id="idvehicledetail"></span></label>
      <input type="text" class="form-control" id="vehicledetail" placeholder="Enter VehicleDetail" name="vehicledetail">
    </div>
	<div class="form-group">
      <label for="email">Chasis No:<span class="classvalidate" id="idchasisno"></span></label>
      <input type="text" class="form-control" id="chasisno" placeholder="Enter ChasisNo" name="chasisno">
    </div>
	<div class="form-group">
      <label for="email">EngineNo:<span class="classvalidate" id="idengineno"></span></label>
      <input type="text" class="form-control" id="engineno" placeholder="Enter EngineNo" name="engineno">
    </div>
	<div class="form-group">
      <label for="email">SeatingCapacity:<span class="classvalidate" id="idseatingcapacity"></span></label>
      <input type="text" class="form-control" id="seatingcapacity" placeholder="Enter SeatingCapacity" name="seatingcapacity">
    </div>
	<div class="form-group">
      <label for="email">Fuel:<span class="classvalidate" id="idfuel"></span></label>
      <input type="text" class="form-control" id="fuel" placeholder="Enter Fuel" name="fuel">
    </div>
	
	<div class="form-group">
      <label for="email">Note:<span class="classvalidate" id="idnote"></span></label>
      <input type="text" class="form-control" id="note" placeholder="Enter Note" name="note">
    </div>
	<div class="form-group">
      <label for="email">Date:<span class="classvalidate" id="iddate"></span></label>
      <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
    </div>
	<div class="form-group">
      <label for="email">VehicleNo:<span class="classvalidate" id="idvehicleno"></span></label>
      <input type="text" class="form-control" id="vehicleno" placeholder="Enter VehicleNo" name="vehicleno">
    </div>
	<div class="form-group">
      <label for="email">Status:<span class="classvalidate" id="idstatus"></span></label>
      <select id="status" name="status" class="form-control">
		<option value="">Select status</option>
		<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				echo "<option value='$val'>$val</option>";
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
                <div class="col-md-12 about-txt-img">
     
	 <table border="1" id="myTable"  class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>userid</th>
				<th>stateid</th>
				<th>cityid</th>
				<th>ownername</th>
				<th>swdof</th>
				<th>regtype</th>
				<th>dob</th>
				<th>paddr</th>
				<th>taddr</th>
				<th>paddrduration</th>
				<th>pancardno</th>
				<th>birthplace</th>
				<th>vehiclepurchasedfrom</th>
				<th>vehicletypeid</th>
				<th>vehicledetail</th>
				<th>chasisno</th>
				<th>engineno</th>
				<th>seatingcapacity</th>
				<th>fuel</th>
				<th>vehicleimg</th>
				<th>note</th>
				<th>date</th>
				<th>vehicleno</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
					$sql = "SELECT * FROM vehicleregistration";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[userid]</td>
							<td>$rs[stateid]</td>
							<td>$rs[cityid]</td>
							<td>$rs[ownername]</td>
							<td>$rs[swdof]</td>
							<td>$rs[regtype]</td>
							<td>$rs[dob]</td>
							<td>$rs[paddr]</td>
							<td>$rs[taddr]</td>
							<td>$rs[paddrduration]</td>
							<td>$rs[pancardno]</td>
							<td>$rs[birthplace]</td>
							<td>$rs[vehiclepurchasedfrom]</td>
							<td>$rs[vehicletypeid]</td>
							<td>$rs[vehicledetail]</td>
							<td>$rs[chasisno]</td>
							<td>$rs[engineno]</td>
							<td>$rs[seatingcapacity]</td>
							<td>$rs[fuel]</td>
							<td>$rs[vehicleimg]</td>
							<td>$rs[note]</td>
							<td>$rs[date]</td>
							<td>$rs[vehicleno]</td>
							<td>$rs[status]</td>
							<td><a href='vehicleregistration.php?editid=$rs[0]' class='btn btn-info'>Edit</a> 
							<a href='vehicleregistration.php?delid=$rs[0]'  class='btn btn-danger' onclick='return confirmdel()'>Delete</a></td>
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
	$(document).ready( function () 
	{
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
	
	if(document.getElementById("userid").value=="")
	{
		document.getElementById("iduserid").innerHTML="Userid Name Should not be empty...";
		validateform="false";
	}
	if(!document.getElementById("ownername").value.match(alphaspaceExp))
	{
		document.getElementById("idownername").innerHTML="Owner Name should contain alphabets and characters...";
		validateform="false";
	}
		
	if(document.getElementById("ownername").value=="")
	{
		document.getElementById("idownername").innerHTML="Owner Name Should not be empty...";
		validateform="false";
	}
	if(!document.getElementById("swdof").value.match(alphaspaceExp))
	{
		document.getElementById("idswdof").innerHTML="Must enter valid Son/wife/daughter Details....";
		validateform="false";
	}
		
	if(document.getElementById("swdof").value=="")
	{
		document.getElementById("idswdof").innerHTML="Son/wife/daughter  Should not be empty...";
		validateform="false";
	}	
	if(document.getElementById("dob").value=="")
	{
		document.getElementById("iddob").innerHTML="Date of birth Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("paddr").value=="")
	{
		document.getElementById("idpaddr").innerHTML="Permanent address Should not be empty...";
		validateform="false";
	}
	
	if(document.getElementById("taddr").value =="")
	{	
		document.getElementById("idtaddr").innerHTML="Temporary addressShould not be empty...";
		validateform="false";
	}
	
	if(document.getElementById("paddrduration").value=="")
	{
		document.getElementById("idpaddrduration").innerHTML="Duration of stay at the present address Should not be empty...";
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
	
	if(document.getElementById("birthplace").value=="")
	{
		document.getElementById("idbirthplace").innerHTML="Birthplace Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("pancardno").value=="")
	{
		document.getElementById("idpancardno").innerHTML="Pancard No Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("vehicletypeid").value=="")
	{
		document.getElementById("idvehicletypeid").innerHTML="Vehicletype Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("vehiclepurchasedfrom").value=="")
	{
		document.getElementById("idvehiclepurchasedfrom").innerHTML="Vehiclepurchasedfrom Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("vehicledetail").value=="")
	{
		document.getElementById("idvehicledetail").innerHTML="Vehicle Detail Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("chasisno").value=="")
	{
		document.getElementById("idchasisno").innerHTML="Chasis No Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("engineno").value=="")
	{
		document.getElementById("idengineno").innerHTML="Engine No Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("seatingcapacity").value=="")
	{
		document.getElementById("idseatingcapacity").innerHTML="Seating Capacity Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("fuel").value=="")
	{
		document.getElementById("idfuel").innerHTML="Fuel Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("note").value=="")
	{
		document.getElementById("idnote").innerHTML="Note Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("regtype").value=="")
	{
		document.getElementById("idregtype").innerHTML="Regtype Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("vehicleno").value=="")
	{
		document.getElementById("idvehicleno").innerHTML="Vehicle No Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("date").value=="")
	{
		document.getElementById("iddate").innerHTML="Date Name Should not be empty...";
		validateform="false";
	}  
	if(document.getElementById("status").value=="")
	{
		document.getElementById("idstatus").innerHTML="Status Name Should not be empty...";
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
