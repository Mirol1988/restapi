<?php

use yii\db\Migration;

/**
 * Class m201019_171555_apiapp
 */
class m201019_171555_apiapp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('apiapp', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->unique()->notNull(),
            'token' => $this->string(45)->unique()->notNull(),
        ]);

        $this->insert('apiapp', [
            'name' => 'test',
            'token' => 'test',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apiapp');
    }
}
