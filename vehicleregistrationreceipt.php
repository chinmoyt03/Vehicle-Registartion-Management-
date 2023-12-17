<?php
include("header.php");

if(isset($_GET['btnrc']))
{
	$sqlverification = "UPDATE vehicleregistration SET status='$_GET[status]',vehicleno='$_GET[vehno]' WHERE vehicleregid='$_GET[insid]'";
	$qsqlverification = mysqli_query($con,$sqlverification);
	if(mysqli_affected_rows($con) ==1)
	{
		echo "<script>alert('RC issued successfully.');</script>";
	}
}	
if(isset($_GET['verificationstatus']))
{
	$sqlverification = "UPDATE vehicleregistration SET status='$_GET[verificationstatus]' WHERE vehicleregid='$_GET[insid]'";
	$qsqlverification = mysqli_query($con,$sqlverification);
	if(mysqli_affected_rows($con) ==1)
	{
		echo "<script>alert('Vehicle Registration verfication details updated');</script>";
	}
}

$sqlpayment ="SELECT * FROM payment WHERE paidid='$_GET[insid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment = mysqli_fetch_array($qsqlpayment);
$sqledit ="SELECT * FROM vehicleregistration WHERE vehicleregid='$_GET[insid]'";
$qsqledit = mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);

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
            <li data-blast="bgColor">Receipt</li> 
          </ul>
<form action="" method="post" enctype="multipart/form-data">
          <div class="resp-tabs-container  form-control" style="padding:15px;">
			<div class="tab1">
		
	<form action="" method="post">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-6 about-txt-img">

    <div class="form-group">
      <label for="email" style="font-weight: bold;">Receipt No.:</label> <?php echo $_GET['insid']; ?>
    </div>
	
    <div class="form-group">
      <label for="email" style="font-weight: bold;">Registered owner:</label> <?php echo $rsedit['ownername']; ?>
    </div>
	
    <div class="form-group">
      <label for="email" style="font-weight: bold;">Son/wife/daughter of:</label>
      <?php echo $rsedit['swdof']; ?>
    </div>
	
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Date of birth</label>
      <?php echo $rsedit['dob']; ?>
    </div>
	
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Permanent address:</label>
	  <?php echo $rsedit['paddr']; ?>
    </div>
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Temporary address:</label>
	 <?php echo $rsedit['taddr']; ?>
    </div>
	
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Stay duration:</label>
	   <?php echo $rsedit['paddrduration']; ?>
    </div>
	
		<div class="form-group">
		<label for="email" style="font-weight: bold;">State:</label>
			<?php
				$sqlstateid ="SELECT * FROM state WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					if($rsstateid['stateid'] == $rsedit['stateid'])
					{
					echo "<option value='$rsstateid[stateid]' selected >$rsstateid[state]</option>";
					}
				}
			?>
    </div>
	
	<div class="form-group" id="ajaxcity">
		<label for="email" style="font-weight: bold;">City:</label>
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
	</div>
	
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Birth Place:</label>
      <?php echo $rsedit['birthplace']; ?>
    </div>
	
	<div class="form-group">
      <label for="email" style="font-weight: bold;">PAN Card No.:</label>
     <?php echo $rsedit['pancardno']; ?>
    </div>
                </div>
                <div class="col-md-6 latest-list">
                  <div class="about-jewel-agile-left">
	
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Vehicle Type:</label>
	  	  	<?php
				$sqlstateid ="SELECT * FROM vehicletype WHERE status='Active'";
				$qsqlstateid = mysqli_query($con,$sqlstateid);
				while($rsstateid = mysqli_fetch_array($qsqlstateid) )
				{
					if($rsstateid['vehicletypeid'] == $rsedit['vehicletypeid'])
					{
					echo "<option value='$rsstateid[vehicletypeid]' selected>$rsstateid[vehicletype]</option>";
					}
				}
			?>
    </div>
	

     <?php echo $rsedit['vehiclepurchasedfrom']; ?>
    </div>
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Vehicle Detail:</label>
      <?php echo $rsedit['vehicledetail']; ?>
    </div> 
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Chassis No:</label>
      <?php echo $rsedit['chasisno']; ?>
    </div>
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Engine No:</label>
      <?php echo $rsedit['engineno']; ?>
    </div>
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Seating Capacity:</label>
      <?php echo $rsedit['seatingcapacity']; ?>
    </div>
	<div class="form-group">
      <label for="email" style="font-weight: bold;">Fuel type:</label>
      <?php echo $rsedit['fuel']; ?>
    </div>
	<?php
	
	?>
	
					</p>
                  </div>
                </div>
              </div>
  </form>
            </div>
    <hr>  
<hr>	
	<h4>Payment detail</h4>
	<table class="table table-striped table-bordered">
		<tr><th>Bill No.</th><td><?php echo $rspayment['paymentid']; ?></td></tr>
		<tr><th>Payment type</th><td><?php echo $rspayment['paymenttype']; ?></td></tr>
		<tr><th>Payment Date</th><td><?php echo $rspayment['paiddate']; ?></td></tr>
		<tr><th>Paid Amount</th><td><?php echo $rspayment['paidamt']; ?></td></tr>
	</table>
<?php
if(isset($_SESSION["empid"]))
{
if($rsedit['status'] == "Paid")
		{
?>
  	<h4>Payment detail</h4>
	<table class="table table-striped table-bordered">
		<tr><td><center><span>
		<b><a href="vehicleregistrationreceipt.php?insid=<?php echo $_GET['insid']; ?>&verificationstatus=Verified"  style="color:green;">Click here to confirm Verification</a> | 
		<a href="vehicleregistrationreceipt.php?insid=<?php echo $_GET['insid']; ?>&verificationstatus=Rejected"  style="color:red;">Click here to Reject</a></b>
	</span></center></td></tr>
	</table>
<?php
		}
?> 


<?php
if($rsedit['status'] == "Verified")
		{
?>
  	<h4>Issue RC</h4>
	<form method="get" action="">
		<input type="hidden" name="status" value="Active" />
		<input type="hidden" name="insid" value="<?php echo $_GET['insid']; ?>" />
		<table class="table table-striped table-bordered">
			<tr><td>Vehicle Number</td><td>
			<?php
			if($rsedit['regtype'] == "New")
			{
			?>
			<input type="text" name="vehno" class="form-control">
			<?php
			}
			else
			{
			?>
			<input type="text" name="vehno" value="<?php echo $rsedit['vehicleno']; ?>" class="form-control">
			<?php
			}
			?>
			</td></tr>
			<tr><td></td><td><input type="submit" name="btnrc" class="form-control" value="Click here to issue RC"></td></tr>	
		</table>
	</form>
<?php
		}
}
?> 
<hr>

<style>
		 ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}


</style>
<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Application Submission</li>
	<li class="progtrckr-done">Payment</li>
	<?php
	if($rsedit['status'] == "Verified" || $rsedit['status'] == "Active")
	{
	?>
	<li class="progtrckr-done">Verified</li>
	<?php
	}
	else
	{
	?>
	<li class="progtrckr-todo">Verification</li>		
	<?php
	}
	?>
	<?php
	if($rsedit['status'] == "Active")
	{
	?>
	<li class="progtrckr-done">RC Issued</li>
	<?php
	}
	else
	{
	?>
	<li class="progtrckr-todo">RC Issued</li>
	<?php
	}
	?>
</ol>
		
 
  <hr>
  
  
    <center><button type="button" name="button" class="btn btn-info"  onclick="printDiv('about')">Print Receipt</button></center>
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

function printDiv(divName) 
{
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>