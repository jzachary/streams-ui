<?php

namespace Anomaly\Streams\Ui\Table\Component\Action;

use Anomaly\Streams\Ui\Button\Button;
use Anomaly\Streams\Ui\Table\Component\Action\ActionHandler;

/**
 * Class Action
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Action extends Button
{

    /**
     * Initialize the prototype.
     *
     * @param array $attributes
     * @return $this
     */
    protected function initializePrototype(array $attributes)
    {
        return parent::initializePrototype(array_merge([
            'tag' => 'button',
            'url' => null,
            'text' => null,
            'entry' => null,
            'policy' => null,
            'enabled' => true,
            'primary' => false,
            'disabled' => false,
            'type' => 'default',
    
            // Extended
            'prefix' => null,
            'redirect' => null,
    
            'save' => true,
            'active' => false,
    
            'handle' => 'default',
            'handler' => ActionHandler::class,
        ], $attributes));
    }
}
