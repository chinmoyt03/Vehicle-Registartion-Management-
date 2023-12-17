<?php
include("header.php");
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
	
	<section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <!--Horizontal Tab-->
        <div id="horizontalTab">
          <ul class="resp-tabs-list justify-content-center">
            <li data-blast="bgColor">Driving License</li>
            <li data-blast="bgColor">Vehicle Registration</a></h4></li>
            <li data-blast="bgColor">Address Change</li>
            <li data-blast="bgColor">Driving License Renewal</li>
          </ul>
          <div class="resp-tabs-container">
            <div class="tab1" >
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 latest-list">
                  <div class="about-jewel-agile-left">                    
                    <center>
					<h4 class="mb-3" data-blast="color">Driving License Application Status</h5>
                    <p>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-6">
		  <input type="text" class="form-control" placeholder="Enter Application No." name="dlid" id="dlid">
		</div>		
		<div class="col-md-6">
		  <input type="button" value="Verify" class="form-control" style="cursor: pointer;" onclick="validatedl(dlid.value)">
		</div>
	  </div>
	  
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-12" id="divdlstatus"></div>
	  </div>
	  
</div>
					</p>
					</center>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 latest-list">
                  <div class="about-jewel-agile-left">   
					<center>
						<h4 class="mb-3" data-blast="color">Vehicle Registration Application Status</h5>
                    <p>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-6">
		  <input type="text" class="form-control" placeholder="Enter Receipt No." name="vehicleregid" id="vehicleregid">
		</div>		
		<div class="col-md-6">
		  <input type="button" value="Verify" class="form-control" style="cursor: pointer;" onclick="validatevehiclereg(vehicleregid.value)">
		</div>
	  </div>
	  
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-12" id="divvehicleregstatus"></div>
	  </div>
	  
</div>
					</p>
					</center>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab3">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 latest-list">
                  <div class="about-jewel-agile-left">     
                    <center>
					<h4 class="mb-3" data-blast="color">Address change Application Status</h5>
                    <p>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-6">
		  <input type="text" class="form-control" placeholder="Enter Application No." name="addrchgid" id="addrchgid">
		</div>		
		<div class="col-md-6">
		  <input type="button" value="Verify" class="form-control" style="cursor: pointer;" onclick="validateaddresschange(addrchgid.value)">
		</div>
	  </div>
	  
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-12" id="divaddresschange"></div>
	  </div>
	  
</div>
					</p>
					</center>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab4">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-12 latest-list">
                  <div class="about-jewel-agile-left">    
                    <center>
                    <h4 class="mb-3" data-blast="color"> Driving License Renewal Application status</h4>
                    <p>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-6">
		  <input type="text" class="form-control" placeholder="Enter Renewal Receipt No.." name="licrenewid" id="licrenewid">
		</div>		
		<div class="col-md-6">
		  <input type="button" value="Verify" class="form-control" style="cursor: pointer;" onclick="validatelicenserenewal(licrenewid.value)">
		</div>
	  </div>
	  
	  <div class="row text-center contact-wls-detail">
		<div class="col-md-12" id="divlicenserenewal"></div>
	  </div>
	  
</div>
					</p>
					</center>					
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
function validatedl(dlid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divdlstatus").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxapplication.php?dlid="+dlid,true);
	xmlhttp.send();
}
function validatevehiclereg(vehicleregid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divvehicleregstatus").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxapplication.php?vehicleregid="+vehicleregid,true);
	xmlhttp.send();
}
function validateaddresschange(addrchgid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divaddresschange").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxapplication.php?addrchgid="+addrchgid,true);
	xmlhttp.send();
}
function validatelicenserenewal(licrenewid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divlicenserenewal").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxapplication.php?licrenewid="+licrenewid,true);
	xmlhttp.send();
}
</script>