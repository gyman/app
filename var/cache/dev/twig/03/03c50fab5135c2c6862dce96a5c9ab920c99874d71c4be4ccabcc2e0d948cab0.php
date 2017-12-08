<?php

/* GymanAppBundle::layout.html.twig */
class __TwigTemplate_3713489cf4e7a4ac4481af4341036d8948742e232f9fd391d1babc90c899e950 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "GymanAppBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fede76186ad69db45872678d8e47899bc434142dab565821e8e2319b5cda14ae = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fede76186ad69db45872678d8e47899bc434142dab565821e8e2319b5cda14ae->enter($__internal_fede76186ad69db45872678d8e47899bc434142dab565821e8e2319b5cda14ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle::layout.html.twig"));

        $__internal_f884af156680b6d7304fdb01756874398bab2b04b25a2a727710d5aa1ab59f0f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f884af156680b6d7304fdb01756874398bab2b04b25a2a727710d5aa1ab59f0f->enter($__internal_f884af156680b6d7304fdb01756874398bab2b04b25a2a727710d5aa1ab59f0f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fede76186ad69db45872678d8e47899bc434142dab565821e8e2319b5cda14ae->leave($__internal_fede76186ad69db45872678d8e47899bc434142dab565821e8e2319b5cda14ae_prof);

        
        $__internal_f884af156680b6d7304fdb01756874398bab2b04b25a2a727710d5aa1ab59f0f->leave($__internal_f884af156680b6d7304fdb01756874398bab2b04b25a2a727710d5aa1ab59f0f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_6d4c3db9e2887ba58a323acb4e46fd551ca05a395baa8b48237f39ec746feeeb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6d4c3db9e2887ba58a323acb4e46fd551ca05a395baa8b48237f39ec746feeeb->enter($__internal_6d4c3db9e2887ba58a323acb4e46fd551ca05a395baa8b48237f39ec746feeeb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_bff2c353936f69d167afbba7368b5d4e2e2b19d7e41cc0987191c68fcf1df755 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bff2c353936f69d167afbba7368b5d4e2e2b19d7e41cc0987191c68fcf1df755->enter($__internal_bff2c353936f69d167afbba7368b5d4e2e2b19d7e41cc0987191c68fcf1df755_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo "Użytkownik";
        echo "
";
        
        $__internal_bff2c353936f69d167afbba7368b5d4e2e2b19d7e41cc0987191c68fcf1df755->leave($__internal_bff2c353936f69d167afbba7368b5d4e2e2b19d7e41cc0987191c68fcf1df755_prof);

        
        $__internal_6d4c3db9e2887ba58a323acb4e46fd551ca05a395baa8b48237f39ec746feeeb->leave($__internal_6d4c3db9e2887ba58a323acb4e46fd551ca05a395baa8b48237f39ec746feeeb_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"::base.html.twig\" %}

{% block title %}
    {{ parent() }} - {{ \"Użytkownik\" }}
{% endblock title %}

", "GymanAppBundle::layout.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/layout.html.twig");
    }
}
