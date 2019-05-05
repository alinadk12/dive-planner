<?php

declare(strict_types = 1);

namespace app\filters\logbook;

use app\interfaces\logbook\filters\SingleFilterInterface;
use app\interfaces\logbook\filters\SingleFilterOperationInterface;

/**
 * Класс реализует методы применения фильтра к операции.
 */
class SingleFilter extends BaseFilter implements SingleFilterInterface
{
    /**
     * Метод применяет фильтр к операции над одной сущности.
     *
     * @param SingleFilterOperationInterface $operation Обект реализующий методы фильтров операции.
     *
     * @return SingleFilterOperationInterface
     */
    public function applyFilter(SingleFilterOperationInterface $operation): SingleFilterOperationInterface
    {
        if ($this->getId()) {
            $operation->byId((int)$this->getId());
        }
        if ($this->getLocation()) {
            $operation->byLocation((string)$this->getLocation(), 'like');
        }
        return $operation;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setUserId(int $value): SingleFilterInterface
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Дата погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setDate(string  $value): SingleFilterInterface
    {
        $this->date = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Место погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setLocation(string $value): SingleFilterInterface
    {
        $this->location = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Глубина" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setDepth(int $value): SingleFilterInterface
    {
        $this->depth = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Видимость" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setVisibility(int $value): SingleFilterInterface
    {
        $this->visibility = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTempAir(int $value): SingleFilterInterface
    {
        $this->tempAir = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTempSurface(int $value): SingleFilterInterface
    {
        $this->tempSurface = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTempBottom(int $value): SingleFilterInterface
    {
        $this->tempBottom = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTimeIn(string  $value): SingleFilterInterface
    {
        $this->timeIn = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setTimeOut(string  $value): SingleFilterInterface
    {
        $this->timeOut = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Объем баллона" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setCylinder(int $value): SingleFilterInterface
    {
        $this->cylinder = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setStartBar(int $value): SingleFilterInterface
    {
        $this->startBar = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setEndBar(int $value): SingleFilterInterface
    {
        $this->endBar = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Комментарий" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return SingleFilterInterface
     */
    public function setComment(string $value): SingleFilterInterface
    {
        $this->comment = $value;
        return $this;
    }
}