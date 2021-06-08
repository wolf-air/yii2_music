<?php

use yii\db\Migration;

/**
 * Class m210606_205821_insert_data
 */
class m210606_205821_insert_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {

    }*/

    /**
     * {@inheritdoc}
     */
   /* public function safeDown()
    {
        echo "m210606_205821_insert_data cannot be reverted.\n";

        return false;
    }*/


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->insert('genres', [
            'name' => 'Поп',
        ]);

        $this->insert('genres', [
            'name' => 'R&B',
        ]);

        $this->insert('genres', [
            'name' => 'Рок',
        ]);

        $this->insert('artists', [
            'name' => 'Five Finger Death Punch',
            'genre_id' => 3,
        ]);

        $this->insert('albums', [
            'name' => 'The Way of the Fist',
            'artist_id' => 1,
            'year' => 2007,
        ]);

        $this->insert('tracks', [
            'name' => 'Ashes',
            'album_id' => 1,
            'duration' => '3:44',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'The Way of the Fist',
            'album_id' => 1,
            'duration' => '3:58',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'Salvation',
            'album_id' => 1,
            'duration' => '3:20',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'The Bleeding',
            'album_id' => 1,
            'duration' => '4:28',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'A Place to Die',
            'album_id' => 1,
            'duration' => '3:40',
            'file' => 'mp3',
        ]);

        $this->insert('albums', [
            'name' => 'War Is the Answer',
            'artist_id' => 1,
            'year' => 2009,
        ]);

        $this->insert('tracks', [
            'name' => 'Dying Breed',
            'album_id' => 2,
            'duration' => '2:54',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'Hard to See',
            'album_id' => 2,
            'duration' => '3:29',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'Bulletproof',
            'album_id' => 2,
            'duration' => '3:16',
            'file' => 'mp3',
        ]);

        $this->insert('artists', [
            'name' => 'Rammstein',
            'genre_id' => 3,
        ]);

        $this->insert('albums', [
            'name' => 'Herzeleid',
            'artist_id' => 2,
            'year' => 1995,
        ]);

        $this->insert('tracks', [
            'name' => 'Wollt ihr das Bett in Flammen Sehen?',
            'album_id' => 3,
            'duration' => '5:17',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'Der Meister',
            'album_id' => 3,
            'duration' => '4:08',
            'file' => 'mp3',
        ]);

        $this->insert('artists', [
            'name' => 'Тина Тёрнер',
            'genre_id' => 2,
        ]);

        $this->insert('albums', [
            'name' => 'Tina Turns the Country On!',
            'artist_id' => 3,
            'year' => 1974,
        ]);

        $this->insert('tracks', [
            'name' => 'Bayou Song',
            'album_id' => 4,
            'duration' => '3:22',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'Help Me Make It Through the Night',
            'album_id' => 4,
            'duration' => '2:48',
            'file' => 'mp3',
        ]);

        $this->insert('artists', [
            'name' => 'Мадонна',
            'genre_id' => 1,
        ]);

        $this->insert('albums', [
            'name' => 'Ray of Light',
            'artist_id' => 4,
            'year' => 1998,
        ]);

        $this->insert('tracks', [
            'name' => 'Drowned World/Substitute for Love',
            'album_id' => 5,
            'duration' => '5:09',
            'file' => 'mp3',
        ]);

        $this->insert('tracks', [
            'name' => 'Swim',
            'album_id' => 5,
            'duration' => '5:00',
            'file' => 'mp3',
        ]);

    }

    public function down()
    {
        $this->truncateTable('genres');

        $this->truncateTable('artists');

        $this->truncateTable('albums');

        $this->truncateTable('tracks');
    }

}
