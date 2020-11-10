<?php
use PHPUnit\Framework\TestCase;
use Sanar\Cep;

class CepTest extends TestCase
{
    protected $cep;

    public function __construct()
    {
        $this->cep = new Cep();
    }

    public function testOk()
    {
        $result = $this->cep->validate("57080525");

        $this->assertFalse($result['error']);
    }

    public function testEmpty()
    {
        $result = $this->cep->validate("");

        $this->assertTrue($result['error']);

        $this->assertContains("Cep não pode ser vazio!", $result['messages']);
    }

    public function testIsNumeric()
    {
        $result = $this->cep->validate("abscd");

        $this->assertTrue($result['error']);

        $this->assertContains("Cep precisar ser número!", $result['messages']);
    }
}
