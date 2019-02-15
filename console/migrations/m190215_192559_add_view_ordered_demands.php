<?php

use yii\db\Migration;

/**
 * Class m190215_192559_add_view_ordered_demands
 */
class m190215_192559_add_view_ordered_demands extends Migration
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
            (SELECT 
                concat(
                    concat(
                        IFNULL(d_parent.id,d_child.id),
                        \'.\'),
                    IFNULL(d_parent.id-d_parent.id+d_child.id,\'!\')
                ) as ord,
                IFNULL(d_child.id,-1) as pid,
                d_child.id as id,
                d_child.text as text,
                d_child.is_group
            FROM demands d_child LEFT JOIN demands d_parent on d_parent.id=d_child.id_parent
            ORDER BY ord, d_parent.uid);'
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
        echo "m190215_192559_add_view_ordered_demands cannot be reverted.\n";

        return false;
    }
    */
}
