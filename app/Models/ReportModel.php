<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class ReportModel extends Model
 {
 protected $table = 'reports';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'type', 'parameters',
 'generated_at', 'file_path'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }