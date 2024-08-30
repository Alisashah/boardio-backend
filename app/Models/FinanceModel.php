<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class FinanceModel extends Model
 {
 protected $table = 'finances';
 protected $primaryKey = 'id';
 protected $allowedFields = ['type', 'amount', 'description',
 'date', 'category', 'created_by'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }