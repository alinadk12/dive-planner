<?php

use yii\db\Migration;

/**
 * Handles the creation of table `logbook`.
 */
class m190113_093845_create_logbook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('logbook', [
            'id'          => $this->primaryKey(),
            'userId'      => $this->integer()->notNull()->comment('ИД дайвера'),
            'date'        => $this->date()->notNull()->comment('Дата погружения'),
            'location'    => $this->string(255)->notNull()->comment('Место погружения'),
            'depth'       => $this->float()->notNull()->comment('Глубина'),
            'visibility'  => $this->float()->null()->comment('Видимость'),
            'tempAir'     => $this->float()->null()->comment('Температура воздуха'),
            'tempSurface' => $this->float()->null()->comment('Температура воды на поверхности'),
            'tempBottom'  => $this->float()->null()->comment('Температура воды на дне'),
            'timeIn'      => $this->time()->notNull()->comment('Время начала погружения'),
            'timeOut'     => $this->time()->notNull()->comment('Время окончания погружения'),
            'cylinder'    => $this->integer()->notNull()->comment('Объем баллона'),
            'startBar'    => $this->integer()->notNull()->comment('Количество воздуха в начале погружения'),
            'endBar'      => $this->integer()->notNull()->comment('Количество воздуха в конце погружения'),
            'comments'    => $this->text()->null()->comment('Комментарии'),
        ]);

        $this->addForeignKey(
            'logbook_userId_user',
            'logbook',
            'userId',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('logbook_userId_user', 'logbook');
        $this->dropTable('logbook');
    }
}
