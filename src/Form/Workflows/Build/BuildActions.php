<?php

namespace Anomaly\Streams\Ui\Form\Workflows\Build;

use Anomaly\Streams\Ui\Form\FormBuilder;
use Anomaly\Streams\Ui\Form\Component\Action\ActionBuilder;
use Anomaly\Streams\Ui\Form\Component\Action\Workflows\ActionsWorkflow;

/**
 * Class BuildActions
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class BuildActions
{

    /**
     * Handle the step.
     * 
     * @param FormBuilder $builder
     */
    public function handle(FormBuilder $builder)
    {
        if ($builder->actions === false) {
            return;
        }

        (new ActionsWorkflow)->passThrough($builder)->process([
            'builder' => $builder,
            'component' => 'actions',
        ]);
    }
}
