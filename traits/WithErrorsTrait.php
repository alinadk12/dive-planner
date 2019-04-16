<?php

declare(strict_types = 1);

namespace app\traits;

use app\interfaces\abstracts\HydratorInterface;
use app\interfaces\errors\CollectionInterface;
use app\interfaces\errors\ErrorInterface;
use yii\base\InvalidConfigException;

/**
 * Трейт объекта, который содержит коллекцию ошибок.
 */
trait WithErrorsTrait
{
    use ErrorComponentTrait;

    /**
     * Объект коллекции ошибок для хранения ошибок.
     *
     * @var CollectionInterface|null
     */
    protected $errorCollection;

    /**
     * Гидратор коллекции ошибок из/в формат ошибок Yii.
     *
     * @var HydratorInterface|null
     */
    protected $collectionYiiHydrator;

    /**
     * Прототип объекта ошибки для создания объектов ошибок.
     *
     * @var ErrorInterface|null
     */
    protected $errorPrototype;

    /**
     * Метод возвращает прототип ошибки.
     *
     * @return ErrorInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function getErrorPrototype(): ErrorInterface
    {
        if (null === $this->errorPrototype) {
            $this->errorPrototype = $this->getErrorsComponent()->getError();
        }
        return $this->errorPrototype;
    }

    /**
     * Метод устанавливает прототип ошибки.
     *
     * @param ErrorInterface $error Новое значение.
     *
     * @return static
     */
    public function setErrorPrototype(ErrorInterface $error)
    {
        $this->errorPrototype = $error;
        return $this;
    }

    /**
     * Метод возвращает гидратор коллекции ошибок из/в формат ошибок Yii.
     *
     * @return HydratorInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function getCollectionYiiHydrator(): HydratorInterface
    {
        if (null === $this->collectionYiiHydrator) {
            $this->collectionYiiHydrator = $this->getErrorsComponent()->getCollectionYiiHydrator();
        }
        return $this->collectionYiiHydrator;
    }

    /**
     * Метод устанавливает гидратор коллекции ошибок из/в формат ошибок Yii.
     *
     * @param HydratorInterface $collectionYiiHydrator Новое значение.
     *
     * @return static
     */
    public function setCollectionYiiHydrator(HydratorInterface $collectionYiiHydrator)
    {
        $this->collectionYiiHydrator = $collectionYiiHydrator;
        return $this;
    }

    /**
     * Метод возвращает коллекцию ошибок.
     *
     * @return CollectionInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function getErrorCollection(): CollectionInterface
    {
        if (null === $this->errorCollection) {
            $this->errorCollection = $this->getErrorsComponent()->getCollection();
        }
        return $this->errorCollection;
    }

    /**
     * Метод устанавливает коллекцию ошибок.
     *
     * @param CollectionInterface $errorCollection Новое значение.
     *
     * @return static
     */
    public function setErrorCollection(CollectionInterface $errorCollection)
    {
        $this->errorCollection = $errorCollection;
        return $this;
    }

    /**
     * Метод проверяет есть ли ошибки в коллекции ошибок.
     *
     * @return bool
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function hasUSErrors(): bool
    {
        return ! $this->getErrorCollection()->isEmpty();
    }

    /**
     * Метод добавляет глобальную ошибку в коллекцию ошибок.
     *
     * @param string $title            Сообщение ошибки.
     * @param string $code             Код ошибки.
     * @param array  $additionalParams Дополнительные парараметры.
     *
     * @return static
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function addGlobalUSError(string $title, string $code = '', array $additionalParams = [])
    {
        $error = $this->getErrorPrototype()->copy()->markAsGlobal()->setTitle($title)->setCode($code)->setAdditionalParams($additionalParams);
        $this->getErrorCollection()->add($error);
        return $this;
    }

    /**
     * Метод добавляет ошибку в коллекцию ошибок.
     *
     * @param string $title            Сообщение ошибки.
     * @param string $source           Источник ошибки.
     * @param string $code             Код ошибки.
     * @param array  $additionalParams Дополнительные парараметры.
     *
     * @return static
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function addUSError(string $title, string $source = 'system', string $code = '', array $additionalParams = [])
    {
        $error = $this->getErrorPrototype()->copy()->setTitle($title)->setSource($source)->setCode($code)->setAdditionalParams($additionalParams);
        $this->getErrorCollection()->add($error);
        return $this;
    }

    /**
     * Метод добавляет сообщения из переданной коллекции ошибок.
     *
     * @param CollectionInterface $errorCollection Коллекция ошибок для добавления.
     *
     * @return static
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function addUSErrors(CollectionInterface $errorCollection)
    {
        $this->getErrorCollection()->merge($errorCollection);
        return $this;
    }

    /**
     * Метод добавляет сообщения из списка ошибок, переданном в формате, с которым работает модель Yii2.
     *
     * @param array $errorDataList Данные списка ошибок.
     *
     * @return static
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function addYiiErrors(array $errorDataList)
    {
        $errorCollection = $this->getErrorCollection();
        $hydrator        = $this->getCollectionYiiHydrator();
        $errorCollection = $hydrator->hydrate($errorDataList, $errorCollection);
        $this->setErrorCollection($errorCollection);
        return $this;
    }

    /**
     * Метод возвращает коллекцию ошибок.
     *
     * @return CollectionInterface
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function getUSErrors(): CollectionInterface
    {
        return $this->getErrorCollection();
    }

    /**
     * Метод возвращает коллекцию ошибок в формате, с которым работает модель Yii2.
     *
     * @return array
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function getYiiErrors(): array
    {
        $errorCollection = $this->getErrorCollection();
        $hydrator        = $this->getCollectionYiiHydrator();
        return $hydrator->extract($errorCollection);
    }

    /**
     * Метод очищает коллекцию ошибок.
     *
     * @return static
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной конфигурации подсистемы.
     */
    public function clearUSErrors()
    {
        $this->getErrorCollection()->clear();
        return $this;
    }
}
