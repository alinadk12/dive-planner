<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\entities\LogbookActiveRecord;
use app\forms\abstracts\AbstractCreateForm;
use app\traits\logbook\LogbookComponentTrait;
use app\interfaces\logbook\dto\LogbookInterface;
use app\validators\logbook\LogbookValidator;
use yii\base\InvalidConfigException;

/**
 * Класс формы для создания сущности "Логбук".
 */
class CreateForm extends AbstractCreateForm
{
    use LogbookComponentTrait;

    /**
     * Возвращает первый элемент из списка созданных.
     *
     * @param mixed $result Результат выполнения операции.
     *
     * @return LogbookInterface
     */
    public function getResultItem($result): LogbookInterface
    {
        return $result->getLogbook();
    }

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
        $this->setLogbookComponent($this->getLogbookComponent());
        $this->setActiveRecordClass(LogbookActiveRecord::class);
    }

    /**
     * Данный метод возвращает массив, содержащий правила валидации атрибутов.
     *
     * @return array
     */
    public function rules(): array
    {
        return LogbookValidator::getRules();
    }
}