<?php

namespace frontend\models;

use Yii;
use yii\validators\UrlValidator ;

/**
 * This is the model class for table "al_navigation".
 *
 * @property integer $nav_id
 * @property string $n_name
 * @property string $n_url
 * @property integer $n_type
 * @property string $n_addtime
 */
class Navigation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_navigation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_type'], 'integer'],
            [['n_addtime'], 'safe'],    
            [['n_name'], 'string', 'max' => 50],
            [['n_url'], 'url', 'defaultScheme' => 'http']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nav_id' => 'Nav ID',
            'n_name' => 'N Name',
            'n_url' => 'N Url',
            'n_type' => 'N Type',
            'n_addtime' => 'N Addtime',
        ];
    }
}
