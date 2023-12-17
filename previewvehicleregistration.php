<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	$sql="UPDATE vehicleregistration SET enrollerid='$_SESSION[enrollerid]', stateid='$_POST[stateid]',
	cityid='$_POST[cityid]',ownername='$_POST[ownername]',swdof='$_POST[swdof]',regtype='$_POST[regtype]',
	dob='$_POST[dob]',paddr='$_POST[paddr]',taddr='$_POST[taddr]',paddrduration='$_POST[paddrduration]',
	pancardno='$_POST[pancardno]',birthplace='$_POST[birthplace]',vehiclepurchasedfrom='$_POST[vehiclepurchasedfrom]',
	vehicletypeid='$_POST[vehicletypeid]',vehicledetail='$_POST[vehicledetail]',chasisno='$_POST[chasisno]',
	engineno='$_POST[engineno]',seatingcapacity='$_POST[seatingcapacity]',vehicleimg='$_POST[vehicleimg]',
	note='$_POST[note]',
	date='$_POST[date]',vehicleno='$_POST[vehicleno]',fuel='$_POST[fuel]' WHERE vehicleregid='$_GET[insid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('vehicle registration record updated successfully');</script>";
	}
		echo "<script>window.location='payment.php?insid=$_GET[insid]&paidfor=Vehicle Registration';</script>";
}
//Insert statement ends here

//Edit statement starts here
if(isset($_GET['insid']))
{
	$sqledit ="SELECT * FROM vehicleregistration WHERE vehicleregid='$_GET[insid]'";
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
            <li data-blast="bgColor">Vehicle Registration Detail Preview</li> <br><br>
             <h5 class="mb-3" data-blast="color">Modify/Confirm Before making Payment</h5>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
			
	<form action="" method="post">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-6 about-txt-img">
					

	
	
    <div class="form-group">
      <label for="email">Full name of Registered owner:</label>
      <input type="text" class="form-control" id="ownername" placeholder="Enter OwnerName" name="ownername" value="<?php echo $rsedit['ownername']; ?>">	  
    </div>
	
    <div class="form-group">
      <label for="email">Son/wife/daughter of:</label>
      <input type="text" class="form-control" id="swdof" placeholder="Enter SWD/of" name="swdof" value="<?php echo $rsedit['swdof']; ?>">
    </div>
	
	<div class="form-group">
      <label for="email">Date of birth <span style="color:red;"></span></label>
      <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob" value="<?php echo $rsedit['dob']; ?>">
    </div>
	
	<div class="form-group">
      <label for="email">Permanent address:</label>
	  <textarea class="form-control" id="paddr" placeholder="Enter Permanent Address" name="paddr" ><?php echo $rsedit['paddr']; ?></textarea>
    </div>
	<div class="form-group">
      <label for="email">Temporary address:</label>
	  <textarea class="form-control" id="taddr" placeholder="Enter Temporary Address" name="taddr"><?php echo $rsedit['taddr']; ?></textarea>
    </div>
	
	<div class="form-group">
      <label for="email">Stay Duration<span style="color:red;">(In years)</span>:</label>
	   <input type="number" class="form-control" id="paddrduration" placeholder="Enter Permanent Address Duration" name="paddrduration" value="<?php echo $rsedit['paddrduration']; ?>">
    </div>
	
		<div class="form-group">
		<label for="email">State:</label>
		<select name="stateid" class="form-control" onchange="loadcity(this.value)">
			<option value=''>Select state</option>
			<?php
				$sqlstateid ="SELECT * FROM state WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					if($rsstateid['stateid'] == $rsedit['stateid'])
					{
					echo "<option value='$rsstateid[stateid]' selected >$rsstateid[state]</option>";
					}
					else
					{
					echo "<option value='$rsstateid[stateid]' >$rsstateid[state]</option>";
					}
				}
			?>
		</select>
    </div>
	
	<div class="form-group" id="ajaxcity">
		<label for="email">City:</label>
		<select name="cityid" class="form-control"  >
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
				}
			?>
		</select>
	</div>
	
	
	<div class="form-group">
      <label for="email">Birth Place:</label>
      <input type="text" class="form-control" id="birthplace" placeholder="Enter BirthPlace" name="birthplace" value="<?php echo $rsedit['birthplace']; ?>">
    </div>
	
	<div class="form-group">
      <label for="email">PAN Card No.:</label>
      <input type="text" class="form-control" id="pancardno" placeholder="Enter Pan Card No" name="pancardno" value="<?php echo $rsedit['pancardno']; ?>">
    </div>

                </div>
                <div class="col-md-6 latest-list">
                  <div class="about-jewel-agile-left">
                    <p>

	
	<div class="form-group">
      <label for="email">Vehicle Type:</label>
	  	  	<select class="form-control" id="vehicletypeid" placeholder="Enter vehicle type" name="vehicletypeid" >
			<option value="">Select Vehicle Type</option>
			<?php
				$sqlstateid ="SELECT * FROM vehicletype WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					if($rsstateid['vehicletypeid'] == $rsedit['vehicletypeid'])
					{
					echo "<option value='$rsstateid[vehicletypeid]' selected>$rsstateid[vehicletype]</option>";
					}
					else
					{
					echo "<option value='$rsstateid[vehicletypeid]' >$rsstateid[vehicletype]</option>";
					}
				}
			?>
		</select>
    </div>
	
	<!--
	<div class="form-group">
      <label for="email">Vehicle Purchased From :</label>
      <input type="text" class="form-control" id="vehiclepurchasedfrom" placeholder="Vehicle Purchased From" name="vehiclepurchasedfrom" value="<?php echo $rsedit['vehiclepurchasedfrom']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Vehicle Detail:</label>
      <input type="text" class="form-control" id="vehicledetail" placeholder="Vehicle Detail:" name="vehicledetail" value="<?php echo $rsedit['vehicledetail']; ?>">
    </div> -->
	<div class="form-group">
      <label for="email">Chasis No:</label>
      <input type="text" class="form-control" id="chasisno" placeholder="Enter Chasis No." name="chasisno" value="<?php echo $rsedit['chasisno']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Engine No:</label>
      <input type="text" class="form-control" id="engineno" placeholder="Enter Engine No." name="engineno" value="<?php echo $rsedit['engineno']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Seating Capacity:</label>
      <input type="text" class="form-control" id="seatingcapacity" placeholder="Enter Seating Capacity" name="seatingcapacity" value="<?php echo $rsedit['seatingcapacity']; ?>">
    </div>
	<div class="form-group">
      <label for="email">Fuel type:</label>
      <input type="text" class="form-control" id="fuel" placeholder="Enter Fuel used in the engine" name="fuel" value="<?php echo $rsedit['fuel']; ?>">
    </div>
	<?php
	/*
	<div class="form-group">
      <label for="email">VehicleImg:</label>
      <input type="text" class="form-control" id="vehicleimg" placeholder="Enter VehicleImg" name="vehicleimg">
    </div>
	*/
	?>
	<!--<div class="form-group">
      <label for="email">Any Note:</label>
      <input type="text" class="form-control" id="note" placeholder="Enter Note" name="note" value="<?php echo $rsedit['note']; ?>">
    </div>
					
	<div class="form-group">
      <label for="email">Registration Type:</label>
	    <select name="regtype" id="regtype" class="form-control" onchange="changevehicleno(this.value)">
			<option value="">Select Registration Type</option>
			<?php
				$arr = array("New","Vehicle Transfer");
				foreach($arr as $val)
				{
					if($val == $rsedit['regtype'])
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
	<div class="form-group">
      <label for="email">Vehicle No.:</label>
      <input type="text" class="form-control" id="vehicleno" placeholder="Enter VehicleNo" name="vehicleno" <?php
	  if($rsedit['regtype'] == "New")
	  {
	  echo " readonly ";
	  }
	  ?> value="<?php echo $rsedit['vehicleno']; ?>">
    </div> -->

    <button type="submit" name="submit" class="btn btn-info">Confirm</button>
					
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
    <!--//about-->

	
	

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