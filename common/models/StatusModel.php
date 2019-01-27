<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 26.01.2019
 * Time: 20:20
 */

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class StatusModel extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'status';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'type' => 'Тип',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
}