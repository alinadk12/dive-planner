<?php

declare(strict_types = 1);

namespace app\filters\logbook;

use app\interfaces\logbook\filters\MultiFilterInterface;
use app\interfaces\logbook\filters\MultiFilterOperationInterface;
use app\traits\FilterTrait;

/**
 * Класс реализует методы применения фильтра к операции.
 */
class MultiFilter extends BaseFilter implements MultiFilterInterface
{
    use FilterTrait;

    /**
     * Метод применяет фильтр к операции над списком сущностей.
     *
     * @param MultiFilterOperationInterface $operation Обект реализующий методы фильтров операции.
     *
     * @return MultiFilterOperationInterface
     */
    public function applyFilter(MultiFilterOperationInterface $operation): MultiFilterOperationInterface
    {
        if ($this->getId()) {
            $operation->byId((int)$this->getId());
        }
        if (is_array($this->getIdList()) && ! empty($this->getIdList())) {
            $operation->byIdList($this->getIdList());
        }
        if ($this->getLocation()) {
            $operation->byLocation((string)$this->getLocation(), 'like');
        }
        if ($this->getOffset()) {
            $operation->offset((int)$this->getOffset());
        }
        if ($this->getLimit()) {
            $operation->limit((int)$this->getLimit());
        }
        return $operation;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setUserId(int $value): MultiFilterInterface
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Дата погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setDate(string  $value): MultiFilterInterface
    {
        $this->date = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Место погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setLocation(string $value): MultiFilterInterface
    {
        $this->location = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Глубина" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setDepth(int $value): MultiFilterInterface
    {
        $this->depth = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Видимость" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setVisibility(int $value): MultiFilterInterface
    {
        $this->visibility = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTempAir(int $value): MultiFilterInterface
    {
        $this->tempAir = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTempSurface(int $value): MultiFilterInterface
    {
        $this->tempSurface = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTempBottom(int $value): MultiFilterInterface
    {
        $this->tempBottom = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTimeIn(string  $value): MultiFilterInterface
    {
        $this->timeIn = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setTimeOut(string  $value): MultiFilterInterface
    {
        $this->timeOut = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Объем баллона" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setCylinder(int $value): MultiFilterInterface
    {
        $this->cylinder = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setStartBar(int $value): MultiFilterInterface
    {
        $this->startBar = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setEndBar(int $value): MultiFilterInterface
    {
        $this->endBar = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Комментарий" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setComment(string $value): MultiFilterInterface
    {
        $this->comment = $value;
        return $this;
    }

    /**
     * Метод задает лимит выводимых записей.
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setLimit(int $value): MultiFilterInterface
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * Метод задает номер записи, с которой нуобходимо сделать выборку.
     *
     * @param int $value Новое значение.
     *
     * @return MultiFilterInterface
     */
    public function setOffset(int $value): MultiFilterInterface
    {
        $this->offset = $value;
        return $this;
    }
}