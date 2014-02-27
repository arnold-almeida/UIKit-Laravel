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
        'class' => 'Almeida\UiKit\Tables\Framework\Foundation',

        /*
        |--------------------------------------------------------------------------
        | Pagination View
        |--------------------------------------------------------------------------
        |
        | This view will be used to render the pagination link output, and can
        | be easily customized here to show any view you like. A clean view
        | compatible with Twitter's Bootstrap is given to you by default.
        |
        */

        'pagination' => 'pagination::slider-3',

    ),

    'feedback' => array(
        'class' => 'Almeida\UiKit\Feedback\Framework\Html5',
    ),

    'actions' => array(
        'class' => 'Almeida\UiKit\Actions\Framework\Html5',
    ),

    'buttons' => array(
        'class' => 'Almeida\UiKit\Buttons\Framework\Html5',
    ),

    'button_groups' => array(
        'class' => 'Almeida\UiKit\ButtonGroups\Framework\Bootstrap',
    ),


    /*
    |--------------------------------------------------------------------------
    | Paginator
    |--------------------------------------------------------------------------
    |
    | default   : false
    | laravel4  : Illuminate\Pagination\Paginator
    | cakephp   : @todo
    | symphony  : @todo
    */
    'paginator' => 'Illuminate\Pagination\Paginator'



);
