<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 4/9/2017
 * Time: 1:29 AM
 */

namespace backend\components\Helpers;

use Yii;
use yii\helpers\BaseUrl;

class Url extends BaseUrl
{
    // Url::toRoute(['/site/index', 'lang' => $lang, 'country' => $country])
    // Перевантаження toRoute для мультмовності
    public static function toRoute($route, $scheme = false)
    {
        $lang = Yii::$app->request->get('lang');
        $country = Yii::$app->request->get('country');

        $route['lang'] = $lang;
        $route['country'] = $country;

        return parent::toRoute($route, $scheme);
    }
}