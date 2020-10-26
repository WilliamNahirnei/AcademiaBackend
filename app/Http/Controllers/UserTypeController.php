<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends BaseController
{
    public function Teste(){
        //return (UserType::getByName("Dono de academia"));
        //return(UserType::getById(4));
        return(UserType::getAllUserType());
    }
}