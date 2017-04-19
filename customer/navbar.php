<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="#">Get Server</a>
		  <?php
			include '../dbcreds.php';
			if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
				header('Location: home.php');
			}


			// echo "Current Tab<br><br>";

			// if(isset($_COOKIE['tab']) && isset($_COOKIE['tab_price']))	///TAB IS LINKED TO QUANTITY OF DRINK
			// {
			// 	foreach (json_decode($_COOKIE['tab']) as $name => $quantity) {
			// 		echo $quantity . "  " . $name;
			// 		foreach(json_decode($_COOKIE['tab_price']) as $pname => $price)
			// 		{
			// 			if($name == $pname) {
			// 				echo " for a total of $" . $price;
			// 			}
						
			// 		}
			// 		echo "<br>";
			// 	}
			// }

			if(isset($_COOKIE['tab_price'])) 	///TAB PRICE IS PRICE OF QUANTITY OF DRINKS
			{
				foreach (json_decode($_COOKIE['tab_price']) as $name => $price) {
					$totalPrice += $price;
				}
			}
			echo "<a href='tab.php'>View Tab</a>";
			echo "<a href='view-bus-info.php'>View Tab</a>";
			echo "<div class='current-tab'><a href='tab.php'>Total: $" . number_format($totalPrice, 2) . "</a></div>";
		  ?>
		  <a id="close-tab" onclick='return clickedCloseTab();' value='Close Tab' id="close-btn">Close Tab</a>		  
</div>
<span id="openbtn" class="glyphicon glyphicon-menu-hamburger" onclick="openNav()"></span>	

