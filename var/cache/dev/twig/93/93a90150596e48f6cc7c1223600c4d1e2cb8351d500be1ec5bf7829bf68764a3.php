<?php

/* GymanAppBundle:Default:Menu/tabs.html.twig */
class __TwigTemplate_033170b4364209731af880d045bccce4251a3a960259c94e27f013144e0d26ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "GymanAppBundle:Default:Menu/tabs.html.twig", 1);
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
        $__internal_4171dadf3d033903ef468c54efeb4dd03230fbdde8fd477418ea6b0d72a28d82 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4171dadf3d033903ef468c54efeb4dd03230fbdde8fd477418ea6b0d72a28d82->enter($__internal_4171dadf3d033903ef468c54efeb4dd03230fbdde8fd477418ea6b0d72a28d82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:Menu/tabs.html.twig"));

        $__internal_10b88a1e9d8e5b52a1aedec4a1148bb28caea4858ff4117457fde00631810a1c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_10b88a1e9d8e5b52a1aedec4a1148bb28caea4858ff4117457fde00631810a1c->enter($__internal_10b88a1e9d8e5b52a1aedec4a1148bb28caea4858ff4117457fde00631810a1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:Menu/tabs.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4171dadf3d033903ef468c54efeb4dd03230fbdde8fd477418ea6b0d72a28d82->leave($__internal_4171dadf3d033903ef468c54efeb4dd03230fbdde8fd477418ea6b0d72a28d82_prof);

        
        $__internal_10b88a1e9d8e5b52a1aedec4a1148bb28caea4858ff4117457fde00631810a1c->leave($__internal_10b88a1e9d8e5b52a1aedec4a1148bb28caea4858ff4117457fde00631810a1c_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_250d6188fce184c67f5971f91932801f89692d3f8075efdd378fd950c569eea9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_250d6188fce184c67f5971f91932801f89692d3f8075efdd378fd950c569eea9->enter($__internal_250d6188fce184c67f5971f91932801f89692d3f8075efdd378fd950c569eea9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_e204f7ea0f7ffbd3792d85e6d5ebd297a58b2fdb3f60978ac96524b483412b06 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e204f7ea0f7ffbd3792d85e6d5ebd297a58b2fdb3f60978ac96524b483412b06->enter($__internal_e204f7ea0f7ffbd3792d85e6d5ebd297a58b2fdb3f60978ac96524b483412b06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "
";
        
        $__internal_e204f7ea0f7ffbd3792d85e6d5ebd297a58b2fdb3f60978ac96524b483412b06->leave($__internal_e204f7ea0f7ffbd3792d85e6d5ebd297a58b2fdb3f60978ac96524b483412b06_prof);

        
        $__internal_250d6188fce184c67f5971f91932801f89692d3f8075efdd378fd950c569eea9->leave($__internal_250d6188fce184c67f5971f91932801f89692d3f8075efdd378fd950c569eea9_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Default:Menu/tabs.html.twig";
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
", "GymanAppBundle:Default:Menu/tabs.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/Menu/tabs.html.twig");
    }
}
