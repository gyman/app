<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_f1f0a4fea79b1fea72d6f43e1486a3db46b7ad94b7286a47c44ebdb7df44ad90 extends Twig_Template
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
        $__internal_9f6dd6c0785f91cc7d2b8ff620b8565ae7e7bf4bd5bd69c7c3003632341d0d33 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9f6dd6c0785f91cc7d2b8ff620b8565ae7e7bf4bd5bd69c7c3003632341d0d33->enter($__internal_9f6dd6c0785f91cc7d2b8ff620b8565ae7e7bf4bd5bd69c7c3003632341d0d33_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_5c1b2265a4666a8c094d00e625b1322cde5474e48845c9c26c5edc577b9ba842 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5c1b2265a4666a8c094d00e625b1322cde5474e48845c9c26c5edc577b9ba842->enter($__internal_5c1b2265a4666a8c094d00e625b1322cde5474e48845c9c26c5edc577b9ba842_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9f6dd6c0785f91cc7d2b8ff620b8565ae7e7bf4bd5bd69c7c3003632341d0d33->leave($__internal_9f6dd6c0785f91cc7d2b8ff620b8565ae7e7bf4bd5bd69c7c3003632341d0d33_prof);

        
        $__internal_5c1b2265a4666a8c094d00e625b1322cde5474e48845c9c26c5edc577b9ba842->leave($__internal_5c1b2265a4666a8c094d00e625b1322cde5474e48845c9c26c5edc577b9ba842_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_f16132100d4ebbbbbcd533e90c058a081b9a3e21fb528d50df7068c26ea6ba90 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f16132100d4ebbbbbcd533e90c058a081b9a3e21fb528d50df7068c26ea6ba90->enter($__internal_f16132100d4ebbbbbcd533e90c058a081b9a3e21fb528d50df7068c26ea6ba90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_65ecc4816f996adf2e715123dc2ee51f75a889e27b7f37f4c7dd0dbd4bb326b9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_65ecc4816f996adf2e715123dc2ee51f75a889e27b7f37f4c7dd0dbd4bb326b9->enter($__internal_65ecc4816f996adf2e715123dc2ee51f75a889e27b7f37f4c7dd0dbd4bb326b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

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
        
        $__internal_65ecc4816f996adf2e715123dc2ee51f75a889e27b7f37f4c7dd0dbd4bb326b9->leave($__internal_65ecc4816f996adf2e715123dc2ee51f75a889e27b7f37f4c7dd0dbd4bb326b9_prof);

        
        $__internal_f16132100d4ebbbbbcd533e90c058a081b9a3e21fb528d50df7068c26ea6ba90->leave($__internal_f16132100d4ebbbbbcd533e90c058a081b9a3e21fb528d50df7068c26ea6ba90_prof);

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
