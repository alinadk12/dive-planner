<?php

declare(strict_types = 1);

namespace app\forms\abstracts;

use app\interfaces\abstracts\DataTransferObjectInterface;
use app\interfaces\abstracts\forms\AbstractFormInterface;
use app\interfaces\abstracts\HydratorInterface;
use InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\base\Component;
use yii\base\InvalidCallException;

/**
 * Класс абстрактной формы для работы с одной DTO.
 */
abstract class AbstractForm extends Model implements AbstractFormInterface
{
    /**
     * Свойтво содержит ДТО для работы с формой.
     *
     * @var DataTransferObjectInterface|null
     */
    protected $prototype;

    /**
     * Свойство хранит объект гидратора.
     *
     * @var HydratorInterface|null
     */
    protected $hydrator;

    /**
     * Компонент логики, который обеспечивает работу с данным DTO.
     *
     * @var Component|null
     */
    protected $dtoComponent;
    /**
     * Объект DTO с которым работает форма.
     *
     * @var mixed|null
     */
    protected $dto;
    /**
     * Класс ActiveRecord, который отвечает за данную DTO.
     *
     * @var string|null
     */
    protected $activeRecordClass;

    /**
     * Метод задает значение гидратору.
     *
     * @param string $value Новое значение.
     *
     * @return AbstractFormInterface
     */
    public function setHydrator($value): AbstractFormInterface
    {
        $this->hydrator = $value;
        return $this;
    }

    /**
     * Метод возвращает объект гидратора.
     *
     * @throws InvalidConfigException Если гидратор сконфигурирован неверно.
     *
     * @return HydratorInterface
     */
    protected function getHydrator(): HydratorInterface
    {
        if (null === $this->hydrator) {
            throw new InvalidConfigException(__METHOD__ . '() Hydrator object can not be null');
        }
        return $this->hydrator;
    }

    /**
     * Метод задает значение ДТО для работы с формой.
     *
     * @param DataTransferObjectInterface $value Новое значение.
     *
     * @return AbstractFormInterface
     */
    public function setPrototype(DataTransferObjectInterface $value): AbstractFormInterface
    {
        $this->prototype = $value;
        return $this;
    }

    /**
     * Метод возвращает объект ДТО для работы с формой.
     *
     * @throws InvalidConfigException Если гидратор сконфигурирован неверно.
     *
     * @return mixed
     */
    abstract public function getPrototype();

    /**
     * Устанавливает объект DTO с которым работает форма.
     *
     * @param mixed $dto Устанавливаемый объект DTO.
     *
     * @return AbstractForm
     */
    public function setDto($dto): AbstractForm
    {
        $this->dto = $dto;
        return $this;
    }

    /**
     * Возвращает объект DTO с которым работает форма.
     *
     * @return mixed
     */
    public function getDto()
    {
        return $this->dto;
    }

    /**
     * Все обращения на чтение атрибутов проктирует на DTO.
     *
     * @param string|mixed $name Название запрашиваемого атрибута.
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this->dto, $name)) {
            return $this->dto->$name;
        }
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new InvalidCallException('Property "' . $name . '" not exists in "' . static::class . '"');
    }

    /**
     * Все обращения на запись атрибутов проктирует на DTO.
     *
     * @param string|mixed $name  Название устанавливаемого атрибута.
     * @param mixed        $value Значение устанавливаемого атрибута.
     *
     * @return void
     */
    public function __set($name, $value)
    {
        if (property_exists($this->dto, $name)) {
            $this->dto->$name = $value;
            return;
        }
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return;
        }
        throw new InvalidCallException('Property "' . $name . '" not exists in "' . static::class . '"');
    }

    /**
     * Переопределенный метод возвращает список подписей атрибутов.
     *
     * @throws InvalidConfigException Если класс ActiveRecord не установлен.
     *
     * @return array|mixed
     */
    public function attributeLabels()
    {
        $activeRecordClass = $this->getActiveRecordClass();
        if (! method_exists($activeRecordClass, 'labels')) {
            throw new InvalidConfigException('Class ' . $activeRecordClass . '::class must contain static method labels()');
        }
        return $activeRecordClass::labels();
    }

    /**
     * Переопределенный метод возвращает список атрибутов.
     * Нужен для для корректной работы метода getAttributes.
     *
     * @throws InvalidConfigException Если класс ActiveRecord не установлен.
     *
     * @return array
     */
    public function attributes(): array
    {
        return $this->scenarios()[$this->getScenario()];
    }

    /**
     * Переопределенный метод возвращает список сценариев с активными атрибутами.
     * Нужен для корректной работы метода load.
     *
     * @throws InvalidConfigException Если класс ActiveRecord не установлен.
     *
     * @return array
     */
    public function scenarios(): array
    {
        return [
            self::SCENARIO_DEFAULT => $this->getDefaultScenarioFields(),
        ];
    }

    /**
     * Возвращает компонент, который обеспечивает работу с данным DTO.
     *
     * @throws InvalidConfigException Если dtoComponent не установлен.
     *
     * @return Component|mixed
     */
    public function getDtoComponent()
    {
        if (null === $this->dtoComponent) {
            throw new InvalidConfigException('DtoComponent object can not be null');
        }
        return $this->dtoComponent;
    }

    /**
     * Устанавливает компонент, который обеспечивает работу с данным DTO.
     *
     * @param Component|mixed $dtoComponent компонент, который обеспечивает работу с данным DTO.
     *
     * @throws InvalidConfigException Если устанавливается не класс компонента.
     *
     * @return AbstractForm
     */
    public function setDtoComponent($dtoComponent): AbstractForm
    {
        if (! $dtoComponent instanceof Component) {
            throw new InvalidConfigException('Class ' . $dtoComponent . ' must extends class ' . Component::class);
        }
        $this->dtoComponent = $dtoComponent;
        return $this;
    }

    /**
     * Возвращает класс ActiveRecord, который отвечает за данную DTO.
     *
     * @throws InvalidConfigException Если класс ActiveRecord не установлен.
     *
     * @return string
     */
    public function getActiveRecordClass(): string
    {
        if (null === $this->activeRecordClass) {
            throw new InvalidConfigException('activeRecordClass can not be empty');
        }
        return $this->activeRecordClass;
    }

    /**
     * Устанавливает класс ActiveRecord, который отвечает за данную DTO.
     *
     * @param string $activeRecordClass Класс ActiveRecord, который отвечает за данную DTO.
     *
     * @throws InvalidConfigException Если устанавливается пустой класс.
     *
     * @return AbstractForm
     */
    public function setActiveRecordClass(string $activeRecordClass): AbstractForm
    {
        if (empty($activeRecordClass)) {
            throw new InvalidConfigException('activeRecordClass can not be empty');
        }
        $this->activeRecordClass = $activeRecordClass;
        return $this;
    }

    /**
     * Возвращает список полей, которые проверяются в дефолтном сценарии.
     *
     * @throws InvalidConfigException Если класс ActiveRecord не установлен.
     *
     * @return array
     */
    protected function getDefaultScenarioFields(): array
    {
        $activeRecordClass = $this->getActiveRecordClass();
        if (! method_exists($activeRecordClass, 'getDefaultScenarioFields')) {
            throw new InvalidConfigException('Class ' . $activeRecordClass . '::class must contain static method getDefaultScenarioFields()');
        }
        return $activeRecordClass::getDefaultScenarioFields();
    }

    /**
     * Осуществлет основное действие формы - добавление элемента.
     *
     * @param array $params Параметры формы для выполнения её действия.
     *
     * @throws InvalidArgumentException Если http-код ответа не верный.
     * @throws InvalidConfigException   Если компонент не зарегистрирован.
     *
     * @inherit
     *
     * @return mixed
     */
    abstract public function run(array $params = []);
}