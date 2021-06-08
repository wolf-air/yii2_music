<?php


namespace app\models;


use yii\db\ActiveRecord;

class Tracks extends ActiveRecord
{
    public function getAlbum()
    {
        return $this->hasOne(Albums::className(), ['album_id' => 'id']);
    }
}