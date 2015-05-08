<?php

renderMessages(INFO_MESSAGES_SESSION_KEY, 'info-messages');
renderMessages(ERROR_MESSAGES_SESSION_KEY, 'error-messages');

function renderMessages($messagesKey, $cssClass) {
    if (isset($_SESSION[$messagesKey]) && count($_SESSION[$messagesKey]) > 0) {
        echo '<ul class="' . $cssClass . '">';
        foreach ($_SESSION[$messagesKey] as $msg) {
            echo "<li>" . htmlspecialchars($msg) . '</li>';
        }
        echo '</ul>';
    }
    $_SESSION[$messagesKey] = [];
}
