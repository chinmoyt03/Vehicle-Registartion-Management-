<?php
include("header.php");
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
            <li data-blast="bgColor">My Existing vehicles</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 about-txt-img">
     
	 <table border="1" id="myTable"  class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Owner Name</th>
				<th>DTO Location</th>
				<th>Registration type</th>
				<th>Vehicle detail</th>
				<th>Verification date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
<?php
	$sql = "SELECT vehicleregistration.*,enroller.name,vehicletype.vehicletype FROM vehicleregistration LEFT JOIN enroller ON vehicleregistration.enrollerid=enroller.enrollerid LEFT JOIN vehicletype ON vehicletype.vehicletypeid=vehicleregistration.vehicletypeid WHERE vehicleregistration.vehicleregid<>''";
	if(isset($_SESSION['enrollerid']))
	{
		$sql = $sql . " AND vehicleregistration.enrollerid='$_SESSION[enrollerid]' ";
	}

	$qsql= mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlbranch= "SELECT branch.*,state.*,city.* FROM branch LEFT JOIN state ON state.stateid=branch.stateid LEFT JOIN city ON city.cityid=branch.cityid WHERE branch.stateid='$rs[stateid]' AND branch.cityid='$rs[cityid]'";
		$qsqlbranch = mysqli_query($con,$sqlbranch);
		$rsbranch = mysqli_fetch_array($qsqlbranch);
		
		echo "<tr>
			<td>$rs[name]</td>
			<td>";	
	echo $rsbranch['branchname'] . ",<br>" . $rsbranch['branchaddress']. ",<br>" . $rsbranch['city'] . ",<br>" . $rsbranch['state'] . ",<br>PIN" . $rsbranch['pin'];	
	echo "</td><td>$rs[regtype] <br>";
	if($rs['regtype'] == "Vehicle Transfer")
	{
		echo "<hr><b>Vehicle No.</b><br>" . $rs['vehicleno'];
	}		
			echo "</td>
			<td>$rs[vehicledetail]<hr><b>Vehicle type:</b><br>$rs[vehicletype]<hr><b>Fuel type:</b> $rs[fuel]</td>
			<td>$rs[date]</td>
			<td>$rs[status]</td>
			<td>";
			if(isset($_SESSION['enrollerid']))
			{
			echo "<a href='vehicleregistrationreceipt.php?insid=$rs[0]' class='btn btn-info'>View</a> ";
			}
			else
			{
			echo "<a href='vehicleregistrationreceipt.php?insid=$rs[0]' class='btn btn-info'>Verify</a> ";
			}
			echo "</td></tr>";
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
			if(confirm("Are you sure want to delete?") == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
</script>