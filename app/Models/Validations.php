<?php
    namespace App\Models;
    interface Validations{

        public function validateAtribute($isEmpty,$type,$minimalSize,$maximumSize,$value);
        public function Validate();
        

    }

?>