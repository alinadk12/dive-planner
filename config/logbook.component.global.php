<?php

use app\components\logbook\LogbookComponent;
use app\dataTransferObjects\logbook\OperationListResult;
use app\dataTransferObjects\logbook\OperationResult;
use app\dataTransferObjects\logbook\Logbook;
use app\factories\LogbookFactory;
use app\hydrators\logbook\LogbookDatabaseHydrator;
use app\operations\logbook\MultiDeleteOperation;
use app\operations\logbook\MultiFindOperation;
use app\operations\logbook\SingleCreateOperation;
use app\operations\logbook\SingleFindOperation;
use app\operations\logbook\SingleUpdateOperation;
use app\queries\LogbookQuery;
use app\validators\logbook\LogbookValidator;

return [
    'class'              => LogbookComponent::class,
    'modelFactoryConfig' => [
        'class'           => LogbookFactory::class,
        'modelConfigList' => [
            'logbookOperationResultPrototype'     => [
                'type' => OperationResult::class,
            ],
            'logbookListOperationResultPrototype' => [
                'type' => OperationListResult::class,
            ],
            'logbookSingleCreateOperation'        => [
                'type' => SingleCreateOperation::class,
            ],
            'logbookSingleUpdateOperation'        => [
                'type' => SingleUpdateOperation::class,
            ],
            'logbookMultiDeleteOperation'         => [
                'type' => MultiDeleteOperation::class,
            ],
            'logbookMultiFindOperation'           => [
                'type' => MultiFindOperation::class,
            ],
            'logbookSingleFindOperation'          => [
                'type' => SingleFindOperation::class,
            ],
            'logbookQuery'                        => [
                'type' => LogbookQuery::class,
            ],
            'logbookDatabaseHydrator'             => [
                'type' => LogbookDatabaseHydrator::class,
            ],
            'logbookPrototype'                    => [
                'type' => Logbook::class,
            ],
            'logbookValidator'                    => [
                'type' => LogbookValidator::class,
            ],
        ],
    ],
];
