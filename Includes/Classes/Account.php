<!-- -->
<?php
class Account{

    private $con;  // set a variable called con for this class
    private $errorArray = array();

    public function __construct($con) { //First bit of code executed when creating an object of type Account
       $this->con = $con; // This con variable for this class is set to the $con variable from the constructer which is defined in config.php
    }

    public function register($fn,$ln,$un, $em, $em2,$pw,$pw2){  // set parameters for validation
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUserName($un);
        $this->validateEmail($em, $em2);

    }


    private function validateFirstName($fn){
        if(strlen($fn) < 2 || strlen($fn)>25 ){  // if the string length is less than 2 OR greater than 25 
            array_push($this->errorArray, Constants::$firstNameCharacters); // Access the static property in the Constants class called firstNameCharacters

        }
    }


    private function validateLastName($ln){
        if(strlen($ln) < 2 || strlen($ln)>25 ){  // if the string length is less than 2 OR greater than 25 
            array_push($this->errorArray, Constants::$lastNameCharacters); // Access the static property in the Constants class called firstNameCharacters

        }
    }
    private function validateUserName($un){
        if(strlen($un) < 5 || strlen($un)>25 ){  // if the string length is less than 2 OR greater than 25 
            array_push($this->errorArray, Constants::$usernameCharacters); // Access the static property in the Constants class called firstNameCharacters
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un); // Bind the sql parameter to the php parameter
        
        $query->execute();

        if($query->rowCount() != 0){
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    private function validateEmail($em,$em2){
        if ($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDontMatch);
        }
        if(!filter_var($em, FILTER_VALIDATE_EMAIL))
    }








// check if string ("First name wrong length" <- replaced with constant) exist in the error array if it does return the error
    public function getError($error){
        if(in_array($error, $this->errorArray)){
            return $error;
        }
    }
}
?>