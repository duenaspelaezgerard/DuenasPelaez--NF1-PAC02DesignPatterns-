<?php

interface Observer{
    public function update(Observable $subject);
}


abstract class Widget implements Observer{
    
    protected $internalData = array();

    abstract public function draw();

    public function update(Observable $subject){
        $this->internalData = $subject->getData();
    }

}

class BasicWidget extends Widget{

    public function draw(){

        $html = "<html>
                    <head>
                    <title>Menú Desplegable Responsive</title>
                    <link rel='stylesheet' href='estilos.css'>
                    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
                    </head>
                    <body>
                        <div style='width: 1000px; height: 1000px;'><canvas id='grafico'></canvas></div>
                        <script>
                            const grafico = document.getElementById('grafico');       
                            const data = {
                                labels: [";              

        $numFilas = count($this->internalData[0]); // numero de datas

        for($i=0; $i<$numFilas;$i++){
            $etiqueta = $this->internalData[0];
            $html.="'$etiqueta[$i]',";
        }
        $html.= "],
            datasets: [{
                label: 'My First Dataset',
                data: [";

        $numFilas2 = count($this->internalData[0]); // numero de filas

        for ($i=0; $i < $numFilas2; $i++) { 
    
            $dato = $this->internalData[1]; 

            $html.= "$dato[$i],";
            
        }
        
        $html.= "],
            backgroundColor: [";

        $numFilas3 = count($this->internalData[0]); // numero de filas

        for ($i=0; $i < $numFilas3; $i++) { 

            $color = $this->internalData[2]; 

            $html.= "'$color[$i]',";
            
        }
    

        $html.= "],
            hoverOffset: 4
            }]
        };
        
        new Chart(grafico, {
            type: 'doughnut',
            data: data,
        });
        </script>
        </body></html>";
        echo $html;
    }
}