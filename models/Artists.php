<?php


namespace app\models;


use yii\db\ActiveRecord;

class Artists extends ActiveRecord
{
    public function getGenres()
    {
        return $this->hasMany(Genres::className(), ['id' => 'genre_id']);
    }

    public function getAlbums()
    {
        return $this->hasMany(Albums::className(), ['artist_id' => 'id']);
    }
}