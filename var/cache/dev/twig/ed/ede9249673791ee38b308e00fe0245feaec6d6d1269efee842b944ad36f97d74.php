<?php

/* @Twig/Exception/trace.txt.twig */
class __TwigTemplate_4efd69d3713b25710ce2fb85838fe14ac4a511bdea651fd41635c5d005b7e778 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bb4e137337bde573c04fd26a60dc710ec42b8bb5721091cf0ad9fffb8ad6ef7e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bb4e137337bde573c04fd26a60dc710ec42b8bb5721091cf0ad9fffb8ad6ef7e->enter($__internal_bb4e137337bde573c04fd26a60dc710ec42b8bb5721091cf0ad9fffb8ad6ef7e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/trace.txt.twig"));

        $__internal_05291750de9193bb9c8d7ebc3c56cb98c2ff15128eee9ef95ec40fb32149724d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_05291750de9193bb9c8d7ebc3c56cb98c2ff15128eee9ef95ec40fb32149724d->enter($__internal_05291750de9193bb9c8d7ebc3c56cb98c2ff15128eee9ef95ec40fb32149724d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/trace.txt.twig"));

        // line 1
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "function", array())) {
            // line 2
            echo "at ";
            echo ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "class", array()) . twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "type", array())) . twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "function", array()));
            echo "(";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\CodeExtension')->formatArgs(twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "args", array()));
            echo ")";
        }
        // line 4
        if (( !twig_test_empty(((twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "file", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "file", array()), "")) : (""))) &&  !twig_test_empty(((twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "line", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "line", array()), "")) : (""))))) {
            // line 5
            echo ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "function", array())) ? ("
     (") : ("at "));
            echo twig_replace_filter(strip_tags($this->env->getExtension('Symfony\Bridge\Twig\Extension\CodeExtension')->formatFile(twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "file", array()), twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "line", array()))), array((" at line " . twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "line", array())) => ""));
            echo ":";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "line", array());
            echo ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["trace"] ?? null), "function", array())) ? (")") : (""));
        }
        
        $__internal_bb4e137337bde573c04fd26a60dc710ec42b8bb5721091cf0ad9fffb8ad6ef7e->leave($__internal_bb4e137337bde573c04fd26a60dc710ec42b8bb5721091cf0ad9fffb8ad6ef7e_prof);

        
        $__internal_05291750de9193bb9c8d7ebc3c56cb98c2ff15128eee9ef95ec40fb32149724d->leave($__internal_05291750de9193bb9c8d7ebc3c56cb98c2ff15128eee9ef95ec40fb32149724d_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/trace.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  34 => 4,  27 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if trace.function %}
at {{ trace.class ~ trace.type ~ trace.function }}({{ trace.args|format_args }})
{%- endif -%}
{% if trace.file|default('') is not empty and trace.line|default('') is not empty %}
  {{- trace.function ? '\\n     (' : 'at '}}{{ trace.file|format_file(trace.line)|striptags|replace({ (' at line ' ~ trace.line): '' }) }}:{{ trace.line }}{{ trace.function ? ')' }}
{%- endif %}
", "@Twig/Exception/trace.txt.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/trace.txt.twig");
    }
}
