<?php

use yii\db\Migration;

/**
 * Class m190119_104012_insert_status_table
 */
class m190119_104012_insert_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('status', ['id', 'name', 'type'], [
            [1, 'Новая задача', 1],
            [2, 'В работе', 1],
            [3, 'Приостановлена', 1],
            [4, 'Отклонена', 1],
            [5, 'Выполнена', 1],
            [6, 'Проверена', 1],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('status', ['in', 'name', [
            'Новая задача',
            'В работе',
            'Приостановлена',
            'Отклонена',
            'Выполнена',
            'Проверена',
        ]]);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190119_104012_insert_status_table cannot be reverted.\n";

        return false;
    }
    */
}
