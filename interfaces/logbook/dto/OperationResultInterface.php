<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\dto;

use app\interfaces\abstracts\BaseOperationResultInterface;
use app\interfaces\abstracts\PrototypeInterface;

/**
 * Результат работы операции, выполняющей действия над одной сущностью "Логбук".
 */
interface OperationResultInterface extends PrototypeInterface, BaseOperationResultInterface
{
    /**
     * Метод возвращает сущность, получившуюся в результате работы операции.
     *
     * @return LogbookInterface|null
     */
    public function getLogbook(): ?LogbookInterface;

    /**
     * Метод устанавливает сущность, получившуюся в результате работы операции.
     *
     * @param LogbookInterface $value Новое значение.
     *
     * @return OperationResultInterface
     */
    public function setLogbook(LogbookInterface $value): OperationResultInterface;
}
