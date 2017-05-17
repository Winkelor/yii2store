<?php

namespace backend\components\MyComponents;

use backend\models\User;
use Yii;
use common\models\UserAdmin;
use yii\base\Component;

class activeShop extends Component
{
   public function getActiveShop()
   {
       $id = Yii::$app->user->id;
       if($id == null)
           return null;

       $user = UserAdmin::find($id)->all()[0];
       return $user->activeShop;
   }
}