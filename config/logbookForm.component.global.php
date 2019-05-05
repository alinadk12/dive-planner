<?php

declare(strict_types = 1);

use app\components\logbook\LogbookFormComponent;
use app\dataTransferObjects\logbook\Logbook;
use app\factories\LogbookFormFactory;
use app\filters\logbook\MultiFilter;
use app\forms\logbook\CreateForm;
use app\forms\logbook\DeleteForm;
use app\forms\logbook\ListForm;
use app\forms\logbook\UpdateForm;
use app\forms\logbook\ViewForm;
use app\hydrators\logbook\FilterHydrator;
use app\hydrators\logbook\Hydrator;
use app\interfaces\abstracts\ComponentWithFactoryInterface;
use app\validators\logbook\LogbookFilterValidator;

return [
    'class'                                           => LogbookFormComponent::class,
    ComponentWithFactoryInterface::FACTORY_CONFIG_KEY => [
        'class'                                   => LogbookFormFactory::class,
        LogbookFormFactory::MODEL_CONFIG_LIST_KEY => [
            LogbookFormFactory::LOGBOOK_CREATE_FORM => [
                LogbookFormFactory::OBJECT_TYPE_KEY => CreateForm::class,
            ],
            LogbookFormFactory::LOGBOOK_UPDATE_FORM => [
                LogbookFormFactory::OBJECT_TYPE_KEY => UpdateForm::class,
            ],
            LogbookFormFactory::LOGBOOK_DELETE_FORM => [
                LogbookFormFactory::OBJECT_TYPE_KEY => DeleteForm::class,
            ],
            LogbookFormFactory::LOGBOOK_LIST_FORM   => [
                LogbookFormFactory::OBJECT_TYPE_KEY => ListForm::class,
            ],
            LogbookFormFactory::LOGBOOK_VIEW_FORM   => [
                LogbookFormFactory::OBJECT_TYPE_KEY => ViewForm::class,
            ],
            LogbookFormFactory::LOGBOOK_FILTER           => [
                LogbookFormFactory::OBJECT_TYPE_KEY => MultiFilter::class,
            ],
            LogbookFormFactory::LOGBOOK_FILTER_VALIDATOR => [
                LogbookFormFactory::OBJECT_TYPE_KEY => LogbookFilterValidator::class,
            ],
            LogbookFormFactory::LOGBOOK_FILTER_HYDRATOR  => [
                LogbookFormFactory::OBJECT_TYPE_KEY => FilterHydrator::class,
            ],
            LogbookFormFactory::LOGBOOK_HYDRATOR         => [
                LogbookFormFactory::OBJECT_TYPE_KEY => Hydrator::class,
            ],
            LogbookFormFactory::LOGBOOK_PROTOTYPE        => [
                LogbookFormFactory::OBJECT_TYPE_KEY => Logbook::class,
            ],
        ],
    ],
];
