<?php
 namespace App\Controllers;
 use App\Models\UserModel;
 use CodeIgniter\HTTP\ResponseInterface;
 use CodeIgniter\RESTful\ResourceController;
 use Firebase\JWT\JWT;
 use Firebase\JWT\Key;
 class Auth extends ResourceController
 {
    public function register()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required',
            'role' => 'required',
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $userModel = new UserModel();
        $data = [
            'name'  => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 'user', // default role
            ];
        $userModel->save($data);
        return $this->respondCreated($data);
    }
    public function login()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();
        if ($user && password_verify($password, $user['password']))
        {
            $key = getenv('JWT_SECRET');
            $issuer = getenv('JWT_ISSUER') ?: 'boardio-backend.vercel.app';  
$audience = getenv('JWT_AUDIENCE') ?: 'boardio-backend.vercel.app';  

$payload = [
    'iss' => $issuer,
    'aud' => $audience,
            'iat' => time(),
            'exp' => time() + 3600,
            'sub' => $user['id'],
            'role' => $user['role'],
            ];
            $token = JWT::encode($payload, $key, 'HS256');
            return $this->respond(['token' => $token],
            ResponseInterface::HTTP_OK);
        } else {
            return $this->respond(['message' => 'Invalid
            credentials'], ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }
 }