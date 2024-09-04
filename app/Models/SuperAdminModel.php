<?php
namespace App\Models;
 use CodeIgniter\Model;
 class SuperAdminModel extends Model
 {
 protected $table = 'superadmins';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'email', 'password'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }