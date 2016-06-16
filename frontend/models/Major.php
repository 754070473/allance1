<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "al_major".
 *
 * @property integer $major_id
 * @property string $m_name
 * @property integer $m_pid
 * @property string $m_addtime
 */
class Major extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_pid'], 'integer'],
            [['m_addtime'], 'safe'],
            [['m_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'major_id' => 'Major ID',
            'm_name' => 'M Name',
            'm_pid' => 'M Pid',
            'm_addtime' => 'M Addtime',
        ];
    }
    /**
     * 查询 al_major表
     */
    public function majorshow()
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM al_major ");
        return $command->queryAll();
    }
    /**
     * 递归   al_place
     */
    public function digui($data,$path=0,$level=0)
    {
        static $arr = array();
        foreach($data as $v)
        {
            if($v['m_pid']==$path)
            {
                $v['level']=$level;
                $arr[]=$v;
                $this->digui($data,$v['major_id'],$level+1);
            }
        }
        return $arr;
    }
}
