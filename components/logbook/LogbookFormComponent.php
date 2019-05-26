<?php

declare(strict_types = 1);

namespace app\components\logbook;

use app\interfaces\abstracts\ComponentWithFactoryInterface;
use app\interfaces\abstracts\forms\CreateFormInterface;
use app\interfaces\abstracts\forms\DeleteFormInterface;
use app\interfaces\abstracts\forms\ListFormInterface;
use app\interfaces\abstracts\forms\UpdateFormInterface;
use app\interfaces\abstracts\forms\ViewFormInterface;
use app\interfaces\abstracts\HydratorInterface;
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
     * Метод возвращает форму создания сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return CreateFormInterface
     */
    public function getCreateForm(): CreateFormInterface
    {
        return $this->getModelFactory()->getCreateForm();
    }

    /**
     * Метод возвращает форму удаления сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return DeleteFormInterface
     */
    public function getDeleteForm(): DeleteFormInterface
    {
        return $this->getModelFactory()->getDeleteForm();
    }

    /**
     * Метод возвращает гидратор фильтра поиска сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return HydratorInterface
     */
    public function getFilterHydrator(): HydratorInterface
    {
        return $this->getModelFactory()->getLogbookFilterHydrator();
    }

    /**
     * Метод возвращает форму поиска списка сущностей "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return ListFormInterface
     */
    public function getListForm(): ListFormInterface
    {
        return $this->getModelFactory()->getListForm();
    }

    /**
     * Метод возвращает форму редатирования сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return UpdateFormInterface
     */
    public function getUpdateForm(): UpdateFormInterface
    {
        return $this->getModelFactory()->getUpdateForm();
    }

    /**
     * Метод возвращает форму просмотра одной сущности "Логбук".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return ViewFormInterface
     */
    public function getViewForm(): ViewFormInterface
    {
        return $this->getModelFactory()->getViewForm();
    }
}
