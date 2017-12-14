<?php

/* _flash.html.twig */
class __TwigTemplate_5cca53c2372d76897ac3af71b5273624e919bd932654891db5842818cf857c71 extends Twig_Template
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
        $__internal_90b92966bc0dbf715f0843f6bea1df12a321b7b0e5ab48a1aa2679f9084e65b6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_90b92966bc0dbf715f0843f6bea1df12a321b7b0e5ab48a1aa2679f9084e65b6->enter($__internal_90b92966bc0dbf715f0843f6bea1df12a321b7b0e5ab48a1aa2679f9084e65b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "_flash.html.twig"));

        $__internal_ba59d5065926aff1ca25d4b6cdce2fdb58a6c3a42c5c6ea1d56b212ecd9f80a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ba59d5065926aff1ca25d4b6cdce2fdb58a6c3a42c5c6ea1d56b212ecd9f80a2->enter($__internal_ba59d5065926aff1ca25d4b6cdce2fdb58a6c3a42c5c6ea1d56b212ecd9f80a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "_flash.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 2
            echo "    <div class=\"alert alert-success flash-notice\">
        ";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($context["flashMessage"]), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "
";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 8
            echo "    <div class=\"alert alert-danger flash-notice\">
        ";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($context["flashMessage"]), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_90b92966bc0dbf715f0843f6bea1df12a321b7b0e5ab48a1aa2679f9084e65b6->leave($__internal_90b92966bc0dbf715f0843f6bea1df12a321b7b0e5ab48a1aa2679f9084e65b6_prof);

        
        $__internal_ba59d5065926aff1ca25d4b6cdce2fdb58a6c3a42c5c6ea1d56b212ecd9f80a2->leave($__internal_ba59d5065926aff1ca25d4b6cdce2fdb58a6c3a42c5c6ea1d56b212ecd9f80a2_prof);

    }

    public function getTemplateName()
    {
        return "_flash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 9,  48 => 8,  44 => 7,  41 => 6,  32 => 3,  29 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for flashMessage in app.session.flashbag.get('success') %}
    <div class=\"alert alert-success flash-notice\">
        {{ flashMessage|trans }}
    </div>
{% endfor %}

{% for flashMessage in app.session.flashbag.get('error') %}
    <div class=\"alert alert-danger flash-notice\">
        {{ flashMessage|trans }}
    </div>
{% endfor %}
", "_flash.html.twig", "/vagrant/app/Resources/views/_flash.html.twig");
    }
}
