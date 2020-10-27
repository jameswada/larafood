<?php
namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService{

   protected $productService, $tenantService;
   public function __construct(      
      ProductRepositoryInterface $productRepository,
      TenantRepositoryInterface $tenantRepository )
   {
      $this->productService = $productRepository;
      $this->tenantService = $tenantRepository;      
   }

   public function getProductsByTenantUuid(string $uuid, array $categories)
   {
      $tenant = $this->tenantService->getTenantByUuid($uuid);
      return $this->productService->getProductsByTenantId($tenant->id, $categories);
   }

   public function  getProductByFlag(string $flag) 
   {
      return $this->productService->getProductByFlag($flag);
   }
}
