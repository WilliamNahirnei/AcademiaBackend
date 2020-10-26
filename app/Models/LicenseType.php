<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class LicenseType extends Model
{
    protected $table='LicenseType';
    public $timestamps = false;
    protected $primaryKey='idLicenseType';
    protected $fillable = ['NameLicenseType',
                            'DurationLicenseType',
                            'PriceLicenseType',
                            'NumberOfUsersLicenseType'];

    public function setAllAtributs($NameLicenseType="",$DurationLicenseType="",$PriceLicenseType=0.0,$NumberOfUsersLicenseType=0){

        try{
            $this->NameLicenseType=$NameLicenseType;
            $this->DurationLicenseType=$DurationLicenseType;
            $this->PriceLicenseType=$PriceLicenseType;
            $this->NumberOfUsersLicenseType=$NumberOfUsersLicenseType;
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
    
    public function getAllAtributs(){
        try{
            return [
                'idLicenseType'=>$this->idLicenseType,
                'NameLicenseType'=>$this->NameLicenseType,
                'DurationLicenseType'=>$this->DurationLicenseType,
                'PriceLicenseType'=>$this->PriceLicenseType,
                'NumberOfUsersLicenseType'=>$this->NumberOfUsersLicenseType,
            ];
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public static function getByName($NameLicenseType){
        try{
            $LicenseType=new LicenseType();
            $LicenseType=$LicenseType->where('NameLicenseType',$NameLicenseType)->get();
            return $LicenseType;
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public static function getById($idLicenseType){
        try{
            $LicenseType=new LicenseType();
            $LicenseType=$LicenseType->find($idLicenseType);

            return $LicenseType;
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }

    public static function getAllLicenseType(){
        try{
            $LicenseType=new LicenseType();
            $LicensesList=$LicenseType->all();
            return $LicensesList;
        }
        catch(Exception $e){
            return "Erro no servidor";
        }
    }
}
?>