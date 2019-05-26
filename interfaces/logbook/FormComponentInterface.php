<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use app\interfaces\abstracts\forms\CreateFormInterface;
use app\interfaces\abstracts\forms\DeleteFormInterface;
use app\interfaces\abstracts\forms\ListFormInterface;
use app\interfaces\abstracts\forms\UpdateFormInterface;
use app\interfaces\abstracts\forms\ViewFormInterface;
use app\interfaces\abstracts\HydratorInterface;

/**
 * Интерфейс компонента для работы с формами сущностей "Логбук".
 */
interface  FormComponentInterface
{
    /**
     * Метод возвращает интерфейс формы создания сущности "Логбук".
     *
     * @return CreateFormInterface
     */
    public function getCreateForm(): CreateFormInterface;

    /**
     * Метод возвращает интерфейс формы удаления сущности "Логбук".
     *
     * @return DeleteFormInterface
     */
    public function getDeleteForm(): DeleteFormInterface;

    /**
     * Метод возвращает интерефейс гидратора фильтра поиска сущности "Логбук".
     *
     * @return HydratorInterface
     */
    public function getFilterHydrator(): HydratorInterface;

    /**
     * Метод возвращает интерефейс операции поиска списка сущностей "Логбук".
     *
     * @return ListFormInterface
     */
    public function getListForm(): ListFormInterface;

    /**
     * Метод возвращает интерфейс формы редактирования сущности "Логбук".
     *
     * @return UpdateFormInterface
     */
    public function getUpdateForm(): UpdateFormInterface;

    /**
     * Метод возвращает интерефейс операции поиска одного экземпляра сущности "Логбук".
     *
     * @return ViewFormInterface
     */
    public function getViewForm(): ViewFormInterface;
}