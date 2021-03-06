<?php

declare(strict_types = 1);

namespace app\traits;

/**
 * Трейт нужен, что бы переопределить стандартные валидаторы Yii.
 */
trait FilterTrait
{
    /**
     * Свойство хранит лимит выводимых записей.
     *
     * @var integer|null
     */
    protected $limit;

    /**
     * Свойство хранит номер записи, с которой нуобходимо сделать выборку.
     *
     * @var integer|null
     */
    protected $offset;

    /**
     * Метод возвращает лимит выводимых записей.
     *
     * @return integer
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Метод возвращает номер записи, с которой нуобходимо сделать выборку.
     *
     * @return integer
     */
    public function getOffset()
    {
        return $this->offset;
    }
}