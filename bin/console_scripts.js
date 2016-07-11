function postResult(resultString) {
    var resultHTML = $("#console-result").html();
    $("#console-result").html(resultHTML + "\n> " + resultString);
    var resultArea = document.getElementById('console-result');
    resultArea.scrollTop = resultArea.scrollHeight;
}

function postInquiry(resultString) {
    var resultHTML = $("#console-result").html();
    $("#console-result").html(resultHTML + "\n" + resultString);
    var resultArea = document.getElementById('console-result');
    resultArea.scrollTop = resultArea.scrollHeight;
}

function processKeyPress(e) {
    if(e.keyCode == 13) {
        processCommand();
    }
}

function isValid(str) { return /^\w+$/.test(str); }

function processCommand() {   
    var command = $("#console-command").val();
    
    $("#console-command").val("");
    
    postInquiry(command);
    
    var commandArray = command.split(" ");
    
    if(command == "" || command == null) {
        postResult("Command null. Please enter a valid command.");
        return;
    }
    
    var arg0 = commandArray[0].toLowerCase();
    var size = commandArray.length;
    
    if(arg0.startsWith("u_")) {
        if(arg0 == "u_create") {
            if(size == 5) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                arg3 = commandArray[3];
                arg4 = commandArray[4];
                
                if(isValid(arg1)) {
                    if(arg1.length >= 3) {
                        if(arg1.length <= 30) {
                            if(arg2.length <= 60) {
                                if(arg2.includes("@") && arg2.includes(".")) {
                                    if(arg3.length >= 8) {
                                        if(!isNaN(arg4)) {
                                            if(arg4 >= 0 && arg4 <= 3) {
                                                xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                        var response = xhttp.responseText;
                                                        if(response == 0) {
                                                            xhttp = new XMLHttpRequest();
                                                            xhttp.onreadystatechange = function() {
                                                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                                    var response = xhttp.responseText; 
                                                                    if(response == 1) {
                                                                        postResult("User created successfully.");
                                                                    } else {
                                                                        postResult("An error occurred.")
                                                                    }
                                                                }
                                                            };
                                                            xhttp.open("GET", "/bin/console/commands.php?command=u_create&arg1=" + arg1 + "&arg2=" + arg2 + "&arg3=" + arg3 + "&arg4=" + arg4, true);
                                                            xhttp.send();
                                                        } else {
                                                            postResult("A user with that username already exists.");
                                                        }
                                                    }
                                                };
                                                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                                                xhttp.send();
                                            } else {
                                                postResult("Please specify a valid role (0-3).");
                                                
                                            }
                                        } else {
                                            postResult("Please specify a valid role (0-3).");
                                            
                                        }
                                    } else {
                                        postResult("Please use a default password that has at least 8 characters.");
                                        
                                    }
                                } else {
                                    postResult("Argument 2 is not a valid email.");
                                    
                                }
                            } else {
                                postResult("Email addresses may not be longer than 60 characters.");
                            }
                        } else {
                            postResult("Usernames can be no longer than 30 characters.");
                        }
                    } else {
                        postResult("Please specify a username of at least 3 characters.")
                    }
                } else {
                    postResult("Please use a username that only contains alphanumeric characters.");
                    
                }
            } else {
                postResult("Incorect syntax. Correct usage: u_create [username] [email] [defaultpassword] [role]");
                
            }
        } else if(arg0 == "u_delete") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("User deleted successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_delete&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_delete [username]");
                
            }
        } else if(arg0 == "u_removeavatar") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("User's avatar has been removed successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_removeavatar&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_removeavatar [username]");
                
            }
        } else if(arg0 == "u_avatar") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Avatar URL: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_avatar&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_avatar [username]");
                
            }
        } else if(arg0 == "u_setemail") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            if(arg2.includes("@") && arg2.includes(".")) {
                                if(arg2.length <= 60) {
                                    xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function() {
                                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                                            var response = xhttp.responseText; 
                                            if(response == 1) {
                                                postResult("User's email has been updated successfully.");
                                            } else {
                                                postResult("An error occurred.");
                                            }
                                        }
                                    };
                                    xhttp.open("GET", "/bin/console/commands.php?command=u_setemail&arg1=" + arg1 + "&arg2=" + arg2, true);
                                    xhttp.send();
                                } else {
                                    postResult("Email addresses may not be longer than 60 characters.");
                                }
                            } else {
                                postResult("Argument 2 is not a valid email address.");
                            }
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_setemail [username] [email]");
                
            }
        } else if(arg0 == "u_email") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Email: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_email&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_email [username]");
                
            }
        } else if(arg0 == "u_setname") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            if(arg2.length <= 50) {
                                xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                                        var response = xhttp.responseText; 
                                        if(response == 1) {
                                            postResult("User's name has been updated successfully.");
                                        } else {
                                            postResult("An error occurred.");
                                        }
                                    }
                                };
                                xhttp.open("GET", "/bin/console/commands.php?command=u_setname&arg1=" + arg1 + "&arg2=" + arg2, true);
                                xhttp.send();
                            } else {
                                postResult("Users' names may not be longer than 50 characters.");
                            }
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_setname [username] [name]");
                
            }
        } else if(arg0 == "u_name") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Name: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_name&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_name [username]");
                
            }
        } else if(arg0 == "u_setwebsite") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            arg2 = arg2.replace("http://", "");
                            if(arg2.includes(".")) {
                                if(arg2.length <= 100) {
                                    xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function() {
                                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                                            var response = xhttp.responseText; 
                                            if(response == 1) {
                                                postResult("User's website URL has been updated successfully.");
                                            } else {
                                                postResult("An error occurred.");
                                            }
                                        }
                                    };
                                    xhttp.open("GET", "/bin/console/commands.php?command=u_setwebsite&arg1=" + arg1 + "&arg2=" + arg2, true);
                                    xhttp.send();
                                } else {
                                    postResult("User website URLs may be longer than 100 characters.");
                                }
                            } else {
                                postResult("Argument 2 is not a valid website URL.");
                            }
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_setwebsite [username] [websitenoprotocol]");
                
            }
        } else if(arg0 == "u_website") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Website URL: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_website&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_website [username]");
                
            }
        } else if(arg0 == "u_setusername") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            if(isValid(arg1)) {
                                if(arg1.length >= 3) {
                                    if(arg2.length <= 30) {
                                        xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                var response = xhttp.responseText; 
                                                if(response == 1) {
                                                    postResult("Username has been updated successfully.");
                                                } else {
                                                    postResult("An error occurred.");
                                                }
                                            }
                                        };
                                        xhttp.open("GET", "/bin/console/commands.php?command=u_setusername&arg1=" + arg1 + "&arg2=" + arg2, true);
                                        xhttp.send();
                                    } else {
                                        postResult("Usernames can be no longer than 30 characters.");
                                    }
                                } else {
                                    postResult("Please specify a username of at least 3 characters.")
                                }
                            } else {
                                postResult("Please use a username that only contains alphanumeric characters.");
                            }
                        } else {
                            postResult("User ID not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUserId.php?id=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_setusername [id]");
                
            }
        } else if(arg0 == "u_id") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("ID: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_id&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_id [username]");
                
            }
        } else if(arg0 == "u_setrole") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            if(!isNaN(arg2)) {
                                if(arg2 >= 0 && arg4 <= 3) {
                                    xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function() {
                                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                                            var response = xhttp.responseText; 
                                            if(response == 1) {
                                                postResult("User's role has been updated successfully.");
                                            } else {
                                                postResult("An error occurred.");
                                            }
                                        }
                                    };
                                    xhttp.open("GET", "/bin/console/commands.php?command=u_setrole&arg1=" + arg1 + "&arg2=" + arg2, true);
                                    xhttp.send();
                                } else {
                                    postResult("Please specify a valid role (0-3).");
                                }
                            } else {
                                postResult("Please specify a valid role (0-3).");
                            }
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_setrole [username] [role]");
                
            }
        } else if(arg0 == "u_role") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Role: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_role&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_role [username]");
                
            }
        } else if(arg0 == "u_setbio") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            if(arg2.length <= 500) {
                                xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                                        var response = xhttp.responseText; 
                                        if(response == 1) {
                                            postResult("User's bio has been updated successfully.");
                                        } else {
                                            postResult("An error occurred.");
                                        }
                                    }
                                };
                                xhttp.open("GET", "/bin/console/commands.php?command=u_setbio&arg1=" + arg1 + "&arg2=" + arg2, true);
                                xhttp.send();
                            } else {
                                postResult("Please specify a bio less than 500 characters.");
                            }
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_setrole [username] [role]");
                
            }
        } else if(arg0 == "u_bio") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Bio: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=u_bio&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("User not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: u_id [username]");
                
            }
        } else {
            postResult("Unknown 'user' command. You can use the 'help' command for a list of commands.");
        }
    } else if(arg0.startsWith("p_")) {
        if(arg0 == "p_create") {
            if(size == 4) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                arg3 = commandArray[3];
                
                if(arg1.length <= 100){
                    if(isValid(arg1)) {
                        if(arg2.length <= 200) {
                            if(arg2.startsWith("/")) {
                                arg2 = arg2.substr(1);
                            }
                            arg2 = "/" + arg2;
                            
                            if(arg3 == 0 || arg3 == 1) {
                                xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                                        var response = xhttp.responseText;
                                        if(response == 0) {
                                            xhttp = new XMLHttpRequest();
                                            xhttp.onreadystatechange = function() {
                                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                    var response = xhttp.responseText; 
                                                    if(response == 1) {
                                                        postResult("Page created successfully.");
                                                    } else {
                                                        postResult("An error occurred.")
                                                    }
                                                }
                                            };
                                            xhttp.open("GET", "/bin/console/commands.php?command=p_create&arg1=" + arg1 + "&arg2=" + arg2 + "&arg3=" + arg3, true);
                                            xhttp.send();
                                        } else {
                                            postResult("A page with that URL already exists.");
                                        }
                                    }
                                };
                                xhttp.open("GET", "/bin/console/isValidURL.php?u=" + arg1, true);
                                xhttp.send();
                            } else {
                                postResult("Argument 3 is not a valid boolean [0/1].");
                            }
                        } else {
                            postResult("URL max length is 200 characters.");
                        }
                    } else {
                        postResult("Please limit your page title to an alphanumeric string.");
                    }
                } else {
                    postResult("Page title max length is 100 characters.");
                }
            } else {
                postResult("Incorect syntax. Correct usage: p_create [title] [rooturl] [custom]");
            }
        } else if(arg0 == "p_delete") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("Page deleted successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_delete&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidPage.php?id=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_delete [id]");
            }
        } else if(arg0 == "p_setcontent") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("Page content updated successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_setcontent&arg1=" + arg1 + "&arg2=" + arg2, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidPage.php?id=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_setcontent [id] [content]");
                
            }
        } else if(arg0 == "p_content") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 0) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Content: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_content&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_content [id]");
                
            }
        } else if(arg0 == "p_settitle") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("Page title updated successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_settitle&arg1=" + arg1 + "&arg2=" + arg2, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidPage.php?id=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_settitle [id] [title]");
                
            }
        } else if(arg0 == "p_title") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 0) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Title: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_title&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_title [id]");
                
            }
        } else if(arg0 == "p_enable") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("Page enabled successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_enable&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidPage.php?id=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_enable [id]");
                
            }
        } else if(arg0 == "p_disable") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 1) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    if(response == 1) {
                                        postResult("Page disabled successfully.");
                                    } else {
                                        postResult("An error occurred.");
                                    }
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_disable&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidPage.php?id=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_disable [id]");
                
            }
        } else if(arg0 == "p_status") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 0) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Status: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_status&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_status [id]");
                
            }
        } else if(arg0 == "p_custom") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText;
                        if(response == 0) {
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    var response = xhttp.responseText; 
                                    postResult("Custom: " + response);
                                }
                            };
                            xhttp.open("GET", "/bin/console/commands.php?command=p_custom&arg1=" + arg1, true);
                            xhttp.send();
                        } else {
                            postResult("Page not found.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/isValidUser.php?u=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: p_custom [id]");
                
            }
        } else {
            postResult("Unknown 'page' command. You can use the 'help' command for a list of commands.");
            
        }
    } else if(arg0.startsWith("s_")) {
        if(arg0 == "s_setactivedesign") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        if(response == 1) {
                            postResult("Active design set successfully.");
                        } else {
                            postResult("An error occurred.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_setactivedesign&arg1=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_setactivedesign [urlkey]");
                
            }
        } else if(arg0 == "s_activedesign") {
            if(size == 1) {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        postResult("Active design: " + response);
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_activedesign");
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_activedesign");
                
            }
        } else if(arg0 == "s_setrolename") {
            if(size == 3) {
                arg1 = commandArray[1];
                arg2 = commandArray[2];
                
                if(!isNaN(arg1) && arg1 >= 0 && arg1 <= 3) {
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            var response = xhttp.responseText; 
                            if(response == 1) {
                                postResult("Role name set successfully.");
                            } else {
                                postResult("An error occurred.");
                            }
                        }
                    };
                    xhttp.open("GET", "/bin/console/commands.php?command=s_setrolename&arg1=" + arg1 + "&arg2=" + arg2, true);
                    xhttp.send();
                }
            } else {
                postResult("Incorect syntax. Correct usage: s_setrolename [role] [name]");
                
            }
        } else if(arg0 == "s_rolename") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                if(!isNaN(arg1) && arg1 >= 0 && arg1 <= 3) {
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            var response = xhttp.responseText; 
                            postResult("Role Name: " + response);
                        }
                    };
                    xhttp.open("GET", "/bin/console/commands.php?command=s_rolename&arg1=" + arg1);
                    xhttp.send();
                } else {
                    postResult("Please specifiy a role value between 0 and 3.");
                }
            } else {
                postResult("Incorect syntax. Correct usage: s_rolename [role]");
                
            }
        } else if(arg0 == "s_setfrontpage") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                if(arg1 == 0 || arg1 == 1) {
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            var response = xhttp.responseText; 
                            if(response == 1) {
                                postResult("The value 'Front Page' has been updated.");
                            } else {
                                postResult("An error occurred.");
                            }
                        }
                    };
                    xhttp.open("GET", "/bin/console/commands.php?command=s_setfrontpage&arg1=" + arg1, true);
                    xhttp.send();
                } else {
                    postResult("Please specify a value between 0 and 1.");
                }
            } else {
                postResult("Incorect syntax. Correct usage: s_setfrontpage [0/1]");
                
            }
        } else if(arg0 == "s_frontpage") {
            if(size == 1) {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        postResult("Front Page: " + response);
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_frontpage");
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_frontpage");
                
            }
        } else if(arg0 == "s_setauthor") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        if(response == 1) {
                            postResult("Author updated successfully.");
                        } else {
                            postResult("An error occurred.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_setauthor&arg1=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_setauthor [name]");
                
            }
        } else if(arg0 == "s_author") {
            if(size == 1) {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        postResult("Author: " + response);
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_author");
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_author");
                
            }
        } else if(arg0 == "s_setauthorhelp") {
            if(size == 2) {
                arg1 = commandArray[1];
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        if(response == 1) {
                            postResult("Author help set successfully.");
                        } else {
                            postResult("An error occurred.");
                        }
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_setauthorhelp&arg1=" + arg1, true);
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_setauthorhelp [helpmethod]");
                
            }
        } else if(arg0 == "s_authorhelp") {
            if(size == 1) {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var response = xhttp.responseText; 
                        postResult("Help: " + response);
                    }
                };
                xhttp.open("GET", "/bin/console/commands.php?command=s_authorhelp");
                xhttp.send();
            } else {
                postResult("Incorect syntax. Correct usage: s_authorhelp");
                
            }
        } else {
            postResult("Unknown 'site' command. You can use the 'help' command for a list of commands.");
            
        }
    } else {
        if(arg0 == "refreshtables") {
            
        } else if(arg0 == "listusers") {
            
        } else if(arg0 == "listpages") {
            
        } else if(arg0 == "help") {
            
        } else if(arg0 == "clear") {
            $("#console-result").html("========== ACM CONSOLE ==========");
        } else {
            postResult("Unknown command. You can use the 'help' command for a list of commands.");
        }
    }
}