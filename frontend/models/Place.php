<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "al_place".
 *
 * @property integer $pla_id
 * @property string $i_name
 * @property integer $p_pid
 * @property string $i_addtime
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_pid'], 'integer'],
            [['i_addtime'], 'safe'],
            [['i_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pla_id' => 'Pla ID',
            'i_name' => 'I Name',
            'p_pid' => 'P Pid',
            'i_addtime' => 'I Addtime',
        ];
    }
    /**
     * 查询 al_place表
     */
    public function show()
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM al_place ");
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
            if($v['p_pid']==$path)
            {
                $v['level']=$level;
                $arr[]=$v;
                $this->digui($data,$v['pla_id'],$level+1);
            }
        }
        return $arr;
    }

}
