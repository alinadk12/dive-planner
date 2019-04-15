<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m190108_154247_create_user_table extends Migration
{
    /**
     * Данный метод создает таблицу.
     *
     * @return void
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id'       => $this->primaryKey()->comment('Идентификатор'),
            'email'    => $this->string(255)->notNull()->comment('Электронная почта'),
            'login'    => $this->string(20)->notNull()->comment('Логин'),
            'password' => $this->string(20)->notNull()->comment('Пароль'),
            'name'     => $this->string(100)->notNull()->comment('Имя'),
            'surname'  => $this->string(255)->notNull()->comment('Фамилия'),
        ]);
    }

    /**
     * Данный метод удаляет таблицу.
     *
     * @return void
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
