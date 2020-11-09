<?php
use PHPUnit\Framework\TestCase;
use Sanar\Email;

class EmailTest extends TestCase
{
    protected $email;

    public function __construct()
    {
        $this->email = new Email();
    }

    public function testOk()
    {
        $result = $this->email->validate("joao.pedro@kunlatek.com");

        $this->assertFalse($result['error']);
    }

    public function testEmpty()
    {
        $result = $this->email->validate("");

        $this->assertTrue($result['error']);

        $this->assertContains("Email não pode ser vazio!", $result['messages']);
    }

    public function testInvalidFormat()
    {
        $result = $this->email->validate("joao.pedro@kunlatek");

        $this->assertTrue($result['error']);

        $this->assertContains("Formato de email inválido!", $result['messages']);
    }
}
