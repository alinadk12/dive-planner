<?php

declare(strict_types = 1);

namespace app\factories;

use app\interfaces\abstracts\forms\CreateFormInterface;
use app\interfaces\abstracts\forms\DeleteFormInterface;
use app\interfaces\abstracts\forms\ListFormInterface;
use app\interfaces\abstracts\forms\UpdateFormInterface;
use app\interfaces\abstracts\forms\ViewFormInterface;
use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\filters\MultiFilterInterface;
use app\models\ModelsFactory;
use app\interfaces\logbook\FormFactoryInterface;
use app\validators\AbstractFilterValidator;
use yii\base\InvalidConfigException;

/**
 * Фабрика. Реализует породждение моделей пакета для работы с сущностью "Логбук".
 */
class LogbookFormFactory extends ModelsFactory implements FormFactoryInterface
{
    public const LOGBOOK_VIEW_FORM        = 'logbookViewForm';
    public const LOGBOOK_CREATE_FORM      = 'logbookCreateForm';
    public const LOGBOOK_UPDATE_FORM      = 'logbookUpdateForm';
    public const LOGBOOK_DELETE_FORM      = 'logbookDeleteForm';
    public const LOGBOOK_LIST_FORM        = 'logbookListForm';
    public const LOGBOOK_FILTER           = 'logbookFilter';
    public const LOGBOOK_FILTER_HYDRATOR  = 'logbookFilterHydrator';
    public const LOGBOOK_FILTER_VALIDATOR = 'logbookFilterValidator';
    public const LOGBOOK_HYDRATOR         = 'logbookHydrator';
    public const LOGBOOK_PROTOTYPE        = 'logbookPrototype';

    /**
     * Метод возвращает форму для создания сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return CreateFormInterface
     */
    public function getCreateForm(): CreateFormInterface
    {
        return $this->getModelInstance(self::LOGBOOK_CREATE_FORM, [], false)
                    ->setPrototype($this->getPrototype())
                    ->setHydrator($this->getLogbookHydrator());
    }

    /**
     * Метод возвращает форму для удаления данных сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return DeleteFormInterface
     */
    public function getDeleteForm(): DeleteFormInterface
    {
        return $this->getModelInstance(self::LOGBOOK_DELETE_FORM, [], false);
    }

    /**
     * Метод возвращает форму для поиска данных сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return ListFormInterface
     */
    public function getListForm(): ListFormInterface
    {
        return $this->getModelInstance(self::LOGBOOK_LIST_FORM, [], false)
                    ->setFilter($this->getLogbookFilter())
                    ->setFilterValidator($this->getLogbookFilterValidator());
    }

    /**
     * Метод возвращает форму для обновления данных сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return UpdateFormInterface
     */
    public function getUpdateForm(): UpdateFormInterface
    {
        return $this->getModelInstance(self::LOGBOOK_UPDATE_FORM, [], false)
                    ->setPrototype($this->getPrototype())
                    ->setHydrator($this->getLogbookHydrator());
    }

    /**
     * Метод возвращает форму для просмотра одного экземпляра сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return ViewFormInterface
     */
    public function getViewForm(): ViewFormInterface
    {
        return $this->getModelInstance(self::LOGBOOK_VIEW_FORM, [], false);
    }

    /**
     * Метод возвращает форму фильтра списка "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return MultiFilterInterface
     */
    public function getLogbookFilter(): MultiFilterInterface
    {
        return $this->getModelInstance(self::LOGBOOK_FILTER, [], false);
    }

    /**
     * Метод возвращает гидратор фильтра списка "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return HydratorInterface
     */
    public function getLogbookFilterHydrator(): HydratorInterface
    {
        return $this->getModelInstance(self::LOGBOOK_FILTER_HYDRATOR, [], false);
    }

    /**
     * Метод возвращает валидатор фильтра сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return AbstractFilterValidator
     */
    protected function getLogbookFilterValidator(): AbstractFilterValidator
    {
        return $this->getModelInstance(self::LOGBOOK_FILTER_VALIDATOR, [], false);
    }

    /**
     * Метод возвращает гидратор для сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return HydratorInterface
     */
    public function getLogbookHydrator(): HydratorInterface
    {
        return $this->getModelInstance(self::LOGBOOK_HYDRATOR, [], false);
    }

    /**
     * Метод возвращает объект прототипа сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return LogbookInterface
     */
    protected function getPrototype(): LogbookInterface
    {
        return $this->getModelInstance(self::LOGBOOK_PROTOTYPE, [], false);
    }
}