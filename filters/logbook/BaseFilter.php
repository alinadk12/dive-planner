<?php

declare(strict_types = 1);

namespace app\filters\logbook;

use app\interfaces\logbook\filters\BaseFilterInterface;
use yii\base\Model;

/**
 * Класс реализует методы применения фильтра к операции.
 */
class BaseFilter extends Model implements BaseFilterInterface
{
    /**
     * Свойство хранит атрибут "Идентификатор" сущности "Логбук".
     *
     * @var int|null
     */
    protected $id;

    /**
     * Свойство хранит атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @var int
     */
    protected $userId;

    /**
     * Свойство хранит атрибут "Дата погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $date;

    /**
     * Свойство хранит атрибут "Место погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $location;

    /**
     * Свойство хранит атрибут "Глубина" сущности "Логбук".
     *
     * @var int
     */
    protected $depth;

    /**
     * Свойство хранит атрибут "Видимость" сущности "Логбук".
     *
     * @var int|null
     */
    protected $visibility;

    /**
     * Свойство хранит атрибут "Температура воздуха" сущности "Логбук".
     *
     * @var int|null
     */
    protected $tempAir;

    /**
     * Свойство хранит атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @var int|null
     */
    protected $tempSurface;

    /**
     * Свойство хранит атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @var int|null
     */
    protected $tempBottom;

    /**
     * Свойство хранит атрибут "Время начала погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $timeIn;

    /**
     * Свойство хранит атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $timeOut;

    /**
     * Свойство хранит атрибут "Объем баллона" сущности "Логбук".
     *
     * @var int
     */
    protected $cylinder;

    /**
     * Свойство хранит атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @var int
     */
    protected $startBar;

    /**
     * Свойство хранит атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @var int
     */
    protected $endBar;

    /**
     * Свойство хранит атрибут "Комментарий" сущности "Логбук".
     *
     * @var string|null
     */
    protected $comment;

    /**
     * Свойство хранит список идентификаторов сущности "Логбук".
     *
     * @var array
     */
    protected $idList = [];

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Логбук".
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Метод возвращает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Метод возвращает атрибут "Дата погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Метод возвращает атрибут "Место погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Метод возвращает атрибут "Глубина" сущности "Логбук".
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Метод возвращает атрибут "Видимость" сущности "Логбук".
     *
     * @return int|null
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Метод возвращает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempAir()
    {
        return $this->tempAir;
    }

    /**
     * Метод возвращает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempSurface()
    {
        return $this->tempSurface;
    }

    /**
     * Метод возвращает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempBottom()
    {
        return $this->tempBottom;
    }

    /**
     * Метод возвращает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeIn()
    {
        return $this->timeIn;
    }

    /**
     * Метод возвращает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }

    /**
     * Метод возвращает атрибут "Объем баллона" сущности "Логбук".
     *
     * @return int
     */
    public function getCylinder()
    {
        return $this->cylinder;
    }

    /**
     * Метод возвращает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getStartBar()
    {
        return $this->startBar;
    }

    /**
     * Метод возвращает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getEndBar()
    {
        return $this->endBar;
    }

    /**
     * Метод возвращает атрибут "Комментарий" сущности "Логбук".
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Метод получает список идентификаторов сущности "Логбук".
     *
     * @return array|null
     */
    public function getIdList()
    {
        return $this->idList;
    }
}