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
 */
class OrderedDemands extends \yii\db\ActiveRecord
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
        return 'id';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'id'], 'integer'],
            [['text'], 'required'],
            [['ord'], 'string', 'max' => 25],
            [['ptext', 'text'], 'string', 'max' => 2000],
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
        ];
    }
}
