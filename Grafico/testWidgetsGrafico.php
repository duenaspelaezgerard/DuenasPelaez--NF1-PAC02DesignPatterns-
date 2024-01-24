<?php

    require_once("observableGrafico.php");
    require_once("widgetsGrafico.php");

    $data = new DataSource();

    $widgetA = new BasicWidget();


    $data->addObserver($widgetA);

    $data->addRecord('Red',300, 'rgb(255, 99, 132)');
    $data->addRecord('Blue',50, 'rgb(54, 162, 235)');
    $data->addRecord('Yellow',100, 'rgb(255, 205, 86)');

    $widgetA->draw();

?>