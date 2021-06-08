<?php


namespace app\models;


use yii\db\ActiveRecord;

class Albums extends ActiveRecord
{
    public function getArtist()
    {
        return $this->hasOne(Artists::className(), ['id' => 'artist_id']);
    }

    public function getTracks()
    {
        return $this->hasMany(Tracks::className(), ['album_id' => 'id']);
    }
}