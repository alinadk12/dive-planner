<?php

declare(strict_types = 1);

namespace app\dataTransferObjects\logbook;

use yii\base\Model;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\dto\OperationResultInterface;

/**
 * Объект отвечающий за результат работы операции.
 */
class OperationResult extends Model implements OperationResultInterface
{
    /**
     * DTO сущности, получившаяся в результате выполнения операции.
     *
     * @var LogbookInterface|null
     */
    protected $logbook;

    /**
     * Метод копирования объекта результата.
     *
     * @return OperationResultInterface
     */
    public function copy(): OperationResultInterface
    {
        return new static();
    }

    /**
     * Метод возвращает сущность, получившуюся в результате работы операции.
     *
     * @return LogbookInterface|null
     */
    public function getLogbook(): ?LogbookInterface
    {
        return $this->logbook;
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
     * Метод устанавливает сущность, получившуюся в результате работы операции.
     *
     * @param LogbookInterface $value Новое значение.
     *
     * @return OperationResultInterface
     */
    public function setLogbook(LogbookInterface $value): OperationResultInterface
    {
        $this->logbook = $value;
        return $this;
    }
}
