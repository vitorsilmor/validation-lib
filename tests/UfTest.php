<?php
use PHPUnit\Framework\TestCase;
use Sanar\Uf;

class UfTest extends TestCase
{
    protected $uf;

    public function __construct()
    {
        $this->uf = new Uf();
    }

    public function testOk()
    {
        $result = $this->uf->validate("AL");

        $this->assertFalse($result['error']);
    }

    public function testEmpty()
    {
        $result = $this->uf->validate("");

        $this->assertTrue($result['error']);

        $this->assertContains("Uf não pode ser vazio!", $result['messages']);
    }

    public function testNotExistent()
    {
        $result = $this->uf->validate("UF");

        $this->assertTrue($result['error']);

        $this->assertContains("Uf não existente no Brasil", $result['messages']);
    }
}
