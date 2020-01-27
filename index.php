<?php
include_once 'classes/Shout.php';

$shout = new Shout();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat BOX</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper clr">
		<header class="headsection clr">
			<h2 style="font-family: cursive"><img src="img/chat.png" alt="" style="height: 50px;width: 50px;">Chat BOX</h2>
		</header>
		<section class="content clr">
			<div class="box">
				<ul>
					<?php

						$getdata = $shout->getAlldata();
						if ($getdata) {
							while ( $data = $getdata->fetch_assoc()) {?>
								<li><span><?php echo $data['time']; ?></span> - <strong><?php echo $data['name']; ?></strong> <?php echo $data['body']; ?></li>
							<?php } } ?>		
					
				</ul>
			</div>
			<?php 

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					
					$shoutData = $shout->insertData($_POST);
				}
			?>
			<div class="shoutform clr">
				<form action="#" method="post">
					<table>
						<tr>
							<td><strong>Name</strong></td>
							<td>:</td>
							<td><input type="text" name="name" required placeholder="Please Enter your Name"></td>
						</tr>
						<tr>
							<td><strong>Text</strong></td>
							<td>:</td>
							<td><input type="text" name="body" required placeholder="Please Enter your Text" style="height: 40px;"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="image" src="img/send.svg" alt="Submit" style="height: 50px;width: 50px;" align="right"></td>
						</tr>
					</table>
				</form>
			</div>
		</section>
		<footer class="footsection">
			<h4>&copy;Made by Kabir Hasan</h4>
		</footer>
	</div>
	
</body>
</html>