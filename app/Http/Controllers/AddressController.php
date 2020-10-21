<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Address;
use App\Validations\basicValidations;

class AddressController extends BaseController
{
    private function validateAddress($request=[]){
        $warnings=[];
        function checkEmptyFields($request=[]){
            $warnings=[];
            if(basicValidations::isEmpty($request['Street'])){
               array_push($warnings,"Ops!!! Parece que não preencheu o campo rua");
            }
            if(basicValidations::isEmpty($request['ZipCode'])){
               array_push($warnings,"Ops!!! Parece que não preencheu o CEP");
            }
            if(basicValidations::isEmpty($request['Number'])){
               array_push($warnings,"Ops!!! Parece que não preencheu o Numero do local");
            }
            if(basicValidations::isEmpty($request['City'])){
               array_push($warnings,"Ops!!! Parece que não preencheu a Cidade");
            }
            if(basicValidations::isEmpty($request['State'])){
               array_push($warnings,"Ops!!! Parece que não preencheu o Estado");
            }
            return $warnings;
        }

        function checkMinimalStringSize($request=[]){
            $warnings=[];
            if(basicValidations::minimalStringSize($request['Street'],5)){
               array_push($warnings,"Ops!!! Parece que o campo rua esta não tem caracteres suficientes");
            }
            if(basicValidations::minimalStringSize($request['ZipCode'],8)){
               array_push($warnings,"Ops!!! Parece que o CEP é invalido");
            }
 
            if(basicValidations::minimalStringSize($request['City'],5)){
               array_push($warnings,"Ops!!! Parece que a Cidade esta com nome incompleto");
            }
            if(basicValidations::minimalStringSize($request['State'],2)){
               array_push($warnings,"Ops!!! Parece que o Estado esta incompleto");
            }
            return $warnings;
        }

        if(empty($request)){
            $warnings[0]="Ops!!! Parece que houve um erro na requisição";
        }else{
            array_push($warnings,checkEmptyFields($request));
            array_push($warnings,checkMinimalStringSize($request));
        }
        return $warnings;

    }
    public function insertAddress($request=[]){
        $request=["Street"=>'',"ZipCode"=>'',"Number"=>'',"City"=>'',"State"=>''];
        print_r( $this->validateAddress($request));
    }
}
