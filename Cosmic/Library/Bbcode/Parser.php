<?php
namespace Library\Bbcode;

class Parser extends \Twig_Extension
{

    public $bbcode;

    public function __construct($bbcode = null)
    {
        if($bbcode == null){
            $this->bbcode = new \ChrisKonnertz\BBCode\BBCode();
        }
        $this->bbcode = $bbcode;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('bbcode', array($this, 'bbCodeFilter'), array('is_safe' => array('html'))),
        );
    }

    function bbCodeFilter($string)
    {
        return $this->bbcode->render($string);
    }

    private function getSearch()
    {
        return $this->search;
    }
    private function getReplace()
    {
        return $this->replace;
    }
 
    private function getSearchRegex()
    {
        return $this->searchRegex;
    }
    private function getReplaceRegex()
    {
        return $this->replaceRegex;
    }
    public function getName()
    {
        return 'bbcode_extension';
    }

}
