<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Validations;
use App\Validations\basicValidations;

class User extends Model implements Validations
{
    protected $table='user';
    public $timestamps = false;
    protected $primaryKey='idUser';
    protected $fillable = [
        'idUser',
        'UserFullName',
        'UserBirthDate',
        'UserCPF',
        'UserEmail',
        'UserLogin',
        'UserPassword',
        'UseridUserType'
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
         if(($this->validateAtribute(false,"string",5,50,$this->UserFullName))==false||
            ($this->validateAtribute(false,"string",11,11,$this->UserCPF))==false||
            ($this->validateAtribute(false,"string",10,10,$this->UserBirthDate))==false||
            ($this->validateAtribute(true,"string",0,50,$this->UserEmail))==false||
            ($this->validateAtribute(false,"string",4,50,$this->UserLogin))==false||
            ($this->validateAtribute(false,"string",5,30,$this->UserPassword))==false||
            ($this->validateAtribute(false,"integer",1,5,$this->UseridUserType)) ==false
        ){
                return false;
        }
        else{
                return true;
        }
    }

    
    public function setAllAtributs($UserFullName="",$UserBirthDate="",$UserCPF="",$UserEmail="",$UserLogin="",$UserPassword="",$UseridUserType=1){
        
        try{
            $this->UserFullName=$UserFullName;
            $this->UserBirthDate=$UserBirthDate;
            $this->UserCPF=$UserCPF;
            $this->UserEmail=$UserEmail;
            $this->UserLogin=$UserLogin;
            $this->UserPassword=$UserPassword;
            $this->UseridUserType=$UseridUserType;
        }catch(Exception $e){
            return "Erro no servidor";
        }

    }

    function __construct($UserFullName="Default",$UserBirthDate="1999/01/01",$UserCPF="11111111111",$UserEmail="Default@default.com",$UserLogin="Default",$UserPassword="Default",$UseridUserType=1){
        try{
            $this->UserFullName=$UserFullName;
            $this->UserBirthDate=$UserBirthDate;
            $this->UserCPF=$UserCPF;
            $this->UserEmail=$UserEmail;
            $this->UserLogin=$UserLogin;
            $this->UserPassword=$UserPassword;
            $this->UseridUserType=$UseridUserType;
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



    public function saveUser(){
        try{
        
            if($this->Validate()==true) {return $this->save();} else { return "   Algum dos campos não corresponde as especificações";}
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function updateUser($idUser){
        try{
            if($idUser>0){
                $this->idUser=$idUser;
                if($this->Validate()==true) {
                    $UserToBeUpdated=$this->findOrFail($this->idUser);
                    $UserToBeUpdated->setAllAtributs($this->UserFullName,$this->UserBirthDate,$this->UserCPF,$this->UserEmail,$this->UserLogin,$this->UserPassword,$this->UseridUserType);
                    $UserToBeUpdated->save();
                    return $UserToBeUpdated;
                } 
                else { 
                    return "Algum dos campos não corresponde as especificações";
                }
            }else{ return "Parece que houve um erro, tente novamente "; }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }






    public function delteUser($idUser){
        try{
            if($idUser>0){
                $this->destroy($idUser);
            }
            else{
                return "Parece que houve um erro, tente novamente";
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function getById($idUser){
        try{
           
            $consultUser=$this->find($idUser);
           
            $this->idUser=$consultUser->idUser;
            $this->setAllAtributs(  $consultUser->UserFullName,
                                    $consultUser->UserBirthDate,
                                    $consultUser->UserCPF,
                                    $consultUser->UserEmail,
                                    $consultUser->UserLogin,
                                    $consultUser->UserPassword,
                                    $consultUser->UseridUserType
                                );
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function getByFullName($FullName){
        try{
           
            $consultUser=$this->where('UserFullName',$FullName)->get();
           
            $this->idUser=$consultUser->idUser;
            $this->setAllAtributs(  $consultUser->UserFullName,
                                    $consultUser->UserBirthDate,
                                    $consultUser->UserCPF,
                                    $consultUser->UserEmail,
                                    $consultUser->UserLogin,
                                    $consultUser->UserPassword,
                                    $consultUser->UseridUserType
                                );
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function getByCPF($CPF){
        try{
           
            $consultUser=$this->where('UserCPF',$CPF)->get();
           
            $this->idUser=$consultUser->idUser;
            $this->setAllAtributs(  $consultUser->UserFullName,
                                    $consultUser->UserBirthDate,
                                    $consultUser->UserCPF,
                                    $consultUser->UserEmail,
                                    $consultUser->UserLogin,
                                    $consultUser->UserPassword,
                                    $consultUser->UseridUserType
                                );
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function getByEmail($Email){
        try{
           
            $consultUser=$this->where('UserEmail',$Email)->get();
           
            $this->idUser=$consultUser->idUser;
            $this->setAllAtributs(  $consultUser->UserFullName,
                                    $consultUser->UserBirthDate,
                                    $consultUser->UserCPF,
                                    $consultUser->UserEmail,
                                    $consultUser->UserLogin,
                                    $consultUser->UserPassword,
                                    $consultUser->UseridUserType
                                );
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function UserLogin(){
        try{
           
            $consultUser=$this->where(['UserLogin'=>$this->UserLogin,'UserPassword'=>$this->UserPassword])->get();
            if(  $consultUser->UserLogin  ==  $this->UserLogin  &&  $consultUser->UserPassword  ==  $this->UserPassword  ){
                $this->idUser=$consultUser->idUser;
                $this->setAllAtributs(  $consultUser->UserFullName,
                                        $consultUser->UserBirthDate,
                                        $consultUser->UserCPF,
                                        $consultUser->UserEmail,
                                        $consultUser->UserLogin,
                                        $consultUser->UserPassword,
                                        $consultUser->UseridUserType
                                    );
            }
            else{
                return"Login Ou senha Incorretos";
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
}
