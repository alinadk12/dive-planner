<?php

declare(strict_types = 1);

namespace app\queries;

use yii\db\Query;
use app\entities\LogbookActiveRecord;
use app\interfaces\logbook\QueryInterface;

/**
 * Класс реализует обертку для формирования критериев выборки данных.
 */
class LogbookQuery extends Query implements QueryInterface
{
    /**
     * Выборка по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int    $id       Атрибут "Идентификатор" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byId(int $id, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.id',
            $id,
        ]);
    }

    /**
     * Задает критерий фильтрации по нескольким значениям атрибута "Идентификатор" сущности "Логбук".
     *
     * @param array  $ids      Атрибут "Идентификатор" сущности "Логбук".
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byIds(array $ids, string $operator = 'IN'): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.id',
            $ids,
        ]);
    }

    /**
     * Выборка по атрибуту "Название" сущности "Логбук".
     *
     * @param string $name     Атрибут "Наименование категории" сущности.
     * @param string $operator Оператор сравнения при поиске.
     *
     * @return QueryInterface
     */
    public function byName(string $name, string $operator = '='): QueryInterface
    {
        return $this->andWhere([
            $operator,
            'logbook.name',
            $name,
        ]);
    }

    /**
     * Метод выполняет инициализацию объекта.
     *
     * @inherit
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->from(LogbookActiveRecord::tableName() . 'AS logbook');
        $this->select('logbook.*');
    }

    /**
     * Устанавливает сортировку результатов запроса.
     *
     * @param string $fieldName Название атрибута, по которому производится сортировка.
     * @param string $sortType  Тип сортировки - ASC или DESC.
     *
     * @return QueryInterface
     */
    public function sortBy(string $fieldName, string $sortType = 'DESC'): QueryInterface
    {
        $sortType = 'ASC' === $sortType ? $sortType : 'DESC';
        return $this->addOrderBy($fieldName . ' ' . $sortType);
    }
}
