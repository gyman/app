<?php

/* GymanAppBundle:Members:Menu/picture.html.twig */
class __TwigTemplate_9c740c94565f1c88f5043abbf35dd4b7daf4d0adfb3774b997c2b6ac6cf2cd4e extends Twig_Template
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
        $__internal_66067ec3ead3a96212713a7a71968ece7b7c6a0df37941974e012f2cc586a5c7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_66067ec3ead3a96212713a7a71968ece7b7c6a0df37941974e012f2cc586a5c7->enter($__internal_66067ec3ead3a96212713a7a71968ece7b7c6a0df37941974e012f2cc586a5c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Menu/picture.html.twig"));

        $__internal_48fa159523fe6ae322427750f662b1d1999898d37a6a5bef6af1f00ff58603e0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_48fa159523fe6ae322427750f662b1d1999898d37a6a5bef6af1f00ff58603e0->enter($__internal_48fa159523fe6ae322427750f662b1d1999898d37a6a5bef6af1f00ff58603e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Menu/picture.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_66067ec3ead3a96212713a7a71968ece7b7c6a0df37941974e012f2cc586a5c7->leave($__internal_66067ec3ead3a96212713a7a71968ece7b7c6a0df37941974e012f2cc586a5c7_prof);

        
        $__internal_48fa159523fe6ae322427750f662b1d1999898d37a6a5bef6af1f00ff58603e0->leave($__internal_48fa159523fe6ae322427750f662b1d1999898d37a6a5bef6af1f00ff58603e0_prof);

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
