<?php

/* :Menu:dashboard_actions.html.twig */
class __TwigTemplate_6fd8efb3ad29b2d93860539bee27d1adcadd44190746528376471aa8ad72f9a7 extends Twig_Template
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
        $__internal_ef836ed6d7c2fc3ec35c51fff0338aa09aa8cf1b61223f4e128cd4e3b3da2b97 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ef836ed6d7c2fc3ec35c51fff0338aa09aa8cf1b61223f4e128cd4e3b3da2b97->enter($__internal_ef836ed6d7c2fc3ec35c51fff0338aa09aa8cf1b61223f4e128cd4e3b3da2b97_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:dashboard_actions.html.twig"));

        $__internal_2823c6d47254a73934f9319403b79c7061c592a4bc47ed97a65e434e49bafdb2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2823c6d47254a73934f9319403b79c7061c592a4bc47ed97a65e434e49bafdb2->enter($__internal_2823c6d47254a73934f9319403b79c7061c592a4bc47ed97a65e434e49bafdb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:dashboard_actions.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ef836ed6d7c2fc3ec35c51fff0338aa09aa8cf1b61223f4e128cd4e3b3da2b97->leave($__internal_ef836ed6d7c2fc3ec35c51fff0338aa09aa8cf1b61223f4e128cd4e3b3da2b97_prof);

        
        $__internal_2823c6d47254a73934f9319403b79c7061c592a4bc47ed97a65e434e49bafdb2->leave($__internal_2823c6d47254a73934f9319403b79c7061c592a4bc47ed97a65e434e49bafdb2_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_a0e24d9c13daf5a309ae4df860e782ddb821aea2283d57e956619b90b03493b0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a0e24d9c13daf5a309ae4df860e782ddb821aea2283d57e956619b90b03493b0->enter($__internal_a0e24d9c13daf5a309ae4df860e782ddb821aea2283d57e956619b90b03493b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_82422f9ce10d33bec05156be6844cfbfab3af4e5e36f1a3c66ebc9d63d392ff4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_82422f9ce10d33bec05156be6844cfbfab3af4e5e36f1a3c66ebc9d63d392ff4->enter($__internal_82422f9ce10d33bec05156be6844cfbfab3af4e5e36f1a3c66ebc9d63d392ff4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <i class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "
";
        
        $__internal_82422f9ce10d33bec05156be6844cfbfab3af4e5e36f1a3c66ebc9d63d392ff4->leave($__internal_82422f9ce10d33bec05156be6844cfbfab3af4e5e36f1a3c66ebc9d63d392ff4_prof);

        
        $__internal_a0e24d9c13daf5a309ae4df860e782ddb821aea2283d57e956619b90b03493b0->leave($__internal_a0e24d9c13daf5a309ae4df860e782ddb821aea2283d57e956619b90b03493b0_prof);

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
