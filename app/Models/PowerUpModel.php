<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class PowerUpModel extends Model
 {
 protected $table = 'power_ups';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'config', 'enabled',
 'board_id'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }