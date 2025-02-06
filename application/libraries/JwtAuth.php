<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuth {
    private $secret_key;

    public function __construct() {
        $this->secret_key = 'your_secret_key'; // Change this to a secure key
    }

    // Generate JWT Token
    public function generateToken($data) {
        $issuedAt = time();
        $expirationTime = $issuedAt + (60 * 60); // Token valid for 1 hour
        
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'data' => $data
        ];
        
        return JWT::encode($payload, $this->secret_key, 'HS256');
    }

    // Decode JWT Token
    public function validateToken($token) {
        try {
            return JWT::decode($token, new Key($this->secret_key, 'HS256'));
        } catch (Exception $e) {
            return null;
        }
    }
}
