<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_share_picture".
 *
 * @property integer $share_owner_id
 * @property integer $share_id
 * @property integer $picture_id
 * @property string $location
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_share_picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'share_id', 'location'], 'required'],
            [['share_owner_id', 'share_id'], 'integer'],
            [['location'], 'string', 'max' => 100],
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
            'picture_id' => Yii::t('app', 'Picture ID'),
            'location' => Yii::t('app', 'Location'),
        ];
    }
}
