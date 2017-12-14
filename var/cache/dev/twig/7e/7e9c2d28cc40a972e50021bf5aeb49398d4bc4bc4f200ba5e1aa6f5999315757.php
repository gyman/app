<?php

/* GymanReportsBundle::layout.html.twig */
class __TwigTemplate_3f1c035f1f97d864566a6064c4f66ad39a486367af789abdc8c47f62b2bffd07 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "GymanReportsBundle::layout.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1b1066bf11ffb53614d409b90193bb18789d5ffd02c081f889f786f93ae12654 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1b1066bf11ffb53614d409b90193bb18789d5ffd02c081f889f786f93ae12654->enter($__internal_1b1066bf11ffb53614d409b90193bb18789d5ffd02c081f889f786f93ae12654_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanReportsBundle::layout.html.twig"));

        $__internal_7a3e445816969ff1eb5b835649414ee435bc858057c075afb1129ba00f5604c7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7a3e445816969ff1eb5b835649414ee435bc858057c075afb1129ba00f5604c7->enter($__internal_7a3e445816969ff1eb5b835649414ee435bc858057c075afb1129ba00f5604c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanReportsBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1b1066bf11ffb53614d409b90193bb18789d5ffd02c081f889f786f93ae12654->leave($__internal_1b1066bf11ffb53614d409b90193bb18789d5ffd02c081f889f786f93ae12654_prof);

        
        $__internal_7a3e445816969ff1eb5b835649414ee435bc858057c075afb1129ba00f5604c7->leave($__internal_7a3e445816969ff1eb5b835649414ee435bc858057c075afb1129ba00f5604c7_prof);

    }

    public function getTemplateName()
    {
        return "GymanReportsBundle::layout.html.twig";
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
", "GymanReportsBundle::layout.html.twig", "/vagrant/src/Bundle/ReportsBundle/Resources/views/layout.html.twig");
    }
}
