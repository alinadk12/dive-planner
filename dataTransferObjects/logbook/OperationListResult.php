<?php

declare(strict_types = 1);

namespace app\dataTransferObjects\logbook;

use yii\base\Model;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\dto\OperationListResultInterface;

/**
 * Объект результат работы операции с множеством DTO сущностей.
 */
class OperationListResult extends Model implements OperationListResultInterface
{
    /**
     * DTO, получившиеся в результате выполнения операции.
     *
     * @var LogbookInterface[]
     */
    protected $logbookList = [];

    /**
     * Метод копирования объекта результата.
     *
     * @return OperationListResultInterface
     */
    public function copy(): OperationListResultInterface
    {
        return new static();
    }

    /**
     * Метод возвращает список DTO сущностей, получившихся в результате работы операции.
     *
     * @return LogbookInterface[]
     */
    public function getLogbookList(): array
    {
        return $this->logbookList;
    }

    /**
     * Метод указывает прошла ли операция успешно.
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return ! $this->hasErrors();
    }

    /**
     * Метод устанавливает список DTO сущсностей, получившихся в результате работы команды.
     *
     * @param LogbookInterface[] $value Новое значение.
     *
     * @return OperationListResultInterface
     */
    public function setLogbookList(array $value): OperationListResultInterface
    {
        $this->logbookList = $value;
        return $this;
    }
}
