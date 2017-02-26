<?php
namespace backend\components\Widgets\AdminLTE;

use yii\base\Widget;
use yii\helpers\Html;

class SidebarWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        return "Widget";
        return Html::encode($this->message);
    }
}

/*
 EX
            SidebarWidget::begin();
            <li><a><span><?=SidebarWidget::widget()?></span></a></li>
             SidebarWidget::end();

 */