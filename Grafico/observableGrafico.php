<?php

abstract class Observable{
    
    private $observers = array();
    
    public function addObserver(Observer $observer){
        array_push($this->observers, $observer);
    }

    public function notifyObserver(){

        for($i=0;$i<count($this->observers);$i++){
            $widget = $this->observers[$i];
            $widget->update($this);
        }
    }

}



class DataSource extends Observable{

    private $etiquetas;
    private $datos;
    private $colores;


    function __construct(){
        $this->etiquetas = array();
        $this->datos = array();
        $this->colores = array();

    }

    public function addRecord($etiqueta, $dato, $color){
        array_push($this->etiquetas, $etiqueta);
        array_push($this->datos, $dato);
        array_push($this->colores, $color);
        $this-> notifyObserver();
    }


    public function getData(){
        return array($this->etiquetas,$this->datos, $this->colores);
    }

}


?>