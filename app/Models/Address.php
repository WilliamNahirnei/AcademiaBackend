<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
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
    public function setAllAtributs($Street="",$Number="",$ZipCode="",$City="",$State="",$Complement="",$Reference=""){
        $this->Street=$Street;
        $this->ZipCode=$ZipCode;
        $this->Number=$Number;
        $this->City=$City;
        $this->State=$State;
        $this->Complement=$Complement;
        $this->Reference=$Reference;
    }
    
    public function setSpecificAttribute($atribute,$value){
        $this->$atribute=$value;
    }

    function __construct($Street="Default",$Number="00",$ZipCode="00000000",$City="Default",$State="Default",$Complement="",$Reference=""){
        $this->Street=$Street;
        $this->ZipCode=$ZipCode;
        $this->Number=$Number;
        $this->City=$City;
        $this->State=$State;
        $this->Complement=$Complement;
        $this->Reference=$Reference;
    }
    public function getAllAtributs(){
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
    public function saveAddress(){
        return $this->save();
    }
    public function updateAddress(){
        return $this->save();
    }
    public function deleteAddress(){
        $this->delete();
    }
    public function getById($idAddress){
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
    }
}