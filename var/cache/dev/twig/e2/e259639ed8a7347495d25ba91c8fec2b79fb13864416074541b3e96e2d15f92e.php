<?php

/* @WebProfiler/Profiler/header.html.twig */
class __TwigTemplate_3867ecfe9dd45171e83a1c3bf00b78e23e5491dca3a9cb24cfa916e43737c990 extends Twig_Template
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
        $__internal_45783b2cc45333a15f5a0fbd8d627e16e2c09b0c2f055cca372680875f2c2fe3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_45783b2cc45333a15f5a0fbd8d627e16e2c09b0c2f055cca372680875f2c2fe3->enter($__internal_45783b2cc45333a15f5a0fbd8d627e16e2c09b0c2f055cca372680875f2c2fe3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/header.html.twig"));

        $__internal_2db59b21a18875f29b6949519e724513b9e30b06dba8c08d8703ae3ed6def578 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2db59b21a18875f29b6949519e724513b9e30b06dba8c08d8703ae3ed6def578->enter($__internal_2db59b21a18875f29b6949519e724513b9e30b06dba8c08d8703ae3ed6def578_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/header.html.twig"));

        // line 1
        echo "<div id=\"header\">
    <div class=\"container\">
        <h1>";
        // line 3
        echo twig_include($this->env, $context, "@WebProfiler/Icon/symfony.svg");
        echo " Symfony <span>Profiler</span></h1>

        <div class=\"search\">
            <form method=\"get\" action=\"https://symfony.com/search\" target=\"_blank\">
                <div class=\"form-row\">
                    <input name=\"q\" id=\"search-id\" type=\"search\" placeholder=\"search on symfony.com\">
                    <button type=\"submit\" class=\"btn\">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
";
        
        $__internal_45783b2cc45333a15f5a0fbd8d627e16e2c09b0c2f055cca372680875f2c2fe3->leave($__internal_45783b2cc45333a15f5a0fbd8d627e16e2c09b0c2f055cca372680875f2c2fe3_prof);

        
        $__internal_2db59b21a18875f29b6949519e724513b9e30b06dba8c08d8703ae3ed6def578->leave($__internal_2db59b21a18875f29b6949519e724513b9e30b06dba8c08d8703ae3ed6def578_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"header\">
    <div class=\"container\">
        <h1>{{ include('@WebProfiler/Icon/symfony.svg') }} Symfony <span>Profiler</span></h1>

        <div class=\"search\">
            <form method=\"get\" action=\"https://symfony.com/search\" target=\"_blank\">
                <div class=\"form-row\">
                    <input name=\"q\" id=\"search-id\" type=\"search\" placeholder=\"search on symfony.com\">
                    <button type=\"submit\" class=\"btn\">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
", "@WebProfiler/Profiler/header.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/header.html.twig");
    }
}
