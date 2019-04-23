<?php

declare(strict_types = 1);

namespace app\factories;

use app\forms\logbook\CreateForm;
use app\forms\logbook\DeleteForm;
use app\forms\logbook\FindForm;
use app\forms\logbook\UpdateForm;
use app\forms\logbook\ViewForm;
use app\models\ModelsFactory;
use app\interfaces\logbook\FormFactoryInterface;

/**
 * Фабрика. Реализует породждение моделей пакета для работы с сущностью "Логбук".
 */
class LogbookFormFactory extends ModelsFactory implements FormFactoryInterface
{
    public const LOGBOOK_VIEW_FORM   = 'logbookViewForm';
    public const LOGBOOK_CREATE_FORM = 'logbookCreateForm';
    public const LOGBOOK_UPDATE_FORM = 'logbookUpdateForm';
    public const LOGBOOK_DELETE_FORM = 'logbookDeleteForm';
    public const LOGBOOK_FIND_FORM   = 'logbookFindForm';

    /**
     * Метод возвращает форму для создания сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return CreateForm
     */
    public function getCreateForm(): CreateForm
    {
        return $this->getModelInstance(self::LOGBOOK_CREATE_FORM, [], false);
    }

    /**
     * Метод возвращает форму для удаления данных сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return DeleteForm
     */
    public function getDeleteForm(): DeleteForm
    {
        return $this->getModelInstance(self::LOGBOOK_DELETE_FORM, [], false);
    }

    /**
     * Метод возвращает форму для поиска данных сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return FindForm
     */
    public function getFindForm(): FindForm
    {
        return $this->getModelInstance(self::LOGBOOK_FIND_FORM, [], false);
    }

    /**
     * Метод возвращает форму для обновления данных сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return UpdateForm
     */
    public function getUpdateForm(): UpdateForm
    {
        return $this->getModelInstance(self::LOGBOOK_UPDATE_FORM, [], false);
    }

    /**
     * Метод возвращает форму для просмотра одного экземпляра сущности "Логбук".
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return ViewForm
     */
    public function getViewForm(): ViewForm
    {
        return $this->getModelInstance(self::LOGBOOK_VIEW_FORM, [], false);
    }
}