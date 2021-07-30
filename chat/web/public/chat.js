(function( $ ) {
    const WS_ADDRESS = 'ws://ws.skillup.local:3000/chat';

    let layout;
    let webSocket;
    let options = {
        authorId: null
    };

    let methods = {
        initConnection: function () {
            webSocket = new WebSocket(WS_ADDRESS);
            // conn.onmessage = function(e) { console.log(e.data); };
            // conn.onopen = function(e) { conn.send('Hello Me!'); };
        },
        sendMessage: function (e) {
            e.stopPropagation();
            e.preventDefault();

            let input = $(this).siblings('input');

            let message = JSON.stringify({
                text: input.val(),
                time: Math.floor(new Date().getTime() / 1000),
                options: options
            });

            webSocket.send(message);

            input.val('');
        },
        renderMessage: function (e) {
            console.log(e);
        }
    };


    $.fn.initChat = function(authorId) {
        layout = $(this);
        options.authorId = authorId;

        methods.initConnection();

        $(this).find('.input_msg_write').on('click', '.msg_send_btn', methods.sendMessage);

        webSocket.onmessage = methods.renderMessage;

        return this;
    };

}( jQuery ));