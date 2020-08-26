<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\base\Model;


class Client extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_logs';
    }
}
