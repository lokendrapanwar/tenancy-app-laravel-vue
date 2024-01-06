<?php

// app/Models/Domain.php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Domain as BaseDomain;

class Domain extends BaseDomain
{
    protected $fillable = [
        'name',
        'domain',
        'tenant_id',
    ];
}
