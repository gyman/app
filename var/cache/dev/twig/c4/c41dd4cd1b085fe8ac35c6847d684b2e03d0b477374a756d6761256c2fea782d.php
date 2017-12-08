<?php

/* GymanSettingsBundle::layout.html.twig */
class __TwigTemplate_0cc92f0ba10cc22965a84bbb51c05f0ba95b9b08461b14197df60245b22e853d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "GymanSettingsBundle::layout.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'settings_page' => array($this, 'block_settings_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0d99ac5e2e799c8d128188fe8c2a4a1d9c517632a02c94e6e00c36acc8a9041f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0d99ac5e2e799c8d128188fe8c2a4a1d9c517632a02c94e6e00c36acc8a9041f->enter($__internal_0d99ac5e2e799c8d128188fe8c2a4a1d9c517632a02c94e6e00c36acc8a9041f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::layout.html.twig"));

        $__internal_cb431f4b5d11c14be1ade96db5640b9946cdda8df824ff941a2ec27aee349a96 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cb431f4b5d11c14be1ade96db5640b9946cdda8df824ff941a2ec27aee349a96->enter($__internal_cb431f4b5d11c14be1ade96db5640b9946cdda8df824ff941a2ec27aee349a96_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0d99ac5e2e799c8d128188fe8c2a4a1d9c517632a02c94e6e00c36acc8a9041f->leave($__internal_0d99ac5e2e799c8d128188fe8c2a4a1d9c517632a02c94e6e00c36acc8a9041f_prof);

        
        $__internal_cb431f4b5d11c14be1ade96db5640b9946cdda8df824ff941a2ec27aee349a96->leave($__internal_cb431f4b5d11c14be1ade96db5640b9946cdda8df824ff941a2ec27aee349a96_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_5b140a37a88e517985d7683d3cc1c4d7a0fe7865ca5a5c66a536612c5e022332 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5b140a37a88e517985d7683d3cc1c4d7a0fe7865ca5a5c66a536612c5e022332->enter($__internal_5b140a37a88e517985d7683d3cc1c4d7a0fe7865ca5a5c66a536612c5e022332_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_6e8bc441d3f52801bd661ee40c09dd78afd3ea69aef7ea245e79a0e31f0665e1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6e8bc441d3f52801bd661ee40c09dd78afd3ea69aef7ea245e79a0e31f0665e1->enter($__internal_6e8bc441d3f52801bd661ee40c09dd78afd3ea69aef7ea245e79a0e31f0665e1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <div class=\"heading\">
        <h3>";
        // line 5
        echo "settings.header.title";
        echo "</h3>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span12\">
            ";
        // line 10
        $this->loadTemplate("::_flash.html.twig", "GymanSettingsBundle::layout.html.twig", 10)->display($context);
        // line 11
        echo "        </div>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span4\">
            ";
        // line 16
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("main", array("template" => "GymanSettingsBundle:Menu:main.html.twig", "currentAsLink" => true, "depth" => 2, "currentClass" => "active"));
        // line 21
        echo "
        </div>
        <div class=\"span8\">
            ";
        // line 24
        $this->displayBlock('settings_page', $context, $blocks);
        // line 25
        echo "        </div>
    </div>

";
        
        $__internal_6e8bc441d3f52801bd661ee40c09dd78afd3ea69aef7ea245e79a0e31f0665e1->leave($__internal_6e8bc441d3f52801bd661ee40c09dd78afd3ea69aef7ea245e79a0e31f0665e1_prof);

        
        $__internal_5b140a37a88e517985d7683d3cc1c4d7a0fe7865ca5a5c66a536612c5e022332->leave($__internal_5b140a37a88e517985d7683d3cc1c4d7a0fe7865ca5a5c66a536612c5e022332_prof);

    }

    // line 24
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_593cf2429076c6f643d83fd82d06aac368d806b1f78ed2e00fc1b3ff5350a915 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_593cf2429076c6f643d83fd82d06aac368d806b1f78ed2e00fc1b3ff5350a915->enter($__internal_593cf2429076c6f643d83fd82d06aac368d806b1f78ed2e00fc1b3ff5350a915_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_787004d2c8f355f3f592f72adeb37ee943302da7a30d915f79b2081d4bc82fb4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_787004d2c8f355f3f592f72adeb37ee943302da7a30d915f79b2081d4bc82fb4->enter($__internal_787004d2c8f355f3f592f72adeb37ee943302da7a30d915f79b2081d4bc82fb4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        
        $__internal_787004d2c8f355f3f592f72adeb37ee943302da7a30d915f79b2081d4bc82fb4->leave($__internal_787004d2c8f355f3f592f72adeb37ee943302da7a30d915f79b2081d4bc82fb4_prof);

        
        $__internal_593cf2429076c6f643d83fd82d06aac368d806b1f78ed2e00fc1b3ff5350a915->leave($__internal_593cf2429076c6f643d83fd82d06aac368d806b1f78ed2e00fc1b3ff5350a915_prof);

    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 24,  79 => 25,  77 => 24,  72 => 21,  70 => 16,  63 => 11,  61 => 10,  53 => 5,  50 => 4,  41 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '::base.html.twig' %}

{% block content %}
    <div class=\"heading\">
        <h3>{{ 'settings.header.title' }}</h3>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span12\">
            {% include \"::_flash.html.twig\" %}
        </div>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span4\">
            {{ knp_menu_render('main', {
                'template': 'GymanSettingsBundle:Menu:main.html.twig',
                'currentAsLink' : true,
                'depth' : 2,
                'currentClass' : 'active'
            }) }}
        </div>
        <div class=\"span8\">
            {% block settings_page %}{% endblock settings_page %}
        </div>
    </div>

{% endblock content %}", "GymanSettingsBundle::layout.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/layout.html.twig");
    }
}
