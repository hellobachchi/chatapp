function saveChat(message) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", `savechat.php`, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`message=${message}`);
}


var id;
var lastmessageid;

var chatterId = 1;

function loadChatUser(chatterId) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) {
            id = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", `loaduser.php`, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`chatterId=${chatterId}`);
}

function loadChat() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) {
            var x = JSON.parse(xmlhttp.responseText);
            lastmessageid = x[x.length - 1];

            x.pop();
            x.forEach(element => {
                if (element["from"] == id) {
                    $('<div class="message message-personal">' + element["message"] + '</div>').appendTo($('.mCSB_container')).addClass('new');

                } else {
                    if (id == 2) {
                        $('<div class="message new"><figure class="avatar"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80.jpg" /></figure>' + element["message"] + '</div>').appendTo($('.mCSB_container')).addClass('new');
                    } else {
                        $('<div class="message new"><figure class="avatar"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuCk2jmc1WIFk-7NWousDMZMbMU65oemY3EeHm2VvFK35SHQy0giq1n6jwffidrmjnF1E&usqp=CAU" /></figure>' + element["message"] + '</div>').appendTo($('.mCSB_container')).addClass('new');

                    }
                }
            });
            setDate();
            updateScrollbar();
        }
    }
    xmlhttp.open("POST", `loadchat.php`, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();

}
var el;

function clearChat() {
    $('.message').remove();

}

function refreshi() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) {
            var x = JSON.parse(xmlhttp.responseText);
            lastmessageid = x[x.length - 1];
            x.pop();
            x.forEach(element => {
                if (element["from"] == id) {

                } else {
                    if (id == 2) {
                        $('<div class="message new"><figure class="avatar"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80.jpg" /></figure>' + element["message"] + '</div>').appendTo($('.mCSB_container')).addClass('new');
                    } else {
                        $('<div class="message new"><figure class="avatar"><img src="https://cdna.artstation.com/p/assets/images/images/023/576/078/original/ying-chen-me-optimize.gif?1579652163" /></figure>' + element["message"] + '</div>').appendTo($('.mCSB_container')).addClass('new');

                    }
                }
            });
            setDate();
            updateScrollbar();
        }
    }
    xmlhttp.open("POST", `getlastmessage.php`, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`lastmessageid=${lastmessageid}`);
}
setInterval(refreshi, 3000);

function selectChatter() {
    
    var chatterId = document.getElementById("chatterSelect").value;
    var username = document.getElementById("username");
    var img = document.getElementById("userimg");
    
    if (id == 1) {
        username.innerHTML = "papuni";
        img.src = "https://cdna.artstation.com/p/assets/images/images/023/576/078/original/ying-chen-me-optimize.gif?1579652163";
    } else {
        username.innerHTML = "papli";
                img.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80.jpg";

    }
    loadChatUser(chatterId);
    clearChat();
    loadChat();
}