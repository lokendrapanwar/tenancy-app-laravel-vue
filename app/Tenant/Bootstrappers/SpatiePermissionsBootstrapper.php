<?php

namespace App\Tenant\Bootstrappers;
use Spatie\Permission\PermissionRegistrar;
use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;
//use Stancl\Tenancy\Contracts\TenancyBootstrapper as ContractsTenancyBootstrapper;


class SpatiePermissionsBootstrapper implements TenancyBootstrapper
{
        public function __construct(
            protected PermissionRegistrar $registrar,
        ) {}
    
        public function bootstrap(Tenant $tenant): void
        {
            $this->registrar->cacheKey = 'spatie.permission.cache.tenant.' . $tenant->getTenantKey();
        }
    
        public function revert(): void
        {
            $this->registrar->cacheKey = 'spatie.permission.cache';
        }
}

