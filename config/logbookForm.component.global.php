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
    'class'              => LogbookFormComponent::class,
    'modelFactoryConfig' => [
        'class'           => LogbookFormFactory::class,
        'modelConfigList' => [
            'logbookCreateForm'      => [
                'type' => CreateForm::class,
            ],
            'logbookUpdateForm'      => [
                'type' => UpdateForm::class,
            ],
            'logbookDeleteForm'      => [
                'type' => DeleteForm::class,
            ],
            'logbookListForm'        => [
                'type' => ListForm::class,
            ],
            'logbookViewForm'        => [
                'type' => ViewForm::class,
            ],
            'logbookFilter'          => [
                'type' => MultiFilter::class,
            ],
            'logbookFilterValidator' => [
                'type' => LogbookFilterValidator::class,
            ],
            'logbookFilterHydrator'  => [
                'type' => FilterHydrator::class,
            ],
            'logbookHydrator'        => [
                'type' => Hydrator::class,
            ],
            'logbookPrototype'       => [
                'type' => Logbook::class,
            ],
        ],
    ],
];
