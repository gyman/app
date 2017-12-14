<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_b0f337953c4d1c45037c9e3204b007566c1efa9dbd391af3a00d868ff497cf72 extends Twig_Template
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
        $__internal_154e350e9475bfb752f058f88fb5bfe3976e1611c9f18c82a5cada6bf9a45146 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_154e350e9475bfb752f058f88fb5bfe3976e1611c9f18c82a5cada6bf9a45146->enter($__internal_154e350e9475bfb752f058f88fb5bfe3976e1611c9f18c82a5cada6bf9a45146_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_ba733a4379a73c6a437434554735a2fdade81d82c4f9147e552236406621d76b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ba733a4379a73c6a437434554735a2fdade81d82c4f9147e552236406621d76b->enter($__internal_ba733a4379a73c6a437434554735a2fdade81d82c4f9147e552236406621d76b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_154e350e9475bfb752f058f88fb5bfe3976e1611c9f18c82a5cada6bf9a45146->leave($__internal_154e350e9475bfb752f058f88fb5bfe3976e1611c9f18c82a5cada6bf9a45146_prof);

        
        $__internal_ba733a4379a73c6a437434554735a2fdade81d82c4f9147e552236406621d76b->leave($__internal_ba733a4379a73c6a437434554735a2fdade81d82c4f9147e552236406621d76b_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_41f0e801a222cbfb075ef5d5ff6fb43dc0f3484cc5930c464ba5b35226634860 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_41f0e801a222cbfb075ef5d5ff6fb43dc0f3484cc5930c464ba5b35226634860->enter($__internal_41f0e801a222cbfb075ef5d5ff6fb43dc0f3484cc5930c464ba5b35226634860_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_ddfe1348a91c15b3750450cb8c60d8849ae7e4e8c451cb079d9e856bd9f3424b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ddfe1348a91c15b3750450cb8c60d8849ae7e4e8c451cb079d9e856bd9f3424b->enter($__internal_ddfe1348a91c15b3750450cb8c60d8849ae7e4e8c451cb079d9e856bd9f3424b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

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
        
        $__internal_ddfe1348a91c15b3750450cb8c60d8849ae7e4e8c451cb079d9e856bd9f3424b->leave($__internal_ddfe1348a91c15b3750450cb8c60d8849ae7e4e8c451cb079d9e856bd9f3424b_prof);

        
        $__internal_41f0e801a222cbfb075ef5d5ff6fb43dc0f3484cc5930c464ba5b35226634860->leave($__internal_41f0e801a222cbfb075ef5d5ff6fb43dc0f3484cc5930c464ba5b35226634860_prof);

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
