<?php

namespace Anomaly\Streams\Ui\Form\Workflows\Build;

use Anomaly\Streams\Ui\Form\FormBuilder;
use Anomaly\Streams\Ui\Form\Component\Button\Workflows\ButtonsWorkflow;

/**
 * Class BuildButtons
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class BuildButtons
{

    /**
     * Handle the step.
     * 
     * @param FormBuilder $builder
     */
    public function handle(FormBuilder $builder)
    {
        if ($builder->buttons === false) {
            return;
        }

        (new ButtonsWorkflow)->passThrough($builder)->process([
            'builder' => $builder,
            'component' => 'buttons',
        ]);
    }
}
