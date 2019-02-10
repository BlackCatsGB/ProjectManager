<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ordered_demands".
 *
 * @property string $ord
 * @property int $pid
 * @property string $ptext
 * @property int $id
 * @property string $text
 * @property int $fk_project Проект
 * @property int $fk_demand Требование
 * @property int $is_relevant Актуальность
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property string $comment Комментарий
 */
class OrderedDemands2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordered_demands';
    }

    public static function primaryKey()
    {
        return ['fk_demand', 'fk_project'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'id', 'fk_project', 'fk_demand', 'is_relevant', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['text', 'fk_project', 'fk_demand', 'created_by', 'created_at'], 'required'],
            [['ord'], 'string', 'max' => 25],
            [['ptext', 'text'], 'string', 'max' => 2000],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ord' => 'Ord',
            'pid' => 'Pid',
            'ptext' => 'Ptext',
            'id' => 'ID',
            'text' => 'Text',
            'fk_project' => 'Fk Project',
            'fk_demand' => 'Fk Demand',
            'is_relevant' => 'Is Relevant',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'comment' => 'Comment',
        ];
    }
}
