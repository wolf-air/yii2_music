<?php


namespace app\models;


use yii\db\ActiveRecord;

class Genres extends ActiveRecord
{
    public function getArtists()
    {
        return $this->hasMany(Artists::className(), ['genre_id' => 'id']);
    }
}