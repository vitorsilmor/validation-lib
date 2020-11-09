<?php
use PHPUnit\Framework\TestCase;
use Sanar\Cpf;

class CpfTest extends TestCase
{
    protected $cpf;

    public function __construct()
    {
        $this->cpf = new Cpf();
    }

    public function testOk()
    {
        $result = $this->cpf->validate("243.893.630-42");

        $this->assertFalse($result['error']);
    }

    public function testEmpty()
    {
        $result = $this->cpf->validate("");

        $this->assertTrue($result['error']);

        $this->assertContains("Cpf não pode ser vazio!", $result['messages']);
    }

    public function testNotElevenChars()
    {
        $result = $this->cpf->validate("243.893.630-4");

        $this->assertTrue($result['error']);

        $this->assertContains("Cpf necessita ter ao menos 11 digitos!", $result['messages']);
    }

    public function testRepeatedNumbers()
    {
        $result = $this->cpf->validate("111.111.111-11");

        $this->assertTrue($result['error']);

        $this->assertContains("Números repetidos não podem vir a ser um cpf válido!", $result['messages']);
    }

    public function testCpfCalculation()
    {
        $result = $this->cpf->validate("243.893.630-43");

        $this->assertTrue($result['error']);

        $this->assertContains("Cpf inválido!", $result['messages']);
    }
}
