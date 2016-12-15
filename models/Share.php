<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_share".
 *
 * @property integer $share_owner_id
 * @property integer $share_id
 * @property string $content
 * @property string $title
 * @property integer $publish_time
 * @property integer $update_time
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_share';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'title', 'publish_time', 'update_time'], 'required'],
            [['share_owner_id', 'publish_time', 'update_time'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 200],
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
            'content' => Yii::t('app', 'Content'),
            'title' => Yii::t('app', 'Title'),
            'publish_time' => Yii::t('app', 'Publish Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }
}
