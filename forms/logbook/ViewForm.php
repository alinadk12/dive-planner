<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\entities\LogbookActiveRecord;
use app\forms\abstracts\AbstractViewForm;
use app\traits\logbook\LogbookComponentTrait;
use app\validators\logbook\LogbookValidator;
use yii\base\InvalidConfigException;

/**
 * Класс админской модели работы с сущностью "Логбук".
 */
class ViewForm extends AbstractViewForm
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
}