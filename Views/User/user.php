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
        <select id="selectUser"></select>
        <button type="button" id="notification" class="btn btn-success">Send Notification</button>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'Controllers/UserController/UserController.php',
                    success: function(data){
                        for(var val in data){                            
                            for(var i =0; i<data['users'].length;i++){
                                $('#selectUser').append($('<option>', { value : data['users'][i]['id']}).text(data['users'][i]['user_name']));
                                console.log(data['users'][i]['id']); 
                            }
                        }
                    },
                    error: function(e){
                        console.log(e.message);
                    }
                });
                $('#notification').click(function(){
                    var id = $('#selectUser').val();
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {id:id},
                        url: 'Controllers/UserController/NotificationController.php',
                        success: function(data){
                            console.log(data['response']); 
                            send(data['response']);
                        },
                        error: function(e){
                            console.log(e.message);
                        }
                    });
                });
            });
        </script>
    </body>
</html>