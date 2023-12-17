<?php
include("header.php");
if(!isset($_SESSION["empid"]))
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

        <div class="clearfix"></div>
      </div>
    </div>

  
    <section class="blog py-lg-4 py-md-3 py-sm-3 py-3" id="blog">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Welcome ADMIN</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php
include("footer.php");
?>