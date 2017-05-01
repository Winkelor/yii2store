<?php

namespace backend\modules\seller\modules\catalog;

/**
 * catalog module definition class
 */
class catalog extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\seller\modules\catalog\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'attributes' => [
                'class' => 'backend\modules\seller\modules\catalog\modules\attributes\attributes',
                'viewPath' => '@app/themes/adminlte/modules/attributes/views',
            ],
        ];
    }
}
