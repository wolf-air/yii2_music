<?php


namespace app\models;


use yii\db\ActiveRecord;

class Artists extends ActiveRecord
{
    public function getGenres()
    {
        $query = new \yii\db\Query();

        return $result = $query->select(['genres.id AS id',
            'genres.name AS name',
        ])->from('artist_genre')
            ->leftJoin('genres', 'artist_genre.genre_id = genres.id')
            ->leftJoin('artists', 'artist_genre.artist_id = artists.id')
            ->where('artists.id=:artist_id', [':artist_id' => $this->id])
            ->all();
    }

    public function getAlbums()
    {
        return $this->hasMany(Albums::className(), ['artist_id' => 'id']);
    }
}