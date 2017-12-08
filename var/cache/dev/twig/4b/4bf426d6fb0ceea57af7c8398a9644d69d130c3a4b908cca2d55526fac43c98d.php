<?php

/* GymanAppBundle:Members:Menu/picture.html.twig */
class __TwigTemplate_380ccaf99b7c2a75826749506e55863b641e054fd9f97f1c828f2b9607a17565 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanAppBundle:Members/Menu:tabs.html.twig", "GymanAppBundle:Members:Menu/picture.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanAppBundle:Members/Menu:tabs.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d53716578fdf88df7b99acc88c5ff686321ce8e4f44c67a79086478539746f52 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d53716578fdf88df7b99acc88c5ff686321ce8e4f44c67a79086478539746f52->enter($__internal_d53716578fdf88df7b99acc88c5ff686321ce8e4f44c67a79086478539746f52_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Menu/picture.html.twig"));

        $__internal_2e7f8ffeaffd3d2644efa52be57aea13e4f978d280dfa6af80f893f440675d19 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2e7f8ffeaffd3d2644efa52be57aea13e4f978d280dfa6af80f893f440675d19->enter($__internal_2e7f8ffeaffd3d2644efa52be57aea13e4f978d280dfa6af80f893f440675d19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Menu/picture.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d53716578fdf88df7b99acc88c5ff686321ce8e4f44c67a79086478539746f52->leave($__internal_d53716578fdf88df7b99acc88c5ff686321ce8e4f44c67a79086478539746f52_prof);

        
        $__internal_2e7f8ffeaffd3d2644efa52be57aea13e4f978d280dfa6af80f893f440675d19->leave($__internal_2e7f8ffeaffd3d2644efa52be57aea13e4f978d280dfa6af80f893f440675d19_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Members:Menu/picture.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanAppBundle:Members/Menu:tabs.html.twig' %}
", "GymanAppBundle:Members:Menu/picture.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/Menu/picture.html.twig");
    }
}
