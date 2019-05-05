<?php

declare(strict_types = 1);

namespace app\interfaces\logbook\filters;

/**
 * Интерфейс объявляет методы фильтрации операций.
 */
interface MultiFilterOperationInterface extends BaseFilterOperationInterface
{
    /**
     * Метод устанавливает лимит получаемых сущностей.
     *
     * @param int $limit Количество необходимых сущностей.
     *
     * @return MultiFilterOperationInterface
     */
    public function limit(int $limit);

    /**
     * Метод устанавливает смещение получаемых сущностей.
     *
     * @param int $offset Смещение в списке необходимых сущностей.
     *
     * @return MultiFilterOperationInterface
     */
    public function offset(int $offset);

    /**
     * Задает критерий фильтрации выборки по атрибуту "Список идентификаторов" сущности "Логбук".
     *
     * @param array  $idList   Атрибут "Список идентификаторов" сущности "Категории".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return BaseFilterOperationInterface
     */
    public function byIdList(array $idList, string $operator = 'IN');
}