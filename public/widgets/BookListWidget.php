<?php

namespace app\widgets;

use yii\base\Widget;

class BookListWidget extends Widget
{
    public $models;
    public $btnClass;
    public function init()
    {
        parent::init();
        if(!$this->btnClass){
            $this->btnClass = 'btn-primary';
        }
    }
    public function run()
    {
        return $this->render('book_list', ['models' => $this->models, 'btnClass' => $this->btnClass]);

    }
}