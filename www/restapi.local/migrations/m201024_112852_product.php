<?php

use yii\db\Migration;

/**
 * Class m201024_112852_product
 */
class m201024_112852_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->unique()->notNull(),
            'text' => $this->string()->notNull(),
            'cat' => $this->integer()
        ]);

        for ($i = 1; $i < 10; $i++) {
            $this->insert('product', [
                'name' => 'name ' . $i,
                'text' => 'text ' . $i,
                'cat' => 1
            ]);
        }

        for ($i = 11; $i < 20; $i++) {
            $this->insert('product', [
                'name' => 'name ' . $i,
                'text' => 'text ' . $i,
                'cat' => 2
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
