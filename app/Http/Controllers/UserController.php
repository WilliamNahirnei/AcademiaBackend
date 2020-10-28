<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Validations\basicValidations;
use Illuminate\Http\Request;

class UserController extends BaseController
{
   
    public function insertUser(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente ";
            }
            else{
                $User=new User($request["UserFullName"],$request["UserBirthDate"],$request["UserCPF"],$request["UserEmail"],$request["UserLogin"],$request['UserPassword'],$request['UseridUserType']);
                return $User->saveUser();
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function updateUser(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente";
            }
            else{
                $User=new User($request["UserFullName"],$request["UserBirthDate"],$request["UserCPF"],$request["UserEmail"],$request["UserLogin"],$request['UserPassword'],$request['UseridUserType']);
                $User=$User->updateUser($request["idUser"]);
                return $User;
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function deleteUser(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente";
                }
                else{
                    $User=new User($request["UserFullName"],$request["UserBirthDate"],$request["UserCPF"],$request["UserEmail"],$request["UserLogin"],$request['UserPassword'],$request['UseridUserType']);
                    return $User->deleteUser($request["idUser"]);
                }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function getUserById(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente";
            }
            else{
                $User=new User();
                $User->getById($request["idUser"]);
                return $User;
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }

    }
}
