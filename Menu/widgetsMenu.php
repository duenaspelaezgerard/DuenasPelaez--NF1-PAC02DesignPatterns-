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
                    </head>
                    <body>
                    <header>
                        <input type='checkbox' id='btn-menu' />
                        <label for='btn-menu'><i class='fa fa-bars'></i></label>
                        <nav class='menu'><ul>";              

        $numFilas = count($this->internalData[0]); // numero de data

        for($i=0; $i<$numFilas;$i++){
            $encabezado = $this->internalData[0];
            
            $nom1 = $this->internalData[1];
            $nom2 = $this->internalData[2];
            $nom3 = $this->internalData[3];
            $nom4 = $this->internalData[4];

            $html.="<li class='submenu'><a href='#'>$encabezado[$i]<i class='fa fa-caret-down'></i></a>
                        <ul>
                            <li><a href='#'>$nom1[$i]</a></li>
                            <li><a href='#'>$nom2[$i]</a></li>
                            <li><a href='#'>$nom3[$i]</a></li>
                            <li><a href='#'>$nom4[$i]</a></li>
                            </ul>
                    </li>";

        }

        $html.= "      </ul>
                    </nav>
                </header>
                </body>
                
                </html>";

        echo $html;
    }

};

?>