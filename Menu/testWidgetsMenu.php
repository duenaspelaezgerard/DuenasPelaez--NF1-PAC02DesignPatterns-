<?php

    require_once("observableMenu.php");
    require_once("widgetsMenu.php");

    $data = new DataSource();

    $widgetA = new BasicWidget();


    $data->addObserver($widgetA);

    $data->addRecord("Nombres","Gerard", "Adri", "Aaron", "Ramon");
    $data->addRecord("Equipos","Apoel", "PAOK", "Kaizer Chiefs", "Sheriff Tiraspol");
    $data->addRecord("Coches","Fiat Multipla", "Fiat 500", "El coche del Aaron", "El mazda");
    $data->addRecord("Profesores","Carlos", "Jordi", "Patricia","Anna");

    $widgetA->draw();


?>