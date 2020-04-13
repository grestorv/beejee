<?php
	if(isset($_SESSION['message'])){
		$info=$_SESSION['message'];
		if($info!=''){ ?>
			<div class="info alert-warning alert-info">
				<?=$info?>
			</div>
		<?php
		}

		unset($_SESSION['message']);
	}
