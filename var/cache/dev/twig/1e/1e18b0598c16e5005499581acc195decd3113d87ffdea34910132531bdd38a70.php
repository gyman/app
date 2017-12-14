<?php

/* GymanSettingsBundle:Default:sections.html.twig */
class __TwigTemplate_12942e3af28e07c612a55d7b3ddca3c2c8b4e15daf40f3633e0b681dd133cf36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanSettingsBundle::layout.html.twig", "GymanSettingsBundle:Default:sections.html.twig", 1);
        $this->blocks = array(
            'settings_page' => array($this, 'block_settings_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanSettingsBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_83cff8c6d985de4d997c206f8247ba8a4ff04d5da3e0bbcdf3c3b9129b238fc9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_83cff8c6d985de4d997c206f8247ba8a4ff04d5da3e0bbcdf3c3b9129b238fc9->enter($__internal_83cff8c6d985de4d997c206f8247ba8a4ff04d5da3e0bbcdf3c3b9129b238fc9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:sections.html.twig"));

        $__internal_c954bacd148f50952bdca9fc91a634226d7857b860162bd040d9f00356b2683e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c954bacd148f50952bdca9fc91a634226d7857b860162bd040d9f00356b2683e->enter($__internal_c954bacd148f50952bdca9fc91a634226d7857b860162bd040d9f00356b2683e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:sections.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_83cff8c6d985de4d997c206f8247ba8a4ff04d5da3e0bbcdf3c3b9129b238fc9->leave($__internal_83cff8c6d985de4d997c206f8247ba8a4ff04d5da3e0bbcdf3c3b9129b238fc9_prof);

        
        $__internal_c954bacd148f50952bdca9fc91a634226d7857b860162bd040d9f00356b2683e->leave($__internal_c954bacd148f50952bdca9fc91a634226d7857b860162bd040d9f00356b2683e_prof);

    }

    // line 3
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_7197adfe7b701722fe3612613d258f27a3db44c5bd89214a93546d5d61ef6701 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7197adfe7b701722fe3612613d258f27a3db44c5bd89214a93546d5d61ef6701->enter($__internal_7197adfe7b701722fe3612613d258f27a3db44c5bd89214a93546d5d61ef6701_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_39645649830f9ad3e63a5d56bf9b0d1cea2ad375514036444856d0da98effd85 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_39645649830f9ad3e63a5d56bf9b0d1cea2ad375514036444856d0da98effd85->enter($__internal_39645649830f9ad3e63a5d56bf9b0d1cea2ad375514036444856d0da98effd85_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        // line 4
        echo "    <table>
        <tbody>
            ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sections"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 7
            echo "                <tr><td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["section"], "title", array()), "html", null, true);
            echo "</td></tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "        </tbody>
    </table>

    ";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context);
        echo "
";
        
        $__internal_39645649830f9ad3e63a5d56bf9b0d1cea2ad375514036444856d0da98effd85->leave($__internal_39645649830f9ad3e63a5d56bf9b0d1cea2ad375514036444856d0da98effd85_prof);

        
        $__internal_7197adfe7b701722fe3612613d258f27a3db44c5bd89214a93546d5d61ef6701->leave($__internal_7197adfe7b701722fe3612613d258f27a3db44c5bd89214a93546d5d61ef6701_prof);

    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle:Default:sections.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 12,  66 => 9,  57 => 7,  53 => 6,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanSettingsBundle::layout.html.twig' %}
{# @var section \\Gyman\\Domain\\Section #}
{% block settings_page %}
    <table>
        <tbody>
            {% for section in sections %}
                <tr><td>{{ section.title }}</td></tr>
            {% endfor %}
        </tbody>
    </table>

    {{ dump() }}
{% endblock settings_page %}
", "GymanSettingsBundle:Default:sections.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/Default/sections.html.twig");
    }
}
