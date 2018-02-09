<?php

/* C:\wamp64\www\real-estates\vendor\cakephp\bake\src\Template\Bake\Layout\default.twig */
class __TwigTemplate_47e8f9ec279a7523c24d65256ab760c85ad34ec9c88d54c2555611184908b5bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b48ec7a5b57a9eb8bd91b33f0457321a043ed16db41cae51db31506be8dd755e = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_b48ec7a5b57a9eb8bd91b33f0457321a043ed16db41cae51db31506be8dd755e->enter($__internal_b48ec7a5b57a9eb8bd91b33f0457321a043ed16db41cae51db31506be8dd755e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "C:\\wamp64\\www\\real-estates\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig"));

        // line 16
        echo $this->getAttribute((isset($context["_view"]) ? $context["_view"] : null), "fetch", array(0 => "content"), "method");
        
        $__internal_b48ec7a5b57a9eb8bd91b33f0457321a043ed16db41cae51db31506be8dd755e->leave($__internal_b48ec7a5b57a9eb8bd91b33f0457321a043ed16db41cae51db31506be8dd755e_prof);

    }

    public function getTemplateName()
    {
        return "C:\\wamp64\\www\\real-estates\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{{ _view.fetch('content')|raw }}", "C:\\wamp64\\www\\real-estates\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig", "");
    }
}
