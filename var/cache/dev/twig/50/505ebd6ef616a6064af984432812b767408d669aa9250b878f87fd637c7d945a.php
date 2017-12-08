<?php

/* :Menu:dashboard_actions.html.twig */
class __TwigTemplate_20ab80546cc6efee51f46e315754f5e5a042ce7a4bb00ad8d3a0f2a47d968fa8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", ":Menu:dashboard_actions.html.twig", 1);
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
        $__internal_4a5907250cac4b140ecfbe1397571595949f1aa0bac0461032c4961b4fe7fed5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4a5907250cac4b140ecfbe1397571595949f1aa0bac0461032c4961b4fe7fed5->enter($__internal_4a5907250cac4b140ecfbe1397571595949f1aa0bac0461032c4961b4fe7fed5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:dashboard_actions.html.twig"));

        $__internal_451a4044b434c04aa44d19078926a42375cd70a09652500a5c10f0e91893491f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_451a4044b434c04aa44d19078926a42375cd70a09652500a5c10f0e91893491f->enter($__internal_451a4044b434c04aa44d19078926a42375cd70a09652500a5c10f0e91893491f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:dashboard_actions.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4a5907250cac4b140ecfbe1397571595949f1aa0bac0461032c4961b4fe7fed5->leave($__internal_4a5907250cac4b140ecfbe1397571595949f1aa0bac0461032c4961b4fe7fed5_prof);

        
        $__internal_451a4044b434c04aa44d19078926a42375cd70a09652500a5c10f0e91893491f->leave($__internal_451a4044b434c04aa44d19078926a42375cd70a09652500a5c10f0e91893491f_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_c81de90ecc0c48033aef09df3153f11be805a3c4ce27754aef9de1a35cda69ca = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c81de90ecc0c48033aef09df3153f11be805a3c4ce27754aef9de1a35cda69ca->enter($__internal_c81de90ecc0c48033aef09df3153f11be805a3c4ce27754aef9de1a35cda69ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_9a283b3316bd47d1a30774df3a81bbf4e1b9e02566366a9740315a5274d5abbf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9a283b3316bd47d1a30774df3a81bbf4e1b9e02566366a9740315a5274d5abbf->enter($__internal_9a283b3316bd47d1a30774df3a81bbf4e1b9e02566366a9740315a5274d5abbf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <i class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "
";
        
        $__internal_9a283b3316bd47d1a30774df3a81bbf4e1b9e02566366a9740315a5274d5abbf->leave($__internal_9a283b3316bd47d1a30774df3a81bbf4e1b9e02566366a9740315a5274d5abbf_prof);

        
        $__internal_c81de90ecc0c48033aef09df3153f11be805a3c4ce27754aef9de1a35cda69ca->leave($__internal_c81de90ecc0c48033aef09df3153f11be805a3c4ce27754aef9de1a35cda69ca_prof);

    }

    public function getTemplateName()
    {
        return ":Menu:dashboard_actions.html.twig";
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
        return new Twig_Source("{% extends 'knp_menu.html.twig' %}

{% block label %}
    <i class=\"icon {{ item.extras.icon }}\"></i> {{ item.label|trans }}
{% endblock %}", ":Menu:dashboard_actions.html.twig", "/vagrant/app/Resources/views/Menu/dashboard_actions.html.twig");
    }
}
