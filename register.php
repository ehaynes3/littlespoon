<?php
require_once("Includes/Classes/FormSanitizer.php");
require_once("Includes/Classes/Account.php");
require_once("Includes/config.php");
require_once("Includes/Classes/Constants.php");
 
    $account = new Account($con);
    if(isset($_POST["submitButton"])){  /*Check if submit button has been pressed */
        
        $firstName =FormSanitizer::sanitizeFormString($_POST["firstName"]);  
        $lastName =FormSanitizer::sanitizeFormString($_POST["lastName"]);  
        $userName =FormSanitizer::sanitizeFormUserName($_POST["userName"]);
        $email =FormSanitizer::sanitizeFormEmail($_POST["email"]);      
        $email2 =FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password =FormSanitizer::sanitizeFormPassword($_POST["password"]);             
        $password2 =FormSanitizer::sanitizeFormPassword($_POST["password2"]); 
        
        $account->register($firstName,$lastName,$userName,$email,$email2,$password,$password2);
            
    }
?>

<!DOCTYPE html> <!-- Tells the web browser which version of HTML you are using -->
<html>
    <head>
        <title>Welcome to MIKEFLIX</title> <!--This is not a title on the page this is what shows up as the tab name -->
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
    </head>
        <body>
            <div class="signinContainer">
               
                <div class="column">
                    <div class="header">
                        <img src="assets/images/MIKEFLIX.png" title="Logo" alt="Site Logo" >  <!--Title shows up when hovering -- alt =alternate(if the link is broken)--> 
                        <h3>Sign Up</h3>
                        <span>to continue to MIKEFLIX</span>
                        
                    </div>

                    <form action="" method="post">
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?> <!--if error exist in account class array echo it onto the page -->
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?> 
                        <?php echo $account->getError(Constants::$usernameCharacters); ?> 
                        <?php echo $account->getError(Constants::$usernameTaken); ?> 
                        <?php echo $account->getError(Constants::$emailsDontMatch); ?> 

                        <input type="text" name = "firstName" placeholder = "First Name" required>

                        <input type="text" name = "lastName" placeholder = "Last Name" required>

                        <input type="text" name = "userName" placeholder = "username" required>

                        <input type="email" name = "email" placeholder = "Email" required>

                        <input type="email" name = "email2" placeholder = "Confirm Email" required>

                        <input type="password" name = "password" placeholder = "Password" required>

                        <input type="password" name = "password2" placeholder = "Confirm Password" required>

                        <input type="submit" name = "submitButton" value = "Submit">
                        </form>

                        <a href="login.php" class="signInMessage">Already Have an account? Sign in here</a>

                </div>

            </div>  
        </body>

</html>