<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test App</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="Assets/JavaScript/fancywebsocket.js"></script>
    </head>
    <body>
        <?php 
            $port = $_SERVER['SERVER_PORT'];
            $ip = $_SERVER['SERVER_ADDR'];
            echo "$ip:$port"
        ?>
        <div id="users">
            <h1>USERS</h1>
        </div>
        <div>
            <h1>NOTIFICATIONS: <span id="count"></span></h1>
            <div id="notifications">
            </div>
        </div>
        <input type="hidden" id="" value="">
        <script>
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'Controllers/UserController/UserController.php',
                success: function(data){
                    for(var i =0; i<data['users'].length;i++){
                        $('#users').append(data['users'][i]['user_name']+" ");
                        console.log(data['users'][i]['user_name']);
                    }
                },
                error: function(e){
                    console.log(e.message);
                }
            });
            getNotifications(); //Function defined at fancywebsocket.js
        </script>
    </body>
</html>