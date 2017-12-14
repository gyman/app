<?php

/* @Twig/Exception/traces.txt.twig */
class __TwigTemplate_421d736000068694c77f43df086bf14e5fc3027c5b3c2e965d53c70c629e1c12 extends Twig_Template
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
        $__internal_c151327fb71bba21b8970ad16561abe9249cad0a2ea7e792792a4cc20558fa01 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c151327fb71bba21b8970ad16561abe9249cad0a2ea7e792792a4cc20558fa01->enter($__internal_c151327fb71bba21b8970ad16561abe9249cad0a2ea7e792792a4cc20558fa01_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        $__internal_66d6d8b5fd8d0788b0de552e00a6770bdb495a68008b7dff908097faf5f67233 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_66d6d8b5fd8d0788b0de552e00a6770bdb495a68008b7dff908097faf5f67233->enter($__internal_66d6d8b5fd8d0788b0de552e00a6770bdb495a68008b7dff908097faf5f67233_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "trace", array()))) {
            // line 2
            echo "<pre class=\"stacktrace\">
";
            // line 3
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "class", array());
            echo ":
";
            // line 4
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "message", array()))) {
                // line 5
                echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "message", array());
                echo "
";
            }
            // line 7
            echo "
";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 9
                echo "  ";
                echo twig_include($this->env, $context, "@Twig/Exception/trace.txt.twig", array("trace" => $context["trace"]), false);
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "</pre>
";
        }
        
        $__internal_c151327fb71bba21b8970ad16561abe9249cad0a2ea7e792792a4cc20558fa01->leave($__internal_c151327fb71bba21b8970ad16561abe9249cad0a2ea7e792792a4cc20558fa01_prof);

        
        $__internal_66d6d8b5fd8d0788b0de552e00a6770bdb495a68008b7dff908097faf5f67233->leave($__internal_66d6d8b5fd8d0788b0de552e00a6770bdb495a68008b7dff908097faf5f67233_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 11,  48 => 9,  44 => 8,  41 => 7,  36 => 5,  34 => 4,  30 => 3,  27 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if exception.trace|length %}
<pre class=\"stacktrace\">
{{ exception.class }}:
{% if exception.message is not empty %}
    {{- exception.message }}
{% endif %}

{% for trace in exception.trace %}
  {{ include('@Twig/Exception/trace.txt.twig', { trace: trace }, with_context = false) }}
{% endfor %}
</pre>
{% endif %}
", "@Twig/Exception/traces.txt.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/traces.txt.twig");
    }
}
