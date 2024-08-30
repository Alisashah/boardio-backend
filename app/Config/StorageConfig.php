<?php
 namespace Config;
 use CodeIgniter\Config\BaseConfig;
 class StorageConfig extends BaseConfig
 {
 public $default = 'local';
 public $storageOptions = [
 'local' => [
 'root' => WRITEPATH . 'uploads',
 ],
 'google_drive' => [
 'client_id' => '',
 'client_secret' => '',
 'refresh_token' => '',
 'folder_id' => '',
 ],
 'aws_s3' => [
 'key' => '',
 'secret' => '',
 'region' => '',
 'bucket' => '',
 ],
 'mega' => [
 'email' => '',
 'password' => '',
 'folder_id' => '',
 ],
 ];
}