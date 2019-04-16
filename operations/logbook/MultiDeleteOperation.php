<?php

declare(strict_types = 1);

namespace app\operations\logbook;

use app\entities\LogbookActiveRecord;
use app\interfaces\logbook\dto\OperationResultInterface;
use app\interfaces\logbook\operations\MultiDeleteOperationInterface;
use app\traits\WithDbConnectionTrait;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Command;
use yii\db\Exception;
use function is_int;

/**
 * Операция удаления экземпляра сущности "Логбук".
 */
class MultiDeleteOperation extends Component implements MultiDeleteOperationInterface
{
    use WithDbConnectionTrait;

    /**
     * Фильтр для удаления данных.
     *
     * @var array
     */
    protected $filter = [];

    /**
     * Прототип объекта-ответа команды.
     *
     * @var OperationResultInterface|null
     */
    protected $resultPrototype;

    /**
     * Метод выполняет операцию.
     *
     * @return OperationResultInterface
     *
     * @throws Exception              Если выполнение команды не удалось.
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     */
    public function doOperation(): OperationResultInterface
    {
        $result          = $this->getResultPrototype();
        $deleteCommand   = $this->createDeleteQuery($this->getFilter());
        $deleteCommand->queryAll();

        return $result;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор" сущности "Логбук".
     *
     * @param int $id Атрибут "Идентификатор" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byId(int $id): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['id' => $id]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Наименование категории" сущности "Логбук".
     *
     * @param string $name Атрибут "Наименование категории" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byName(string $name): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['name' => $name]);
        return $this;
    }

    /**
     * Метод подготавливает запрос для удаления сущности из базы данных.
     *
     * @param array $filter Фильтр для создания команды удаления.
     *
     * @return Command
     */
    protected function createDeleteQuery(array $filter): Command
    {
        return $this->getDbConnection()->createCommand()->delete(LogbookActiveRecord::tableName(), $filter);
    }

    /**
     * Метод возвращает фильтр для удаления.
     *
     * @throws InvalidConfigException Исключение генерируется в случае неверной инициализации команды.
     *
     * @return array
     */
    protected function getFilter(): array
    {
        if (empty($this->filter)) {
            throw new InvalidConfigException(__METHOD__ . '() Filter can not be empty');
        }
        return $this->filter;
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
     * Метод устанавливает объект прототипа ответа команды.
     *
     * @param OperationResultInterface $value Новое значение.
     *
     * @return MultiDeleteOperationInterface
     */
    public function setResultPrototype(OperationResultInterface $value): MultiDeleteOperationInterface
    {
        $this->resultPrototype = $value;
        return $this;
    }
}
