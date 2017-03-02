<!DOCTYPE HTML>
    <head>
        <script type="text/javascript">
        function WebSocket()
        {
           if ("WebSocket" in window)
           {
              // Let us open a web socket
              var addr = "ws://ec2-35-167-112-130.us-west-2.compute.amazonaws.com:9998/websocket.php";
              var ws = new WebSocket(addr);

              ws.onopen = function()
              {

              };

              $('#send-btn').click(function(){
                  var msg = {
                      business_id: "<?php echo $_COOKIE['business_id']; ?>",
                      type: summon,
                      table_id: "<?php echo $_COOKIE['table_id']; ?>"
                  };
                 ws.send(JSON.stringify(msg));
                  alert("Waitress notified...");
              };

              ws.onclose = function()
              {
                 // websocket is closed.
                 alert("Connection is closed...");
              };
           }

           else
           {
              // The browser doesn't support WebSocket
              alert("Please use Chrome or Safari!");
           }
       }
        </script>
    </head>
    <body>
        <div>
            <button id="send-btn" class=button>Get Server</button>
        </div>
    </body>
</html>
