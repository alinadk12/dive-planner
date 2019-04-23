<?php

declare(strict_types = 1);

use app\components\logbook\LogbookFormComponent;
use app\factories\LogbookFormFactory;
use app\forms\logbook\CreateForm;
use app\forms\logbook\DeleteForm;
use app\forms\logbook\FindForm;
use app\forms\logbook\UpdateForm;
use app\forms\logbook\ViewForm;
use app\interfaces\abstracts\ComponentWithFactoryInterface;

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
            LogbookFormFactory::LOGBOOK_FIND_FORM   => [
                LogbookFormFactory::OBJECT_TYPE_KEY => FindForm::class,
            ],
            LogbookFormFactory::LOGBOOK_VIEW_FORM   => [
                LogbookFormFactory::OBJECT_TYPE_KEY => ViewForm::class,
            ],
        ],
    ],
];
