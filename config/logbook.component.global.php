<?php

declare(strict_types = 1);

use app\components\logbook\LogbookComponent;
use app\dataTransferObjects\logbook\OperationListResult;
use app\dataTransferObjects\logbook\OperationResult;
use app\dataTransferObjects\logbook\Logbook;
use app\factories\LogbookFactory;
use app\hydrators\LogbookDatabaseHydrator;
use app\interfaces\abstracts\ComponentWithFactoryInterface;
use app\operations\logbook\MultiDeleteOperation;
use app\operations\logbook\MultiFindOperation;
use app\operations\logbook\SingleCreateOperation;
use app\operations\logbook\SingleFindOperation;
use app\operations\logbook\SingleUpdateOperation;
use app\queries\LogbookQuery;
use app\validators\logbook\LogbookValidator;

return [
    'class'                                           => LogbookComponent::class,
    ComponentWithFactoryInterface::FACTORY_CONFIG_KEY => [
        'class'                               => LogbookFactory::class,
        LogbookFactory::MODEL_CONFIG_LIST_KEY => [
            LogbookFactory::LOGBOOK_OPERATION_RESULT_PROTOTYPE      => [
                LogbookFactory::OBJECT_TYPE_KEY => OperationResult::class,
            ],
            LogbookFactory::LOGBOOK_LIST_OPERATION_RESULT_PROTOTYPE => [
                LogbookFactory::OBJECT_TYPE_KEY => OperationListResult::class,
            ],
            LogbookFactory::LOGBOOK_SINGLE_CREATE_OPERATION         => [
                LogbookFactory::OBJECT_TYPE_KEY => SingleCreateOperation::class,
            ],
            LogbookFactory::LOGBOOK_SINGLE_UPDATE_OPERATION         => [
                LogbookFactory::OBJECT_TYPE_KEY => SingleUpdateOperation::class,
            ],
            LogbookFactory::LOGBOOK_MULTI_DELETE_OPERATION          => [
                LogbookFactory::OBJECT_TYPE_KEY => MultiDeleteOperation::class,
            ],
            LogbookFactory::LOGBOOK_MULTI_FIND_OPERATION            => [
                LogbookFactory::OBJECT_TYPE_KEY => MultiFindOperation::class,
            ],
            LogbookFactory::LOGBOOK_SINGLE_FIND_OPERATION           => [
                LogbookFactory::OBJECT_TYPE_KEY => SingleFindOperation::class,
            ],
            LogbookFactory::LOGBOOK_QUERY                           => [
                LogbookFactory::OBJECT_TYPE_KEY => LogbookQuery::class,
            ],
            LogbookFactory::LOGBOOK_DATABASE_HYDRATOR               => [
                LogbookFactory::OBJECT_TYPE_KEY => LogbookDatabaseHydrator::class,
            ],
            LogbookFactory::LOGBOOK_PROTOTYPE                       => [
                LogbookFactory::OBJECT_TYPE_KEY => Logbook::class,
            ],
            LogbookFactory::LOGBOOK_VALIDATOR                       => [
                LogbookFactory::OBJECT_TYPE_KEY => LogbookValidator::class,
            ],
        ],
    ],
];
