<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | UxKit Tables
    |--------------------------------------------------------------------------
    |
    | Primary config
    |
    | Which Framework style to render and
    |
    */
    'tables' => array(

        // Table pattern to use
        // default : 'Almeida\UiKit\Tables\Framework\Html5'
        // @todo   : 'Almeida\UiKit\Tables\Framework\Foundation'
        // @todo   : 'Almeida\UiKit\Tables\Framework\Bootstrap'
        'pattern' => array(
            //'class' => 'Almeida\UiKit\Tables\Framework\Html5',
            'class' => 'Almeida\UiKit\Tables\Framework\Foundation',
        ),

        /*
        |--------------------------------------------------------------------------
        | Paginator
        |--------------------------------------------------------------------------
        |
        | default   : false
        | laravel4  : Illuminate\Pagination\Paginator
        |
        */
        'paginator' => 'Illuminate\Pagination\Paginator'
    ),

    'feedback' => array(


        'pattern' => array(
            'class' => 'Almeida\UiKit\Feedback\Framework\Html5',
        ),

    ),

    'actions' => array(
        'class' => 'Almeida\UiKit\Actions\Framework\Html5',
    ),

    'buttons' => array(
        'class' => 'Almeida\UiKit\Buttons\Framework\Html5',
    ),



);
