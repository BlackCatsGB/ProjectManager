<?php

use yii\db\Migration;

/**
 * Handles the creation of table `demands_labels`.
 */
class m190125_111737_create_demands_labels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('demands_labels', [
            'id' => $this->primaryKey(),
            'id_demand' => $this->integer(),
            'id_label' => $this->integer()
        ]);

        $this->addForeignKey('demand_relation_labels', 'demands_labels', 'id_demand', 'demands', 'id');
        $this->addForeignKey('label_relation', 'demands_labels', 'id_label', 'labels', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('demand_relation_labels', 'demands_labels');
        $this->dropForeignKey('label_relation', 'demands_labels');

        $this->dropTable('demands_labels');
    }
}
