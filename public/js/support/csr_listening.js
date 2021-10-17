

    Pusher.logToConsole = true;

    window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'local',
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: true,
    //authEndpoint: 'http://51.79.242.170/web_sockets/api/custom_auth',
    enabledTransports: ['ws', 'wss'] // <- added this param
      });
     
  
  window.Echo.private('listener.'+my_id) //listening on my group id
    .listen('.notify_listener', (e) => {    
      if(e.Sender==my_id){
        var window_name = e.window_name;
        let sound1 = asset_folder+'/audio/message_agent.mp3';

        const audio = new Audio(sound1);
        audio.play();
        // }
       //   it means he has become a part of room
       window.open('support_chat',window_name,"toolbar=no, menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no");
      }
    }); 

