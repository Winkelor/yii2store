<?php

use yii\db\Migration;

class m170000_000000_make_rbac extends Migration
{
    public function runConsole($cmd)
    {
        echo "\n" . $cmd . "\n";
        $handle = popen($cmd, 'r');
//        echo "'$handle'; " . gettype($handle) . "\n";
        $read = fread($handle, 2096);
        echo $read;
        pclose($handle);
    }
    public function up()
    {
        $cmd = "php yii migrate --migrationPath=@yii/rbac/migrations/";
        $this->runConsole($cmd);
    }

    public function down()
    {
        echo "see it php yii migrate --migrationPath=@yii/rbac/migrations/\n";
        echo "m170428_124336_make_rbac cannot be reverted.\n";
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
