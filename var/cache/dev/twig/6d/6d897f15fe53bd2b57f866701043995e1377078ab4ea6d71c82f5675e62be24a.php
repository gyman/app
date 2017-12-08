<?php

/* DashboardBundle::layout.html.twig */
class __TwigTemplate_fdfc60405bf2b65ee5cccf542f224b1586b50fda686383ce3018954f872094eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "DashboardBundle::layout.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_358ff2cdfb044b2d419f4d3de9db62c0e5470d9b054de76ae0cf8e54d44e37f3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_358ff2cdfb044b2d419f4d3de9db62c0e5470d9b054de76ae0cf8e54d44e37f3->enter($__internal_358ff2cdfb044b2d419f4d3de9db62c0e5470d9b054de76ae0cf8e54d44e37f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle::layout.html.twig"));

        $__internal_379b296c99e25e5972ecbd39aae9cb73fd93a790b8afe31f45dd200be2db5c8a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_379b296c99e25e5972ecbd39aae9cb73fd93a790b8afe31f45dd200be2db5c8a->enter($__internal_379b296c99e25e5972ecbd39aae9cb73fd93a790b8afe31f45dd200be2db5c8a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_358ff2cdfb044b2d419f4d3de9db62c0e5470d9b054de76ae0cf8e54d44e37f3->leave($__internal_358ff2cdfb044b2d419f4d3de9db62c0e5470d9b054de76ae0cf8e54d44e37f3_prof);

        
        $__internal_379b296c99e25e5972ecbd39aae9cb73fd93a790b8afe31f45dd200be2db5c8a->leave($__internal_379b296c99e25e5972ecbd39aae9cb73fd93a790b8afe31f45dd200be2db5c8a_prof);

    }

    public function getTemplateName()
    {
        return "DashboardBundle::layout.html.twig";
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
        return new Twig_Source("{%  extends '::base.html.twig' %}
", "DashboardBundle::layout.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/layout.html.twig");
    }
}
