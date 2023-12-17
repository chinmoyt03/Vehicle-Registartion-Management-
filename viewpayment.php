<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
	$sql="INSERT INTO payment (paymenttype, paidfor, paidamt,paiddate,description,status)VALUES ('$_POST[paymenttype]',
	'$_POST[paidfor]','$_POST[paidamt]','$_POST[paiddate]','$_POST[description]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Registration done successfully');</script>";
		echo "<script>window.location='payment.php';</script>";
	}
}
//Insert statement ends here
//Delete statement starts here
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM payment WHERE paymentid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Payment record deleted successfully');</script>";
		echo "<script>window.location='payment.php';</script>";
	}
}
//Delete statement ends here
//Edit statement starts here
if(isset($_GET['editid']))
{
	$sqledit ="SELECT * FROM payment WHERE paymentid='$_GET[editid]'";
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
            <li data-blast="bgColor">View Payment Details</li>
          </ul>
          <div class="resp-tabs-container">

			<div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 about-txt-img">
                 
	 <table border="1" id="myTable"  class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Bill No.</th>
				<th>Name</th>
				<th>Paid Date</th>
				<th>Payment Type</th>
				<th>Paid Amt</th>
				<th>Description</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
					$sql = "SELECT * FROM payment LEFT JOIN enroller ON enroller.enrollerid=payment.enrollerid WHERE paidfor='$_GET[paymentview]'";
					$qsql= mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[0]</td>
							<td>$rs[name]</td>
							<td>" . date('d-m-Y',strtotime($rs['paiddate'])) . "</td>
							<td>$rs[paymenttype]</td>
							<td>₹$rs[paidamt]</td>
							<td>$rs[description]</td>
							<td>$rs[status]</td>
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