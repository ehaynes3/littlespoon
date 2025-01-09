<?php
class FormSanitizer{

    public static function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText); /*Removes Html tags which cause rendering issues*/
        // $inputText = str_replace(" ", "", $inputText) /*removes any spaces from the text */
        $inputText = trim($inputText); /** This accounts for people who may have two first names. It remove spaces from before and after input */
        $inputText = strtolower($inputText); //lowercase string first 
        $inputText = ucfirst($inputText); // UpperCase first letter
        return $inputText;
    }

    public static function sanitizeFormUserName($inputText) {
        $inputText = strip_tags($inputText); /*Removes Html tags which cause rendering issues*/
        // $inputText = str_replace(" ", "", $inputText) /*removes any spaces from the text */
        $inputText = trim($inputText); /** This accounts for people who may have two first names. It remove spaces from before and after input */
        return $inputText;
    }

    public static function sanitizeFormPassword($inputText) {
        $inputText = strip_tags($inputText); /*Removes Html tags which cause rendering issues*/
        return $inputText;
    }

    public static function sanitizeFormEmail($inputText) {
        $inputText = strip_tags($inputText); /*Removes Html tags which cause rendering issues*/
        // $inputText = str_replace(" ", "", $inputText) /*removes any spaces from the text */
        $inputText = trim($inputText); /** This accounts for people who may have two first names. It remove spaces from before and after input */
        return $inputText;
    }
}
?>