<?php

namespace backend\modules\winkelor;

/**
 * winkelor module definition class
 */
class Winkelor extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\winkelor\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
           'rbac' => [
               'class' => 'backend\modules\winkelor\modules\rbac\rbac',
           ],
       ];
    }
}
