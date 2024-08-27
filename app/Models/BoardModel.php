<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class BoardModel extends Model
 {
 protected $table = 'boards';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'description',
 'created_by'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }