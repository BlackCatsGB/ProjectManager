<?php

use yii\db\Migration;

/**
 * Handles the creation of table `demands_version`.
 */
class m190124_114157_create_demands_version_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('demands_version', [
            'id' => $this->primaryKey(),
            'number' => $this->string(45)->notNull(),
            'created_at' => $this->timestamp(10)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('demands_version');
    }
}
