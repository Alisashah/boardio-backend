<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class BrandingModel extends Model
 {
 protected $table = 'brandings';
 protected $primaryKey = 'id';
 protected $allowedFields = ['tenant_id', 'logo',
 'primary_color', 'secondary_color', 'theme'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }