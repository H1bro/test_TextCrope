<?php
require 'CropeText.php';

class CropeTextTest extends \PHPUnit\Framework\TestCase
{
    private $crope_text_var;

    protected function setUp() :void
    {
        $this->crope_text_var = new CropeText();
    }

    protected function tearDown() :void
    {
        $this->crope_text_var = NULL;
    }

    public function testAdd()
    {
        $this->crope_text_var->text = 'Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых файлов, открытых подключений к базам данных';
        $this->crope_text_var->stop_words = 'программой';
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('Деструкторы служат для освобождения ресурсов, используемых программой', $result);
    }

    public function testAdd2()
    {
        $this->crope_text_var->text = 'Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых файлов, открытых подключений к базам данных';
        $this->crope_text_var->stop_words = 'программой';
        $this->crope_text_var->q_words = 6;
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('Деструкторы служат для освобождения ресурсов, используемых', $result);
    }

    public function testAdd3()
    {
        $this->crope_text_var->text = 'Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых файлов, открытых подключений к базам данных';
        $this->crope_text_var->stop_words = 'программой';
        $this->crope_text_var->q_words = 8;
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('Деструкторы служат для освобождения ресурсов, используемых программой', $result);
    }

    public function testAdd4()
    {
        $this->crope_text_var->text = 'Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых файлов, открытых подключений к базам данных';
        $this->crope_text_var->q_words = 10;
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых', $result);
    }


    public function testAdd5()
    {
        $this->crope_text_var->text = 'Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых файлов, открытых подключений к базам данных';
        $this->crope_text_var->q_words = 10;
        $this->crope_text_var->stop_words = 'поле';
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых', $result);
    }

    public function testAdd6()
    {
        $this->crope_text_var->text = 'Деструкторы служат для освобождения ресурсов, используемых программой для освобождения открытых файлов, открытых подключений к базам данных';
        $this->crope_text_var->q_words = 10;
        $this->crope_text_var->stop_words = 'поле для';
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('Деструкторы служат для освобождения ресурсов, используемых программой для', $result);
    }

    public function testAdd7()
    {
        $this->crope_text_var->q_words = 10;
        $this->crope_text_var->stop_words = 'поле для';
        $result = $this->crope_text_var->getCropeText();
        $this->assertEquals('', $result);
    }

}
?>
