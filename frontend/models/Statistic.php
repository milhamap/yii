<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property int $id
 * @property string|null $access_time
 * @property string|null $user_ip
 * @property string|null $path_info
 * @property string|null $query_string
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['access_time'], 'safe'],
            [['user_ip', 'path_info', 'query_string'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_time' => 'Access Time',
            'user_ip' => 'User Ip',
            'path_info' => 'Path Info',
            'query_string' => 'Query String',
        ];
    }
}
