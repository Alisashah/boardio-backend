<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class OnboardingModel extends Model
 {
 protected $table = 'onboarding';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'status',
 'start_date', 'end_date', 'documents'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }