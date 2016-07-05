function postResult(resultString) {
    var resultHTML = $("#console-result").html();
    $("#console-result").html(resultHTML + "\n" + resultString);
    var resultArea = document.getElementById('console-result');
    resultArea.scrollTop = resultArea.scrollHeight;
}

function processCommand() {
    var command = $("#console-command").val();
    
    var commandArray = command.split(" ");
    
    if(command == "" || command == null) {
        postResult("Command null. Please enter a valid command.");
        return;
    }
    
    var arg0 = commandArray[0].toLowerCase();
    
    if(arg0.startsWith("u_")) {
        if(arg0 == "u_createUser") {
            
        } else if(arg0 == "u_deleteuser") {
            
        } else if(arg0 == "u_removeavatar") {
            
        } else if(arg0 == "u_avatar") {
            
        } else if(arg0 == "u_setemail") {
            
        } else if(arg0 == "u_email") {
            
        } else if(arg0 == "u_setname") {
            
        } else if(arg0 == "u_name") {
            
        } else if(arg0 == "u_setwebsite") {
            
        } else if(arg0 == "u_website") {
            
        } else if(arg0 == "u_setusername") {
            
        } else if(arg0 == "u_id") {
            
        } else if(arg0 == "u_setrole") {
            
        } else if(arg0 == "u_role") {
            
        } else {
            postResult("Unknown 'user' command. You can use the 'help' command for a list of commands.");
        }
    } else if(arg0.startsWith("p_")) {
        if(arg0 == "p_createpage") {
            
        } else if(arg0 == "p_deletepage") {
            
        } else if(arg0 == "p_setcontent") {
            
        } else if(arg0 == "p_content") {
            
        } else if(arg0 == "p_settitle") {
            
        } else if(arg0 == "p_title") {
            
        } else if(arg0 == "p_enable") {
            
        } else if(arg0 == "p_disable") {
            
        } else if(arg0 == "p_status") {
            
        } else if(arg0 == "p_custom") {
            
        } else {
            postResult("Unknown 'page' command. You can use the 'help' command for a list of commands.");
        }
    } else if(arg0.startsWith("s_")) {
        if(arg0 == "s_setactivedesign") {
            
        } else if(arg0 == "s_activedesign") {
            
        } else if(arg0 == "s_setrolename") {
            
        } else if(arg0 == "s_rolename") {
            
        } else if(arg0 == "s_setfrontpage") {
            
        } else if(arg0 == "s_frontpage") {
            
        } else if(arg0 == "s_setauthor") {
            
        } else if(arg0 == "s_author") {
            
        } else if(arg0 == "s_setauthorhelp") {
            
        } else if(arg0 == "s_authorhelpn") {
            
        } else {
            postResult("Unknown 'site' command. You can use the 'help' command for a list of commands.");
        }
    } else {
        if(arg0 == "refreshtables") {
            
        } else if(arg0 == "listusers") {
            
        } else if(arg0 == "listpages") {
            
        } else if(arg0 == "help") {
            
        } else {
            postResult("Unknown command. You can use the 'help' command for a list of commands.");
        }
    }
}