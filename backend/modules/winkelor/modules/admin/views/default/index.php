<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        Модуль адміна
        <code><?= __FILE__ ?></code>
    </p>
    <p>

        <a href="http://yii2store/backend/web/winkelor/admin/site/login">login admin</a>
        <a href="http://yii2store/backend/web/winkelor/admin/site/signup">signup admin</a>
    </p>
    <p>
        <?= json_encode($this->context); ?>
    </p>
</div>
