<?php

use yii\db\Migration;

/**
 * Class m190210_113831_view_ordered_demands
 */
class m190210_113831_view_ordered_demands extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //требования упорядочиваем по группам с помощью генерируемого столбца ord
        //внимание, IFNULL работает только на MySQL.
        //для Oracle можно использовать NVL
        $this->execute('CREATE VIEW `ordered_demands` AS
        SELECT * 
        FROM
            (SELECT concat(concat(IFNULL(d2.id,d1.id),\'.\'),IFNULL(d2.id-d2.id+d1.id,\'!\')) as ord,
               IFNULL(d2.id,-1) as pid,
               d1.id as id,
               d1.text as text
            FROM demands d1 LEFT JOIN demands d2 on d1.id=d2.id_parent
            ORDER BY ord, d1.uid) AS t1, 
            projects_demands AS t2
         WHERE t1.id=t2.fk_demand;'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('DROP VIEW `ordered_demands`');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190210_113831_view_ordered_demands cannot be reverted.\n";

        return false;
    }
    */
}
