<!DOCTYPE html>
<html>
<head>
    <?php
        include '../dbcreds.php'
        if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
            header('Location: home.php');
        }
    ?>
    <script src="../jquery-3.1.1.js"></script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function(){
            //Create new websocket
            var addr = 'ws://ec2-54-202-88-8.us-west-2.compute.amazonaws.com:9998/websocket.php'
            var ws = new WebSocket(addr);
            //Open connection, send message to notify server a customer has connected
            ws.onopen = function(ev) { // connection is open
                var close = {
                    business_id: "<?php echo $_COOKIE['business_id']; ?>",
                    type: "customer",
                    table_id: "NULL",
                    quantity: "NULL",
                    item: "NULL"
                }
                ws.send(JSON.stringify(close));
                if(window.console) console.log('Connected to Server.');
            }
            //Send message to server notifying customers wish to summon the waiter/waitress
            $('#close-btn').click(function(){
                var close = {
                    business_id: "<?php echo $_COOKIE['business_id']; ?>",
                    type: "close",
                    table_id: "<?php echo $_COOKIE['table_id']; ?>",
                    quantity: "NULL",
                    item: "NULL"
                };
               ws.send(JSON.stringify(close));
               alert("Waitress notified...");
            });
            ws.onerror	= function(ev){
                if(window.console) console.log('Error Occured: ' + ev.data);
            };
            ws.onclose 	= function(ev){
                if(window.console) console.log('Disconnected from Server.');
            };
        });
    </script>
</head>
<body>
    <div>
        <button id="close-btn" class="button">Close Tab</button>
    </div>
</body>
</html>
