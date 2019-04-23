<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\entities\LogbookActiveRecord;
use app\forms\abstracts\AbstractUpdateForm;
use app\traits\logbook\LogbookComponentTrait;
use app\validators\logbook\LogbookValidator;
use yii\base\InvalidConfigException;

/**
 * Класс формы для обновления сущности "Логбук".
 */
class UpdateForm extends AbstractUpdateForm
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
        $this->setDtoComponent($this->getLogbookComponent());
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
     * Осуществлет основное действие формы - обновление элемента.
     *
     * @param array $params Параметры формы для выполнения её действия.
     *
     * @throws InvalidConfigException Если dtoComponent не установлен.
     *
     * @inherit
     *
     * @return mixed
     */
    public function run(array $params = [])
    {
        $result = $this->getDtoComponent()->updateOne($this->dto)->doOperation();

        if (! $result->isSuccess()) {
            $this->addErrors($result->getErrors());
            return false;
        }
        return true;
    }
}