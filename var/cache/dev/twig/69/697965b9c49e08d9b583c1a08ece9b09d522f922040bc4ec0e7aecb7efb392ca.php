<?php

/* @Twig/Exception/exception.js.twig */
class __TwigTemplate_1724fb592a99345a15c500e0e83e965fe94b2c8a490529858e93f7c5b82c99e5 extends Twig_Template
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
        $__internal_e9f87199f5e1993fd5dba3abe856d2e7fc222d7fb97c0cc324be8b1fca21d3f8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e9f87199f5e1993fd5dba3abe856d2e7fc222d7fb97c0cc324be8b1fca21d3f8->enter($__internal_e9f87199f5e1993fd5dba3abe856d2e7fc222d7fb97c0cc324be8b1fca21d3f8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.js.twig"));

        $__internal_4a2fe6bd834c7bb03da8c46289390a7989a7eb2a8eeda0e107f98ffee4b35af9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4a2fe6bd834c7bb03da8c46289390a7989a7eb2a8eeda0e107f98ffee4b35af9->enter($__internal_4a2fe6bd834c7bb03da8c46289390a7989a7eb2a8eeda0e107f98ffee4b35af9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_include($this->env, $context, "@Twig/Exception/exception.txt.twig", array("exception" => ($context["exception"] ?? null)));
        echo "
*/
";
        
        $__internal_e9f87199f5e1993fd5dba3abe856d2e7fc222d7fb97c0cc324be8b1fca21d3f8->leave($__internal_e9f87199f5e1993fd5dba3abe856d2e7fc222d7fb97c0cc324be8b1fca21d3f8_prof);

        
        $__internal_4a2fe6bd834c7bb03da8c46289390a7989a7eb2a8eeda0e107f98ffee4b35af9->leave($__internal_4a2fe6bd834c7bb03da8c46289390a7989a7eb2a8eeda0e107f98ffee4b35af9_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("/*
{{ include('@Twig/Exception/exception.txt.twig', { exception: exception }) }}
*/
", "@Twig/Exception/exception.js.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.js.twig");
    }
}
