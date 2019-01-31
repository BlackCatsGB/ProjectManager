<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dict_project_stages".
 *
 * @property int $id
 * @property string $title Название
 * @property int $ord Очередность
 */
class DictProjectStages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_project_stages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['ord'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'ord' => 'Ord',
        ];
    }

    public static function getNextStage($id)
    {
        $query = "SELECT s0.id 
                  from dict_project_stages as s0, 
                  (SELECT min(s2.ord) as m 
                      FROM dict_project_stages as s1, dict_project_stages as s2 
                      where s1.ord<s2.ord and s1.id=" . $id . ") as s3 
                  where s0.ord=s3.m;";
        return Yii::$app->db->createCommand($query)->queryAll();
    }
}
