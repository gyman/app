<?php

/* GymanSettingsBundle:Menu:main.html.twig */
class __TwigTemplate_13c9012a68bddc7e1ed1eba1ee4e78990d71cd612b69015c1ab1df55c2640bf3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "GymanSettingsBundle:Menu:main.html.twig", 1);
        $this->blocks = array(
            'label' => array($this, 'block_label'),
            'list' => array($this, 'block_list'),
            'item' => array($this, 'block_item'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_41edb8db73c75cca4483ea1b37759e37336f0c84f87c27e076b43c7c64955b80 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_41edb8db73c75cca4483ea1b37759e37336f0c84f87c27e076b43c7c64955b80->enter($__internal_41edb8db73c75cca4483ea1b37759e37336f0c84f87c27e076b43c7c64955b80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Menu:main.html.twig"));

        $__internal_a5f659d78a64dfdfd70be27a85f7822a11d97760e2a63b9843e8ad5b243807c6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a5f659d78a64dfdfd70be27a85f7822a11d97760e2a63b9843e8ad5b243807c6->enter($__internal_a5f659d78a64dfdfd70be27a85f7822a11d97760e2a63b9843e8ad5b243807c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Menu:main.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_41edb8db73c75cca4483ea1b37759e37336f0c84f87c27e076b43c7c64955b80->leave($__internal_41edb8db73c75cca4483ea1b37759e37336f0c84f87c27e076b43c7c64955b80_prof);

        
        $__internal_a5f659d78a64dfdfd70be27a85f7822a11d97760e2a63b9843e8ad5b243807c6->leave($__internal_a5f659d78a64dfdfd70be27a85f7822a11d97760e2a63b9843e8ad5b243807c6_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_f736713de463c0b0ec8277d250d158f502fa638c72c1505ce05c1ea412c5f6ce = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f736713de463c0b0ec8277d250d158f502fa638c72c1505ce05c1ea412c5f6ce->enter($__internal_f736713de463c0b0ec8277d250d158f502fa638c72c1505ce05c1ea412c5f6ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_a7e52c3a84e8e423ee9fbdd48242d7a4c9160d694fdadcd64f93de63f9ff77bc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a7e52c3a84e8e423ee9fbdd48242d7a4c9160d694fdadcd64f93de63f9ff77bc->enter($__internal_a7e52c3a84e8e423ee9fbdd48242d7a4c9160d694fdadcd64f93de63f9ff77bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        
        $__internal_a7e52c3a84e8e423ee9fbdd48242d7a4c9160d694fdadcd64f93de63f9ff77bc->leave($__internal_a7e52c3a84e8e423ee9fbdd48242d7a4c9160d694fdadcd64f93de63f9ff77bc_prof);

        
        $__internal_f736713de463c0b0ec8277d250d158f502fa638c72c1505ce05c1ea412c5f6ce->leave($__internal_f736713de463c0b0ec8277d250d158f502fa638c72c1505ce05c1ea412c5f6ce_prof);

    }

    // line 13
    public function block_list($context, array $blocks = array())
    {
        $__internal_af1d8e55c2704eeb5dd8a8df7ea7d354c7d9291263a00f558d18207df0cb08f4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_af1d8e55c2704eeb5dd8a8df7ea7d354c7d9291263a00f558d18207df0cb08f4->enter($__internal_af1d8e55c2704eeb5dd8a8df7ea7d354c7d9291263a00f558d18207df0cb08f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_d5c999009c7c0258f0c7c5b0fad354cda072a5099fe0e4023d7690b6521a3a07 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d5c999009c7c0258f0c7c5b0fad354cda072a5099fe0e4023d7690b6521a3a07->enter($__internal_d5c999009c7c0258f0c7c5b0fad354cda072a5099fe0e4023d7690b6521a3a07_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        // line 14
        echo "    ";
        if (((twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "hasChildren", array()) &&  !(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()) === 0)) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayChildren", array()))) {
            // line 15
            echo "        <ul>
            ";
            // line 16
            $this->displayBlock("children", $context, $blocks);
            echo "
        </ul>
    ";
        }
        
        $__internal_d5c999009c7c0258f0c7c5b0fad354cda072a5099fe0e4023d7690b6521a3a07->leave($__internal_d5c999009c7c0258f0c7c5b0fad354cda072a5099fe0e4023d7690b6521a3a07_prof);

        
        $__internal_af1d8e55c2704eeb5dd8a8df7ea7d354c7d9291263a00f558d18207df0cb08f4->leave($__internal_af1d8e55c2704eeb5dd8a8df7ea7d354c7d9291263a00f558d18207df0cb08f4_prof);

    }

    // line 21
    public function block_item($context, array $blocks = array())
    {
        $__internal_3aefcaedc6c8f3b7b9d729959607c8ed7c1a27d71e501d70b07151774a3d7fe3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3aefcaedc6c8f3b7b9d729959607c8ed7c1a27d71e501d70b07151774a3d7fe3->enter($__internal_3aefcaedc6c8f3b7b9d729959607c8ed7c1a27d71e501d70b07151774a3d7fe3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_a92ca6deb52b03d81adbbb457e79c22ff51fe8f86ef3d697fa5146410c9b2d50 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a92ca6deb52b03d81adbbb457e79c22ff51fe8f86ef3d697fa5146410c9b2d50->enter($__internal_a92ca6deb52b03d81adbbb457e79c22ff51fe8f86ef3d697fa5146410c9b2d50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        // line 22
        echo "    ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayed", array())) {
            // line 23
            echo "        <li>
        ";
            // line 25
            $context["classes"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attribute", array(0 => "class"), "method"))) ? (array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 26
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "current", array())) {
                // line 27
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "currentClass", array())));
            } elseif (twig_get_attribute($this->env, $this->getSourceContext(),             // line 28
($context["item"] ?? null), "currentAncestor", array())) {
                // line 29
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "ancestorClass", array())));
            }
            // line 31
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "actsLikeFirst", array())) {
                // line 32
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "firstClass", array())));
            }
            // line 34
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "actsLikeLast", array())) {
                // line 35
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "lastClass", array())));
            }
            // line 37
            $context["attributes"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attributes", array());
            // line 38
            if ( !twig_test_empty(($context["classes"] ?? null))) {
                // line 39
                $context["attributes"] = twig_array_merge(($context["attributes"] ?? null), array("class" => twig_join_filter(($context["classes"] ?? null), " ")));
            }
            // line 41
            echo "        ";
            // line 42
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "uri", array())) && ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "current", array()) || twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "currentAsLink", array())))) {
                // line 43
                echo "            ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 45
                echo "            ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 47
            echo "        ";
            // line 48
            $context["childrenClasses"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttribute", array(0 => "class"), "method"))) ? (array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 49
            $context["childrenClasses"] = twig_array_merge(($context["childrenClasses"] ?? null), array(0 => ("menu_level_" . twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "level", array()))));
            // line 50
            $context["listAttributes"] = twig_array_merge(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttributes", array()), array("class" => twig_join_filter(($context["childrenClasses"] ?? null), " ")));
            // line 51
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
        </li>
    ";
        }
        
        $__internal_a92ca6deb52b03d81adbbb457e79c22ff51fe8f86ef3d697fa5146410c9b2d50->leave($__internal_a92ca6deb52b03d81adbbb457e79c22ff51fe8f86ef3d697fa5146410c9b2d50_prof);

        
        $__internal_3aefcaedc6c8f3b7b9d729959607c8ed7c1a27d71e501d70b07151774a3d7fe3->leave($__internal_3aefcaedc6c8f3b7b9d729959607c8ed7c1a27d71e501d70b07151774a3d7fe3_prof);

    }

    // line 5
    public function macro_attributes($__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_cea66b8d0c7c8aee47fe5ae0c1b0c038d7fa77b8b9f03f9c40921cd11dc96e9b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_cea66b8d0c7c8aee47fe5ae0c1b0c038d7fa77b8b9f03f9c40921cd11dc96e9b->enter($__internal_cea66b8d0c7c8aee47fe5ae0c1b0c038d7fa77b8b9f03f9c40921cd11dc96e9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_0e3cbe1666039c4e17c509a1fcf3863cb206e89fdddf32b994e621f947da68fb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_0e3cbe1666039c4e17c509a1fcf3863cb206e89fdddf32b994e621f947da68fb->enter($__internal_0e3cbe1666039c4e17c509a1fcf3863cb206e89fdddf32b994e621f947da68fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            // line 6
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributes"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 7
                if (( !(null === $context["value"]) &&  !($context["value"] === false))) {
                    // line 8
                    echo sprintf(" %s=\"%s\"", $context["name"], ((($context["value"] === true)) ? (twig_escape_filter($this->env, $context["name"])) : (twig_escape_filter($this->env, $context["value"]))));
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            
            $__internal_0e3cbe1666039c4e17c509a1fcf3863cb206e89fdddf32b994e621f947da68fb->leave($__internal_0e3cbe1666039c4e17c509a1fcf3863cb206e89fdddf32b994e621f947da68fb_prof);

            
            $__internal_cea66b8d0c7c8aee47fe5ae0c1b0c038d7fa77b8b9f03f9c40921cd11dc96e9b->leave($__internal_cea66b8d0c7c8aee47fe5ae0c1b0c038d7fa77b8b9f03f9c40921cd11dc96e9b_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle:Menu:main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 8,  190 => 7,  185 => 6,  167 => 5,  152 => 51,  150 => 50,  148 => 49,  146 => 48,  144 => 47,  140 => 45,  136 => 43,  134 => 42,  132 => 41,  129 => 39,  127 => 38,  125 => 37,  122 => 35,  120 => 34,  117 => 32,  115 => 31,  112 => 29,  110 => 28,  108 => 27,  106 => 26,  104 => 25,  101 => 23,  98 => 22,  89 => 21,  75 => 16,  72 => 15,  69 => 14,  60 => 13,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'knp_menu.html.twig' %}

{% block label %}{{ item.label|trans }}{% endblock %}

{% macro attributes(attributes) %}
    {% for name, value in attributes %}
        {%- if value is not none and value is not same as(false) -%}
            {{- ' %s=\"%s\"'|format(name, value is same as(true) ? name|e : value|e)|raw -}}
        {%- endif -%}
    {%- endfor -%}
{% endmacro %}

{% block list %}
    {% if item.hasChildren and options.depth is not same as(0) and item.displayChildren %}
        <ul>
            {{ block('children') }}
        </ul>
    {% endif %}
{% endblock %}

{% block item %}
    {% if item.displayed %}
        <li>
        {# building the class of the item #}
        {%- set classes = item.attribute('class') is not empty ? [item.attribute('class')] : [] %}
        {%- if item.current %}
            {%- set classes = classes|merge([options.currentClass]) %}
        {%- elseif item.currentAncestor %}
            {%- set classes = classes|merge([options.ancestorClass]) %}
        {%- endif %}
        {%- if item.actsLikeFirst %}
            {%- set classes = classes|merge([options.firstClass]) %}
        {%- endif %}
        {%- if item.actsLikeLast %}
            {%- set classes = classes|merge([options.lastClass]) %}
        {%- endif %}
        {%- set attributes = item.attributes %}
        {%- if classes is not empty %}
            {%- set attributes = attributes|merge({'class': classes|join(' ')}) %}
        {%- endif %}
        {# displaying the item #}
        {%- if item.uri is not empty and (not item.current or options.currentAsLink) %}
            {{ block('linkElement') }}
        {%- else %}
            {{ block('spanElement') }}
        {%- endif %}
        {# render the list of children#}
        {%- set childrenClasses = item.childrenAttribute('class') is not empty ? [item.childrenAttribute('class')] : [] %}
        {%- set childrenClasses = childrenClasses|merge(['menu_level_' ~ item.level]) %}
        {%- set listAttributes = item.childrenAttributes|merge({'class': childrenClasses|join(' ') }) %}
        {{ block('list') }}
        </li>
    {% endif %}
{% endblock %}
", "GymanSettingsBundle:Menu:main.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/Menu/main.html.twig");
    }
}
