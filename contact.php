<?php
include("header.php");

if(isset($_POST['submit']))
{
	$headers = "From: rto@technopulse.online";
mail($_POST[email],$_POST[subject],$_POST[message],$headers);
echo "<script>alert('Mail sent successfully...');</script>";
}
?>

    <section class="stats py-lg-4 py-md-3 py-sm-3 py-3" id="stats">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">

        <div class="jst-must-info text-center">
        </div>
      </div>
    </section>

    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="contact">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact Us</h3>
        <div class="row">
          <div class="col-md-5 address-grid">
            <div class="addres-office-hour text-center" >
              <ul>
                <li class="mb-2">
                  <h6 data-blast="color">Main Branch</h6>
                </li>
                <li>
                  <p>Kamrup Metro (R & L), Kamrup Metro (Enf) Kamrup Metro (RTA) 
					Betkuchi, Guwahati 781035<br>

                </li>
              </ul>
              <ul>
                <li class="mt-lg-4 mt-3">
                  <h6 data-blast="color">Phone</h6>
                </li>
                <li class="mt-2">
                  <p>0361-225588</p>
                </li>
                <li class="mt-lg-4 mt-3">
                  <h6 data-blast="color">Email</h6>
                </li>
                <li class="mt-2">
                  <p><a href="#"> vrms@dtopvt.com  </a></p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-7 contact-form">
            <form action="" method="post">
              <div class="row text-center contact-wls-detail">
                <div class="col-md-6 form-group contact-forms">
                  <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group contact-forms">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group contact-forms">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group contact-forms">
                <textarea class="form-control" name="message" rows="3" placeholder="Type Your Message" required=""></textarea>
              </div>
              <div class="sent-butnn text-center">
                <button type="submit" name="submit" class="btn btn-block" data-blast="bgColor">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php
include("footer.php");
?>