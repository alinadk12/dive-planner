<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\entities\LogbookActiveRecord;
use app\interfaces\abstracts\DTOValidatorInterface;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\dto\LogbookInterface;
use app\interfaces\logbook\operations\SingleUpdateOperationInterface;
use app\traits\WithDbConnectionTrait;
use app\traits\logbook\DatabaseHydratorTrait;
use yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Command;
use yii\db\Exception;
use yii\db\Expression;

/**
 * Операция общновления имеющейся сущности "Логбук".
 */
class SingleUpdateOperation extends Component implements SingleUpdateOperationInterface
{
    use WithDbConnectionTrait;
    use DatabaseHydratorTrait;
    /**
     * Сущность, над которой нужно выполнить операцию.
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
     * Метод выполняет операцию.
     *
     * @throws Exception              Если выполнение команды не удалось.
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return OperationResultInterface
     */
    public function doOperation(): OperationResultInterface
    {
        $result = $this->getResultPrototype();
        $item   = $this->getLogbook();
        $result->setLogbook($item);

        $validator = $this->getLogbookValidator();
        if (! $validator->validateObject($item)) {
            $item->addErrors($validator->getErrors());
            $result->addErrors($validator->getErrors());
            return $result;
        }

        $updateCommand = $this->createUpdateQuery($item);
        if (! $updateCommand->execute()) {
            $result->addError('Category', 'Can not update item in database');
            return $result;
        }

        return $result;
    }

    /**
     * Метод подготавливает запрос для обновления сущности в базе данных.
     *
     * @param LogbookInterface $item Сущность для выполнения операции.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return Command
     */
    protected function createUpdateQuery(LogbookInterface $item): Command
    {
        $updateData = $this->getLogbookDatabaseHydrator()->extract($item);
        return $this->getDbConnection()->createCommand()->update(LogbookActiveRecord::tableName(), $updateData, [
            'id' => $item->getId(),
        ]);
    }

    /**
     * Метод возвращает сущность, над которой нужэно выполнить операцию.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return LogbookInterface
     */
    public function getLogbook(): LogbookInterface
    {
        if (null === $this->logbook) {
            throw new InvalidConfigException(__METHOD__ . '() Category can not be null');
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
     * Метод устанавливает сущность, над которой необходимо выполнить операцию.
     *
     * @param LogbookInterface $value Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setLogbook(LogbookInterface $value): SingleUpdateOperationInterface
    {
        $this->logbook = $value;
        return $this;
    }

    /**
     * Метод устанавливает валидатор ДТО сущности.
     *
     * @param DTOValidatorInterface $validator Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setLogbookValidator(DTOValidatorInterface $validator): SingleUpdateOperationInterface
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return SingleUpdateOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): SingleUpdateOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }
}
