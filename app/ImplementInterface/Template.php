<?php

namespace App\ImplementInterface;

require 'vendor/autoload.php';

use App\ImplementInterface\iTemplate;

class Template implements iTemplate
{
    private $vars = array();
    //const b = 'Interface constant no no no';
    //esto aroja un error fatal
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template, $optional = "optional parameter")
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}