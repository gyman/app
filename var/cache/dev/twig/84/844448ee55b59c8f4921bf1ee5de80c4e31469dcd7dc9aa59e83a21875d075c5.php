<?php

/* GymanSettingsBundle:Menu:main.html.twig */
class __TwigTemplate_9623fa363237b4a9adabb886d1d56a80f39ba456e114312468280a79ad3cd71d extends Twig_Template
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
        $__internal_3ee9e9c6ad540ccfbd928901049a0fe2779ea329316a5c3b8240e602028d0b44 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3ee9e9c6ad540ccfbd928901049a0fe2779ea329316a5c3b8240e602028d0b44->enter($__internal_3ee9e9c6ad540ccfbd928901049a0fe2779ea329316a5c3b8240e602028d0b44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Menu:main.html.twig"));

        $__internal_8a7159ed89f739fd8c0d6b26c7715084f4150f8a052a4e4761401e0ab18db90c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8a7159ed89f739fd8c0d6b26c7715084f4150f8a052a4e4761401e0ab18db90c->enter($__internal_8a7159ed89f739fd8c0d6b26c7715084f4150f8a052a4e4761401e0ab18db90c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Menu:main.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3ee9e9c6ad540ccfbd928901049a0fe2779ea329316a5c3b8240e602028d0b44->leave($__internal_3ee9e9c6ad540ccfbd928901049a0fe2779ea329316a5c3b8240e602028d0b44_prof);

        
        $__internal_8a7159ed89f739fd8c0d6b26c7715084f4150f8a052a4e4761401e0ab18db90c->leave($__internal_8a7159ed89f739fd8c0d6b26c7715084f4150f8a052a4e4761401e0ab18db90c_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_453fa26ae95e7f5b53f541b1615849de9f5c5dc9035a0b716ea1f8586f76f315 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_453fa26ae95e7f5b53f541b1615849de9f5c5dc9035a0b716ea1f8586f76f315->enter($__internal_453fa26ae95e7f5b53f541b1615849de9f5c5dc9035a0b716ea1f8586f76f315_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_ad0ca12c8fe3a82c8d470f3cd2808bf7fcccd60709c13ed556c48c9dfaf5715f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ad0ca12c8fe3a82c8d470f3cd2808bf7fcccd60709c13ed556c48c9dfaf5715f->enter($__internal_ad0ca12c8fe3a82c8d470f3cd2808bf7fcccd60709c13ed556c48c9dfaf5715f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        
        $__internal_ad0ca12c8fe3a82c8d470f3cd2808bf7fcccd60709c13ed556c48c9dfaf5715f->leave($__internal_ad0ca12c8fe3a82c8d470f3cd2808bf7fcccd60709c13ed556c48c9dfaf5715f_prof);

        
        $__internal_453fa26ae95e7f5b53f541b1615849de9f5c5dc9035a0b716ea1f8586f76f315->leave($__internal_453fa26ae95e7f5b53f541b1615849de9f5c5dc9035a0b716ea1f8586f76f315_prof);

    }

    // line 13
    public function block_list($context, array $blocks = array())
    {
        $__internal_cc5edb2c1299763f81f56f2954475c3192880cec9e6fe68780d10396788a89fe = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cc5edb2c1299763f81f56f2954475c3192880cec9e6fe68780d10396788a89fe->enter($__internal_cc5edb2c1299763f81f56f2954475c3192880cec9e6fe68780d10396788a89fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_989d3fd9c000de8d42b1d2223d6ee606c36dd7038200acad930c99d8623d6336 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_989d3fd9c000de8d42b1d2223d6ee606c36dd7038200acad930c99d8623d6336->enter($__internal_989d3fd9c000de8d42b1d2223d6ee606c36dd7038200acad930c99d8623d6336_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

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
        
        $__internal_989d3fd9c000de8d42b1d2223d6ee606c36dd7038200acad930c99d8623d6336->leave($__internal_989d3fd9c000de8d42b1d2223d6ee606c36dd7038200acad930c99d8623d6336_prof);

        
        $__internal_cc5edb2c1299763f81f56f2954475c3192880cec9e6fe68780d10396788a89fe->leave($__internal_cc5edb2c1299763f81f56f2954475c3192880cec9e6fe68780d10396788a89fe_prof);

    }

    // line 21
    public function block_item($context, array $blocks = array())
    {
        $__internal_19d2aaa1f053352265c564c48d5254df7cdc69559b5e9a1537237f58abe282c8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_19d2aaa1f053352265c564c48d5254df7cdc69559b5e9a1537237f58abe282c8->enter($__internal_19d2aaa1f053352265c564c48d5254df7cdc69559b5e9a1537237f58abe282c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_324dd132495db11a194810c5d4dca6dff09f3ef573062b6f134e20ca3eb63291 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_324dd132495db11a194810c5d4dca6dff09f3ef573062b6f134e20ca3eb63291->enter($__internal_324dd132495db11a194810c5d4dca6dff09f3ef573062b6f134e20ca3eb63291_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

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
        
        $__internal_324dd132495db11a194810c5d4dca6dff09f3ef573062b6f134e20ca3eb63291->leave($__internal_324dd132495db11a194810c5d4dca6dff09f3ef573062b6f134e20ca3eb63291_prof);

        
        $__internal_19d2aaa1f053352265c564c48d5254df7cdc69559b5e9a1537237f58abe282c8->leave($__internal_19d2aaa1f053352265c564c48d5254df7cdc69559b5e9a1537237f58abe282c8_prof);

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
            $__internal_5a77f7711cb5392c5523f0eeb84f5e9795b0f969cda3b47212759e5f9ab1284a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_5a77f7711cb5392c5523f0eeb84f5e9795b0f969cda3b47212759e5f9ab1284a->enter($__internal_5a77f7711cb5392c5523f0eeb84f5e9795b0f969cda3b47212759e5f9ab1284a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_7fc5aaa5f6e5b489371880185dc5205ef9d85e0e477a51d348fcb578475a83ec = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_7fc5aaa5f6e5b489371880185dc5205ef9d85e0e477a51d348fcb578475a83ec->enter($__internal_7fc5aaa5f6e5b489371880185dc5205ef9d85e0e477a51d348fcb578475a83ec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_7fc5aaa5f6e5b489371880185dc5205ef9d85e0e477a51d348fcb578475a83ec->leave($__internal_7fc5aaa5f6e5b489371880185dc5205ef9d85e0e477a51d348fcb578475a83ec_prof);

            
            $__internal_5a77f7711cb5392c5523f0eeb84f5e9795b0f969cda3b47212759e5f9ab1284a->leave($__internal_5a77f7711cb5392c5523f0eeb84f5e9795b0f969cda3b47212759e5f9ab1284a_prof);


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
