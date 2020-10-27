<?php

namespace App\Repositories\Contracts;

interface TenantRepositoryInterface{
   public function getAllTenants(int $totalPorPagina);
   public function getTenantByUuid(string $uuid);
}