<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
if($_GET['paidfor'] == "LLR")
{
	$curreentdatedate = strtotime($dt);
	$testdatedate = strtotime("+7 day", $curreentdatedate);
	$testdate =  date('Y-m-d', $testdatedate);
	$sqlupd = "UPDATE llr SET status='Paid',applicationdate='$dt',testdate='$testdate' WHERE llrid='$_POST[insid]'";
	$qsql = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
if($_GET['paidfor'] == "DL")
{
	$curreentdatedate = strtotime($dt);
	$testdatedate = strtotime("+1 day", $curreentdatedate);
	$testdate =  date('Y-m-d', $testdatedate);
	$sqlupd = "UPDATE drivinglicense SET status='Paid',applicationdate='$dt',testdate='$testdate' WHERE drivinglicenseid='$_POST[insid]'";
	$qsql = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
if($_GET['paidfor'] == "Vehicle Registration")
{
	$curreentdatedate = strtotime($dt);
	$testdatedate = strtotime("+7 days", $curreentdatedate);
	$testdate =  date('Y-m-d', $testdatedate);
	$sqlupd = "UPDATE vehicleregistration SET status='Paid',date='$testdate' WHERE vehicleregid='$_POST[insid]'";
	$qsql = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
if($_GET['paidfor'] == "Address Change")
{
	$curreentdatedate = strtotime($dt);
	$testdatedate = strtotime("+7 days", $curreentdatedate);
	$testdate =  date('Y-m-d', $testdatedate);
	$sqlupd = "UPDATE drivinglicense SET status='Paid',applicationdate='$dt',testdate='$testdate' WHERE drivinglicenseid='$_POST[insid]'";
	$qsql = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
if($_GET['paidfor'] == "Renewal")
{
	$curreentdatedate = strtotime($dt);
	$testdatedate = strtotime("+1 day", $curreentdatedate);
	$testdate =  date('Y-m-d', $testdatedate);
	$sqlupd = "UPDATE drivinglicense SET status='Paid',applicationdate='$dt',testdate='$testdate' WHERE drivinglicenseid='$_POST[insid]'";
	$qsql = mysqli_query($con,$sqlupd);
	echo mysqli_error($con);
}
	//	insid 	paiddate paidfor	 paymenttype cardholder cardnumber expireson cvvnumber paidamt 
	$paymentdetail= "<br>Payment type: "  . $_POST['paymenttype'];
	$paymentdetail= $paymentdetail . "<br>Card holder: "  . $_POST['cardholder'];
	$paymentdetail= $paymentdetail . "<br>Card number: "  . $_POST['cardnumber'];
	$paymentdetail= $paymentdetail . "<br>Expires on: "  . $_POST['expireson'];
	$paymentdetail= $paymentdetail . "<br>CVV Number: "  . $_POST['cvvnumber'];
	$sql="INSERT INTO payment (enrollerid,paymenttype, paidfor, paidid, paidamt,paiddate,description,status)VALUES ('$_SESSION[enrollerid]','$_POST[paymenttype]','$_POST[paidfor]','$_POST[insid]','$_POST[paidamt]','$_POST[paiddate]','$paymentdetail','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Payment done successfully');</script>";
		if($_GET['paidfor'] == "LLR")
		{
			echo "<script>window.location='llreceipt.php?insid=$_POST[insid]';</script>";
		}
		if($_GET['paidfor'] == "DL")
		{
			echo "<script>window.location='dlreceipt.php?insid=$_POST[insid]';</script>";
		}
		if($_GET['paidfor'] == "Vehicle Registration")
		{
			echo "<script>window.location='vehicleregistrationreceipt.php?insid=$_POST[insid]';</script>";
		}
		if($_GET['paidfor'] == "Address Change")
		{
			echo "<script>window.location='addresschangereceipt.php?insid=$_POST[insid]';</script>";
		}
		if($_GET['paidfor'] == "Renewal")
		{
			echo "<script>window.location='drivinglicenserenewalreceipt.php?insid=$_POST[insid]';</script>";
		}
	}
}
//Insert statement ends here

//Edit statement starts here
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM payment WHERE paymentid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//Edit statement ends here
if($_GET['paidfor'] == "LLR")
{
	$sqledit ="SELECT * FROM llr LEFT JOIN enroller ON llr.enrollerid=enroller.enrollerid WHERE llr.llrid='$_GET[insid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$arrvehicletypes = unserialize($rsedit['vehicletypeid']);
}
if($_GET['paidfor'] == "DL")
{
	$sqledit ="SELECT * FROM drivinglicense LEFT JOIN enroller ON drivinglicense.enrollerid=enroller.enrollerid WHERE drivinglicense.drivinglicenseid='$_GET[insid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$arrvehicletypes = unserialize($rsedit['vehicletypeid']);
}
if($_GET['paidfor'] == "Vehicle Registration")
{
	$sqledit ="SELECT * FROM vehicleregistration LEFT JOIN enroller ON vehicleregistration.enrollerid=enroller.enrollerid WHERE vehicleregistration.vehicleregid='$_GET[insid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$arrvehicletypes[0] = $rsedit['vehicletypeid'];
}

if($_GET['paidfor'] == "Address Change")
{
	$sqledit ="SELECT * FROM drivinglicense LEFT JOIN enroller ON drivinglicense.enrollerid=enroller.enrollerid WHERE drivinglicense.drivinglicenseid='$_GET[insid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$arrvehicletypes = unserialize($rsedit['vehicletypeid']);
}

if($_GET['paidfor'] == "Renewal")
{
	$sqledit ="SELECT * FROM drivinglicense LEFT JOIN enroller ON drivinglicense.enrollerid=enroller.enrollerid WHERE drivinglicense.drivinglicenseid='$_GET[insid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	echo $arrvehicletypes = unserialize($rsedit['vehicletypeid']);
}

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
    <!-- //banner -->
    <!--about-->
	<section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <!--Horizontal Tab-->
        <div id="horizontalTab">
          <ul class="resp-tabs-list justify-content-center">
            <li data-blast="bgColor">Make Payment</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
				
<table  class="table table-striped table-bordered">
	<tr>
		<th colspan="2" style="background-color: green;color:white;"><?php echo $_GET['paidfor']; ?> Application detail</th>
	</tr>
	
	<tr>
		<td>Application No.</td><td><?php echo $_GET['insid']; ?></td>
	</tr>
	
	<tr>
		<td>Name.</td><td><?php echo $rsedit['name']; ?></td>
	</tr>
		
	<tr>
		<th colspan="2" style="background-color: green;color:white;">Total Cost</th>
	</tr>
		
	<?php
	$tcost = 0;
	$cost =0;
	foreach($arrvehicletypes as $vtype)
	{
		$sqlvehicletype = "SELECT * FROM vehicletype WHERE vehicletypeid='$vtype'";
		$qsqlvehicletype = mysqli_query($con,$sqlvehicletype);
		$rsvehicletype = mysqli_fetch_array($qsqlvehicletype);
	
if($_GET['paidfor'] == "LLR")
{
?>
	<tr>
		<td><?php echo $rsvehicletype['vehicletype']; ?></td><td>₹<?php echo $rsvehicletype["llrcost"]; 
		$cost=$rsvehicletype["llrcost"];
?></td>
	</tr>
<?php
}
if($_GET['paidfor'] == "DL")
{
?>
	<tr>
		<td><?php echo $rsvehicletype['vehicletype']; ?></td><td>₹<?php echo $rsvehicletype["dlcost"]; 
		$cost=$rsvehicletype["dlcost"];
?></td>
	</tr>
<?php
}
if($_GET['paidfor'] == "Vehicle Registration")
{
?>
	<tr>
		<td><?php echo $rsvehicletype['vehicletype']; ?></td><td>₹<?php echo $rsvehicletype["vehicleregcost"]; 
		$cost=$rsvehicletype["vehicleregcost"];
?></td>
	</tr>
<?php
}
if($_GET['paidfor'] == "Address Change")
{
?>
	<tr>
		<td><?php echo $rsvehicletype['vehicletype']; ?></td><td>₹<?php echo $rsvehicletype["addresschangecost"]; 
		$cost=$rsvehicletype["addresschangecost"];
?></td>
	</tr>
<?php
}
if($_GET['paidfor'] == "Renewal")
{
?>
	<tr>
		<td><?php echo $rsvehicletype['vehicletype']; ?></td><td>₹<?php echo $rsvehicletype["dlrenewalcost"]; 
		$cost=$rsvehicletype["dlrenewalcost"];
?></td>
	</tr>
<?php
}
	$tcost = $tcost +$cost;
	}
	?>	
	<tr>
		<th>Total cost</th><th>₹<?php echo $tcost; ?></th>
	</tr>	
	
</table>				
				
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <p>
					
<form action="" method="post" onsubmit="return validateform()">

    <input type="hidden" class="form-control" id="paidfor" name="paidfor" value="<?php echo $_GET['paidfor']; ?>">
	<input type="hidden" class="form-control" id="paiddate" name="paiddate" value="<?php echo date("Y-m-d"); ?>">
	<input type="hidden" class="form-control" id="insid" name="insid" value="<?php echo $_GET['insid']; ?>">
	 
	 
    <div class="form-group">
      <label for="email">Payment Type:<span class="classvalidate" id="idpaymenttype"></span></label>
	  <select class="form-control" id="paymenttype" placeholder="Enter Payment Type" name="paymenttype">
	  <option value="">Select card type</option>
	  <?php
	  $arr = array("VISA","Master Card","Rupay");
	  foreach($arr as $val)
	  {
		  echo "<option value='$val'>$val</option>";
	  }
	  ?>
	  </select>
    </div>
    <div class="form-group">
      <label for="email">Name on Card:<span class="classvalidate" id="idcardholder"></span></label>
      <input type="text" class="form-control" id="cardholder" placeholder="Enter Card Holder" name="cardholder">
    </div>
	
		
    <div class="form-group">
      <label for="email">16 digit Card number:<span class="classvalidate" id="idcardnumber"></span></label>
      <input type="text" class="form-control" id="cardnumber" placeholder="Enter Card number" name="cardnumber">
    </div>
	
		
    <div class="form-group">
      <label for="email">Card Valid till:<span class="classvalidate" id="idexpireson"></span></label>
      <input type="month" min="<?php echo date("Y-m"); ?>" class="form-control" id="expireson" placeholder="Enter Expiry date" name="expireson">
    </div>
	
		
    <div class="form-group">
      <label for="email">CVV:<span class="classvalidate" id="idcvvnumber"></span></label>
      <input type="number" class="form-control" id="cvvnumber" placeholder="CVV Number" name="cvvnumber">
    </div>
	
    <div class="form-group">
      <label for="email">Total Amount:</label>
      <input type="text" readonly class="form-control" id="paidamt" placeholder="Enter Paid Amt" name="paidamt" value="<?php echo $tcost; ?>">
    </div>

	
	
    <button type="submit" name="submit" class="btn btn-info">Click here to Pay</button>
  </form>
					
					</p>
                  </div>
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
	
	
		
	if(document.getElementById("paymenttype").value=="")
	{
		document.getElementById("idpaymenttype").innerHTML="Payment Type Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("cardholder").value=="")
	{
		document.getElementById("idcardholder").innerHTML="Card Holder Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("cardnumber").value=="")
	{
		document.getElementById("idcardnumber").innerHTML="Card Number Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("expireson").value=="")
	{
		document.getElementById("idexpireson").innerHTML="Expires on Should not be empty...";
		validateform="false";
	}
	if(document.getElementById("cvvnumber").value.length >3 )
	{
		document.getElementById("idcvvnumber").innerHTML="cvvnumber Should Contains only 3 nos...";
		validateform="false";
	}
	if(document.getElementById("cvvnumber").value=="")
	{
		document.getElementById("idcvvnumber").innerHTML="cvvnumber Should not be empty...";
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