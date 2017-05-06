<?php

namespace backend\components\MyComponents;

use Yii;
use yii\base\Component;

class cultureManager extends Component
{
    public $culture = "";
    public $language = "";
    public $country = "";

    public function makeCulture()
    {
        if(Yii::$app->request->get('lang') != "" and Yii::$app->request->get('country') != "")
            Yii::$app->language =
        Yii::$app->request->get('lang').'-'.
        Yii::$app->request->get('country');
    }

    public function setCulture()
    {
        $this->culture = Yii::$app->language;
        $culture_arr = explode("-", Yii::$app->language);

        $this->language = $culture_arr[0];
        $this->country = $culture_arr[1];
    }

    public function getLanguage()
    {
        $this->setCulture();
        return $this->language;
    }

    public function getCountry()
    {
        $this->setCulture();
        return $this->country;
    }

    public function getCulture()
    {
        return Yii::$app->language;
    }

}