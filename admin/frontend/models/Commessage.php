<?php

namespace frontend\models;

use Yii;
use yii\frontend\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "al_com_message".
 *
 * @property integer $mes_id
 * @property integer $com_id
 * @property string $m_name
 * @property string $m_logo
 * @property string $m_course
 * @property string $m_welfare
 * @property string $m_place
 * @property string $point_x
 * @property string $point_y
 * @property string $pro_intro
 * @property string $m_culture
 * @property string $m_qq
 * @property string $m_url
 */
class Commessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $m_logo; 
    public static function tableName()
    {
        return 'al_com_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_id'], 'integer'],
            [['m_name', 'point_x', 'point_y', 'm_qq'], 'string', 'max' => 50],
            [['m_course', 'm_welfare', 'm_place', 'pro_intro', 'm_culture', 'm_url'], 'string', 'max' => 100],
            [['m_logo'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->m_logo->saveAs('uploads/' . $this->m_logo->baseName . '.' . $this->m_logo->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mes_id' => 'Mes ID',
            'com_id' => 'Com ID',
            'm_name' => 'M Name',
            'm_logo' => 'M Logo',
            'm_course' => 'M Course',
            'm_welfare' => 'M Welfare',
            'm_place' => 'M Place',
            'point_x' => 'Point X',
            'point_y' => 'Point Y',
            'pro_intro' => 'Pro Intro',
            'm_culture' => 'M Culture',
            'm_qq' => 'M Qq',
            'm_url' => 'M Url',
        ];
    }

}
