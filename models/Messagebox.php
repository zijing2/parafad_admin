<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_messagebox".
 *
 * @property integer $message_owner_id
 * @property integer $message_id
 * @property integer $time
 * @property integer $is_read
 */
class Messagebox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_messagebox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_owner_id', 'time'], 'required'],
            [['message_owner_id', 'time', 'is_read'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_owner_id' => Yii::t('app', 'Message Owner ID'),
            'message_id' => Yii::t('app', 'Message ID'),
            'time' => Yii::t('app', 'Time'),
            'is_read' => Yii::t('app', 'Is Read'),
        ];
    }
}
