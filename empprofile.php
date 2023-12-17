<?php
include("header.php");
//Insert statement starts here
if(isset($_POST['submit']))
{
		$sql="UPDATE employee SET  empname='$_POST[empname]',loginid='$_POST[loginid]' WHERE empid='$_SESSION[empid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('employee Profile updated successfully');</script>";
		}	

}
//Insert statement ends here
//Edit statement starts here
if(isset($_SESSION['empid']))
{
	$sqledit ="SELECT * FROM employee WHERE empid='$_SESSION[empid]'";
	$qsqledit = mysqli_query($con,$sqledit);
			echo mysqli_error($con);
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
            <li data-blast="bgColor">ADMIN Profile</li>
          </ul>
          <div class="resp-tabs-container">
			<div class="tab1">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="images/empprofile.jpg" class="img-thumbnail" width="100%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h5 class="mb-3" data-blast="color"> </h5>
                    <p>
					
<form action="" method="post">

	<div class="form-group">
      <label for="email">Branch:</label>
     <select id="branchid" name="branchid" class="form-control">
		<?php
			$sqlbranchid ="SELECT * FROM branch WHERE status='Active'";
			$qsqlbranchid = mysqli_query($con,$sqlbranchid);
			while($rsbranchid= mysqli_fetch_array($qsqlbranchid) )
			{
				if($rsbranchid['branchid'] == $rsedit['branchid'])
				{
				echo "<option value='$rsbranchid[branchid]' selected>$rsbranchid[branchname]</option>";
				}
			}
		?>
	  </select>
    </div>
	
    <div class="form-group">
      <label for="pwd">Employee Name:</label>
      <input type="text" class="form-control" id="empname" placeholder="Enter EmpName" name="empname" value="<?php echo $rsedit['empname']; ?>">
    </div>
	
    <div class="form-group">
      <label for="pwd">Login ID:</label>
      <input type="text" class="form-control" id="loginid" placeholder="Enter LoginId" name="loginid" value="<?php echo $rsedit['loginid']; ?>">
    </div>

    <div class="form-group">
      <label for="pwd">Designation:</label>
      <input type="text" class="form-control" readonly value="<?php echo $rsedit['emptype']; ?>">
    </div>
	
    <button type="submit" name="submit" class="btn btn-info">Update Profile</button>
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
	
