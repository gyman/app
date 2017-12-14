<?php

/* :Menu:main.html.twig */
class __TwigTemplate_ad5b8fd3580be4d72251aab9fbb12de67dbf0dfa73217c8494cfeb4ef09aa580 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", ":Menu:main.html.twig", 1);
        $this->blocks = array(
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7a34f87eef720e67b6e9065bfed354a6aaae8dc0e452a5773a6c11089571763c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7a34f87eef720e67b6e9065bfed354a6aaae8dc0e452a5773a6c11089571763c->enter($__internal_7a34f87eef720e67b6e9065bfed354a6aaae8dc0e452a5773a6c11089571763c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:main.html.twig"));

        $__internal_60b0391359754ddcb23c986249376cb849b725c692166c38d3f00bcde8b02407 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_60b0391359754ddcb23c986249376cb849b725c692166c38d3f00bcde8b02407->enter($__internal_60b0391359754ddcb23c986249376cb849b725c692166c38d3f00bcde8b02407_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:main.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7a34f87eef720e67b6e9065bfed354a6aaae8dc0e452a5773a6c11089571763c->leave($__internal_7a34f87eef720e67b6e9065bfed354a6aaae8dc0e452a5773a6c11089571763c_prof);

        
        $__internal_60b0391359754ddcb23c986249376cb849b725c692166c38d3f00bcde8b02407->leave($__internal_60b0391359754ddcb23c986249376cb849b725c692166c38d3f00bcde8b02407_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_14ce7f7b0a015ee4a1a54446a657d18a2e73e2d80a7af9002071f89c1ba972d1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_14ce7f7b0a015ee4a1a54446a657d18a2e73e2d80a7af9002071f89c1ba972d1->enter($__internal_14ce7f7b0a015ee4a1a54446a657d18a2e73e2d80a7af9002071f89c1ba972d1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_a09914bbde17c427ffcf20adcf296e79d0fbe7c1bc7c800c8de4b3469c92b041 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a09914bbde17c427ffcf20adcf296e79d0fbe7c1bc7c800c8de4b3469c92b041->enter($__internal_a09914bbde17c427ffcf20adcf296e79d0fbe7c1bc7c800c8de4b3469c92b041_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    <span class=\"txt\">";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "</span>
";
        
        $__internal_a09914bbde17c427ffcf20adcf296e79d0fbe7c1bc7c800c8de4b3469c92b041->leave($__internal_a09914bbde17c427ffcf20adcf296e79d0fbe7c1bc7c800c8de4b3469c92b041_prof);

        
        $__internal_14ce7f7b0a015ee4a1a54446a657d18a2e73e2d80a7af9002071f89c1ba972d1->leave($__internal_14ce7f7b0a015ee4a1a54446a657d18a2e73e2d80a7af9002071f89c1ba972d1_prof);

    }

    public function getTemplateName()
    {
        return ":Menu:main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'knp_menu.html.twig' %}

{% block label %}
    <span class=\"icon {{ item.extras.icon }}\"></span>
    <span class=\"txt\">{{ item.label|trans }}</span>
{% endblock %}", ":Menu:main.html.twig", "/vagrant/app/Resources/views/Menu/main.html.twig");
    }
}
