<?php
use PHPUnit\Framework\TestCase;
use Sanar\General;

class GeneralTest extends TestCase
{
    protected $general;

    public function __construct()
    {
        $this->general = new General();
    }

    public function testOk()
    {
        $result = $this->general->validate("test");

        $this->assertFalse($result['error']);
    }

    public function testEmptyArray()
    {
        $result = $this->general->validate([]);

        $this->assertTrue($result['error']);

        $this->assertContains("Lista não pode ser vazia!", $result['messages']);
    }

    public function testEmpty()
    {
        $result = $this->general->validate("");

        $this->assertTrue($result['error']);

        $this->assertContains("Atributo não pode ser vazio!", $result['messages']);
    }
}
