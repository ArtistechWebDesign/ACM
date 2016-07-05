<?php
    include $_SERVER['DOCUMENT_ROOT'] . "bin/head.php";
?>

<head>
    <script src="/bin/console_scripts.js"></script>
</head>

<section>
    <div id="console">
        <textarea id="console-result" readonly="readonly">Enter a command to begin using the ACM console.</textarea><br />
        <input id="console-command" /><br />
        <button id="console-enter" onclick="processCommand()">Enter</button>
    </div>
</section>