<?php

namespace models;

class Materia 
{
    protected $id;
    protected $codigo;
    protected $nombre;

    public function get($nameField){
        return $this->{$nameField};
    }

    public function set($nameField, $value){
        $this->{$nameField} = $value;
    }

}