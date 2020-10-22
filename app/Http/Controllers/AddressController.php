<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Address;
use App\Validations\basicValidations;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
   
    public function insertAddress(Request $request){
        if($request==[]){
         return "Parece que houve um erro por favor tente novamente ";
        }
        else{
            $Address=new Address($request["Street"],$request["ZipCode"],$request["Number"],$request["City"],$request["State"],$request['Complement'],$request['Reference']);
            return $Address->saveAddress();
        }
    }

    public function updateAddress($request=[]){
      if(empty($request)==true){
         return "Parece que houve um erro por favor tente novamente";
      }
      else{
         $Address=new Address($request["Street"],$request["ZipCode"],$request["Number"],$request["City"],$request["State"],$request['Complement'],$request['Reference']);
          return $Address->updateAddress($request["idAddress"]);
      }
    }

    public function deleteAddress($request=[]){
      if(empty($request)==true){
         return "Parece que houve um erro por favor tente novamente";
        }
        else{
            $Address=new Address($request["Street"],$request["ZipCode"],$request["Number"],$request["City"],$request["State"],$request['Complement'],$request['Reference']);
            return $Address->deleteAddress($request["idAddress"]);
        }
    }
}
