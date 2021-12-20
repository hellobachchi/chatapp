<?php

include 'php/process.php';
go_login_if_not_logged_in();
connect_database();

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="css/style.css" />

<div class="chat">

    <div class="chat-title">
        <h1 id="username"></h1>

        <figure class="avatar" id="avatar">

            <img id="userimg" />
        </figure>
    </div>

    <div class="messages">
        <div class="messages-content">

        </div>
    </div>
    <div class="message-box">
        <textarea type="text" class="message-input" placeholder="Type message..."></textarea>
        <button type="submit" class="message-submit">Send</button>

    </div>
    <select id="chatterSelect" onchange="selectChatter();">

        <option>select user</option>
        <?php
        $sql = "select * from user";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if (!($row['id'] === $_SESSION['id'])) {

                echo "<option value='{$row['id']}'>{$row['username']}</option>";
            }
        }
        ?>
    </select>
</div>

<div class="bg"></div>
<script src="js/script.js"></script>
<script src="js/chatscript.js"></script>