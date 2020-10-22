<?php
    namespace App\Validations;
    class basicValidations{
        public static function isEmpty($value){
            return empty($value);
        }

        public static function minimalStringSize($value,$size){
            return strlen($value)>=$size ? true : false ;
        }

        public static function maximumStringSize($value,$size){
            return strlen($value)<=$size ? true : false ;
        }

        public static function minimalNumericSize($value,$size){
            return $value>=$size ? true : false ;
        }

        public static function maximumNumericSize($value,$size){
            return $value<=$size ? true : false ;
        }
        public static function checkType($value,$type){
            return gettype($value)==$type ? true : false ;
        }
}
?>