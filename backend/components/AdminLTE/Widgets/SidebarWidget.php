<?php
namespace backend\components\AdminLTE\Widgets;

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