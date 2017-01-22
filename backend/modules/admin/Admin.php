<?php

namespace backend\modules\admin;

/**
 * admin module definition class
 * admin for seller
 */
class Admin extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'rbac' => [
                'class' => 'backend\modules\admin\modules\rbac\RBAC',
            ],
        ];

    }
}
