<?php

/* _flash.html.twig */
class __TwigTemplate_1a17fa8a45b1a21267201f5c77fe22f6a43de611dfd82e5f11af7451337d3e98 extends Twig_Template
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
        $__internal_3288d6d24ad2ae0f9065519ece9735469240429aedbb2a2a3876fcfaf743f4a7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3288d6d24ad2ae0f9065519ece9735469240429aedbb2a2a3876fcfaf743f4a7->enter($__internal_3288d6d24ad2ae0f9065519ece9735469240429aedbb2a2a3876fcfaf743f4a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "_flash.html.twig"));

        $__internal_2e63002df8f346f8a895546c30cf6ae057f633df5a68d80a240fad2ea4918843 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2e63002df8f346f8a895546c30cf6ae057f633df5a68d80a240fad2ea4918843->enter($__internal_2e63002df8f346f8a895546c30cf6ae057f633df5a68d80a240fad2ea4918843_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "_flash.html.twig"));

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
        
        $__internal_3288d6d24ad2ae0f9065519ece9735469240429aedbb2a2a3876fcfaf743f4a7->leave($__internal_3288d6d24ad2ae0f9065519ece9735469240429aedbb2a2a3876fcfaf743f4a7_prof);

        
        $__internal_2e63002df8f346f8a895546c30cf6ae057f633df5a68d80a240fad2ea4918843->leave($__internal_2e63002df8f346f8a895546c30cf6ae057f633df5a68d80a240fad2ea4918843_prof);

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
