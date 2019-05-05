<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\interfaces\abstracts\forms\ListFormInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\filters\MultiFilterInterface;
use app\traits\logbook\LogbookComponentTrait;
use app\traits\logbook\LogbookFormComponentTrait;
use Exception;
use yii\base\InvalidConfigException;
use app\forms\abstracts\AbstractListForm;

/**
 * Форма данных для REST-метода выборки списка сущностей "Логбук".
 */
class ListForm extends AbstractListForm implements ListFormInterface
{
    use LogbookComponentTrait;
    use LogbookFormComponentTrait;

    /**
     * Свойство хранит количество всех записей.
     *
     * @var int
     */
    protected $totalCount = 0;

    /**
     * Метод возвращает количество всех записей.
     *
     * @return int
     */
    public function getTotalCount(): int
    {
        return (int)$this->totalCount;
    }

    /**
     * Метод возвращает объект фильтра для формы выборки.
     *
     * @throws InvalidConfigException Генерирует в случае отсутствия фильта.
     *
     * @return MultiFilterInterface
     */
    public function getFilter(): MultiFilterInterface
    {
        if (null === $this->filter) {
            throw new InvalidConfigException(__METHOD__ . '() Фильтр формы должен быть задан . ');
        }
        if (! $this->filter instanceof MultiFilterInterface) {
            throw new InvalidConfigException(__METHOD__ . '() Класс фильтра должен реализовать ' . MultiFilterInterface::class);
        }
        return $this->filter;
    }

    /**
     * Осуществлет основное действие формы - добавление элемента.
     *
     * @param array $params Параметры формы для выполнения её действия.
     *
     * @throws InvalidConfigException   Если компонент не зарегистрирован.
     * @throws Exception Если сущность не найдена.
     *
     * @inherit
     *
     * @return LogbookInterface[]|null
     */
    public function run(array $params = [])
    {
        if (! $this->getFilterValidator()->validateObject($this->getFilter())) {
            $this->addErrors($this->getFilterValidator()->getErrors());
            return null;
        }

        $findOperation = $this->getLogbookComponent()->findMany();
        $this->getFilter()->applyFilter($findOperation);
        $result = $findOperation->sortById()->doOperation();
//        $this->totalCount = $result->getTotalCount();

        return $result->getLogbookList();
    }
}