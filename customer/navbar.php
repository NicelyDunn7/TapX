<script language="javascript" type="text/javascript">
    $(document).ready(function(){
        //Create new websocket
		var addr = 'ws://TapX.duckdns.org:9998/websocket.php';
        var ws = new WebSocket(addr);

        $('#send-btn').click(function(){
            var msg = {
                business_id: "<?php echo $_COOKIE['business_id']; ?>",
                type: "summon",
                name: "<?php echo $_COOKIE['user_name']; ?>",
                table_id: "<?php echo $_COOKIE['table_id']; ?>",
                quantity: "NULL",
                item: "NULL"
            };
           ws.send(JSON.stringify(msg));
           alert("Waitress notified...");
        });

        ws.onerror	= function(ev){
            if(window.console) console.log('Error Occured: ' + ev.data);
        };
        ws.onclose 	= function(ev){
            if(window.console) console.log('Disconnected from Server.');
        };

    });
	$( document ).ready(function() {
	    $(".tabItems").each(function () {
	    	var item = $(this).text();
	    	var replacedItem = item.replace(/_/g, ' ');
	    	$(this).text(replacedItem);
		});
	});
</script>
<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="#" id="send-btn">Get Server</a>
		  <?php
			include '../dbcreds.php';
			if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
				header('Location: home.php');
			}

			if(isset($_COOKIE['tab_price'])) 	///TAB PRICE IS PRICE OF QUANTITY OF DRINKS
			{
				foreach (json_decode($_COOKIE['tab_price']) as $name => $price) {
					$totalPrice += $price;
				}
			}
			echo "<a href='#viewTabModal' data-target='#viewTabModal' data-toggle='modal'>View Tab</a>";
			echo "<div class='current-tab'><a href='#viewTabModal' data-target='#viewTabModal' data-toggle='modal'>Total: $" . number_format($totalPrice, 2) . "</a></div>";
            $path = '../menus/'.$_COOKIE['business_id'].'.pdf';
            if(file_exists($path)){
                echo "<a href='../menus/".$_COOKIE['business_id'].".pdf'>View PDF Menu</a>";
            } else {
                echo "<h4>Encourage your establishment to upload a PDF menu!</h4>";
            }
		  ?>
		  <a id="close-tab" onclick='return clickedCloseTab();' value='Close Tab' id="close-btn">Close Tab</a>
</div>
<div id="viewTabModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">View Tab</h4>
					</div>
					<div id="tabItems" class="modal-body">
							<?php

							if(isset($_COOKIE['tab']) && isset($_COOKIE['tab_price']))	///TAB IS LINKED TO QUANTITY OF DRINK
							{
								echo "Current Tab:<br>";
										foreach (json_decode($_COOKIE['tab']) as $name => $quantity) {

												echo $quantity . "  " . str_replace('_', ' ', $name);
												foreach(json_decode($_COOKIE['tab_price']) as $pname => $price)
											{
													if($name == $pname) {
															echo " for a total of $" . number_format($price, 2);
													}

											}
					echo "<br>";
									}
							} else{
								echo "You haven't ordered anything! Select how many of each food or drink you'd like and submit the order!";
							}
							?>
					</div>
			    	<div class="modal-footer">
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
			</div>
	</div>
</div>
<span id="openbtn" class="glyphicon glyphicon-menu-hamburger" onclick="openNav()"></span>
