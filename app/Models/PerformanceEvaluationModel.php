<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class PerformanceEvaluationModel extends Model
 {
 protected $table = 'performance_evaluations';
protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'evaluation_period',
 'score', 'comments'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }