<?php

/* GymanSettingsBundle:Menu:main.html.twig */
class __TwigTemplate_7c56c149b7128c0bb9e11912e734d54220f4749f9ec8d26faf7cc01de5aa662a extends Twig_Template
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
        $__internal_5c10a5964ea9e45a9c4e739a6eae4042f61b1d526db623630c906fab5717148e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5c10a5964ea9e45a9c4e739a6eae4042f61b1d526db623630c906fab5717148e->enter($__internal_5c10a5964ea9e45a9c4e739a6eae4042f61b1d526db623630c906fab5717148e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Menu:main.html.twig"));

        $__internal_bbaf0ac55fbc6a13cc80dbb04fde549709afbf303611a34b6063b4ca062d33fe = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bbaf0ac55fbc6a13cc80dbb04fde549709afbf303611a34b6063b4ca062d33fe->enter($__internal_bbaf0ac55fbc6a13cc80dbb04fde549709afbf303611a34b6063b4ca062d33fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Menu:main.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5c10a5964ea9e45a9c4e739a6eae4042f61b1d526db623630c906fab5717148e->leave($__internal_5c10a5964ea9e45a9c4e739a6eae4042f61b1d526db623630c906fab5717148e_prof);

        
        $__internal_bbaf0ac55fbc6a13cc80dbb04fde549709afbf303611a34b6063b4ca062d33fe->leave($__internal_bbaf0ac55fbc6a13cc80dbb04fde549709afbf303611a34b6063b4ca062d33fe_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_27a7715745494ea86dfe549751e478b60344f45d15590e76f57e2c3ff77a0c44 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_27a7715745494ea86dfe549751e478b60344f45d15590e76f57e2c3ff77a0c44->enter($__internal_27a7715745494ea86dfe549751e478b60344f45d15590e76f57e2c3ff77a0c44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_30f1e999b07fe521ce5ebfb77e4b5a408890d44a2ed7cfc3712e2ceba138c97c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_30f1e999b07fe521ce5ebfb77e4b5a408890d44a2ed7cfc3712e2ceba138c97c->enter($__internal_30f1e999b07fe521ce5ebfb77e4b5a408890d44a2ed7cfc3712e2ceba138c97c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        
        $__internal_30f1e999b07fe521ce5ebfb77e4b5a408890d44a2ed7cfc3712e2ceba138c97c->leave($__internal_30f1e999b07fe521ce5ebfb77e4b5a408890d44a2ed7cfc3712e2ceba138c97c_prof);

        
        $__internal_27a7715745494ea86dfe549751e478b60344f45d15590e76f57e2c3ff77a0c44->leave($__internal_27a7715745494ea86dfe549751e478b60344f45d15590e76f57e2c3ff77a0c44_prof);

    }

    // line 13
    public function block_list($context, array $blocks = array())
    {
        $__internal_ab0f3586d9b644f9654e40ac953f4e8e2431e5e89d088154f9481093e7426757 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ab0f3586d9b644f9654e40ac953f4e8e2431e5e89d088154f9481093e7426757->enter($__internal_ab0f3586d9b644f9654e40ac953f4e8e2431e5e89d088154f9481093e7426757_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_e645873ffcaaa50c9f4c0991db057b160a6950f163c2a073f8ed871f0e8e31c6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e645873ffcaaa50c9f4c0991db057b160a6950f163c2a073f8ed871f0e8e31c6->enter($__internal_e645873ffcaaa50c9f4c0991db057b160a6950f163c2a073f8ed871f0e8e31c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

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
        
        $__internal_e645873ffcaaa50c9f4c0991db057b160a6950f163c2a073f8ed871f0e8e31c6->leave($__internal_e645873ffcaaa50c9f4c0991db057b160a6950f163c2a073f8ed871f0e8e31c6_prof);

        
        $__internal_ab0f3586d9b644f9654e40ac953f4e8e2431e5e89d088154f9481093e7426757->leave($__internal_ab0f3586d9b644f9654e40ac953f4e8e2431e5e89d088154f9481093e7426757_prof);

    }

    // line 21
    public function block_item($context, array $blocks = array())
    {
        $__internal_c9c5b7aa962a95bb473f20455fc6781aa8e116079e2ff8536f6ee498edd2a1ee = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c9c5b7aa962a95bb473f20455fc6781aa8e116079e2ff8536f6ee498edd2a1ee->enter($__internal_c9c5b7aa962a95bb473f20455fc6781aa8e116079e2ff8536f6ee498edd2a1ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_2f66e18be2960d550a094ddd46c43cf7efae5b7fd2050c097bc042a3779a7131 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2f66e18be2960d550a094ddd46c43cf7efae5b7fd2050c097bc042a3779a7131->enter($__internal_2f66e18be2960d550a094ddd46c43cf7efae5b7fd2050c097bc042a3779a7131_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

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
        
        $__internal_2f66e18be2960d550a094ddd46c43cf7efae5b7fd2050c097bc042a3779a7131->leave($__internal_2f66e18be2960d550a094ddd46c43cf7efae5b7fd2050c097bc042a3779a7131_prof);

        
        $__internal_c9c5b7aa962a95bb473f20455fc6781aa8e116079e2ff8536f6ee498edd2a1ee->leave($__internal_c9c5b7aa962a95bb473f20455fc6781aa8e116079e2ff8536f6ee498edd2a1ee_prof);

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
            $__internal_2c67218a05ace7f7d133fb0922c23f5ac405571ba1d08ef6e76d1211a5efe0dc = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_2c67218a05ace7f7d133fb0922c23f5ac405571ba1d08ef6e76d1211a5efe0dc->enter($__internal_2c67218a05ace7f7d133fb0922c23f5ac405571ba1d08ef6e76d1211a5efe0dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_1535692eeaa28260c662ba06bbd148ce31df9351fb6ec94abe43986446171497 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_1535692eeaa28260c662ba06bbd148ce31df9351fb6ec94abe43986446171497->enter($__internal_1535692eeaa28260c662ba06bbd148ce31df9351fb6ec94abe43986446171497_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_1535692eeaa28260c662ba06bbd148ce31df9351fb6ec94abe43986446171497->leave($__internal_1535692eeaa28260c662ba06bbd148ce31df9351fb6ec94abe43986446171497_prof);

            
            $__internal_2c67218a05ace7f7d133fb0922c23f5ac405571ba1d08ef6e76d1211a5efe0dc->leave($__internal_2c67218a05ace7f7d133fb0922c23f5ac405571ba1d08ef6e76d1211a5efe0dc_prof);


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
