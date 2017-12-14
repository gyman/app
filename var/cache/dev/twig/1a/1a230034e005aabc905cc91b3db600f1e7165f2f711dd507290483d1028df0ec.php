<?php

/* :Menu:profile.html.twig */
class __TwigTemplate_8ef2f802807877eddd71cbfed03ce3a748b2a84a5e75b65b91d4d6da023a5b92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", ":Menu:profile.html.twig", 1);
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
        $__internal_127d186404cfdadaf5a882b09ccd6ec5ddc516d3b91019a5f975ac52a4608722 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_127d186404cfdadaf5a882b09ccd6ec5ddc516d3b91019a5f975ac52a4608722->enter($__internal_127d186404cfdadaf5a882b09ccd6ec5ddc516d3b91019a5f975ac52a4608722_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:profile.html.twig"));

        $__internal_19c88e9eb5f24a766f240d9c92bf285241f71e082c8cea0039f99012144d3566 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_19c88e9eb5f24a766f240d9c92bf285241f71e082c8cea0039f99012144d3566->enter($__internal_19c88e9eb5f24a766f240d9c92bf285241f71e082c8cea0039f99012144d3566_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:profile.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_127d186404cfdadaf5a882b09ccd6ec5ddc516d3b91019a5f975ac52a4608722->leave($__internal_127d186404cfdadaf5a882b09ccd6ec5ddc516d3b91019a5f975ac52a4608722_prof);

        
        $__internal_19c88e9eb5f24a766f240d9c92bf285241f71e082c8cea0039f99012144d3566->leave($__internal_19c88e9eb5f24a766f240d9c92bf285241f71e082c8cea0039f99012144d3566_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_3d0c7cbc54d537b8e4991c4df2bb47f3dd8c32713e9efb62bb8ad893fa2f4257 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3d0c7cbc54d537b8e4991c4df2bb47f3dd8c32713e9efb62bb8ad893fa2f4257->enter($__internal_3d0c7cbc54d537b8e4991c4df2bb47f3dd8c32713e9efb62bb8ad893fa2f4257_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_56e6d1045127cbc3da02a830ed7ddac73b9639a1f32ddd0fe9abc5fcc4dab9bc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_56e6d1045127cbc3da02a830ed7ddac73b9639a1f32ddd0fe9abc5fcc4dab9bc->enter($__internal_56e6d1045127cbc3da02a830ed7ddac73b9639a1f32ddd0fe9abc5fcc4dab9bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        
        $__internal_56e6d1045127cbc3da02a830ed7ddac73b9639a1f32ddd0fe9abc5fcc4dab9bc->leave($__internal_56e6d1045127cbc3da02a830ed7ddac73b9639a1f32ddd0fe9abc5fcc4dab9bc_prof);

        
        $__internal_3d0c7cbc54d537b8e4991c4df2bb47f3dd8c32713e9efb62bb8ad893fa2f4257->leave($__internal_3d0c7cbc54d537b8e4991c4df2bb47f3dd8c32713e9efb62bb8ad893fa2f4257_prof);

    }

    // line 13
    public function block_list($context, array $blocks = array())
    {
        $__internal_d9b57a004b32927dd89f3214f22707550f966a5c8ddeead468f7bdc414e9e9b6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d9b57a004b32927dd89f3214f22707550f966a5c8ddeead468f7bdc414e9e9b6->enter($__internal_d9b57a004b32927dd89f3214f22707550f966a5c8ddeead468f7bdc414e9e9b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_588285cadebb709df3b2ced67eb05e51276a857c9ddfac5a7830045a1665253c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_588285cadebb709df3b2ced67eb05e51276a857c9ddfac5a7830045a1665253c->enter($__internal_588285cadebb709df3b2ced67eb05e51276a857c9ddfac5a7830045a1665253c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        // line 14
        echo "    ";
        if (((twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "hasChildren", array()) &&  !(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()) === 0)) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayChildren", array()))) {
            // line 15
            echo "            ";
            $this->displayBlock("children", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_588285cadebb709df3b2ced67eb05e51276a857c9ddfac5a7830045a1665253c->leave($__internal_588285cadebb709df3b2ced67eb05e51276a857c9ddfac5a7830045a1665253c_prof);

        
        $__internal_d9b57a004b32927dd89f3214f22707550f966a5c8ddeead468f7bdc414e9e9b6->leave($__internal_d9b57a004b32927dd89f3214f22707550f966a5c8ddeead468f7bdc414e9e9b6_prof);

    }

    // line 19
    public function block_item($context, array $blocks = array())
    {
        $__internal_aa66795b6d100f6ec9f1be56c079bbed6b9bef90e7a3d94403ace208b6ae563a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_aa66795b6d100f6ec9f1be56c079bbed6b9bef90e7a3d94403ace208b6ae563a->enter($__internal_aa66795b6d100f6ec9f1be56c079bbed6b9bef90e7a3d94403ace208b6ae563a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_cd89d28ab4476dd884bff7293e221279612196ee9a3893f36766f3f41b0aa602 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cd89d28ab4476dd884bff7293e221279612196ee9a3893f36766f3f41b0aa602->enter($__internal_cd89d28ab4476dd884bff7293e221279612196ee9a3893f36766f3f41b0aa602_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        // line 20
        echo "    ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayed", array())) {
            // line 21
            echo "        ";
            // line 22
            $context["classes"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attribute", array(0 => "class"), "method"))) ? (array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 23
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "current", array())) {
                // line 24
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "currentClass", array())));
            } elseif (twig_get_attribute($this->env, $this->getSourceContext(),             // line 25
($context["item"] ?? null), "currentAncestor", array())) {
                // line 26
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "ancestorClass", array())));
            }
            // line 28
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "actsLikeFirst", array())) {
                // line 29
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "firstClass", array())));
            }
            // line 31
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "actsLikeLast", array())) {
                // line 32
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "lastClass", array())));
            }
            // line 34
            $context["attributes"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attributes", array());
            // line 35
            if ( !twig_test_empty(($context["classes"] ?? null))) {
                // line 36
                $context["attributes"] = twig_array_merge(($context["attributes"] ?? null), array("class" => twig_join_filter(($context["classes"] ?? null), " ")));
            }
            // line 38
            echo "        ";
            // line 39
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "uri", array())) && ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "current", array()) || twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "currentAsLink", array())))) {
                // line 40
                echo "            ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 42
                echo "            ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 44
            echo "        ";
            // line 45
            $context["childrenClasses"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttribute", array(0 => "class"), "method"))) ? (array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 46
            $context["childrenClasses"] = twig_array_merge(($context["childrenClasses"] ?? null), array(0 => ("menu_level_" . twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "level", array()))));
            // line 47
            $context["listAttributes"] = twig_array_merge(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttributes", array()), array("class" => twig_join_filter(($context["childrenClasses"] ?? null), " ")));
            // line 48
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_cd89d28ab4476dd884bff7293e221279612196ee9a3893f36766f3f41b0aa602->leave($__internal_cd89d28ab4476dd884bff7293e221279612196ee9a3893f36766f3f41b0aa602_prof);

        
        $__internal_aa66795b6d100f6ec9f1be56c079bbed6b9bef90e7a3d94403ace208b6ae563a->leave($__internal_aa66795b6d100f6ec9f1be56c079bbed6b9bef90e7a3d94403ace208b6ae563a_prof);

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
            $__internal_1211c741040ebad869839cc333bd50bd02ee224373d27017abb123a3d867aea0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_1211c741040ebad869839cc333bd50bd02ee224373d27017abb123a3d867aea0->enter($__internal_1211c741040ebad869839cc333bd50bd02ee224373d27017abb123a3d867aea0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_f56f2bbd2ec30c5defe061937214cf9f4b5c5c618c667f6c4ec869305de7265d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_f56f2bbd2ec30c5defe061937214cf9f4b5c5c618c667f6c4ec869305de7265d->enter($__internal_f56f2bbd2ec30c5defe061937214cf9f4b5c5c618c667f6c4ec869305de7265d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_f56f2bbd2ec30c5defe061937214cf9f4b5c5c618c667f6c4ec869305de7265d->leave($__internal_f56f2bbd2ec30c5defe061937214cf9f4b5c5c618c667f6c4ec869305de7265d_prof);

            
            $__internal_1211c741040ebad869839cc333bd50bd02ee224373d27017abb123a3d867aea0->leave($__internal_1211c741040ebad869839cc333bd50bd02ee224373d27017abb123a3d867aea0_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return ":Menu:profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 8,  185 => 7,  180 => 6,  162 => 5,  148 => 48,  146 => 47,  144 => 46,  142 => 45,  140 => 44,  136 => 42,  132 => 40,  130 => 39,  128 => 38,  125 => 36,  123 => 35,  121 => 34,  118 => 32,  116 => 31,  113 => 29,  111 => 28,  108 => 26,  106 => 25,  104 => 24,  102 => 23,  100 => 22,  98 => 21,  95 => 20,  86 => 19,  72 => 15,  69 => 14,  60 => 13,  42 => 3,  11 => 1,);
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
            {{ block('children') }}
    {% endif %}
{% endblock %}

{% block item %}
    {% if item.displayed %}
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
    {% endif %}
{% endblock %}
", ":Menu:profile.html.twig", "/vagrant/app/Resources/views/Menu/profile.html.twig");
    }
}
