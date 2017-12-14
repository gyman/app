<?php

/* ::fields.html.twig */
class __TwigTemplate_ff05872dbc4fc3f8c4b1e77c0ec1295b29aa2158cc60fa66bd11ba1c77134f56 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("form_div_layout.html.twig", "::fields.html.twig", 1);
        $_trait_0 = $this->loadTemplate("GymanAppBundle::individual_widgets.html.twig", "::fields.html.twig", 2);
        // line 2
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."GymanAppBundle::individual_widgets.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->loadTemplate("GymanSettingsBundle::individual_widgets.html.twig", "::fields.html.twig", 3);
        // line 3
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."GymanSettingsBundle::individual_widgets.html.twig".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ba5db97dbc82cdc88063c20616b2a9fae5e68bf7141c636013f355eae3254d76 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ba5db97dbc82cdc88063c20616b2a9fae5e68bf7141c636013f355eae3254d76->enter($__internal_ba5db97dbc82cdc88063c20616b2a9fae5e68bf7141c636013f355eae3254d76_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::fields.html.twig"));

        $__internal_ae30deba1739daafbd801a24cb7abe49f96886e3c5d8666211d855cb415a94d5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ae30deba1739daafbd801a24cb7abe49f96886e3c5d8666211d855cb415a94d5->enter($__internal_ae30deba1739daafbd801a24cb7abe49f96886e3c5d8666211d855cb415a94d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::fields.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ba5db97dbc82cdc88063c20616b2a9fae5e68bf7141c636013f355eae3254d76->leave($__internal_ba5db97dbc82cdc88063c20616b2a9fae5e68bf7141c636013f355eae3254d76_prof);

        
        $__internal_ae30deba1739daafbd801a24cb7abe49f96886e3c5d8666211d855cb415a94d5->leave($__internal_ae30deba1739daafbd801a24cb7abe49f96886e3c5d8666211d855cb415a94d5_prof);

    }

    public function getTemplateName()
    {
        return "::fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 1,  21 => 3,  14 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'form_div_layout.html.twig' %}
{% use 'GymanAppBundle::individual_widgets.html.twig' %}
{% use 'GymanSettingsBundle::individual_widgets.html.twig' %}

{#{% block form_row %}#}
{#{% spaceless %}#}
{#<div class=\"control-group {% if not form.vars.valid %}error{% endif %}\">#}
    {#{{ form_label(form) }}#}
    {#<div class=\"controls\">#}
        {#{{ form_widget(form) }}#}
        {#<div class=\"help-block\">#}
            {#{{ form_errors(form) }}#}
        {#</div>#}
    {#</div>#}
{#</div>#}
{#{% endspaceless %}#}
{#{% endblock form_row %}#}

{#{% block form_errors %}#}
{#{% spaceless %}#}
    {#{% if errors|length > 0 %}#}
    {#{% for error in errors %}#}
        {#{{ error.message }}<br />#}
    {#{% endfor %}#}
    {#{% endif %}#}
{#{% endspaceless %}#}
{#{% endblock form_errors %}#}

{#{% block form_widget_simple %}#}
{#{% spaceless %}#}
    {#{% set type = type|default('text') %}#}
{#<input type=\"{{ type }}\" {{ block('widget_attributes') }} {% if value is not empty %}value=\"{{ value }}\" {% endif %}/>#}
{#{% endspaceless %}#}
{#{% endblock form_widget_simple %}#}

{#{% block form_label %}#}
{#{% spaceless %}#}
    {#{% if label is not same as(false) %}#}
        {#{% if not compound %}#}
            {#{% set label_attr = label_attr|merge({'for': id}) %}#}
        {#{% endif %}#}
        {#{% if required %}#}
            {#{% set label_attr = label_attr|merge({'class': (label_attr.class|default('') ~ ' required')|trim}) %}#}
        {#{% endif %}#}
        {#{% if label is empty %}#}
            {#{% set label = name|humanize %}#}
        {#{% endif %}#}
{#<label class=\"control-label\"{% for attrname, attrvalue in label_attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}>{{ label|trans({}, translation_domain) }}</label>#}
    {#{% endif %}#}
{#{% endspaceless %}#}
{#{% endblock form_label %}#}

{#{% block textarea_widget %}#}
{#{% spaceless %}#}
{#<textarea {{ block('widget_attributes') }}>{{ value }}</textarea>#}
{#{% endspaceless %}#}
{#{% endblock textarea_widget %}#}

{#{% block choice_widget %}#}
{#{% spaceless %}#}
    {#{% if expanded %}#}
        {#{{ block('choice_widget_expanded') }}#}
    {#{% else %}#}
        {#{{ block('choice_widget_collapsed') }}#}
    {#{% endif %}#}
{#{% endspaceless %}#}
{#{% endblock choice_widget %}#}

{#{% block choice_widget_expanded %}#}
    {#{% spaceless %}#}
        {#{% set child_vars = {'attr': attr} %}#}
        {#{% for child in form %}#}
            {#<div>#}
                {#{{ form_label(child, null, child_vars) }}#}
            {#</div>#}
        {#{% endfor %}#}
    {#{% endspaceless %}#}
{#{% endblock choice_widget_expanded %}#}

{#{% block checkbox_widget %}#}
{#{% spaceless %}#}
{#<input type=\"checkbox\" {{ block('widget_attributes') }}{% if value is defined %} value=\"{{ value }}\"{% endif %}{% if checked %} checked=\"checked\"{% endif %} />#}
{#{% endspaceless %}#}
{#{% endblock checkbox_widget %}#}

{#{% block checkbox_row %}#}
{#{% spaceless %}#}
    {#{% if form_type is defined and form_type == 'horizontal' %}#}
        {#{{ block('horizontal_checkbox_row') }}#}
    {#{% else %}#}
{#<div class=\"control-group\">#}
        {#{{ form_label(form) }}#}
    {#<div class=\"controls\">#}
        {#{{ form_widget(form) }}#}
        {#{{ form_errors(form) }}#}
    {#</div>#}
{#</div>#}
    {#{% endif %}#}
{#{% endspaceless %}#}
{#{% endblock checkbox_row %}#}

{#{% block horizontal_checkbox_row %}#}
{#{% spaceless %}#}
{#<div class=\"control-group\">#}
    {#<div class=\"controls\">#}
            {#{{ form_label(form) }}#}
            {#{{ form_errors(form) }}#}
    {#</div>#}
{#</div>#}
{#{% endspaceless %}#}
{#{% endblock horizontal_checkbox_row %}#}", "::fields.html.twig", "/vagrant/app/Resources/views/fields.html.twig");
    }
}
