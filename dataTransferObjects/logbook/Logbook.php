<?php

declare( strict_types = 1 );

namespace app\dataTransferObjects\logbook;

use app\interfaces\logbook\dto\LogbookInterface;
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
     * Свойство хранит атрибут "Название" сущности "Логбук".
     *
     * @var string
     */
    protected $name = '';

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
     * Метод возвращает атрибут "Название" сущности "Логбук".
     *
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->name;
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
     * Метод устанавливает атрибут "Название" сущности "Логбук".
     *
     * @param string $value Новое значение.
     *
     * @return LogbookInterface
     */
    public function setName(string $value): LogbookInterface
    {
        $this->name = $value;
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
}
