<?php

namespace Core;

class Controller
{
    private $Url;
    private $UrlConjunto;
    private $UrlController;
    private $UrlParametro;
    private $UrlMetodo;
    private $Classe;
    private static $Format;

    public function __construct()
    {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->Url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            $this->limparUrl();
            $this->UrlConjunto = explode("/", $this->Url);

            if (isset($this->UrlConjunto[0])) {
                $this->UrlController = $this->slugController($this->UrlConjunto[0]);
            } else {
                $this->UrlController = $this->slugController("Home");
            }

            if (isset($this->UrlConjunto[1])) {
                $this->UrlMetodo = $this->slugMetodo($this->UrlConjunto[1]);
            } else {
                $this->UrlMetodo = "index";
            }

            if (isset($this->UrlConjunto[2])) {
                $this->UrlParametro = $this->UrlConjunto[2];
            } else {
                $this->UrlParametro = null;
            }
        } else {
            $this->UrlController = $this->slugController("Home");
            $this->UrlMetodo = "index";
            $this->UrlParametro = null;
        }
    }

    private function limparUrl()
    {
        $this->Url = strip_tags($this->Url);
        $this->Url = trim($this->Url);
        $this->Url = rtrim($this->Url, "/");

        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
        self::$Format['a'] .= '"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        self::$Format['b'] .= '--------------------------------';
        $this->Url = strtr(utf8_decode($this->Url), utf8_decode(self::$Format['a']), self::$Format['b']);
    }

    public function carregar()
    {
        $this->Classe = "\\Src\\Controllers\\" . $this->UrlController;
        if (class_exists($this->Classe)) {
            $this->carregarMetodo();
        } else {
            $this->UrlController = $this->slugController('Home');
            $this->carregar();
        }
    }

    private function carregarMetodo()
    {
        $classeCarregar = new $this->Classe;
        if (method_exists($classeCarregar, "index")) {
            if ($this->UrlParametro !== null) {
                switch ($this->UrlMetodo) {
                    case "new":
                        $classeCarregar->new();
                        break;
                    case "details":
                        $classeCarregar->details($this->UrlParametro);
                        break;
                    case "save":
                        $classeCarregar->save();
                        break;
                    case "edit":
                        $classeCarregar->edit($this->UrlParametro);
                        break;
                    case "delete":
                        $classeCarregar->delete($this->UrlParametro);
                        break;
                    case "up":
                        $classeCarregar->up();
                        break;
                    case "down":
                        $classeCarregar->down();
                        break;
                    default:
                        $classeCarregar->index();
                        break;
                }
            } else {
                switch ($this->UrlMetodo) {
                    case "new":
                        $classeCarregar->new();
                        break;
                    case "details":
                        $classeCarregar->details();
                        break;
                    case "save":
                        $classeCarregar->save();
                        break;
                    case "edit":
                        $classeCarregar->edit();
                        break;
                    case "delete":
                        $classeCarregar->delete();
                        break;
                    case "up":
                        $classeCarregar->up();
                        break;
                    case "down":
                        $classeCarregar->down();
                        break;
                    default:
                        $classeCarregar->index();
                        break;
                }
            }
        } else {
            $this->UrlController = $this->slugController("Home");
            $this->carregar();
        }
    }

    public function slugController($SlugController)
    {
        $UrlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugController)))));
        return $UrlController;
    }

    public function slugMetodo($SlugMetodo)
    {
        $UrlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugMetodo)))));
        return lcfirst($UrlController);
    }
}
