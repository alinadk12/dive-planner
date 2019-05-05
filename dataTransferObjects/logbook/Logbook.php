<?php

declare(strict_types = 1);

namespace app\dataTransferObjects\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
use DeepCopy\DeepCopy;
use yii\base\InvalidConfigException;
use yii\base\Model;
use app\traits\WithErrorsTrait;

/**
 * Реализует логику DTO "Логбук" для хранения и обмена данными с другими компонентами системы.
 */
class Logbook extends Model implements LogbookInterface
{
    use WithErrorsTrait;

    /**
     * Флаг, хранящий информацию о том, завершена ли инициализация.
     *
     * @var bool
     */
    protected $initializationCompleted = false;

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
    protected $userId = 0;

    /**
     * Свойство хранит атрибут "Дата погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $date = '';

    /**
     * Свойство хранит атрибут "Место погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $location = '';

    /**
     * Свойство хранит атрибут "Глубина" сущности "Логбук".
     *
     * @var int
     */
    protected $depth = 0;

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
    protected $timeIn = '';

    /**
     * Свойство хранит атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @var string
     */
    protected $timeOut = '';

    /**
     * Свойство хранит атрибут "Объем баллона" сущности "Логбук".
     *
     * @var int
     */
    protected $cylinder = 0;

    /**
     * Свойство хранит атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @var int
     */
    protected $startBar = 0;

    /**
     * Свойство хранит атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @var int
     */
    protected $endBar = 0;

    /**
     * Свойство хранит атрибут "Комментарий" сущности "Логбук".
     *
     * @var string|null
     */
    protected $comment;

    /**
     * Метод возвращает атрибут "Идентификатор" сущности "Логбук".
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return null === $this->id ? null : (int)$this->id;
    }

    /**
     * Метод возвращает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @return int
     */
    public function getUserId(): int
    {
        return (int)$this->userId;
    }

    /**
     * Метод возвращает атрибут "Дата погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getDate(): string
    {
        return (string)$this->date;
    }

    /**
     * Метод возвращает атрибут "Место погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getLocation(): string
    {
        return (string)$this->location;
    }

    /**
     * Метод возвращает атрибут "Глубина" сущности "Логбук".
     *
     * @return int
     */
    public function getDepth(): int
    {
        return (int)$this->depth;
    }

    /**
     * Метод возвращает атрибут "Видимость" сущности "Логбук".
     *
     * @return int|null
     */
    public function getVisibility(): ?int
    {
        return null === $this->visibility ? null : $this->visibility;
    }

    /**
     * Метод возвращает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempAir(): ?int
    {
        return null === $this->tempAir ? null : $this->tempAir;
    }

    /**
     * Метод возвращает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempSurface(): ?int
    {
        return null === $this->tempSurface ? null : $this->tempSurface;
    }

    /**
     * Метод возвращает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @return int|null
     */
    public function getTempBottom(): ?int
    {
        return null === $this->tempBottom ? null : $this->tempBottom;
    }

    /**
     * Метод возвращает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeIn(): string
    {
        return (string)$this->timeIn;
    }

    /**
     * Метод возвращает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @return string
     */
    public function getTimeOut(): string
    {
        return (string)$this->timeOut;
    }

    /**
     * Метод возвращает атрибут "Объем баллона" сущности "Логбук".
     *
     * @return int
     */
    public function getCylinder(): int
    {
        return (int)$this->cylinder;
    }

    /**
     * Метод возвращает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getStartBar(): int
    {
        return (int)$this->startBar;
    }

    /**
     * Метод возвращает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @return int
     */
    public function getEndBar(): int
    {
        return (int)$this->endBar;
    }

    /**
     * Метод возвращает атрибут "Комментарий" сущности "Логбук".
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return null === $this->comment ? null : $this->comment;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setId(int $value): LogbookInterface
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setUserId(int $value): LogbookInterface
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Дата погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setDate(string  $value): LogbookInterface
    {
        $this->date = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Место погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setLocation(string $value): LogbookInterface
    {
        $this->location = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Глубина" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setDepth(int $value): LogbookInterface
    {
        $this->depth = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Видимость" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setVisibility(int $value): LogbookInterface
    {
        $this->visibility = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воздуха" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTempAir(int $value): LogbookInterface
    {
        $this->tempAir = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTempSurface(int $value): LogbookInterface
    {
        $this->tempSurface = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTempBottom(int $value): LogbookInterface
    {
        $this->tempBottom = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Время начала погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTimeIn(string  $value): LogbookInterface
    {
        $this->timeIn = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setTimeOut(string  $value): LogbookInterface
    {
        $this->timeOut = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Объем баллона" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setCylinder(int $value): LogbookInterface
    {
        $this->cylinder = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setStartBar(int $value): LogbookInterface
    {
        $this->startBar = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setEndBar(int $value): LogbookInterface
    {
        $this->endBar = $value;
        return $this;
    }

    /**
     * Метод устанавливает атрибут "Комментарий" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setComment(string $value): LogbookInterface
    {
        $this->comment = $value;
        return $this;
    }

    /**
     * Метод завершает инициализацию ДТО.
     * Данный метод может вызываться например операциями поиска после загрузки данных в ДТО.
     *
     * @param bool $force Выполнять ли операцию повторно.
     *
     * @return void
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации.
     */
    public function completeInitialization(bool $force = false): void
    {
        if ($force || ! $this->initializationCompleted) {
            $this->clearUSErrors();
            $this->initializationCompleted = true;
        }
    }

    /**
     * Метод копирования объекта DTO.
     *
     * @return LogbookInterface
     */
    public function copy(): LogbookInterface
    {
        return (new DeepCopy(false))->copy($this);
    }
}
