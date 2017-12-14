<?php

/* :Menu:profile.html.twig */
class __TwigTemplate_22dd595c8ce25a31dc59623302830b04e188c1faaad1d7aa62551473ef10a33b extends Twig_Template
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
        $__internal_a07f9c1689f47009255d4ec1d0575ad40c33d8ee1051ef9cbbf93f83c9a63418 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a07f9c1689f47009255d4ec1d0575ad40c33d8ee1051ef9cbbf93f83c9a63418->enter($__internal_a07f9c1689f47009255d4ec1d0575ad40c33d8ee1051ef9cbbf93f83c9a63418_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:profile.html.twig"));

        $__internal_e49d579da9b4da6725d737f8586ccc25a5abf3427f5cf345a99c98200df96fc3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e49d579da9b4da6725d737f8586ccc25a5abf3427f5cf345a99c98200df96fc3->enter($__internal_e49d579da9b4da6725d737f8586ccc25a5abf3427f5cf345a99c98200df96fc3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:profile.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a07f9c1689f47009255d4ec1d0575ad40c33d8ee1051ef9cbbf93f83c9a63418->leave($__internal_a07f9c1689f47009255d4ec1d0575ad40c33d8ee1051ef9cbbf93f83c9a63418_prof);

        
        $__internal_e49d579da9b4da6725d737f8586ccc25a5abf3427f5cf345a99c98200df96fc3->leave($__internal_e49d579da9b4da6725d737f8586ccc25a5abf3427f5cf345a99c98200df96fc3_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_269e5be87444511ebddc9df5155a9a708d25aa6dfb71211342d05247ac659d65 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_269e5be87444511ebddc9df5155a9a708d25aa6dfb71211342d05247ac659d65->enter($__internal_269e5be87444511ebddc9df5155a9a708d25aa6dfb71211342d05247ac659d65_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_6c04c6ff7595558a79cd6914cf2ae256c8206927ad58a6bb8d2ef3a688dfcffa = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6c04c6ff7595558a79cd6914cf2ae256c8206927ad58a6bb8d2ef3a688dfcffa->enter($__internal_6c04c6ff7595558a79cd6914cf2ae256c8206927ad58a6bb8d2ef3a688dfcffa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        
        $__internal_6c04c6ff7595558a79cd6914cf2ae256c8206927ad58a6bb8d2ef3a688dfcffa->leave($__internal_6c04c6ff7595558a79cd6914cf2ae256c8206927ad58a6bb8d2ef3a688dfcffa_prof);

        
        $__internal_269e5be87444511ebddc9df5155a9a708d25aa6dfb71211342d05247ac659d65->leave($__internal_269e5be87444511ebddc9df5155a9a708d25aa6dfb71211342d05247ac659d65_prof);

    }

    // line 13
    public function block_list($context, array $blocks = array())
    {
        $__internal_8b0469ebd8e22a07453fe9ac3126e1ed5ca30319198379437c56c65cf56e5ff4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8b0469ebd8e22a07453fe9ac3126e1ed5ca30319198379437c56c65cf56e5ff4->enter($__internal_8b0469ebd8e22a07453fe9ac3126e1ed5ca30319198379437c56c65cf56e5ff4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_0a83a8ff7befe50469bd20078338fd8e7a775d046643f6ad182da7929888633f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0a83a8ff7befe50469bd20078338fd8e7a775d046643f6ad182da7929888633f->enter($__internal_0a83a8ff7befe50469bd20078338fd8e7a775d046643f6ad182da7929888633f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        // line 14
        echo "    ";
        if (((twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "hasChildren", array()) &&  !(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()) === 0)) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayChildren", array()))) {
            // line 15
            echo "            ";
            $this->displayBlock("children", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_0a83a8ff7befe50469bd20078338fd8e7a775d046643f6ad182da7929888633f->leave($__internal_0a83a8ff7befe50469bd20078338fd8e7a775d046643f6ad182da7929888633f_prof);

        
        $__internal_8b0469ebd8e22a07453fe9ac3126e1ed5ca30319198379437c56c65cf56e5ff4->leave($__internal_8b0469ebd8e22a07453fe9ac3126e1ed5ca30319198379437c56c65cf56e5ff4_prof);

    }

    // line 19
    public function block_item($context, array $blocks = array())
    {
        $__internal_d22ba5aeac70baa82bcb0656d73117bde85bd42f1f599e12935a8c0e0fe3f71b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d22ba5aeac70baa82bcb0656d73117bde85bd42f1f599e12935a8c0e0fe3f71b->enter($__internal_d22ba5aeac70baa82bcb0656d73117bde85bd42f1f599e12935a8c0e0fe3f71b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_9f16f55d97c6adfa50e7334fb80d8f6aa9ea307e2fcfd93a205fa6ae517d94c6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9f16f55d97c6adfa50e7334fb80d8f6aa9ea307e2fcfd93a205fa6ae517d94c6->enter($__internal_9f16f55d97c6adfa50e7334fb80d8f6aa9ea307e2fcfd93a205fa6ae517d94c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

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
        
        $__internal_9f16f55d97c6adfa50e7334fb80d8f6aa9ea307e2fcfd93a205fa6ae517d94c6->leave($__internal_9f16f55d97c6adfa50e7334fb80d8f6aa9ea307e2fcfd93a205fa6ae517d94c6_prof);

        
        $__internal_d22ba5aeac70baa82bcb0656d73117bde85bd42f1f599e12935a8c0e0fe3f71b->leave($__internal_d22ba5aeac70baa82bcb0656d73117bde85bd42f1f599e12935a8c0e0fe3f71b_prof);

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
            $__internal_fd745f3fe3587eab6be2f0601d7c8242d1cd06f914293dd981bb4fca2f92e937 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_fd745f3fe3587eab6be2f0601d7c8242d1cd06f914293dd981bb4fca2f92e937->enter($__internal_fd745f3fe3587eab6be2f0601d7c8242d1cd06f914293dd981bb4fca2f92e937_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_0a70f71e39663af5fe57d77c519635722f29a1f65272631c734cde976f2d27b5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_0a70f71e39663af5fe57d77c519635722f29a1f65272631c734cde976f2d27b5->enter($__internal_0a70f71e39663af5fe57d77c519635722f29a1f65272631c734cde976f2d27b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_0a70f71e39663af5fe57d77c519635722f29a1f65272631c734cde976f2d27b5->leave($__internal_0a70f71e39663af5fe57d77c519635722f29a1f65272631c734cde976f2d27b5_prof);

            
            $__internal_fd745f3fe3587eab6be2f0601d7c8242d1cd06f914293dd981bb4fca2f92e937->leave($__internal_fd745f3fe3587eab6be2f0601d7c8242d1cd06f914293dd981bb4fca2f92e937_prof);


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
