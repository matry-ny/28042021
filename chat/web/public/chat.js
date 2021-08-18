(function( $ ) {
    const WS_ADDRESS = 'ws://ws.skillup.local:3000/chat';
    const TYPE_SUBSCRIBE = 'subscribe';
    const TYPE_MESSAGE = 'message';

    let layout;
    let webSocket;
    let options = {
        authorId: null,
        roomId: null
    };
    let messagesHeight = 0;

    let methods = {
        initConnection: function () {
            webSocket = new WebSocket(WS_ADDRESS);
        },
        subscribe: function () {
            let subscribe = JSON.stringify({
                type: TYPE_SUBSCRIBE,
                data: options
            });

            let intervalId = setInterval(() => {
                if (webSocket.readyState === 1) {
                    webSocket.send(subscribe);
                    clearInterval(intervalId);
                }
            }, 10);
        },
        sendMessage: function (e) {
            e.stopPropagation();
            e.preventDefault();

            let input = $(this).siblings('input');

            let message = JSON.stringify({
                type: TYPE_MESSAGE,
                data: {
                    text: input.val(),
                    time: Math.floor(new Date().getTime() / 1000),
                    options: options
                }
            });

            webSocket.send(message);

            input.val('');
        },
        acceptMessage: function (e) {
            let message = JSON.parse(e.data);
            let isMyMessage = message['user_id'] === options.authorId;
            let html = isMyMessage ? methods.renderOutgoingMessage(message) : methods.renderIncomingMessage(message);

            methods.drawMessage(html);
            methods.scrollMessages();
        },
        drawMessage: function (html) {
            $('.msg_history').append(html);
            messagesHeight += html.outerHeight(true);
        },
        scrollMessages: function () {
            let messagesList = $('body').find('.msg_history');
            messagesList.animate({scrollTop: messagesHeight},"fast");
        },
        renderIncomingMessage(data) {
            return $('<div/>')
                .addClass('incoming_msg')
                .append(
                    $('<div/>')
                        .addClass('incoming_msg_img')
                        .append(
                            $('<img/>')
                                .attr({
                                    src: 'https://ptetutorials.com/images/user-profile.png',
                                    alt: 'sunil'
                                })
                        )
                )
                .append(
                    $('<div/>')
                        .addClass('received_msg')
                        .append(
                            $('<div/>')
                                .addClass('received_withd_msg')
                                .append(
                                    $('<p/>').text(data['text'])
                                )
                                .append(
                                    $('<span/>')
                                        .addClass('time_date')
                                        .text(methods.formatDate(data['created_at']))
                                )

                        )
                );
        },
        renderOutgoingMessage(data) {
            return $('<div/>')
                .addClass('outgoing_msg')
                .append(
                    $('<div/>')
                        .addClass('sent_msg')
                        .append(
                            $('<p/>').text(data['text'])
                        )
                        .append(
                            $('<span/>')
                                .addClass('time_date')
                                .text(methods.formatDate(data['created_at']))
                        )
                );
        },
        formatDate: function (timestamp) {
            let date = new Date(timestamp * 1000);
            const monthNames = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];

            return date.getHours() + ':' + date.getMinutes() + ' | ' + monthNames[date.getMonth()]  + '  ' + date.getDate();
        },
        selectRoom: function (e) {
            e.stopPropagation();
            e.preventDefault();

            let room = $(this);
            options.roomId = room.data('roomId');

            methods.subscribe();

            room.siblings('.chat_list').removeClass('active_chat');
            room.addClass('active_chat');
            $('.msg_history').html('');

            $.ajax({
                url: '/rooms/get-messages?room_id=' + options.roomId,
                method: 'get',
                contentType: 'json',
                success: function (data) {
                    messagesHeight = 0;
                    let messages = JSON.parse(data);
                    $.each(messages, function (i, message) {
                        let html = parseInt(message['user_id']) === options.authorId
                            ? methods.renderOutgoingMessage(message)
                            : methods.renderIncomingMessage(message);
                        methods.drawMessage(html);
                    });
                    methods.scrollMessages();
                }
            });
        }
    };


    $.fn.initChat = function(authorId) {
        layout = $(this);
        options.authorId = authorId;

        methods.initConnection();

        $(this).find('.input_msg_write')
            .on('click', '.msg_send_btn', methods.sendMessage)
            .on('keydown', function (e) {
                if ((e.ctrlKey || e.metaKey) && (e.keyCode === 13 || e.keyCode === 10)) {
                    methods.sendMessage(e);
                }
            });

        $(this).find('.chat_list').on('click', methods.selectRoom);
        $(this).find('.chat_list:first').click();

        webSocket.onmessage = methods.acceptMessage;

        return this;
    };

}( jQuery ));