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

    private $tituloUL;
    private $nombres1;
    private $nombres2;
    private $nombres3;
    private $nombres4;

    function __construct(){
        $this->tituloUL = array();
        $this->nombres1 = array();
        $this->nombres2 = array();
        $this->nombres3 = array();
        $this->nombres4 = array();
    }

    public function addRecord($titulo, $nombre1, $nombre2, $nombre3, $nombre4){
        array_push($this->tituloUL, $titulo);
        array_push($this->nombres1, $nombre1);
        array_push($this->nombres2, $nombre2);
        array_push($this->nombres3, $nombre3);
        array_push($this->nombres4, $nombre4);
        $this-> notifyObserver();
    }


    public function getData(){
        return array($this->tituloUL,$this->nombres1, $this->nombres2, $this->nombres3, $this->nombres4);
    }

}


?>