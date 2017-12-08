<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_f7339ff999e37d857c6c27fad2a2150e9b0e8bbc49982fde41202c507d1f128e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_130d18743430a7ec227074ff7321d70d307849cc800272e04b5cfc00d867fa9d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_130d18743430a7ec227074ff7321d70d307849cc800272e04b5cfc00d867fa9d->enter($__internal_130d18743430a7ec227074ff7321d70d307849cc800272e04b5cfc00d867fa9d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_b12bf7ad1746ba6e9920a7f999f83774997bac66650a9189e448ce6350145322 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b12bf7ad1746ba6e9920a7f999f83774997bac66650a9189e448ce6350145322->enter($__internal_b12bf7ad1746ba6e9920a7f999f83774997bac66650a9189e448ce6350145322_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_130d18743430a7ec227074ff7321d70d307849cc800272e04b5cfc00d867fa9d->leave($__internal_130d18743430a7ec227074ff7321d70d307849cc800272e04b5cfc00d867fa9d_prof);

        
        $__internal_b12bf7ad1746ba6e9920a7f999f83774997bac66650a9189e448ce6350145322->leave($__internal_b12bf7ad1746ba6e9920a7f999f83774997bac66650a9189e448ce6350145322_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_ec82c61765f23e439ad83b198f8d9afe2edb21e35cdab994e48890652b49789f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ec82c61765f23e439ad83b198f8d9afe2edb21e35cdab994e48890652b49789f->enter($__internal_ec82c61765f23e439ad83b198f8d9afe2edb21e35cdab994e48890652b49789f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_bd0376d627beb74ea29eb319fcb5a47c14423a18d2bf2dcdf68da79310248d79 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bd0376d627beb74ea29eb319fcb5a47c14423a18d2bf2dcdf68da79310248d79->enter($__internal_bd0376d627beb74ea29eb319fcb5a47c14423a18d2bf2dcdf68da79310248d79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_bd0376d627beb74ea29eb319fcb5a47c14423a18d2bf2dcdf68da79310248d79->leave($__internal_bd0376d627beb74ea29eb319fcb5a47c14423a18d2bf2dcdf68da79310248d79_prof);

        
        $__internal_ec82c61765f23e439ad83b198f8d9afe2edb21e35cdab994e48890652b49789f->leave($__internal_ec82c61765f23e439ad83b198f8d9afe2edb21e35cdab994e48890652b49789f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_3ede6c9f87c0b5fc77b0d3fea56691626e69d667fe5aa09f68b80ec20afda629 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3ede6c9f87c0b5fc77b0d3fea56691626e69d667fe5aa09f68b80ec20afda629->enter($__internal_3ede6c9f87c0b5fc77b0d3fea56691626e69d667fe5aa09f68b80ec20afda629_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_f7ceecbc36d55f589b36a8b3daa414e23cd3bc515314c7181f8d987814e6981e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f7ceecbc36d55f589b36a8b3daa414e23cd3bc515314c7181f8d987814e6981e->enter($__internal_f7ceecbc36d55f589b36a8b3daa414e23cd3bc515314c7181f8d987814e6981e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_f7ceecbc36d55f589b36a8b3daa414e23cd3bc515314c7181f8d987814e6981e->leave($__internal_f7ceecbc36d55f589b36a8b3daa414e23cd3bc515314c7181f8d987814e6981e_prof);

        
        $__internal_3ede6c9f87c0b5fc77b0d3fea56691626e69d667fe5aa09f68b80ec20afda629->leave($__internal_3ede6c9f87c0b5fc77b0d3fea56691626e69d667fe5aa09f68b80ec20afda629_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_60149bf08c2a035ba386fa2533315cbceea1910f989239988fba95c13a27cb01 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_60149bf08c2a035ba386fa2533315cbceea1910f989239988fba95c13a27cb01->enter($__internal_60149bf08c2a035ba386fa2533315cbceea1910f989239988fba95c13a27cb01_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_f0b4cf1af3eeb967334d63037763bd02b90da1c23ec15f397e1f7b3312481f47 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f0b4cf1af3eeb967334d63037763bd02b90da1c23ec15f397e1f7b3312481f47->enter($__internal_f0b4cf1af3eeb967334d63037763bd02b90da1c23ec15f397e1f7b3312481f47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? null))));
        echo "
";
        
        $__internal_f0b4cf1af3eeb967334d63037763bd02b90da1c23ec15f397e1f7b3312481f47->leave($__internal_f0b4cf1af3eeb967334d63037763bd02b90da1c23ec15f397e1f7b3312481f47_prof);

        
        $__internal_60149bf08c2a035ba386fa2533315cbceea1910f989239988fba95c13a27cb01->leave($__internal_60149bf08c2a035ba386fa2533315cbceea1910f989239988fba95c13a27cb01_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
