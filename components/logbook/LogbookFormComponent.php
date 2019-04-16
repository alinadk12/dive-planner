<?php

declare(strict_types = 1);

namespace app\components\logbook;

use app\forms\logbook\CreateForm;
use app\forms\logbook\DeleteForm;
use app\forms\logbook\FindForm;
use app\forms\logbook\UpdateForm;
use app\forms\logbook\ViewForm;
use app\interfaces\abstracts\ComponentWithFactoryInterface;
use app\interfaces\logbook\FormFactoryInterface;
use app\traits\ModelsFactoryTrait;
use app\interfaces\logbook\FormComponentInterface;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Компонент. Является программным API для доступа к пакету.
 */
class LogbookFormComponent extends Component implements ComponentWithFactoryInterface, FormComponentInterface
{
    use ModelsFactoryTrait {
        ModelsFactoryTrait::getModelFactory as getModelFactoryFromTrait;
    }

    /**
     * Метод возвращает фабрику моделей пакета "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return FormFactoryInterface
     */
    public function getModelFactory(): FormFactoryInterface
    {
        $modelFactory = $this->getModelFactoryFromTrait();
        if (! $modelFactory instanceof FormFactoryInterface) {
            throw new InvalidConfigException('Class ' . get_class($modelFactory) . ' must implement interface ' . FormFactoryInterface::class);
        }
        return $modelFactory;
    }

    /**
     * Метод возвращает форму создания экземпляров сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return CreateForm
     */
    public function create(): CreateForm
    {
        return $this->getModelFactory()->getCreateForm();
    }

    /**
     * Метод возвращает форму удаления экземпляра сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return DeleteForm
     */
    public function delete(): DeleteForm
    {
        return $this->getModelFactory()->getDeleteForm();
    }

    /**
     * Метод возвращает форму поиска экземпляров сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return FindForm
     */
    public function find(): FindForm
    {
        return $this->getModelFactory()->getFindForm();
    }

    /**
     * Метод возвращает форму обновления экземпляра сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return UpdateForm
     */
    public function update(): UpdateForm
    {
        return $this->getModelFactory()->getUpdateForm();
    }

    /**
     * Метод возвращает прототип админской модели "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return ViewForm
     */
    public function view(): ViewForm
    {
        return $this->getModelFactory()->getViewForm();
    }
}
