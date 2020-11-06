<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Address;
use App\Validations\basicValidations;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
   
    public function insertAddress(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente ";
            }
            else{
                $Address=new Address($request["Street"],$request["ZipCode"],$request["Number"],$request["City"],$request["State"],$request['Complement'],$request['Reference']);
                $Address->saveAddress();
                return $Address;
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function updateAddress(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente";
            }
            else{
                $Address=new Address($request["Street"],$request["ZipCode"],$request["Number"],$request["City"],$request["State"],$request['Complement'],$request['Reference']);
                $Address=$Address->updateAddress($request["idAddress"]);
                return $Address;
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public function deleteAddress(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente";
                }
                else{
                    $Address=new Address($request["Street"],$request["ZipCode"],$request["Number"],$request["City"],$request["State"],$request['Complement'],$request['Reference']);
                    return $Address->deleteAddress($request["idAddress"]);
                }
        }catch(Exception $e){
            return "Erro no servidor";
        }
    }
    public function getAddress(Request $request){
        try{
            if($request==[]){
                return "Parece que houve um erro por favor tente novamente";
            }
            else{
                $Address=new Address();
                $Address->getById($request["idAddress"]);
                return $Address;
            }
        }catch(Exception $e){
            return "Erro no servidor";
        }

    }
}
