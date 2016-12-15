<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_share_like".
 *
 * @property integer $share_owner_id
 * @property integer $share_id
 * @property integer $from_customer_id
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_share_like';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'share_id', 'from_customer_id'], 'required'],
            [['share_owner_id', 'share_id', 'from_customer_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'share_owner_id' => Yii::t('app', 'Share Owner ID'),
            'share_id' => Yii::t('app', 'Share ID'),
            'from_customer_id' => Yii::t('app', 'From Customer ID'),
        ];
    }
}
