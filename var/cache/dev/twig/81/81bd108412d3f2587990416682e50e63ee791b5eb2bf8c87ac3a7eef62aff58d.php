<?php

/* GymanSettingsBundle::individual_widgets.html.twig */
class __TwigTemplate_e0e7ce0f9e843a3091466960c626698308202f5f19d193eff3aff47cd9817739 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '_club_sections_sections_entry_title_widget' => array($this, 'block__club_sections_sections_entry_title_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ee7a2780c06495e8fee3eeca1e3ed3c284347cd9abd9923a94b03e5e8cd8d743 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ee7a2780c06495e8fee3eeca1e3ed3c284347cd9abd9923a94b03e5e8cd8d743->enter($__internal_ee7a2780c06495e8fee3eeca1e3ed3c284347cd9abd9923a94b03e5e8cd8d743_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::individual_widgets.html.twig"));

        $__internal_780af2a173bb9257f11b432be991dd9a84f3b5b577cbdeb03698e40c3be5907f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_780af2a173bb9257f11b432be991dd9a84f3b5b577cbdeb03698e40c3be5907f->enter($__internal_780af2a173bb9257f11b432be991dd9a84f3b5b577cbdeb03698e40c3be5907f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::individual_widgets.html.twig"));

        // line 1
        $this->displayBlock('_club_sections_sections_entry_title_widget', $context, $blocks);
        // line 6
        echo "


";
        
        $__internal_ee7a2780c06495e8fee3eeca1e3ed3c284347cd9abd9923a94b03e5e8cd8d743->leave($__internal_ee7a2780c06495e8fee3eeca1e3ed3c284347cd9abd9923a94b03e5e8cd8d743_prof);

        
        $__internal_780af2a173bb9257f11b432be991dd9a84f3b5b577cbdeb03698e40c3be5907f->leave($__internal_780af2a173bb9257f11b432be991dd9a84f3b5b577cbdeb03698e40c3be5907f_prof);

    }

    // line 1
    public function block__club_sections_sections_entry_title_widget($context, array $blocks = array())
    {
        $__internal_c72cc13623b6e4bb30a7621b63411c2660c3d7195984ed2ae0863aeaa7df9083 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c72cc13623b6e4bb30a7621b63411c2660c3d7195984ed2ae0863aeaa7df9083->enter($__internal_c72cc13623b6e4bb30a7621b63411c2660c3d7195984ed2ae0863aeaa7df9083_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_club_sections_sections_entry_title_widget"));

        $__internal_31fd22f6a0c83255331687edf9edd402698b558925583d7f46220d4426d3c8e0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_31fd22f6a0c83255331687edf9edd402698b558925583d7f46220d4426d3c8e0->enter($__internal_31fd22f6a0c83255331687edf9edd402698b558925583d7f46220d4426d3c8e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_club_sections_sections_entry_title_widget"));

        // line 2
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
    &nbsp;
    <a href=\"#\" class=\"remove-collection-entry\" data-entry-id=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "parent", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">[";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("remove_collection_element"), "html", null, true);
        echo "]</a>
";
        
        $__internal_31fd22f6a0c83255331687edf9edd402698b558925583d7f46220d4426d3c8e0->leave($__internal_31fd22f6a0c83255331687edf9edd402698b558925583d7f46220d4426d3c8e0_prof);

        
        $__internal_c72cc13623b6e4bb30a7621b63411c2660c3d7195984ed2ae0863aeaa7df9083->leave($__internal_c72cc13623b6e4bb30a7621b63411c2660c3d7195984ed2ae0863aeaa7df9083_prof);

    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle::individual_widgets.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  56 => 4,  50 => 2,  41 => 1,  28 => 6,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block _club_sections_sections_entry_title_widget %}
    {{ form_widget(form) }}
    &nbsp;
    <a href=\"#\" class=\"remove-collection-entry\" data-entry-id=\"{{ form.parent.vars.id }}\">[{{ 'remove_collection_element'|trans }}]</a>
{% endblock  %}



", "GymanSettingsBundle::individual_widgets.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/individual_widgets.html.twig");
    }
}
