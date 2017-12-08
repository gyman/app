<?php

/* :Menu:profile.html.twig */
class __TwigTemplate_f9d051eca219bdd6c48ba8b77be23fe5809cf1dc570510e3c5effed7440f5f8d extends Twig_Template
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
        $__internal_b1e2e9eec3ce27ebe7dca18561fa083a36448839b1ac7a8085c37dc6d427daa7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b1e2e9eec3ce27ebe7dca18561fa083a36448839b1ac7a8085c37dc6d427daa7->enter($__internal_b1e2e9eec3ce27ebe7dca18561fa083a36448839b1ac7a8085c37dc6d427daa7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:profile.html.twig"));

        $__internal_757f651a6238c41e475c350dbb782b0dacbf1716e7504f188db2c0ba39cb7545 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_757f651a6238c41e475c350dbb782b0dacbf1716e7504f188db2c0ba39cb7545->enter($__internal_757f651a6238c41e475c350dbb782b0dacbf1716e7504f188db2c0ba39cb7545_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:profile.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b1e2e9eec3ce27ebe7dca18561fa083a36448839b1ac7a8085c37dc6d427daa7->leave($__internal_b1e2e9eec3ce27ebe7dca18561fa083a36448839b1ac7a8085c37dc6d427daa7_prof);

        
        $__internal_757f651a6238c41e475c350dbb782b0dacbf1716e7504f188db2c0ba39cb7545->leave($__internal_757f651a6238c41e475c350dbb782b0dacbf1716e7504f188db2c0ba39cb7545_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_967003f8e9577462bf6f4e55e2760bee23747abc7be08787450d8cb639632ffb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_967003f8e9577462bf6f4e55e2760bee23747abc7be08787450d8cb639632ffb->enter($__internal_967003f8e9577462bf6f4e55e2760bee23747abc7be08787450d8cb639632ffb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_350065860f55e41c05e344091208556379feb0d8ace21031ea224fc4e82285db = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_350065860f55e41c05e344091208556379feb0d8ace21031ea224fc4e82285db->enter($__internal_350065860f55e41c05e344091208556379feb0d8ace21031ea224fc4e82285db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        
        $__internal_350065860f55e41c05e344091208556379feb0d8ace21031ea224fc4e82285db->leave($__internal_350065860f55e41c05e344091208556379feb0d8ace21031ea224fc4e82285db_prof);

        
        $__internal_967003f8e9577462bf6f4e55e2760bee23747abc7be08787450d8cb639632ffb->leave($__internal_967003f8e9577462bf6f4e55e2760bee23747abc7be08787450d8cb639632ffb_prof);

    }

    // line 13
    public function block_list($context, array $blocks = array())
    {
        $__internal_fd20b512a87da38a17db13dc04e16c1e1cd8f02699de3615b4b70a163e5e6351 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fd20b512a87da38a17db13dc04e16c1e1cd8f02699de3615b4b70a163e5e6351->enter($__internal_fd20b512a87da38a17db13dc04e16c1e1cd8f02699de3615b4b70a163e5e6351_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_a33e03b080d80dcc4da77edaaf53f2021b2c9a5319dcfa1eb6aa9b3257f32550 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a33e03b080d80dcc4da77edaaf53f2021b2c9a5319dcfa1eb6aa9b3257f32550->enter($__internal_a33e03b080d80dcc4da77edaaf53f2021b2c9a5319dcfa1eb6aa9b3257f32550_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        // line 14
        echo "    ";
        if (((twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "hasChildren", array()) &&  !(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()) === 0)) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayChildren", array()))) {
            // line 15
            echo "            ";
            $this->displayBlock("children", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_a33e03b080d80dcc4da77edaaf53f2021b2c9a5319dcfa1eb6aa9b3257f32550->leave($__internal_a33e03b080d80dcc4da77edaaf53f2021b2c9a5319dcfa1eb6aa9b3257f32550_prof);

        
        $__internal_fd20b512a87da38a17db13dc04e16c1e1cd8f02699de3615b4b70a163e5e6351->leave($__internal_fd20b512a87da38a17db13dc04e16c1e1cd8f02699de3615b4b70a163e5e6351_prof);

    }

    // line 19
    public function block_item($context, array $blocks = array())
    {
        $__internal_0474a499bcc4aa7da798555962e90db69058f3c6fe4cddddb5ec106f9a0c8906 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0474a499bcc4aa7da798555962e90db69058f3c6fe4cddddb5ec106f9a0c8906->enter($__internal_0474a499bcc4aa7da798555962e90db69058f3c6fe4cddddb5ec106f9a0c8906_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_35b28d8bb5df5062172bf979247340799321b772f598026fe04510ec1c71912a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_35b28d8bb5df5062172bf979247340799321b772f598026fe04510ec1c71912a->enter($__internal_35b28d8bb5df5062172bf979247340799321b772f598026fe04510ec1c71912a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

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
        
        $__internal_35b28d8bb5df5062172bf979247340799321b772f598026fe04510ec1c71912a->leave($__internal_35b28d8bb5df5062172bf979247340799321b772f598026fe04510ec1c71912a_prof);

        
        $__internal_0474a499bcc4aa7da798555962e90db69058f3c6fe4cddddb5ec106f9a0c8906->leave($__internal_0474a499bcc4aa7da798555962e90db69058f3c6fe4cddddb5ec106f9a0c8906_prof);

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
            $__internal_164ae0722e7c8221476c302837f79b0933f01c4b0b397bffbb166759574d3cc5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_164ae0722e7c8221476c302837f79b0933f01c4b0b397bffbb166759574d3cc5->enter($__internal_164ae0722e7c8221476c302837f79b0933f01c4b0b397bffbb166759574d3cc5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_ef6247d93e362b77f263b843b936d98a413b37cef2e145394957cf88701c4f82 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_ef6247d93e362b77f263b843b936d98a413b37cef2e145394957cf88701c4f82->enter($__internal_ef6247d93e362b77f263b843b936d98a413b37cef2e145394957cf88701c4f82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_ef6247d93e362b77f263b843b936d98a413b37cef2e145394957cf88701c4f82->leave($__internal_ef6247d93e362b77f263b843b936d98a413b37cef2e145394957cf88701c4f82_prof);

            
            $__internal_164ae0722e7c8221476c302837f79b0933f01c4b0b397bffbb166759574d3cc5->leave($__internal_164ae0722e7c8221476c302837f79b0933f01c4b0b397bffbb166759574d3cc5_prof);


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
