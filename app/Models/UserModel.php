<?php
 namespace App\Models;
 use CodeIgniter\Model;
class UserModel extends Model
 {
 protected $table = 'users';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'email', 'password',
 'role'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }