<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><br><br><br><br>
<center><style>
.mySlides {display:none;}
</style>
<table  border="0px" width="80%"  style="background-image: url(assets/img/board.png);background-size: 100% 100%; height: 400px;text-align: center;">
				<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement order by id desc limit 5 ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>
				 <div class="w3-content w3-section" style="max-width:500px">
				 <tr class="mySlides" >
				 	
				 		<td width="30%" ><center>
				 	<img width="300px" style="margin-top: 50px" height="300px" src="<?php echo $row['upload'] ?>" >
				 	</center></td>
				 	<td width="15%"><h3 class="text-white">What?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['subject'] ?></u><hr class="bg-white">
				 	<h3 class="text-white">Who?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['org'] ?></u>

				 	</td>
				 	<td width="15%"><h3 class="text-white">When?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['date'] ?></u><hr class="bg-white">
				 <h3 class="text-white">Where?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['place'] ?></u>
				 	</td><td width="10%"></td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
	<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>

</center>
</body>
</html>