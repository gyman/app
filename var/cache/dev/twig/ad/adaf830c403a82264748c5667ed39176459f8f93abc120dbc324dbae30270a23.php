<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_97ddbbf21bf1a1c67f814fe449c6af10ea55acb9a60d068a2e765136805a77d8 extends Twig_Template
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
        $__internal_95cee45bf71051086067043c0011cca343a984570edf1f8aa5763bd6b19763ef = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_95cee45bf71051086067043c0011cca343a984570edf1f8aa5763bd6b19763ef->enter($__internal_95cee45bf71051086067043c0011cca343a984570edf1f8aa5763bd6b19763ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_84d7d82a548815bf1b36b61a64354b754a9337886f3d3b146482ba5db36a45be = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_84d7d82a548815bf1b36b61a64354b754a9337886f3d3b146482ba5db36a45be->enter($__internal_84d7d82a548815bf1b36b61a64354b754a9337886f3d3b146482ba5db36a45be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_95cee45bf71051086067043c0011cca343a984570edf1f8aa5763bd6b19763ef->leave($__internal_95cee45bf71051086067043c0011cca343a984570edf1f8aa5763bd6b19763ef_prof);

        
        $__internal_84d7d82a548815bf1b36b61a64354b754a9337886f3d3b146482ba5db36a45be->leave($__internal_84d7d82a548815bf1b36b61a64354b754a9337886f3d3b146482ba5db36a45be_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_e1ca6519f988ecd68248878aaef8e8cc8df5e14b41b43813e564724fbf5a0527 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e1ca6519f988ecd68248878aaef8e8cc8df5e14b41b43813e564724fbf5a0527->enter($__internal_e1ca6519f988ecd68248878aaef8e8cc8df5e14b41b43813e564724fbf5a0527_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_596d17b5b8d205685477bc11c702157aea6c9235e26ea1de2e622d5dda182e66 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_596d17b5b8d205685477bc11c702157aea6c9235e26ea1de2e622d5dda182e66->enter($__internal_596d17b5b8d205685477bc11c702157aea6c9235e26ea1de2e622d5dda182e66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_596d17b5b8d205685477bc11c702157aea6c9235e26ea1de2e622d5dda182e66->leave($__internal_596d17b5b8d205685477bc11c702157aea6c9235e26ea1de2e622d5dda182e66_prof);

        
        $__internal_e1ca6519f988ecd68248878aaef8e8cc8df5e14b41b43813e564724fbf5a0527->leave($__internal_e1ca6519f988ecd68248878aaef8e8cc8df5e14b41b43813e564724fbf5a0527_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_14ac5e20c90aebf40ed22f310ed7c419c3c6ac0cacc1dfaf4dfea8e2a734376d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_14ac5e20c90aebf40ed22f310ed7c419c3c6ac0cacc1dfaf4dfea8e2a734376d->enter($__internal_14ac5e20c90aebf40ed22f310ed7c419c3c6ac0cacc1dfaf4dfea8e2a734376d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_42b1be2ad24a58bd284d838b491e318f8e690e15abcfba335cb1ad44b53da908 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_42b1be2ad24a58bd284d838b491e318f8e690e15abcfba335cb1ad44b53da908->enter($__internal_42b1be2ad24a58bd284d838b491e318f8e690e15abcfba335cb1ad44b53da908_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_42b1be2ad24a58bd284d838b491e318f8e690e15abcfba335cb1ad44b53da908->leave($__internal_42b1be2ad24a58bd284d838b491e318f8e690e15abcfba335cb1ad44b53da908_prof);

        
        $__internal_14ac5e20c90aebf40ed22f310ed7c419c3c6ac0cacc1dfaf4dfea8e2a734376d->leave($__internal_14ac5e20c90aebf40ed22f310ed7c419c3c6ac0cacc1dfaf4dfea8e2a734376d_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_59a60af79b8efed005347ef6eeff2653712debbee4edf4f65d60cf3ea3eb4a33 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_59a60af79b8efed005347ef6eeff2653712debbee4edf4f65d60cf3ea3eb4a33->enter($__internal_59a60af79b8efed005347ef6eeff2653712debbee4edf4f65d60cf3ea3eb4a33_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_65f58f04d7ea395bdeb23e628df16804b927875d6b261a05eea03ef74c62d64c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_65f58f04d7ea395bdeb23e628df16804b927875d6b261a05eea03ef74c62d64c->enter($__internal_65f58f04d7ea395bdeb23e628df16804b927875d6b261a05eea03ef74c62d64c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? null))));
        echo "
";
        
        $__internal_65f58f04d7ea395bdeb23e628df16804b927875d6b261a05eea03ef74c62d64c->leave($__internal_65f58f04d7ea395bdeb23e628df16804b927875d6b261a05eea03ef74c62d64c_prof);

        
        $__internal_59a60af79b8efed005347ef6eeff2653712debbee4edf4f65d60cf3ea3eb4a33->leave($__internal_59a60af79b8efed005347ef6eeff2653712debbee4edf4f65d60cf3ea3eb4a33_prof);

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
