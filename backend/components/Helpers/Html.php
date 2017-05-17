<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 5/16/2017
 * Time: 11:46 PM
 */

namespace backend\components\helpers;

use Yii;
use yii\helpers\BaseHtml;

class Html extends BaseHtml
{
    /**
     * Generates a hyperlink tag.
     * @param string $text link body. It will NOT be HTML-encoded. Therefore you can pass in HTML code
     * such as an image tag. If this is coming from end users, you should consider [[encode()]]
     * it to prevent XSS attacks.
     * @param array|string|null $url the URL for the hyperlink tag. This parameter will be processed by [[Url::to()]]
     * and will be used for the "href" attribute of the tag. If this parameter is null, the "href" attribute
     * will not be generated.
     *
     * If you want to use an absolute url you can call [[Url::to()]] yourself, before passing the URL to this method,
     * like this:
     *
     * ```php
     * Html::a('link text', Url::to($url, true))
     * ```
     *
     * @param array $options the tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
     * If a value is null, the corresponding attribute will not be rendered.
     * See [[renderTagAttributes()]] for details on how attributes are being rendered.
     * @return string the generated hyperlink
     * @see \yii\helpers\Url::to()
     */
    public static function a($text, $url = null, $options = [])
    {
        $culture = Yii::$app->cultureManager->makeCulture();
        return $url;
        if ($url !== null) {
            $options['href'] = Url::to($url);
        }
        return static::tag('a', $text, $options);
    }
}