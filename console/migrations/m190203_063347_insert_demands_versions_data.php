<?php

use yii\db\Migration;

/**
 * Class m190203_063347_insert_demands_versions_data
 */
class m190203_063347_insert_demands_versions_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('demands_version',['id'=>1,'number'=>'v1. origin','created_at'=>time()]);
        $this->insert('demands_version',['id'=>2,'number'=>'v2. +FL-152','created_at'=>time()]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        ;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190203_063347_insert_demands_versions_data cannot be reverted.\n";

        return false;
    }
    */
}
