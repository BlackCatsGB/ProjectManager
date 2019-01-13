<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type`.
 */
class m190112_175521_create_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment('Название'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('type');
    }
}
