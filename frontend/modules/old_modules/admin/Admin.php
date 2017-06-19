<?php

namespace frontend\modules\admin;

/**
 * admin module definition class
 * seller admin
 */
class Admin extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        $this->modules = [
            'catalog' => [
                'class' => 'frontend\modules\admin\modules\catalog\Catalog',
            ],
        ];
    }
}
