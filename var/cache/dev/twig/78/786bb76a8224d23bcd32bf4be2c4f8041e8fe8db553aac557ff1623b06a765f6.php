<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_c224caf43a3b5e21077a2400b6066dcbb1756f4e16f7fc7faa77eaf09620519f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e2662b52cfe06a1ed9ed694e896611996ff9d683265f0b2660e7f9f0ba803a91 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e2662b52cfe06a1ed9ed694e896611996ff9d683265f0b2660e7f9f0ba803a91->enter($__internal_e2662b52cfe06a1ed9ed694e896611996ff9d683265f0b2660e7f9f0ba803a91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_a96d020378e589e88e2062d7b17ec152ba3afda0d8e844ff02f7df38bf08d19d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a96d020378e589e88e2062d7b17ec152ba3afda0d8e844ff02f7df38bf08d19d->enter($__internal_a96d020378e589e88e2062d7b17ec152ba3afda0d8e844ff02f7df38bf08d19d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e2662b52cfe06a1ed9ed694e896611996ff9d683265f0b2660e7f9f0ba803a91->leave($__internal_e2662b52cfe06a1ed9ed694e896611996ff9d683265f0b2660e7f9f0ba803a91_prof);

        
        $__internal_a96d020378e589e88e2062d7b17ec152ba3afda0d8e844ff02f7df38bf08d19d->leave($__internal_a96d020378e589e88e2062d7b17ec152ba3afda0d8e844ff02f7df38bf08d19d_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_4073637a16ac78a2dbda7bee7dda0d91908e0078779135ae5d910e9612447248 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4073637a16ac78a2dbda7bee7dda0d91908e0078779135ae5d910e9612447248->enter($__internal_4073637a16ac78a2dbda7bee7dda0d91908e0078779135ae5d910e9612447248_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_cb986719f957dc3c4569925c30f336b78026f41736fc43b16229985afa558c48 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cb986719f957dc3c4569925c30f336b78026f41736fc43b16229985afa558c48->enter($__internal_cb986719f957dc3c4569925c30f336b78026f41736fc43b16229985afa558c48_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["collector"] ?? null), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? null))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_cb986719f957dc3c4569925c30f336b78026f41736fc43b16229985afa558c48->leave($__internal_cb986719f957dc3c4569925c30f336b78026f41736fc43b16229985afa558c48_prof);

        
        $__internal_4073637a16ac78a2dbda7bee7dda0d91908e0078779135ae5d910e9612447248->leave($__internal_4073637a16ac78a2dbda7bee7dda0d91908e0078779135ae5d910e9612447248_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_96fa3fb9567639a2af9d9441edd5d1c7595516b29f93d3ba532c65325a42aa19 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_96fa3fb9567639a2af9d9441edd5d1c7595516b29f93d3ba532c65325a42aa19->enter($__internal_96fa3fb9567639a2af9d9441edd5d1c7595516b29f93d3ba532c65325a42aa19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_6e68b3c976230890935a2f19814897f5494d235c8555f029ee3ae66e34f0a6c9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6e68b3c976230890935a2f19814897f5494d235c8555f029ee3ae66e34f0a6c9->enter($__internal_6e68b3c976230890935a2f19814897f5494d235c8555f029ee3ae66e34f0a6c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["collector"] ?? null), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["collector"] ?? null), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_6e68b3c976230890935a2f19814897f5494d235c8555f029ee3ae66e34f0a6c9->leave($__internal_6e68b3c976230890935a2f19814897f5494d235c8555f029ee3ae66e34f0a6c9_prof);

        
        $__internal_96fa3fb9567639a2af9d9441edd5d1c7595516b29f93d3ba532c65325a42aa19->leave($__internal_96fa3fb9567639a2af9d9441edd5d1c7595516b29f93d3ba532c65325a42aa19_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_cefdb171bd2eff5a986997002253353c0b2ef84659ff000ae35efabdcdcf9df0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cefdb171bd2eff5a986997002253353c0b2ef84659ff000ae35efabdcdcf9df0->enter($__internal_cefdb171bd2eff5a986997002253353c0b2ef84659ff000ae35efabdcdcf9df0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_5815de8f14e086c31f4959588656d9caa1b7eb8a9b59643be79ad2fdf9f1e46b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5815de8f14e086c31f4959588656d9caa1b7eb8a9b59643be79ad2fdf9f1e46b->enter($__internal_5815de8f14e086c31f4959588656d9caa1b7eb8a9b59643be79ad2fdf9f1e46b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["collector"] ?? null), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? null))));
            echo "
        </div>
    ";
        }
        
        $__internal_5815de8f14e086c31f4959588656d9caa1b7eb8a9b59643be79ad2fdf9f1e46b->leave($__internal_5815de8f14e086c31f4959588656d9caa1b7eb8a9b59643be79ad2fdf9f1e46b_prof);

        
        $__internal_cefdb171bd2eff5a986997002253353c0b2ef84659ff000ae35efabdcdcf9df0->leave($__internal_cefdb171bd2eff5a986997002253353c0b2ef84659ff000ae35efabdcdcf9df0_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
