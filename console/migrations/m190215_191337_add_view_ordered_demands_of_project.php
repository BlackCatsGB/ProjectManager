<?php

use yii\db\Migration;

/**
 * Class m190215_191337_add_view_ordered_demands_of_project
 */
class m190215_191337_add_view_ordered_demands_of_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //требования упорядочиваем по группам с помощью генерируемого столбца ord
        //внимание, IFNULL работает только на MySQL.
        //для Oracle можно использовать NVL
        $this->execute('CREATE VIEW `ordered_demands_of_project` AS
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
        $this->execute('DROP VIEW `ordered_demands_of_project`');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_191337_add_view_ordered_demands_of_project cannot be reverted.\n";

        return false;
    }
    */
}
