<?php

declare(strict_types = 1);

namespace app\interfaces\logbook;

use app\forms\logbook\CreateForm;
use app\forms\logbook\DeleteForm;
use app\forms\logbook\FindForm;
use app\forms\logbook\UpdateForm;
use app\forms\logbook\ViewForm;

/**
 * Интерфейс компонента для работы с формами сущностей "Логбук".
 */
interface  FormComponentInterface
{
    /**
     * Метод возвращает форму создания экземпляров сущности "Логбук".
     *
     * @return CreateForm
     */
    public function create(): CreateForm;

    /**
     * Метод возвращает форму удаления экземпляра сущности "Логбук".
     *
     * @return DeleteForm
     */
    public function delete(): DeleteForm;

    /**
     * Метод возвращает форму поиска экземпляров сущности "Логбук".
     *
     * @return FindForm
     */
    public function find(): FindForm;

    /**
     * Метод возвращает форму обновления экземпляра сущности "Логбук".
     *
     * @return UpdateForm
     */
    public function update(): UpdateForm;

    /**
     * Метод возвращает прототип админской модели "Логбук".
     *
     * @return ViewForm
     */
    public function view(): ViewForm;
}