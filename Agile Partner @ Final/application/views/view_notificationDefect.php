<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<html>
	<head>
	</head>
	<body>
		<div id="id">
		<center>
			<?php 
				foreach ($notify as $row) {
					$defectCount=$row['cnt'];
					if($defectCount==1){
						echo '<div style="width:250px;">'.$defectCount.' defect is assigned to you!</div>';
					}
					elseif ($defectCount>1) {
						echo '<div style="width:250px;">'.$defectCount.' defects are assigned to you!</div>';
					}
				}
			?>
		</center>
		</div>
	</body>
</html>