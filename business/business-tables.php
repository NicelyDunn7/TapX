<!DOCTYPE html>
<?php
	//Start session, check if user is logged in
	session_start();
	if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
		header('Location: business-login.php');
} ?>
<html>
	<head>
		<title>Table Page</title>
		<script src="../jquery.min.js"></script>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="../bootstrap.min.css">
		  <link rel="stylesheet" href="./css/background.css" type="text/css">
	  	  <link rel="stylesheet" href="./css/business-tables.css" type="text/css">
		  <script src="../jquery.min.js"></script>
		  <script src="../bootstrap.min.js"></script>
		<script language="javascript", type="text/javascript">
			$(document).ready(function(){
				//Create new websocket
				var addr = "ws:tapx.duckdns.org:9998/websocket.php";
				var ws = new WebSocket(addr);

				ws.onopen = function(ev) { // connection is open
					//Send message to tell server a business has connected
					var msg = {
						business_id: "<?php echo $_SESSION['business_id']; ?>",
						type: "business",
						name: "NULL",
						table_id: "NULL",
						quantity: "NULL",
						item: "NULL"
					}
					ws.send(JSON.stringify(msg));
					if(window.console) console.log('Connected to Server.');
				}

				ws.onmessage = function(ev){
					//Get message contents
					var msg = JSON.parse(ev.data); //PHP sends Json data
					var business_id = msg.business_id;
					var type = msg.type;
					var name = msg.name;
					var table_id = msg.table_id;
					if (type == 'summon'){
						document.getElementById(table_id).style.background = "yellow";
						$("#body" + table_id).prepend("<p>"+name+" Requested the Server!</p>");
					} else if (type == 'close'){
						document.getElementById(table_id).style.background = "red";
						$("#body" + table_id).append("<p>"+name+" Wants to Close Their Tab</p>");
					} else if (type == 'order'){
						var quantity = msg.quantity;
						var item = msg.item;
						document.getElementById(table_id).style.background = "green";
						$("#body" + table_id).append("<p>"+name+" ordered "+quantity+" "+item+"</p>");
					}

					//Output received message to the browser console
					if(window.console) console.log('Business ID: ' + business_id);
					if(window.console) console.log('Type: ' + type);
					if(window.console) console.log('Name: ' + name);
					if(window.console) console.log('Table ID: ' + table_id);
				}

				ws.onerror	= function(ev){
					if(window.console) console.log('Error Occured: ' + ev.data);
				};
				ws.onclose 	= function(ev){
					if(window.console) console.log('Disconnected from Server.');
				};

			});

			function clearTable(table_id){
				document.getElementById(table_id).style.background = "#D3D3D3";
				document.getElementById("body" + table_id).innerHTML = "";
			}
			$( document ).ready(function() {
			    $(".body").each(function () {
			    	var item = $(this).text();
			    	var replacedItem = item.replace(/_/g, ' ');
			    	$(this).text(replacedItem);

				});
			});
		</script>

		</head>
	<body>
		<div class="container">
			<?php
				//Query database to get all tables and output to the view
				include '../dbcreds.php';
				$bar_query = "SELECT business_name FROM businesses WHERE business_id='".$_SESSION['business_id']."'";
						$bar_result = mysqli_query($conn, $bar_query);
						$bar = mysqli_fetch_array($bar_result);

					echo "<a class='button' href='business-admin.php'>Press Here to Return</a>";
					$table_query =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."' ORDER BY table_num";
					$table_result = mysqli_query($conn, $table_query);

					echo "<div class='flex-container'>";
					while($row = mysqli_fetch_array($table_result)){
						echo "<div class='table-div'><button class = 'table-btn' type='button' data-toggle='modal' data-target='#modal".$row['table_id']."' class='flex-item' id='". $row['table_id']."'>". $row['table_num']."</div></button>";
					}
					echo "</div>";
					$table_query2 =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."' ORDER BY table_num";
					$table_result2 = mysqli_query($conn, $table_query2);
					echo "<div class='col-md-12'>";
					while($row = mysqli_fetch_array($table_result2)){
						echo  "<div id='modal".$row['table_id']."' class='modal fade' role='dialog'>
							  		<div class='modal-dialog'>
							  			<div class='modal-content'>
							  				<div class='modal-header'>
							  					<h4 class='modal-title'>Table ".$row['table_num']."</h4>
						      				</div>
							      			<div id='body".$row['table_id']."' class='modal-body'>

							      			</div>
							      			<div class='modal-footer'>
										        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										        <button type='button' class='btn btn-default' data-dismiss='modal' onclick='clearTable(".$row['table_id'].")'>Clear</button>
										    </div>
										</div>
									</div>
							   </div>";

					}
					echo "</div>";
					mysqli_close($conn);
			?>
		</div>
	</body>
</html>
