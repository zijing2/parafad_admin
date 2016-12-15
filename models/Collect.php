<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_share_collect".
 *
 * @property integer $share_owner_id
 * @property integer $share_id
 * @property integer $collection_owner_id
 */
class Collect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_share_collect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'share_id', 'collection_owner_id'], 'required'],
            [['share_owner_id', 'share_id', 'collection_owner_id'], 'integer'],
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
            'collection_owner_id' => Yii::t('app', 'Collection Owner ID'),
        ];
    }
}
