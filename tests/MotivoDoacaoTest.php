<?php
use PHPUnit\Framework\TestCase;
use Sanar\MotivoDoacao;

class MotivoDoacaoTest extends TestCase
{
    protected $motivoDoacao;

    public function __construct()
    {
        $this->motivoDoacao = new MotivoDoacao();
    }

    public function testOk()
    {
        $result = $this->motivoDoacao->validate("PROMOCAO");

        $this->assertFalse($result['error']);
    }

    public function testEmpty()
    {
        $result = $this->motivoDoacao->validate("");

        $this->assertTrue($result['error']);

        $this->assertContains("Motivo da doação não pode ser vazio!", $result['messages']);
    }

    public function testNotExistent()
    {
        $result = $this->motivoDoacao->validate("UF");

        $this->assertTrue($result['error']);

        $this->assertContains("Motivo da doação não existente em nossa base de dados!", $result['messages']);
    }
}
