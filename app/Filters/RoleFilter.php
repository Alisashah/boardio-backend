<?php
 namespace App\Filters;
 use CodeIgniter\HTTP\RequestInterface;
 use CodeIgniter\HTTP\ResponseInterface;
 use CodeIgniter\Filters\FilterInterface;
 use Firebase\JWT\JWT;
 use Firebase\JWT\Key;
 use Config\Services;
 class RoleFilter implements FilterInterface
 {
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeader("Authorization");
        $token = null;
        if (!empty($authHeader)) {
            $token = $authHeader->getValue();
        }
        if ($token) {
            try {
                $key = getenv('JWT_SECRET');
                $decoded = JWT::decode($token, new Key($key,
                'HS256'));
                if (!in_array($decoded->role, $arguments)) {
                    return Services::response()->setJSON(['message' => 'Access denied'])->setStatusCode(ResponseInterface::HTTP_FORBIDDEN);
                }
            } catch (\Exception $e) {
                return Services::response()->setJSON(['message' =>
                'Invalid
                token'])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
            }
        } else {
            return Services::response()->setJSON(['message' => 'Token not provided'])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }
    public function after(RequestInterface $request,
    ResponseInterface $response, $arguments = null)
    {
    // Do something here
    }
 }