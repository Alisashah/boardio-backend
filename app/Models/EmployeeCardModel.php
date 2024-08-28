<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class EmployeeCardModel extends Model
 {
 protected $table = 'employee_cards';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'card_number',
 'issue_date', 'expiry_date'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }