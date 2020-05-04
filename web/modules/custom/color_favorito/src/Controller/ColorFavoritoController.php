<?php

namespace Drupal\color_favorito\Controller;


class ColorFavoritoController{

    public function index(){

        return[
            '#theme'=> 'color_favorito',
            '#title'=> 'Muestra color',
            '#color'=> 'el que sea'
        ];

    }
}

