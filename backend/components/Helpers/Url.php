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

    //замість en-us ставить мову по дефолту
    public static function toRoute($route, $scheme = false)
    {
        $lang = Yii::$app->request->get('lang');
        $country = Yii::$app->request->get('country');

        $lang = ($lang) ? $lang : 'en';
        $country = ($country) ? $country : 'us';
        $culture = "{$lang}-{$country}";

        $route['lang'] = $lang;
        $route['country'] = $country;

        Yii::$app->language = $culture;

        return parent::toRoute($route, $scheme);
    }
}