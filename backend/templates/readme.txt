http://stackoverflow.com/questions/22379766/how-to-use-custom-templates-in-gii-using-yii-2

Copy ie. the crud generator templates from gii/generators/crud/templates to your application app/templates/mycrud.

Then define the templates in your config:

$config['modules']['gii'] = [
    'class'      => 'yii\gii\Module',
    'generators' => [
        'crud'   => [
            'class'     => 'yii\gii\generators\crud\Generator',
            'templates' => ['mycrud' => '@app/templates/mycrud']
        ]
    ]
];
Until the documentation is finished you may also have a look at my Gii extension how to create a custom generator and templates.