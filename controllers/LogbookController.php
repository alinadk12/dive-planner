<?php

declare(strict_types = 1);

namespace app\controllers;

use app\traits\logbook\LogbookFormComponentTrait;
use app\traits\logbook\LogbookComponentTrait;
use yii\base\InvalidConfigException;
use yii;

class LogbookController extends AbstractController
{
    use LogbookFormComponentTrait;
    use LogbookComponentTrait;

    /**
     * @throws InvalidConfigException
     */
    public function actionIndex()
    {
        $form = $this->getLogbookFormComponent()->getListForm();
        $filter = $form->getFilter();
        $hydrator = $this->getLogbookFormComponent()->getFilterHydrator();
        $hydrator->hydrate(Yii::$app->request->post(), $filter);

        if (null === $list = $form->run()) {
            var_dump(0);die;
        }
        return $this->render('index', ['logbookRecords' => $list]);
    }

    /**
     * @param null $id
     * @return string
     * @throws InvalidConfigException
     */
    public function actionView($id = null)
    {
        $form = $this->getLogbookFormComponent()->getViewForm();
        $form->setDto($this->getLogbookComponent()->getLogbookPrototype());
        $form->load(['id' => $id], '');
            if (null === $item = $form->run()) {
                var_dump('not found'); die;
            }

        return $this->render('view', ['record' => $item]);
    }

    /**
     * @return string
     * @throws InvalidConfigException
     */
    public function actionCreate()
    {
        $form = $this->getLogbookFormComponent()->getCreateForm();
        $form->setDto($this->getLogbookComponent()->getLogbookPrototype());
//var_dump(Yii::$app->request->post()); die;
        if ($form->load(Yii::$app->request->post())) {
//            var_dump(Yii::$app->request->post()); die;
//            var_dump($form); die;
            if (null === $item = $form->run()) {
                var_dump('error'); die;
            }
            return $this->redirect(['site/index']);
        }

        return $this->render('create', ['model' => $form]);
    }

    public function actionUpdate($id = null)
    {
        return $this->render('update');
    }

    public function actionDelete($id = null)
    {
        var_dump('delete');die;
    }
}