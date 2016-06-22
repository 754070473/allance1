<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "al_keyword".
 *
 * @property integer $key_id
 * @property string $k_name
 * @property integer $k_num
 * @property string $k_addtime
 */
class Keyword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_keyword';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['k_num'], 'integer'],
            [['k_addtime'], 'safe'],
            [['k_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key_id' => 'Key ID',
            'k_name' => 'K Name',
            'k_num' => 'K Num',
            'k_addtime' => 'K Addtime',
        ];
    }
}
