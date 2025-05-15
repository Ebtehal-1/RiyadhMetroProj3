<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLoginWithCorrectCredentials()
    {
        // Simulate correct email and password
        $email = 'testuser@example.com';
        $password = 'password123'; // plain password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simulate database row
        $userRow = [
            'user_id' => 1,
            'password' => $hashedPassword
        ];

        // Simulate password verification
        $this->assertTrue(password_verify($password, $userRow['password']));
    }

    public function testLoginWithWrongPassword()
    {
        $email = 'testuser@example.com';
        $correctPassword = 'correctpass';
        $wrongPassword = 'wrongpass';
        $hashedPassword = password_hash($correctPassword, PASSWORD_DEFAULT);

        $userRow = [
            'user_id' => 1,
            'password' => $hashedPassword
        ];

        $this->assertFalse(password_verify($wrongPassword, $userRow['password']));
    }
}