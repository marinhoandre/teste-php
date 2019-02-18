<?php

namespace Core;

class View
{
    private $Pagina;
    private $Dados;

    public function __construct($Pagina, array $Dados = null)
    {
        $this->Pagina = (string) $Pagina;
        $this->Dados = $Dados;
    }

    public function render()
    {
        if (file_exists('src/'.$this->Pagina.'.php')) {
            include 'src/Views/Head.php';
            include 'src/'.$this->Pagina.'.php';
            include 'src/Views/Footer.php';
        } else {
            echo "Erro ao carregar a view: {$this->Pagina}";
        }
    }
}
