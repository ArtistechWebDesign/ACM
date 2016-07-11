<head>
    <script src="/bin/console_scripts.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "bin/head.php"; ?>
</head>

<section>
    <div id="console">
        <textarea id="console-result" readonly="readonly" rows="25" cols="75">========== ACM CONSOLE ==========</textarea><br />
        <input id="console-command" onkeypress="processKeyPress(event)" /><br />
        <button id="console-enter" onclick="processCommand()">Enter</button>
    </div>
</section>