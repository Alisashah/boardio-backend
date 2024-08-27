<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class CardModel extends Model
 {
 protected $table = 'cards';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'description', 'list_id',
 'order', 'due_date'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }