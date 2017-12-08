<?php

/* GymanAppBundle:Members/Menu:tabs.html.twig */
class __TwigTemplate_7a72283008bfe36151c5872a4f1c0312d70a84f38bb2265bbf883e9b99ef9c30 extends Twig_Template
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
        $__internal_dc42f2db19a5b474d8b6a2e706a6c1d2812224c70b282a2fc7995c84193804ce = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_dc42f2db19a5b474d8b6a2e706a6c1d2812224c70b282a2fc7995c84193804ce->enter($__internal_dc42f2db19a5b474d8b6a2e706a6c1d2812224c70b282a2fc7995c84193804ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members/Menu:tabs.html.twig"));

        $__internal_9bdd864e804c3e39c93e58bde5425a185d15b2539e1a08e54843e00602101743 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9bdd864e804c3e39c93e58bde5425a185d15b2539e1a08e54843e00602101743->enter($__internal_9bdd864e804c3e39c93e58bde5425a185d15b2539e1a08e54843e00602101743_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members/Menu:tabs.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_dc42f2db19a5b474d8b6a2e706a6c1d2812224c70b282a2fc7995c84193804ce->leave($__internal_dc42f2db19a5b474d8b6a2e706a6c1d2812224c70b282a2fc7995c84193804ce_prof);

        
        $__internal_9bdd864e804c3e39c93e58bde5425a185d15b2539e1a08e54843e00602101743->leave($__internal_9bdd864e804c3e39c93e58bde5425a185d15b2539e1a08e54843e00602101743_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_0cefd6d4dd0a9871c3b76c43f485ff8ce9d5fd89065159c3a8140510ec2b290a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0cefd6d4dd0a9871c3b76c43f485ff8ce9d5fd89065159c3a8140510ec2b290a->enter($__internal_0cefd6d4dd0a9871c3b76c43f485ff8ce9d5fd89065159c3a8140510ec2b290a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_15ac2bb8646dbc3fee823dd2e6234ef14fed9a5b9f8b096a6a922a63db90cb67 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_15ac2bb8646dbc3fee823dd2e6234ef14fed9a5b9f8b096a6a922a63db90cb67->enter($__internal_15ac2bb8646dbc3fee823dd2e6234ef14fed9a5b9f8b096a6a922a63db90cb67_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "
";
        
        $__internal_15ac2bb8646dbc3fee823dd2e6234ef14fed9a5b9f8b096a6a922a63db90cb67->leave($__internal_15ac2bb8646dbc3fee823dd2e6234ef14fed9a5b9f8b096a6a922a63db90cb67_prof);

        
        $__internal_0cefd6d4dd0a9871c3b76c43f485ff8ce9d5fd89065159c3a8140510ec2b290a->leave($__internal_0cefd6d4dd0a9871c3b76c43f485ff8ce9d5fd89065159c3a8140510ec2b290a_prof);

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
