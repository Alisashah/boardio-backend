<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class ListModel extends Model
 {
 protected $table = 'lists';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'board_id', 'order'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }