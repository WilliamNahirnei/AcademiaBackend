<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table='endereco';
    public $timestamps = false;
    protected $primaryKey='idEndereco';
    protected $fillable = [
        'idEndereco',
        'Logradouro',
        'CEP',
        'Numero',
        'Cidade',
        'Estado',
        'Complemento',
        'Referencia'
    ];
    public function setAllAtributs($Logradouro="",$Numero="",$CEP="",$Cidade="",$Estado="",$Complemento="",$Referencia=""){
        $this->Logradouro=$Logradouro;
        $this->CEP=$CEP;
        $this->Numero=$Numero;
        $this->Cidade=$Cidade;
        $this->Estado=$Estado;
        $this->Complemento=$Complemento;
        $this->Referencia=$Referencia;
    }
    
    public function setSpecificAttribute($atribute,$value){
        $this->$atribute=$value;
    }

    function __construct($Logradouro="Default",$Numero="00",$CEP="00000000",$Cidade="Default",$Estado="Default",$Complemento="",$Referencia=""){
        //setAllAtributs($idEndereco,$Logradouro,$CEP,$Cidade,$Estado,$Complemento,$Referencia);
        $this->Logradouro=$Logradouro;
        $this->CEP=$CEP;
        $this->Numero=$Numero;
        $this->Cidade=$Cidade;
        $this->Estado=$Estado;
        $this->Complemento=$Complemento;
        $this->Referencia=$Referencia;
    }
    public function getAllAtributs(){
        return [
            'idEndereco'=>$this->idEndereco,
            'Logradouro'=>$this->Logradouro,
            'CEP'=>$this->CEP,
            'Numero'=>$this->Numero,
            'Cidade'=>$this->Cidade,
            'Estado'=>$this->Estado,
            'Complemento'=>$this->Complemento,
            'Referencia'=>$this->Referencia
        ];
    }
    public function saveEndereco(){
        return $this->save();
    }
    public function updateEndereco(){
        return $this->save();
    }
    public function deleteEndereco(){
        $this->delete();
    }
    public function getById($idEndereco){
        $enderecoConsultado=$this->find($idEndereco);
        $this->idEndereco=$enderecoConsultado->idEndereco;
        $this->setAllAtributs(  $enderecoConsultado->Logradouro,
                                $enderecoConsultado->CEP,
                                $enderecoConsultado->Numero,
                                $enderecoConsultado->Cidade,
                                $enderecoConsultado->Estado,
                                $enderecoConsultado->Complemento,
                                $enderecoConsultado->Referencia
                            );
    }
}