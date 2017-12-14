<?php

/* DashboardBundle::layout.html.twig */
class __TwigTemplate_42d1855df27476016e6492854454f9bdba5aa27243c188a6864d3d63abb385c4 extends Twig_Template
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
        $__internal_534dc2336973e9989aa3057c35010b1a79f686ebf809ef5e2f793a40e1fb23fa = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_534dc2336973e9989aa3057c35010b1a79f686ebf809ef5e2f793a40e1fb23fa->enter($__internal_534dc2336973e9989aa3057c35010b1a79f686ebf809ef5e2f793a40e1fb23fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle::layout.html.twig"));

        $__internal_e2cbd3f0aa49521b8e1007482e14b328eab21824d195d48a836a5a3822359a74 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e2cbd3f0aa49521b8e1007482e14b328eab21824d195d48a836a5a3822359a74->enter($__internal_e2cbd3f0aa49521b8e1007482e14b328eab21824d195d48a836a5a3822359a74_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_534dc2336973e9989aa3057c35010b1a79f686ebf809ef5e2f793a40e1fb23fa->leave($__internal_534dc2336973e9989aa3057c35010b1a79f686ebf809ef5e2f793a40e1fb23fa_prof);

        
        $__internal_e2cbd3f0aa49521b8e1007482e14b328eab21824d195d48a836a5a3822359a74->leave($__internal_e2cbd3f0aa49521b8e1007482e14b328eab21824d195d48a836a5a3822359a74_prof);

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
