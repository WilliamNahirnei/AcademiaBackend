<?php
    namespace App\Validations;
    class basicValidations{
        public static function isEmpty($value){
            return empty($value);
        }

        public static function minimalStringSize($value,$size){
            strlen($value)>=$size ? true : false ;
        }

        public static function maximumStringSize($value,$size){
            strlen($value)<=$size ? true : false ;
        }

        public static function minimalNumericSize($value,$size){
            $value>=$size ? true : false ;
        }

        public static function maximumnumericSize($value,$size){
            $value<=$size ? true : false ;
        }
}
?>