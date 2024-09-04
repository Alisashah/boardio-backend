<?php
 namespace App\Controllers;
 use App\Models\ClientModel;
 use CodeIgniter\RESTful\ResourceController;
 class ClientPortal extends ResourceController
 {
 protected $modelName = 'App\Models\ClientModel';
 protected $format
 = 'json';
 public function getClientProjects($client_id = null)
 {
 // Implement logic to fetch client-specific projects
 }
 public function addClientTask($client_id = null)
 {
 // Implement logic to add a task for a specific client
 }
 public function shareFiles($client_id = null)
 {
 // Implement logic to share files with a specific client
 }
 }