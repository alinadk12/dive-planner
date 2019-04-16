<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\entities\LogbookActiveRecord;
use app\interfaces\abstracts\DTOValidatorInterface;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\operations\SingleCreateOperationInterface;
use app\traits\WithDbConnectionTrait;
use app\traits\logbook\DatabaseHydratorTrait;
use yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Command;
use yii\db\Exception;
use yii\db\Expression;

/**
 * Операция создания новой сущности "Логбук".
 */
class SingleCreateOperation extends Component implements SingleCreateOperationInterface
{
    use WithDbConnectionTrait;
    use DatabaseHydratorTrait;

    /**
     * Сущности, над которыми нужно выполнить операцию.
     *
     * @var LogbookInterface|null
     */
    protected $logbook;

    /**
     * Прототип объекта-ответа команды.
     *
     * @var OperationResultInterface|null
     */
    protected $resultPrototype;

    /**
     * Объект-валидатора ДТО сущности.
     *
     * @var DTOValidatorInterface|null
     */
    protected $validator;

    /**
     * Метод подготавливает запрос для добавления сущности в базу данных.
     *
     * @param LogbookInterface $item Список сущностей для вставки в базу данных.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return Command
     */
    protected function createInsertQuery(LogbookInterface $item): Command
    {
        $hydrator   = $this->getLogbookDatabaseHydrator();
        $insertData = $hydrator->extract($item);

        return $this->getDbConnection()->createCommand()->insert(LogbookActiveRecord::tableName(), $insertData);
    }

    /**
     * Метод выполняет операцию.
     *
     * @throws Exception              Если выполнение команды не удалось.
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     * @throws ExtendsMismatchException Исключение генерируется в случае ошибок в создании объекта события.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface
    {
        $result = $this->getResultPrototype()->copy();
        $item   = $this->getLogbook();
        $result->setLogbook($item);

        $validator = $this->getLogbookValidator();
        if (! $validator->validateObject($item)) {
            $item->addErrors($validator->getErrors());
            $result->addErrors($validator->getErrors());
            return $result;
        }

        $insertCommand = $this->createInsertQuery($item);
        if (! $insertCommand->execute()) {
            $result->addError('Category', 'Can not insert item list in database');
            return $result;
        }

        return $result;
    }

    /**
     * Метод возвращает сущности, над которыми нужно выполнить операцию.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return LogbookInterface
     */
    public function getLogbook(): LogbookInterface
    {
        if (null === $this->logbook) {
            throw new InvalidConfigException(__METHOD__ . '() Item can not be empty');
        }
        return $this->logbook;
    }

    /**
     * Метод возвращает валидатор ДТО сущности.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return DTOValidatorInterface
     */
    public function getLogbookValidator(): DTOValidatorInterface
    {
        if (null === $this->validator) {
            throw new InvalidConfigException(__METHOD__ . '() Validator object can not be null');
        }
        return $this->validator;
    }

    /**
     * Метод возвращает объект-результат ответа команды.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return OperationResultInterface
     */
    public function getResultPrototype(): OperationResultInterface
    {
        if (null === $this->resultPrototype) {
            throw new InvalidConfigException(__METHOD__ . '() Operation result object can not be null');
        }
        return $this->resultPrototype;
    }

    /**
     * Метод устанавливает сущности, над которыми необходимо выполнить операцию.
     *
     * @param LogbookInterface $item Новое значение.
     *
     * @throws InvalidConfigException В случае если в аргументе что-то отличное от CategoryInterface.
     *
     * @return SingleCreateOperationInterface
     */
    public function setLogbook(LogbookInterface $item): SingleCreateOperationInterface
    {
        if (! $item instanceof LogbookInterface) {
            throw new InvalidConfigException(__METHOD__ . '() Can set only objects, witch implement ' . LogbookInterface::class);
        }
        $this->logbook = $item;
        return $this;
    }

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setLogbookValidator(DTOValidatorInterface $validator): SingleCreateOperationInterface
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleCreateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleCreateOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }
}
