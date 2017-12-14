<?php

/* GymanSettingsBundle:Default:sections.html.twig */
class __TwigTemplate_4cf4734b96e474512b8de801d7116e57885caf98ac0d361997f1ee5251844dd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanSettingsBundle::layout.html.twig", "GymanSettingsBundle:Default:sections.html.twig", 1);
        $this->blocks = array(
            'settings_page' => array($this, 'block_settings_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanSettingsBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6a5912d1198493c4249c012f8882ad73262742451eefed4357f137fd652f2317 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6a5912d1198493c4249c012f8882ad73262742451eefed4357f137fd652f2317->enter($__internal_6a5912d1198493c4249c012f8882ad73262742451eefed4357f137fd652f2317_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:sections.html.twig"));

        $__internal_9745b11f3f23faac0fa5bfecb18de843f94de361f134efe58e7a0cde9f893f9a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9745b11f3f23faac0fa5bfecb18de843f94de361f134efe58e7a0cde9f893f9a->enter($__internal_9745b11f3f23faac0fa5bfecb18de843f94de361f134efe58e7a0cde9f893f9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:sections.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6a5912d1198493c4249c012f8882ad73262742451eefed4357f137fd652f2317->leave($__internal_6a5912d1198493c4249c012f8882ad73262742451eefed4357f137fd652f2317_prof);

        
        $__internal_9745b11f3f23faac0fa5bfecb18de843f94de361f134efe58e7a0cde9f893f9a->leave($__internal_9745b11f3f23faac0fa5bfecb18de843f94de361f134efe58e7a0cde9f893f9a_prof);

    }

    // line 3
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_582ddef61295675612e43bba1929b018598237138221def3f78e21dd49ff74f6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_582ddef61295675612e43bba1929b018598237138221def3f78e21dd49ff74f6->enter($__internal_582ddef61295675612e43bba1929b018598237138221def3f78e21dd49ff74f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_704fece41a6163db06a556dd3e29850f1b623a06de8c64f08aed0b0fdce00ddb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_704fece41a6163db06a556dd3e29850f1b623a06de8c64f08aed0b0fdce00ddb->enter($__internal_704fece41a6163db06a556dd3e29850f1b623a06de8c64f08aed0b0fdce00ddb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        // line 4
        echo " sekcje
";
        
        $__internal_704fece41a6163db06a556dd3e29850f1b623a06de8c64f08aed0b0fdce00ddb->leave($__internal_704fece41a6163db06a556dd3e29850f1b623a06de8c64f08aed0b0fdce00ddb_prof);

        
        $__internal_582ddef61295675612e43bba1929b018598237138221def3f78e21dd49ff74f6->leave($__internal_582ddef61295675612e43bba1929b018598237138221def3f78e21dd49ff74f6_prof);

    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle:Default:sections.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanSettingsBundle::layout.html.twig' %}

{% block settings_page %}
 sekcje
{% endblock settings_page %}
", "GymanSettingsBundle:Default:sections.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/Default/sections.html.twig");
    }
}
