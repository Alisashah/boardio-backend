<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class DueDateModel extends Model
 {
 protected $table = 'due_dates';
 protected $primaryKey = 'id';
 protected $allowedFields = ['due_date', 'reminder', 'card_id'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }