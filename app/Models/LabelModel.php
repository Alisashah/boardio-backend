<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class LabelModel extends Model
 {
 protected $table = 'labels';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'color', 'board_id'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }