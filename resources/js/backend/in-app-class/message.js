import RtmClient from './rtm-client';

(function ($) {
    "use strict";

    const chatView = $('#chatView');
    const agoraLoading = $('.agora-loading');

    const chatItemHtml = (message, memberName, date, sender = 'receiver') => {

        if (sender == 'receiver') {
            return `<div class="user-card">
            <div class="avatar">
                <img src="${defaultAvatar}" alt="" class="img-cover rounded-circle">
            </div>
            <div class="user-card-content">
                <div class="user-card-wraper">
                    <span>${memberName}</span>
                    <p class="mb-0">${message}</p>
                </div>
                <div class="user-send-date">${date}</div>
            </div>
        </div>`
        } else {
            return `<div class="send-message ${sender}">
            <div class="send-message-wrap">
                <p>${message}</p>
            </div>
            <div class="text-right">
                <span>${date}</span>
            </div>

        </div>`;
        }

    };

    const joinedHtml = (username, joinAt) => {
        return `<div class="user-card">
            <div class="avatar">
                <img src="${userDefaultAvatar}" alt="" class="img-cover rounded-circle">
            </div>
            <div class="user-card-content">
                <div class="user-card-wraper">
                    <span>${username}</span>
                    <p class="mb-0">${joinedToChannel}</p>
                </div>
                <div class="user-send-date">${joinAt}</div>
            </div>
        </div>`;
    };

    function handleLogin(rtm, callback) {
        if (rtm._logined) {
            return false;
        }

        try {
            rtm.init(appId);

            window.rtm = rtm;

            rtm.login(accountName, rtmToken).then(() => {
                rtm._logined = true;

                callback();
            }).catch((err) => {
            });
        } catch (err) {
        }
    }

    function handleJoinToChannel(rtm, callback) {

        if (!rtm._logined) {
            return false;
        }

        rtm.joinChannel(channelName).then(() => {
            let joinAt = new Date(rtm.channels[channelName].channel.client.lastLoginTime).toLocaleTimeString()
            chatView.append(joinedHtml(rtm.accountName, joinAt));

            updateChatViewScroll();

            rtm.channels[channelName].joined = true;

            callback();
        }).catch((err) => {
        });
    }


    $(() => {
        const rtm = new RtmClient();

        // login user by token
        handleLogin(rtm, function () {

            // join to channel
            handleJoinToChannel(rtm, function () {
                agoraLoading.addClass('d-none');
                rtm.on('MemberJoined', ({channelName, args}) => {
                    let joinAt = new Date(rtm.channels[channelName].channel.client.lastLoginTime).toLocaleTimeString()

                    const memberId = args[0];
                    chatView.append(joinedHtml(memberId, joinAt));

                    updateChatViewScroll()
                });

                rtm.on('MemberLeft', ({channelName, args}) => {
                    const memberId = args[0];

                    //
                });

                rtm.on('ChannelMessage', ({channelName, args}) => {
                    const [message, memberId, other] = args;

                    const date = new Date(other.serverReceivedTs).toLocaleTimeString();
                    chatView.append(chatItemHtml(message.text, memberId, date));

                    updateChatViewScroll();
                });
            });
        });
    });

    function updateChatViewScroll() {
        const $chatView = $('#chatView');

        $chatView.scrollTop($chatView[0].scrollHeight);
    }

    function sendMessage() {
        if (!rtm._logined) {
            alert('Please Login First');
            return false;
        }

        const messageInput = $('#messageInput');
        const message = messageInput.val();

        if (message && message !== '') {
            rtm.sendChannelMessage(message, channelName).then(() => {
                const date = new Date().toLocaleTimeString();

                chatView.append(chatItemHtml(message, rtm.accountName, date, 'sender'));

                updateChatViewScroll();

                messageInput.val('');
            }).catch((err) => {
            });
        }
    }

    $('body').on('click', '#sendMessage', function (e) {
        e.preventDefault();

        sendMessage();
    });


})(jQuery);

