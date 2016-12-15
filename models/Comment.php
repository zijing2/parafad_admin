<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_share_comment".
 *
 * @property integer $share_owner_id
 * @property integer $share_id
 * @property integer $comment_owner_id
 * @property integer $comment_id
 * @property string $content
 * @property integer $publish_time
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_share_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'share_id', 'comment_owner_id', 'content', 'publish_time'], 'required'],
            [['share_owner_id', 'share_id', 'comment_owner_id', 'publish_time'], 'integer'],
            [['content'], 'string'],
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
            'comment_owner_id' => Yii::t('app', 'Comment Owner ID'),
            'comment_id' => Yii::t('app', 'Comment ID'),
            'content' => Yii::t('app', 'Content'),
            'publish_time' => Yii::t('app', 'Publish Time'),
        ];
    }
}
