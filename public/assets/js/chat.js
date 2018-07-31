var username;

$(document).ready(function () {
    username = $('#username').html();
    $('#message').keyup(function (e) {
        if(e.keyCode == 13)
            sendMessage();
        else
            isTyping();
    })
});

function sendMessage() {
    var text = $('#message').val();
    if(text.length > 0){
        $.post('http://localhost:8000/send_message',function () {
            notTyping();
        })
    }
}

function isTyping() {

}

function notTyping() {
alert('not typing');
}