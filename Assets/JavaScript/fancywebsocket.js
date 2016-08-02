var FancyWebSocket = function(url)
{
	var callbacks = {};
	var ws_url = url;
	var conn;
	
	this.bind = function(event_name, callback)
	{
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;
	};
	
	this.send = function(event_name, event_data)
	{
		this.conn.send( event_data );
		return this;
	};
	
	this.connect = function() 
	{
		if ( typeof(MozWebSocket) == 'function' )
		this.conn = new MozWebSocket(url);
		else
		this.conn = new WebSocket(url);
		
		this.conn.onmessage = function(evt)
		{
			dispatch('message', evt.data);
		};
		
		this.conn.onclose = function(){dispatch('close',null)}
		this.conn.onopen = function(){dispatch('open',null)}
	};
	
	this.disconnect = function()
	{
		this.conn.close();
	};
	
	var dispatch = function(event_name, message)
	{
		if(message == null || message == "")//aqui es donde se realiza toda la accion
			{
			}
			else
			{
                //var JSONdata    = JSON.stringify(message);
              //  var user_id    = JSONdata[0].user_id;
             //   var created_at    = JSONdata[0].created_at;
                
               // var format_notification = "<br>"+message +" has send you a notification";
                document.getElementById('notifications').innerHTML = "";
                getNotifications();
			}
	}
};

var Server;
function send( text ) 
{
    Server.send( 'message', text );
}

function getNotifications(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'Controllers/UserController/UserController.php',
        success: function(data){
            for(var i =0; i<data['notifications'].length;i++){
                $('#notifications').append("<div class='notification'>User with id sent "+data['notifications'][i]['user_id']+" sent you a notification at "+ data['notifications'][i]['created_at']+"</div>");
            }
            notificationCount();
        },
        error: function(e){
            console.log(e.message);
        }
    });
}

function notificationCount(){
    var countNotification = document.getElementsByClassName('notification').length;
    document.getElementById('count').innerHTML = countNotification;
}


$(document).ready(function() 
{
	Server = new FancyWebSocket('ws://172.18.232.22:8080');
    Server.bind('open', function()
	{
    });
    Server.bind('close', function( data ) 
	{
    });
    Server.bind('message', function( payload ) 
	{
    });
    Server.connect();
});