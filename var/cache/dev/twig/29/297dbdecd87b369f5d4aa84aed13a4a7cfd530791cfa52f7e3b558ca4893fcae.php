<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_09e9b66e22bf25c51c30bb17302d6f3822fb5cc26c82a070761372ec3e9e3629 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/ajax.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e014153b3d0d61ab3f9954743216b56c08522cb5b1b34d345b9e5058cf6fd6e0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e014153b3d0d61ab3f9954743216b56c08522cb5b1b34d345b9e5058cf6fd6e0->enter($__internal_e014153b3d0d61ab3f9954743216b56c08522cb5b1b34d345b9e5058cf6fd6e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_9c88831a13b648bc8acf62798452ca33702efcc4815963c656896a94e49a1888 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9c88831a13b648bc8acf62798452ca33702efcc4815963c656896a94e49a1888->enter($__internal_9c88831a13b648bc8acf62798452ca33702efcc4815963c656896a94e49a1888_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e014153b3d0d61ab3f9954743216b56c08522cb5b1b34d345b9e5058cf6fd6e0->leave($__internal_e014153b3d0d61ab3f9954743216b56c08522cb5b1b34d345b9e5058cf6fd6e0_prof);

        
        $__internal_9c88831a13b648bc8acf62798452ca33702efcc4815963c656896a94e49a1888->leave($__internal_9c88831a13b648bc8acf62798452ca33702efcc4815963c656896a94e49a1888_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_19f0e00389f3671278ec1b09e07de2b8c814463648d39c62eedfe3849cc58378 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_19f0e00389f3671278ec1b09e07de2b8c814463648d39c62eedfe3849cc58378->enter($__internal_19f0e00389f3671278ec1b09e07de2b8c814463648d39c62eedfe3849cc58378_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_c8b5095b939e4bc678c15cda01c2adce5c82636a29e956b6dbb8d0835c6dcc95 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c8b5095b939e4bc678c15cda01c2adce5c82636a29e956b6dbb8d0835c6dcc95->enter($__internal_c8b5095b939e4bc678c15cda01c2adce5c82636a29e956b6dbb8d0835c6dcc95_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        echo twig_include($this->env, $context, "@WebProfiler/Icon/ajax.svg");
        echo "
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "
    ";
        // line 9
        $context["text"] = ('' === $tmp = "        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => false));
        echo "
";
        
        $__internal_c8b5095b939e4bc678c15cda01c2adce5c82636a29e956b6dbb8d0835c6dcc95->leave($__internal_c8b5095b939e4bc678c15cda01c2adce5c82636a29e956b6dbb8d0835c6dcc95_prof);

        
        $__internal_19f0e00389f3671278ec1b09e07de2b8c814463648d39c62eedfe3849cc58378->leave($__internal_19f0e00389f3671278ec1b09e07de2b8c814463648d39c62eedfe3849cc58378_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 30,  82 => 29,  62 => 9,  59 => 8,  52 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% set icon %}
        {{ include('@WebProfiler/Icon/ajax.svg') }}
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: false }) }}
{% endblock %}
", "@WebProfiler/Collector/ajax.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/ajax.html.twig");
    }
}
