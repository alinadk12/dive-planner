<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\forms\abstracts\AbstractDeleteForm;
use app\interfaces\logbook\dto\LogbookInterface;
use app\traits\logbook\LogbookComponentTrait;
use Exception;
use yii\base\InvalidConfigException;

/**
 * Класс формы для удаления сущности "Логбук".
 */
class DeleteForm extends AbstractDeleteForm
{
    use LogbookComponentTrait;

    /**
     * Осуществлет основное действие формы - удаление элемента.
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

        if (! $item = $this->getLogbookComponent()->findOne()->byId($this->getId())->doOperation()->getLogbook()) {
            throw new Exception('Сущность не найдена', 404);
        }

        $result = $this->getLogbookComponent()->deleteMany()->byId($this->getId())->doOperation();
        if (! $result->isSuccess()) {
            $this->addErrors($result->getErrors());
            return null;
        }

        return $item;
    }
}
