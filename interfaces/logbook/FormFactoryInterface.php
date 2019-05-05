<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use app\interfaces\abstracts\forms\CreateFormInterface;
use app\interfaces\abstracts\forms\DeleteFormInterface;
use app\interfaces\abstracts\forms\ListFormInterface;
use app\interfaces\abstracts\forms\UpdateFormInterface;
use app\interfaces\abstracts\forms\ViewFormInterface;
use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\logbook\filters\MultiFilterInterface;

/**
 * Интерфейс фабрики. Опеределяет методы порождения моделей пакета.
 */
interface FormFactoryInterface
{
    /**
     * Метод возвращает форму для создания сущности "Логбук".
     *
     * @return CreateFormInterface
     */
    public function getCreateForm(): CreateFormInterface;

    /**
     * Метод возвращает форму для удаления данных сущности "Логбук".
     *
     * @return DeleteFormInterface
     */
    public function getDeleteForm(): DeleteFormInterface;

    /**
     * Метод возвращает форму для поиска данных сущности "Логбук".
     *
     * @return ListFormInterface
     */
    public function getListForm(): ListFormInterface;

    /**
     * Метод возвращает форму для обновления данных сущности "Логбук".
     *
     * @return UpdateFormInterface
     */
    public function getUpdateForm(): UpdateFormInterface;

    /**
     * Метод возвращает форму для просмотра одного экземпляра сущности "Логбук".
     *
     * @return ViewFormInterface
     */
    public function getViewForm(): ViewFormInterface;

    /**
     * Метод возвращает форму фильтра списка сущностей "Логбук".
     *
     * @return MultiFilterInterface
     */
    public function getLogbookFilter(): MultiFilterInterface;

    /**
     * Метод возвращает гидратор фильтра сущности "Логбук".
     *
     * @return HydratorInterface
     */
    public function getLogbookFilterHydrator(): HydratorInterface;

    /**
     * Метод возвращает гидратор для сущности "Логбук".
     *
     * @return HydratorInterface
     */
    public function getLogbookHydrator(): HydratorInterface;
}