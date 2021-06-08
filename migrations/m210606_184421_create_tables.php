<?php

use yii\db\Migration;

/**
 * Class m210606_184421_create_tables
 */
class m210606_184421_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('genres', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
        ]);

        $this->createTable('artists', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'genre_id' => $this->string(50),
        ]);

        $this->createTable('albums', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'artist_id' => $this->string(50),
            'year' => $this->integer(4),
        ]);

        $this->createTable('tracks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'album_id' => $this->string(50),
            'duration' => $this->string(20),
            'file' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('genres');

        $this->dropTable('artists');

        $this->dropTable('albums');

        $this->dropTable('tracks');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210606_184421_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
