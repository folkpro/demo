<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m190412_061243_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string()->notNull()->unique()->comment('Название'),
            'alias' => $this->string()->notNull()->unique()->comment('Алиас'),
            'description' => $this->text()->comment('Описание'),
            'content' => $this->text()->comment('Контент'),
            'date_publish' => $this->date()->comment('Дата'),
            'is_active' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('Активность'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
