<?php

namespace backend\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $kurwa;

    /**
     * @return mixed
     */
    public function getKurwa()
    {
        return $this->kurwa;
    }
    /**
     * @param mixed $kurwa
     */
    public function setKurwa($kurwa)
    {
        $this->kurwa = $kurwa;
    }

    public $prop1;

    private $_prop2;

    public function getProp2()
    {
        return $this->_prop2;
    }

    public function setProp2($value)
    {
        $this->_prop2 = $value;
    }

    public function foo()
    {
        // ...
        return "  Ця хуйня написана в поведінках в класі backend\\components\\behaviors\\MyBehavior; тепер треба понять нахуя ";
    }

//    public function events()
//    {
//        return [
//            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
//            ActiveRecord::EVENT_INIT => 'beforeInit',
//        ];
//    }
//
//    public function beforeValidate($event)
//    {
//        // ...
//    }
//
//    public function beforeInit($event)
//    {
//        // ....
//
//    }
}