<?php
 namespace App\Filters;
 use CodeIgniter\HTTP\RequestInterface;
 use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
 class TenantMiddleware implements FilterInterface
 {
 public function before(RequestInterface $request, $arguments =
 null)
 {
 $tenant = $request->getHeaderLine('X-Tenant-ID');
 if (!$tenant) {
 return Services::response()->setJSON(['message' =>
 'Tenant ID not
 provided'])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
 }
 // Switch to the tenant's database or schema here
 // For example: \Config\Database::connect('tenant_' .$tenant);
 }
 public function after(RequestInterface $request,
 ResponseInterface $response, $arguments = null)
 {
 // Do something here
 }
 }