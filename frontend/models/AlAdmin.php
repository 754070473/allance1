<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "al_admin".
 *
 * @property integer $adm_id
 * @property string $a_account
 * @property string $a_name
 * @property string $a_pwd
 * @property string $a_addtime
 */
class AlAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_addtime'], 'safe'],
            [['a_account'], 'string', 'max' => 50],
            [['a_name', 'a_pwd'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adm_id' => 'Adm ID',
            'a_account' => 'A Account',
            'a_name' => 'A Name',
            'a_pwd' => 'A Pwd',
            'a_addtime' => 'A Addtime',
        ];
    }
}
