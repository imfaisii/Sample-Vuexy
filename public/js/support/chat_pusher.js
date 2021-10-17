Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "local",
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: true,
    //authEndpoint: 'http://51.79.242.170/web_sockets/api/custom_auth',
    enabledTransports: ["ws", "wss"], // <- added this param
});

window.Echo.private("socket." + my_room_id) //listening on my group id
    .listen(".notify_socket", (e) => {
        var my_div = document.getElementById("message");
        //alert(e.Sender);
        var time = current_time;
        if (e.room == room_id) {
            if (e.Sender == current_user_id) {
                my_div.innerHTML +=
                    '<li class="chat-right">' +
                    '<div class="chat-hour">' +
                    time +
                    " </div>" +
                    '<div class="chat-text">' +
                    e.message +
                    "</div>" +
                    '<div class="chat-avatar">' +
                    '<img src="' +
                    my_pic +
                    '" alt="My_pic">' +
                    '<div class="chat-name">'+me_name+'</div>' +
                    "</div>" +
                    "</li>";
            } else if (e.receiver == current_user_id) {
                my_div.innerHTML +=
                    '<li class="chat-left">' +
                    '<div class="chat-avatar">' +
                    '<img src="' +
                    other_user_pic +
                    '" alt="other_user_pic">' +
                    '<div class="chat-name">' +
                    other_user_name +
                    "</div>" +
                    "</div>" +
                    '<div class="chat-text">' +
                    e.message +
                    "</div>" +
                    '<div class="chat-hour">' +
                    time +
                    " </div>" +
                    "</li>";
                const audio = new Audio(url);
                audio.play();
            }

            document.getElementById("message_input").value = "";
            $("html,body").animate(
                {
                    scrollTop: document.body.scrollHeight,
                },
                "fast"
            );
            $('.chat-container').scrollTop($('.chat-container')[0].scrollHeight);
        }
    });
