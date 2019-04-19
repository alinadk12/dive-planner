<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use app\forms\logbook\CreateForm;
use app\forms\logbook\DeleteForm;
use app\forms\logbook\FindForm;
use app\forms\logbook\UpdateForm;
use app\forms\logbook\ViewForm;

/**
 * Интерфейс фабрики. Опеределяет методы порождения моделей пакета.
 */
interface FormFactoryInterface
{
    /**
     * Метод возвращает форму для создания сущности "Логбук".
     *
     * @return CreateForm
     */
    public function getCreateForm(): CreateForm;

    /**
     * Метод возвращает форму для удаления данных сущности "Логбук".
     *
     * @return DeleteForm
     */
    public function getDeleteForm(): DeleteForm;

    /**
     * Метод возвращает форму для поиска данных сущности "Логбук".
     *
     * @return FindForm
     */
    public function getFindForm(): FindForm;

    /**
     * Метод возвращает форму для обновления данных сущности "Логбук".
     *
     * @return UpdateForm
     */
    public function getUpdateForm(): UpdateForm;

    /**
     * Метод возвращает форму для просмотра одного экземпляра сущности "Логбук".
     *
     * @return ViewForm
     */
    public function getViewForm(): ViewForm;
}