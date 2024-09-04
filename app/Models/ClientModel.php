<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class ClientModel extends Model
 {
 protected $table = 'clients';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'email', 'phone',
 'company', 'address', 'notes'];
 protected $useTimestamps = true;
protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }