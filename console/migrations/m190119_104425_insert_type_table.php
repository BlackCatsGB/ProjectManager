<?php

use yii\db\Migration;

/**
 * Class m190119_104425_insert_type_table
 */
class m190119_104425_insert_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('type', ['id', 'name', 'type'], [
            [1, 'Стандартная', 1],
            [2, 'Оценка риска', 1],
            [3, 'Генерация идей', 1],
            [4, 'Голосование', 1],
            [5, 'Согласование', 1],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('type', ['in', 'name', [
            'Стандартная',
            'Оценка риска',
            'Генерация идей',
            'Голосование',
            'Согласование',
        ]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190119_104425_insert_type_table cannot be reverted.\n";

        return false;
    }
    */
}
