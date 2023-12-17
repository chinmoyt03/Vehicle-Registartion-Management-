<?php
include("header.php");
if(!isset($_SESSION["enrollerid"]))
{
	echo "<script>window.location='index.php';</script>";
}
?>
    <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
            <li style="background-color:black;height:150px;">
            </li>
		  </ul>
        </div>

    </div>
    <section>
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">New Vehicle Registration </h3>
        <div class="row">
          <div class="#">
            <div>
              <img src="images/reg.jpg" class="img-fluid" alt="" style="width:100%;height:200px;">
              <div class="blog-txt-info">
                <h4 class="mt-2"><a href="enrollervehicleregistration.php" data-blast="color">Vehicle Registration </a></h4>
                <div class="outs_more-buttn" >
                </div>
              </div>
            </div>
          </div>
		 </div>
      </div>
    </section>
    <!--//blog -->
<?php
include("footer.php");
?>

<!--
<script>
function verifyllr(llrid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} 
	else 
	{
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == 0)
			{
				alert("You have entered invalid LLR details..");
				window.location='userpanel.php';
			}
			if(this.responseText == 1)
			{
				alert("Page will redirect to Driving license application form..");
				window.location='dlapplication.php?llrid='+llrid;
			}
		}
	};
	xmlhttp.open("GET","ajaxverifyllr.php?llrid="+llrid,true);
	xmlhttp.send();
}
function verifydl(dlno)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else 
	{
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == 0)
			{
				alert("You have entered invalid DL Number..");
				window.location='userpanel.php';
			}
			if(this.responseText == 1)
			{
				alert("Page will redirect to Driving license Address change Request Form..");
				window.location='dladresschange.php?dlno='+dlno;
			}
		}
	};
	xmlhttp.open("GET","ajaxverifydl.php?dlno="+dlno,true);
	xmlhttp.send();
}
function verifydl4renewal(renewaldlid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} 
	else 
	{
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == 0)
			{
				alert("You have entered invalid LLR details..");
				window.location='userpanel.php';
			}
			if(this.responseText == 1)
			{
				alert("Page will redirect to Renew Driving license application form..");
				window.location='drivinglicenserenewalapplication.php?renewaldlid='+renewaldlid;
			}
			
			if(this.responseText == 2)
			{
				alert("Your Driving license not expired yet..");
				window.location='userpanel.php';
			}
		}
	};
	xmlhttp.open("GET","ajaxrenewdlverify.php?renewaldlid="+renewaldlid,true);
	xmlhttp.send();
}
</script>	-->