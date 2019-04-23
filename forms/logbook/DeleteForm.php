<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\entities\LogbookActiveRecord;
use app\forms\abstracts\AbstractDeleteForm;
use app\traits\logbook\LogbookComponentTrait;
use app\validators\logbook\LogbookValidator;
use yii\base\InvalidConfigException;

/**
 * Класс формы для удаления сущности "Логбук".
 */
class DeleteForm extends AbstractDeleteForm
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

    /**
     * Осуществлет основное действие формы - удаление элемента.
     *
     * @param array $params Параметры формы для выполнения её действия.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @inherit
     *
     * @return mixed
     */
    public function run(array $params = [])
    {
        $result = $this->getDtoComponent()->deleteMany()->byId($this->dto->getCategory()->getId())->doOperation();
        if (! $result->isSuccess()) {
            $this->addErrors($result->getErrors());
            return false;
        }
        return true;
    }
}
