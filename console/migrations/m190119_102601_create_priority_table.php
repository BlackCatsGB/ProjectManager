<?php

use yii\db\Migration;

/**
 * Handles the creation of table `priority`.
 */
class m190119_102601_create_priority_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('priority', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Название'),
        ]);

        Yii::$app->db->createCommand()->batchInsert('priority', ['id', 'name'], [
            [1, 'Немедленно'],
            [2, 'Высокий'],
            [3, 'Нормальный'],
            [4, 'Низкий'],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('priority');

        return true;
    }
}
