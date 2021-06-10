<?php


namespace app\models;


use yii\db\ActiveRecord;

class Genres extends ActiveRecord
{
    public function getArtists()
    {
        $query = new \yii\db\Query();

        return $result = $query->select(['artists.id AS id',
            'artists.name AS name',
            ])->from('artist_genre')
            ->leftJoin('genres', 'artist_genre.genre_id = genres.id')
            ->leftJoin('artists', 'artist_genre.artist_id = artists.id')
            ->where('genres.id=:genre_id', [':genre_id' => $this->id])
            ->all();
    }
}