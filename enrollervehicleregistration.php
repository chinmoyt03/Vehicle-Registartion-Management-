<?php
include("header.php");
//Insert statement starts
if(isset($_POST['submit']))
{
		$sql="INSERT INTO vehicleregistration (enrollerid, stateid, cityid,ownername,swdof,regtype,dob,paddr,taddr,paddrduration,pancardno,birthplace,vehiclepurchasedfrom,vehicletypeid,vehicledetail,chasisno,engineno,
		seatingcapacity,fuel,vehicleimg,note,date,vehicleno,status)VALUES 
		('$_SESSION[enrollerid]','$_POST[stateid]','$_POST[cityid]','$_POST[ownername]','$_POST[swdof]','$_POST[regtype]',
		'$_POST[dob]','$_POST[paddr]','$_POST[taddr]','$_POST[paddrduration]','$_POST[pancardno]','$_POST[birthplace]',
		'$_POST[vehiclepurchasedfrom]','$_POST[vehicletypeid]','$_POST[vehicledetail]','$_POST[chasisno]','$_POST[engineno]',
		'$_POST[seatingcapacity]','$_POST[fuel]','$_POST[vehicleimg]',
		'$_POST[note]','$_POST[date]','$_POST[vehicleno]','Pending')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Vehicle Registration request done successfully');</script>";
			$insid = mysqli_insert_id($con);
			echo "<script>window.location='previewvehicleregistration.php?insid=$insid';</script>";
		}
}
//Insert statement ends
//Delete statement starts
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM vehicleregistration WHERE vehicleregid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('vehicleregistration record deleted successfully');</script>";
		echo "<script>window.location='vehicleregistration.php';</script>";
	}
}
//Delete statement ends
//Edit statement starts
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM vehicleregistration WHERE vehicleregid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
		echo mysqli_error($con);
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
            <li data-blast="bgColor">Vehicle Registration Form</li> <br><br>
             <h5 class="mb-3" data-blast="color">Application For New Vehicle Registration</h5>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
			
	<form action="" method="post" onsubmit="return validateform()">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-6 about-txt-img">
	
    <div class="form-group">
      <label for="email">Full name:<span class="classvalidate" id="idownername"></span></label>
      <input type="text" class="form-control" id="ownername" placeholder="Enter Owner Name" name="ownername">
    </div>
	
    <div class="form-group">
      <label for="email">Father's Name:<span class="classvalidate" id="idswdof"></span></label>
      <input type="text" class="form-control" id="swdof" placeholder="Enter Father's Name" name="swdof">
    </div>
	
	<div class="form-group">
      <label for="email">Date of birth<span class="classvalidate" id="iddob" ></span> <span style="color:red;"></span></label>
      <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob" max="<?php echo date('Y-m-d', strtotime("-18 years")); ?>">
    </div>
	
	<div class="form-group">
      <label for="email">Permanent address:<span class="classvalidate" id="idpaddr"></span></label>
	  <textarea class="form-control" id="paddr" placeholder="Enter Permanent Address" name="paddr" ></textarea>
    </div>
	<div class="form-group">
      <label for="email">Temporary address:<span class="classvalidate" id="idtaddr"></span></label>
	  <textarea class="form-control" id="taddr" placeholder="Enter Temporary Address" name="taddr"></textarea>
    </div>
	
	<div class="form-group">
      <label for="email">Stay duration<span class="classvalidate" id="idpaddrduration"></span> <span style="color:red;">(In years)</span>:</label>
	   <input type="number" class="form-control" id="paddrduration" placeholder="Enter stay Duration in permanent address" name="paddrduration">
    </div>
	
	<div class="form-group">
		<label for="email">State:<span class="classvalidate" id="idstateid"></span></label>
		<select name="stateid" id="stateid" class="form-control" onchange="loadcity(this.value)">
			<option value=''>Select state</option>
			<?php
				$sqlstateid ="SELECT * FROM state WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					echo "<option value='$rsstateid[stateid]' >$rsstateid[state]</option>";
				}
			?>
		</select>
    </div>

	<div class="form-group" id="ajaxcity">
      <label for="email">City:<span class="classvalidate" id="idcityid"></span></label>
		<select name="cityid" id="cityid" class="form-control" onchange="loadcity(this.value)" >
		<option value=''>Select City</option>
			<?php
				$sqlstateid ="SELECT * FROM city WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					echo "<option value='$rsstateid[cityid]' >$rsstateid[city]</option>";
				}
			?>
		</select>
    </div>
	
	
	<div class="form-group">
      <label for="email">Birth Place: <span class="classvalidate" id="idbirthplace"></span></label>
      <input type="text" class="form-control" id="birthplace" placeholder="Enter Birth Place" name="birthplace">
    </div>
	
	<div class="form-group">
      <label for="email">PAN Card Number: <span class="classvalidate" id="idpancardno"></span></label>
      <input type="text" class="form-control" id="pancardno" placeholder="Enter Pan Card Number" name="pancardno">
    </div>

                </div>
                <div class="col-md-6 latest-list">
                  <div class="about-jewel-agile-left">
                    <p>

	<div class="form-group">
      <label for="email">Vehicle Type:<span class="classvalidate" id="idvehicletypeid"></span></label>
	  	  	<select class="form-control" id="vehicletypeid" placeholder="Enter vehicle type" name="vehicletypeid" >
			<option value="">Select Vehicle Type</option>
			<?php
				$sqlstateid ="SELECT * FROM vehicletype WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					echo "<option value='$rsstateid[vehicletypeid]' >$rsstateid[vehicletype]</option>";
				}
			?>
		</select>
    </div>

	<div class="form-group">
      <label for="email">Chassis No:<span class="classvalidate" id="idchasisno"></span></label>
      <input type="text" class="form-control" id="chasisno" placeholder="Enter Chassis No." name="chasisno">
    </div>
	<div class="form-group">
      <label for="email">Engine No:<span class="classvalidate" id="idengineno"></span></label>
      <input type="text" class="form-control" id="engineno" placeholder="Enter Engine No." name="engineno">
    </div>
	<div class="form-group">
      <label for="email">Seating Capacity:<span class="classvalidate" id="idseatingcapacity"></span></label>
      <input type="text" class="form-control" id="seatingcapacity" placeholder="Enter Seating Capacity" name="seatingcapacity">
    </div>
	<div class="form-group">
      <label for="email">Fuel type:<span class="classvalidate" id="idfuel"></span></label>
      <input type="text" class="form-control" id="fuel" placeholder="Petrol or Diesel" name="fuel">
    </div>
	<?php
	?>  

    <button type="submit" name="submit" class="btn btn-info">Click here to Submit</button>
					
					</p>
                  </div>
                </div>
              </div>
  </form>
            </div>
            
			</div>
        </div>
      </div>
    </section>
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
function changevehicleno(regtype)
{
	if(regtype== "New")
	{
		document.getElementById("vehicleno").value = "";
		document.getElementById("vehicleno").readOnly = true;
	}
	else
	{
		document.getElementById("vehicleno").readOnly = false;
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