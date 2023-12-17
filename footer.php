    <!--footer-->
	<?php
	if(!isset($_SESSION["empid"]))
	{
			if(!isset($_SESSION["enrollerid"]))
			{
	?>
	<?php
			}
	}
	?>
	
    <footer class="py-3">
      <div class="container">
        <div class="copy-agile-right text-center">
          <p> 
            ©Chinmoy Talukdar <?php echo date('Y'); ?> RTO Management System. All Rights Reserved
          </p>
        </div>
      </div>
    </footer>
  