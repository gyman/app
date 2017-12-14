<?php

/* GymanAppBundle:Members/Menu:tabs.html.twig */
class __TwigTemplate_4aebf562d36b29bce1ab692995963a5cb12d7e584d997313d86c11cd55d928b7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "GymanAppBundle:Members/Menu:tabs.html.twig", 1);
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
        $__internal_a307848a1af4292621f1159750f9020af694432fe66ed34baf6419f322587917 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a307848a1af4292621f1159750f9020af694432fe66ed34baf6419f322587917->enter($__internal_a307848a1af4292621f1159750f9020af694432fe66ed34baf6419f322587917_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members/Menu:tabs.html.twig"));

        $__internal_f0fc2144ae57966e159c70059d4d3a53bc8258aa044d457f0cce7e1e5b7d3661 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f0fc2144ae57966e159c70059d4d3a53bc8258aa044d457f0cce7e1e5b7d3661->enter($__internal_f0fc2144ae57966e159c70059d4d3a53bc8258aa044d457f0cce7e1e5b7d3661_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members/Menu:tabs.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a307848a1af4292621f1159750f9020af694432fe66ed34baf6419f322587917->leave($__internal_a307848a1af4292621f1159750f9020af694432fe66ed34baf6419f322587917_prof);

        
        $__internal_f0fc2144ae57966e159c70059d4d3a53bc8258aa044d457f0cce7e1e5b7d3661->leave($__internal_f0fc2144ae57966e159c70059d4d3a53bc8258aa044d457f0cce7e1e5b7d3661_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_840ac1f335911d88b5a10f01ef18ea80a19d4d8dfd6431a798afa6df8ddbf3bb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_840ac1f335911d88b5a10f01ef18ea80a19d4d8dfd6431a798afa6df8ddbf3bb->enter($__internal_840ac1f335911d88b5a10f01ef18ea80a19d4d8dfd6431a798afa6df8ddbf3bb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_21d952ce4911bc44d3220702ea0052608a6aae0ef45f78f929b541470abe8983 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_21d952ce4911bc44d3220702ea0052608a6aae0ef45f78f929b541470abe8983->enter($__internal_21d952ce4911bc44d3220702ea0052608a6aae0ef45f78f929b541470abe8983_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "
";
        
        $__internal_21d952ce4911bc44d3220702ea0052608a6aae0ef45f78f929b541470abe8983->leave($__internal_21d952ce4911bc44d3220702ea0052608a6aae0ef45f78f929b541470abe8983_prof);

        
        $__internal_840ac1f335911d88b5a10f01ef18ea80a19d4d8dfd6431a798afa6df8ddbf3bb->leave($__internal_840ac1f335911d88b5a10f01ef18ea80a19d4d8dfd6431a798afa6df8ddbf3bb_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Members/Menu:tabs.html.twig";
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
    {{ item.label|trans }}
{% endblock %}
", "GymanAppBundle:Members/Menu:tabs.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/Menu/tabs.html.twig");
    }
}
