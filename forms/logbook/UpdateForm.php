<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\forms\abstracts\AbstractUpdateForm;
use app\interfaces\logbook\dto\LogbookInterface;
use app\traits\logbook\LogbookComponentTrait;
use Exception;
use yii\base\InvalidConfigException;

/**
 * Класс формы для обновления сущности "Логбук".
 */
class UpdateForm extends AbstractUpdateForm
{
    use LogbookComponentTrait;

    /**
     * Метод возвращает объект ДТО для работы с формой.
     *
     * @throws InvalidConfigException Генерирует если прототип формы не задан.
     *
     * @return LogbookInterface
     */
    public function getPrototype(): LogbookInterface
    {
        if (! $this->prototype instanceof LogbookInterface) {
            throw new InvalidConfigException(__METHOD__ . '() Прототип для формы не задан.');
        }
        return $this->prototype;
    }

    /**
     * Осуществлет основное действие формы - добавление элемента.
     *
     * @param array $params Параметры формы для выполнения её действия.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     * @throws Exception              Если сущность не найдена.
     *
     * @inherit
     *
     * @return LogbookInterface|null
     */
    public function run(array $params = []): ?LogbookInterface
    {
        if (! $this->validate()) {
            return null;
        }

        if (! $this->getLogbookComponent()->findOne()->byId($this->getId())->doOperation()) {
            throw new Exception('Сущность не найдена', 404);
        }

        $result = $this->getLogbookComponent()->updateOne($this->getPrototype())->doOperation();

        if (! $result->isSuccess()) {
            $this->addErrors($result->getErrors());
            return null;
        }

        return $this->getLogbookComponent()->findOne()->byId($this->getId())->doOperation()->getLogbook();
    }
}