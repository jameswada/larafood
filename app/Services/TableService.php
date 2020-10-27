<?php
namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService{

   protected $table, $tenantRepository;
   public function __construct(      
      TableRepositoryInterface $tableRepository,
      TenantRepositoryInterface $tenantRepository )
   {
      $this->tableRepository = $tableRepository;
      $this->tenantRepository = $tenantRepository;      
   }

   public function getTablesByUuid(string $uuid)
   {
      $tenant = $this->tenantRepository->getTenantByUuid($uuid);
      return $this->tableRepository->getTablesByTenantId($tenant->id);
   }

   public function getTableByIdentity(string $identity){
      return $this->tableRepository->getTableByIdentity($identity);
   }
}