<?php

/* @Twig/Exception/exception.txt.twig */
class __TwigTemplate_70a18de0096e0a9004a22d9f63cda4dfd1ab12e2de591a018432620179c9ab14 extends Twig_Template
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
        $__internal_f4690becd3f116510875a0abaedc911bbebb2b4aa514994ec83dea07fef3e7a7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f4690becd3f116510875a0abaedc911bbebb2b4aa514994ec83dea07fef3e7a7->enter($__internal_f4690becd3f116510875a0abaedc911bbebb2b4aa514994ec83dea07fef3e7a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.txt.twig"));

        $__internal_4e2b41c64be0ac4216b674fcc5058a6303d620a2d7ce1a82727de36f5b67c050 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4e2b41c64be0ac4216b674fcc5058a6303d620a2d7ce1a82727de36f5b67c050->enter($__internal_4e2b41c64be0ac4216b674fcc5058a6303d620a2d7ce1a82727de36f5b67c050_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.txt.twig"));

        // line 1
        echo "[exception] ";
        echo ((((($context["status_code"] ?? null) . " | ") . ($context["status_text"] ?? null)) . " | ") . twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "class", array()));
        echo "
[message] ";
        // line 2
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "message", array());
        echo "
";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "toarray", array()));
        foreach ($context['_seq'] as $context["i"] => $context["e"]) {
            // line 4
            echo "[";
            echo ($context["i"] + 1);
            echo "] ";
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["e"], "class", array());
            echo ": ";
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["e"], "message", array());
            echo "
";
            // line 5
            echo twig_include($this->env, $context, "@Twig/Exception/traces.txt.twig", array("exception" => $context["e"]), false);
            echo "

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_f4690becd3f116510875a0abaedc911bbebb2b4aa514994ec83dea07fef3e7a7->leave($__internal_f4690becd3f116510875a0abaedc911bbebb2b4aa514994ec83dea07fef3e7a7_prof);

        
        $__internal_4e2b41c64be0ac4216b674fcc5058a6303d620a2d7ce1a82727de36f5b67c050->leave($__internal_4e2b41c64be0ac4216b674fcc5058a6303d620a2d7ce1a82727de36f5b67c050_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 5,  38 => 4,  34 => 3,  30 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("[exception] {{ status_code ~ ' | ' ~ status_text ~ ' | ' ~ exception.class }}
[message] {{ exception.message }}
{% for i, e in exception.toarray %}
[{{ i + 1 }}] {{ e.class }}: {{ e.message }}
{{ include('@Twig/Exception/traces.txt.twig', { exception: e }, with_context = false) }}

{% endfor %}
", "@Twig/Exception/exception.txt.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.txt.twig");
    }
}
