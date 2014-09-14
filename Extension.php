<?php

namespace Bolt\Extension\Bolt\Isso;

use Bolt;

class Extension extends \Bolt\BaseExtension
{
    /**
     * Extensions PHP name
     *
     * @var string
     */
    const NAME = "Isso";

    public function getName()
    {
        return Extension::NAME;
    }

    public function initialize()
    {
        if ($this->app['config']->getWhichEnd() == 'frontend') {
            // Add Twig functions
            $this->addTwigFunction('isso', 'twigIsso');
	    $this->addSnippet('endofhead', 'embedjs');

        }
    }

    /**
     * Return isso comments div
     *
     * @return \Twig_Markup
     */
    public function twigIsso()
    {
    	$str = "<section id=\"isso-thread\"></section>";
        return new \Twig_Markup($str, 'UTF-8');
    }

    /**
     * Returns a string with the javascript to embed
     *
     * @return String
     */
    public function embedjs()
    {
        return '<script data-isso="//' . $this->config['issourl'] . '/" src="//' . $this->config['issourl'] .'/js/embed.min.js"></script>';
    }

}
