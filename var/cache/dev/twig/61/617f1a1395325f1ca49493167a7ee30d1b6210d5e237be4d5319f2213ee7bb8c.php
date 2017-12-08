<?php

/* :Menu:main.html.twig */
class __TwigTemplate_8ce45ab421ac5093b42ecf4a831179b59df376f3246beff499cfea7b63741417 extends Twig_Template
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
        $__internal_235e8516d5e74bfee5b2a271c112ce2d5cc3ae7bbc7583f17ca280a7a7888085 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_235e8516d5e74bfee5b2a271c112ce2d5cc3ae7bbc7583f17ca280a7a7888085->enter($__internal_235e8516d5e74bfee5b2a271c112ce2d5cc3ae7bbc7583f17ca280a7a7888085_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:main.html.twig"));

        $__internal_8184eeba678137da2d57c04bf7f1657f1b9cb9dab52ec022901dcb76644e4d05 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8184eeba678137da2d57c04bf7f1657f1b9cb9dab52ec022901dcb76644e4d05->enter($__internal_8184eeba678137da2d57c04bf7f1657f1b9cb9dab52ec022901dcb76644e4d05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:main.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_235e8516d5e74bfee5b2a271c112ce2d5cc3ae7bbc7583f17ca280a7a7888085->leave($__internal_235e8516d5e74bfee5b2a271c112ce2d5cc3ae7bbc7583f17ca280a7a7888085_prof);

        
        $__internal_8184eeba678137da2d57c04bf7f1657f1b9cb9dab52ec022901dcb76644e4d05->leave($__internal_8184eeba678137da2d57c04bf7f1657f1b9cb9dab52ec022901dcb76644e4d05_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_bb5b0c23676bf7d5972df7ba7b41960e22389c5a78bf8e5247afce33d15d65ce = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bb5b0c23676bf7d5972df7ba7b41960e22389c5a78bf8e5247afce33d15d65ce->enter($__internal_bb5b0c23676bf7d5972df7ba7b41960e22389c5a78bf8e5247afce33d15d65ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_2ec8138210ed3dfd939ee065628f30e52dbe2a1c031af3bf22b13bf63e2b88f9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2ec8138210ed3dfd939ee065628f30e52dbe2a1c031af3bf22b13bf63e2b88f9->enter($__internal_2ec8138210ed3dfd939ee065628f30e52dbe2a1c031af3bf22b13bf63e2b88f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    <span class=\"txt\">";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "</span>
";
        
        $__internal_2ec8138210ed3dfd939ee065628f30e52dbe2a1c031af3bf22b13bf63e2b88f9->leave($__internal_2ec8138210ed3dfd939ee065628f30e52dbe2a1c031af3bf22b13bf63e2b88f9_prof);

        
        $__internal_bb5b0c23676bf7d5972df7ba7b41960e22389c5a78bf8e5247afce33d15d65ce->leave($__internal_bb5b0c23676bf7d5972df7ba7b41960e22389c5a78bf8e5247afce33d15d65ce_prof);

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
