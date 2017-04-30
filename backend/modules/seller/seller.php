<?php

namespace backend\modules\seller;

/**
 * seller module definition class
 */
class seller extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\seller\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'catalog' => [
                'class' => 'backend\modules\seller\catalog\catalog',
                'viewPath' => '@app/themes/adminlte/modules/catalog/views',
            ],

        ];

    }
}
