<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class UserType extends Model
{
    protected $table='UserType';
    public $timestamps = false;
    protected $primaryKey='idUserType';
    protected $fillable = ['NameUserType'];

    public static function getByName($NameUserType){
        try{
            $UserType=new UserType();
            $UserType=$UserType->where('NameUserType',$NameUserType)->get();
            return $UserType;
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public static function getById($idUserType){
        try{
            $UserType=new UserType();
            $UserType=$UserType->find($idUserType);

            return $UserType;
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public static function getAllUserType(){
        try{
            $UserType=new UserType();
            $ListUserType=$UserType->all();
            return $ListUserType;
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }
}