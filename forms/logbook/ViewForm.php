<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\forms\abstracts\AbstractViewForm;
use app\interfaces\logbook\dto\LogbookInterface;
use app\traits\logbook\LogbookComponentTrait;
use Exception;
use yii\base\InvalidConfigException;

/**
 * Класс админской модели работы с сущностью "Логбук".
 */
class ViewForm extends AbstractViewForm
{
    use LogbookComponentTrait;

    /**
     * Осуществлет основное действие формы - просмотр элемента.
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

        $item = $this->getLogbookComponent()->findOne()->byId($this->getId())->doOperation()->getLogbook();
        if (! $item) {
            throw new Exception('Сущность не найдена', 404);
        }

        return $item;
    }
}