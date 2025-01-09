<?php
    if(isset($_POST["submitButton"]))  /*Check if submit button has been pressed */
        {
            echo "Form was submitted";
        }

        
?>

<!DOCTYPE html> <!-- Tells the webbrowser which version of HTML you are using -->
<html>
    <head>
        <title> Welcome to MIKEFLIX </title> <!--This is not a title on the page this is what shows up as the tab name -->
        <link rel="stylesheet" type ="text/css" href="assets/style/style.css"/>
    </head>
        <body>
            <div class="signinContainer">
               
                <div class="column">
                    <div class="header">
                        <img src="assets/images/MIKEFLIX.png" title="Logo" alt="Site Logo" >  <!--Title shows up when hovering -- alt =alternate(if the link is broken)--> 
                        <h3>Login</h3>
                        <span>to continue to MIKEFLIX</span>
                        
                    </div>
                    <form action="" method="post">
                       
                        <input type="text" name = "userName" placeholder = "Username" required>

                        <input type="password" name = "password" placeholder = "Password" required>

                        <input type="submit" name = "submitButton" value = "Submit">
                        </form>

                        <a href="register.php" class="signInMessage">Don't Have an account? Sign up here</a>

                </div>

            </div>  
        </body>

</html>