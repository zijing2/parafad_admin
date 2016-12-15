<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgzj_msg_comment_relation".
 *
 * @property integer $share_owner_id
 * @property integer $share_id
 * @property integer $comment_owner_id
 * @property integer $comment_id
 * @property integer $message_owner_id
 * @property integer $message_id
 */
class MsgComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgzj_msg_comment_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_owner_id', 'share_id', 'comment_owner_id', 'comment_id', 'message_owner_id', 'message_id'], 'required'],
            [['share_owner_id', 'share_id', 'comment_owner_id', 'comment_id', 'message_owner_id', 'message_id'], 'integer'],
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
            'message_owner_id' => Yii::t('app', 'Message Owner ID'),
            'message_id' => Yii::t('app', 'Message ID'),
        ];
    }
}
