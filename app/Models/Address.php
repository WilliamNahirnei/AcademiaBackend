<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Validations;
use App\Validations\basicValidations;

class Address extends Model implements Validations
{
    protected $table='address';
    public $timestamps = false;
    protected $primaryKey='idAddress';
    protected $fillable = [
        'idAddress',
        'Street',
        'ZipCode',
        'Number',
        'City',
        'State',
        'Complement',
        'Reference'
    ];


    public function validateAtribute($isEmpty,$type,$minimalSize,$maximumSize,$value){   
        $validationsResult=false;
        $a=basicValidations::isEmpty($value)!= $isEmpty ? $validationsResult=false : $validationsResult = true;
        $a=basicValidations::checkType($value,$type)==false ? $validationsResult=false : $validationsResult = true;

        
        if($type=="string"){
            $a=basicValidations::minimalStringSize($value,$minimalSize)==false ? $validationsResult=false : $validationsResult = true;
            $a=basicValidations::maximumStringSize($value,$maximumSize)==false ? $validationsResult=false : $validationsResult = true;
        }
        else{
            $a=basicValidations::minimalNumericSize($value,$minimalSize)==false ? $validationsResult=false : $validationsResult = true;
            $a=basicValidations::maximumNumericSize($value,$maximumSize)==false ? $validationsResult=false : $validationsResult = true;
        }

        return $validationsResult;
    }


    public function Validate(){
         if(($this->validateAtribute(false,"string",5,100,$this->Street))==false||
            ($this->validateAtribute(false,"string",8,8,$this->ZipCode))==false||
            ($this->validateAtribute(false,"string",0,10,$this->Number))==false||
            ($this->validateAtribute(false,"string",5,50,$this->City))==false||
            ($this->validateAtribute(false,"string",2,50,$this->State))==false||
            ($this->validateAtribute(true,"string",0,200,$this->Complement))==false||
            ($this->validateAtribute(true,"string",0,100,$this->Reference)) ==false
        ){
                return false;
        }
        else{
                return true;
        }
    }


    public function setAllAtributs($Street="",$Number="",$ZipCode="",$City="",$State="",$Complement="",$Reference=""){
        
        try{
            $this->Street=$Street;
            $this->ZipCode=$ZipCode;
            $this->Number=$Number;
            $this->City=$City;
            $this->State=$State;
            $this->Complement=$Complement;
            $this->Reference=$Reference;
        }catch(Exception $e){
            return "Erro no servidor";
        }

    }
    
    public function setSpecificAttribute($atribute,$value){
        try{
            $this->$atribute=$value;
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    function __construct($Street="Default",$Number="00",$ZipCode="00000000",$City="Default",$State="Default",$Complement="",$Reference=""){
        try{
            $this->Street=$Street;
            $this->ZipCode=$ZipCode;
            $this->Number=$Number;
            $this->City=$City;
            $this->State=$State;
            $this->Complement=$Complement;
            $this->Reference=$Reference;
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function getAllAtributs(){
        try{
            return [
                'idAddress'=>$this->idAddress,
                'Street'=>$this->Street,
                'ZipCode'=>$this->ZipCode,
                'Number'=>$this->Number,
                'City'=>$this->City,
                'State'=>$this->State,
                'Complement'=>$this->Complement,
                'Reference'=>$this->Reference
            ];
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function saveAddress(){
        try{
        
            if($this->Validate()==true) {return $this->save();} else { return "   Algum dos campos não corresponde as especificações";}
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function updateAddress($idAddress){
        try{
            echo $idAddress;
            if($idAddress>0){
                $this->idAddress=$idAddress;
                if($this->Validate()==true) {return $this->save();} else { return "Algum dos campos não corresponde as especificações";}
            }else{ return "Parece que houve um erro, tente novamente "; }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function deleteAddress($idAddress){
        try{
            if($idAddress>0){
                $this->destroy($idAddress);
            }
            else{
                return "Parece que houve um erro, tente novamente";
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function getById($idAddress){
        try{
           
            $consultedAddress=$this->find($idAddress);
           
            $this->idAddress=$consultedAddress->idAddress;
            $this->setAllAtributs(  $consultedAddress->Street,
                                    $consultedAddress->ZipCode,
                                    $consultedAddress->Number,
                                    $consultedAddress->City,
                                    $consultedAddress->State,
                                    $consultedAddress->Complement,
                                    $consultedAddress->Reference
                                );
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
}