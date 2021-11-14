<?php

namespace App\Indexes;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class JobIndex extends IndexConfigurator
{
    use Migratable;

    // Index name
    protected $name = 'jobs';

    /**
     * @var array
     */
    protected $settings = [];
}