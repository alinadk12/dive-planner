<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\dto;

use app\interfaces\abstracts\BaseOperationResultInterface;
use app\interfaces\abstracts\PrototypeInterface;

/**
 * Результат работы команды, выполняющей действия над несколькими сущностями "Логбук".
 */
interface OperationListResultInterface extends BaseOperationResultInterface, PrototypeInterface
{
    /**
     * Метод возвращает список DTO сущностей, получившихся в результате работы операции.
     *
     * @return LogbookInterface[]
     */
    public function getLogbookList(): array ;

    /**
     * Метод устанавливает список DTO сущсностей, получившихся в результате работы команды.
     *
     * @param LogbookInterface[] $value Новое значение.
     *
     * @return OperationListResultInterface
     */
    public function setLogbookList(array $value): OperationListResultInterface;
}
