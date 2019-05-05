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
        $result        = $this->getResultPrototype();
        $deleteCommand = $this->createDeleteQuery($this->getFilter());
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
     * Задает критерий фильтрации выборки по атрибуту "Идентификатор пользователя" сущности "Логбук".
     *
     * @param int $userId Атрибут "Идентификатор пользователя" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byUserId(int $userId): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['userId' => $userId]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $date Атрибут "Дата погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byDate(string $date): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['date' => $date]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Дата погружения" сущности "Логбук".
     *
     * @param string $location Атрибут "Дата погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byLocation(string $location): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['location' => $location]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Глубина" сущности "Логбук".
     *
     * @param int $depth Атрибут "Глубина" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byDepth(int $depth): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['depth' => $depth]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Видимость" сущности "Логбук".
     *
     * @param int $visibility Атрибут "Видимость" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byVisibility(int $visibility): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['visibility' => $visibility]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воздуха" сущности "Логбук".
     *
     * @param int $tempAir Атрибут "Температура воздуха" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTempAir(int $tempAir): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['tempAir' => $tempAir]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на поверхности" сущности "Логбук".
     *
     * @param int $tempSurface Атрибут "Температура воды на поверхности" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTempSurface(int $tempSurface): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['tempSurface' => $tempSurface]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Температура воды на дне" сущности "Логбук".
     *
     * @param int $tempBottom Атрибут "Температура воды на дне" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTempBottom(int $tempBottom): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['tempBottom' => $tempBottom]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время начала погружения" сущности "Логбук".
     *
     * @param string $timeIn Атрибут "Время начала погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTimeIn(string $timeIn): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['timeIn' => $timeIn]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Время окончания погружения" сущности "Логбук".
     *
     * @param string $timeOut Атрибут "Время окончания погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byTimeOut(string $timeOut): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['timeOut' => $timeOut]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Объем баллона" сущности "Логбук".
     *
     * @param int $cylinder Атрибут "Объем баллона" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byCylinder(int $cylinder): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['cylinder' => $cylinder]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @param int $startBar Атрибут "Количество воздуха в начале погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byStartBar(int $startBar): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['startBar' => $startBar]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @param int $endBar Атрибут "Количество воздуха в конце погружения" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byEndBar(int $endBar): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['endBar' => $endBar]);
        return $this;
    }

    /**
     * Задает критерий фильтрации выборки по атрибуту "Комментарий" сущности "Логбук".
     *
     * @param string $comment Атрибут "Комментарий" сущности "Логбук".
     *
     * @return MultiDeleteOperationInterface
     */
    public function byComment(string $comment): MultiDeleteOperationInterface
    {
        $this->filter = array_merge($this->filter, ['comment' => $comment]);
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
