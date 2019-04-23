<?php

declare(strict_types = 1);

namespace app\forms\logbook;

use app\entities\LogbookActiveRecord;
use app\forms\abstracts\AbstractFindForm;
use app\interfaces\logbook\operations\MultiFindOperationInterface;
use app\traits\logbook\LogbookComponentTrait;
use app\traits\logbook\LogbookFormComponentTrait;
use yii\base\InvalidConfigException;
use yii\data\ArrayDataProvider;


class FindForm extends AbstractFindForm
{
    use LogbookComponentTrait;
    use LogbookFormComponentTrait;

    /**
     * Возвращает объект админского компонента.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return mixed
     */
    public function getFormComponent()
    {
        return $this->getLogbookFormComponent();
    }

    /**
     * Возвращает дата-провайдер для отображения списка в таблице.
     *
     * @param array $models Массив моделей для отображения.
     *
     * @return ArrayDataProvider
     */
    protected function getDataProvider(array $models): ArrayDataProvider
    {
        return new ArrayDataProvider([
            'allModels'  => $models,
            'key'        => 'id',
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort'       => [
                'attributes' => ['id'],
            ],
        ]);
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
    public function run(array $params = [])
    {
        $this->load($params);

        $findOperation = $this->getLogbookComponent()->findMany();
        $this->makeFilter($findOperation);

        /* @var array $models */
        $models = $findOperation->doOperation()->getLogbookList();

        foreach ($models as $key => $model) {

            $formModel = $this->getLogbookFormComponent()->view();

            $formModel->setDto($model);
            $models[$key] = $formModel;

        }

        return $this->getDataProvider($models);
    }

    /**
     * Инициализация объекта формы обновления.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return void
     */
    public function init(): void
    {
        parent::init();
        $this->setDtoComponent($this->getLogbookComponent());
        $this->setActiveRecordClass(LogbookActiveRecord::class);
    }

    /**
     * В операции поиска устанавливает критерии фильтрации.
     *
     * @param MultiFindOperationInterface|mixed $findOperation Операция поиска.
     *
     * @throws InvalidConfigException Если аргумент не имплементирует интерфейс операции поиска.
     *
     * @return void
     */
    protected function makeFilter($findOperation): void
    {
        if (! $findOperation instanceof MultiFindOperationInterface) {
            throw new InvalidConfigException('$findOperation must implements of MultiFindOperationInterface');
        }
    }

    /**
     * Возвращает правила валидации для формы фильтра.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [
                ['id'],
                'integer',
                'min'         => 1,
                'max'         => 2147483647,
                'skipOnEmpty' => 1,
            ],
            [
                ['name'],
                'string',
                'max' => 255,
            ],
        ];
    }
}