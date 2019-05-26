<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\entities\LogbookActiveRecord;
use app\forms\abstracts\AbstractCreateForm;
use app\traits\logbook\LogbookComponentTrait;
use app\interfaces\logbook\dto\LogbookInterface;
use yii\base\InvalidConfigException;

/**
 * Класс формы для создания сущности "Логбук".
 */
class CreateForm extends AbstractCreateForm
{
    use LogbookComponentTrait;

    /**
     * Инициализация объекта формы обновления.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return void
     */
    public function init(): void
    {
        parent::init();
        $this->setDtoComponent($this->getLogbookComponent());
        $this->setActiveRecordClass(LogbookActiveRecord::class);
    }

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
            throw new InvalidConfigException(' Property "$this->prototype" must implement interface CategoryInterface::class');
        }
        return $this->prototype;
    }

    /**
     * Осуществлет основное действие формы - добавление элемента.
     *
     * @param array $params Параметры формы для выполнения её действия.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
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

        $result = $this->getLogbookComponent()->createOne($this->getPrototype())->doOperation();
        $item   = $result->getLogbook();
        if (! $result->isSuccess() && null !== $item) {
            $this->addErrors($item->getErrors());
            return null;
        }

        return $item;
    }
}