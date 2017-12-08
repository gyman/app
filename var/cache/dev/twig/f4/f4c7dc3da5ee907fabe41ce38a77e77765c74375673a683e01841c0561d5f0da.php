<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_8c5804d24da5453550081654fc07b4b194480e866c3334a142b51755847df7d8 extends Twig_Template
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
        $__internal_fe6e667da2b863da3785dd79608a12e0bcf4cb45962a98f5cb5886817684e175 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fe6e667da2b863da3785dd79608a12e0bcf4cb45962a98f5cb5886817684e175->enter($__internal_fe6e667da2b863da3785dd79608a12e0bcf4cb45962a98f5cb5886817684e175_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_1980644954ee26efef2492934d47a24e94f815dd9e0581519e3b46b5f257d377 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1980644954ee26efef2492934d47a24e94f815dd9e0581519e3b46b5f257d377->enter($__internal_1980644954ee26efef2492934d47a24e94f815dd9e0581519e3b46b5f257d377_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fe6e667da2b863da3785dd79608a12e0bcf4cb45962a98f5cb5886817684e175->leave($__internal_fe6e667da2b863da3785dd79608a12e0bcf4cb45962a98f5cb5886817684e175_prof);

        
        $__internal_1980644954ee26efef2492934d47a24e94f815dd9e0581519e3b46b5f257d377->leave($__internal_1980644954ee26efef2492934d47a24e94f815dd9e0581519e3b46b5f257d377_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_318595158b99ed744bced378555bb12f24bcd2861a8a3f18e5e6796534d18489 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_318595158b99ed744bced378555bb12f24bcd2861a8a3f18e5e6796534d18489->enter($__internal_318595158b99ed744bced378555bb12f24bcd2861a8a3f18e5e6796534d18489_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_e98c95a5cd6b88759724d764012a29cc3621db0731b5f5b15b759705413ce655 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e98c95a5cd6b88759724d764012a29cc3621db0731b5f5b15b759705413ce655->enter($__internal_e98c95a5cd6b88759724d764012a29cc3621db0731b5f5b15b759705413ce655_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

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
        
        $__internal_e98c95a5cd6b88759724d764012a29cc3621db0731b5f5b15b759705413ce655->leave($__internal_e98c95a5cd6b88759724d764012a29cc3621db0731b5f5b15b759705413ce655_prof);

        
        $__internal_318595158b99ed744bced378555bb12f24bcd2861a8a3f18e5e6796534d18489->leave($__internal_318595158b99ed744bced378555bb12f24bcd2861a8a3f18e5e6796534d18489_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_52e74f6e281a345bd243fefc42245d0fa393516f2b46a7a924c9bc36469ba4b3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_52e74f6e281a345bd243fefc42245d0fa393516f2b46a7a924c9bc36469ba4b3->enter($__internal_52e74f6e281a345bd243fefc42245d0fa393516f2b46a7a924c9bc36469ba4b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_64e220aca7a8638aeca0fc347ab6f2387f2b585023810fa958ccb0d1e13b1f93 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_64e220aca7a8638aeca0fc347ab6f2387f2b585023810fa958ccb0d1e13b1f93->enter($__internal_64e220aca7a8638aeca0fc347ab6f2387f2b585023810fa958ccb0d1e13b1f93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

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
        
        $__internal_64e220aca7a8638aeca0fc347ab6f2387f2b585023810fa958ccb0d1e13b1f93->leave($__internal_64e220aca7a8638aeca0fc347ab6f2387f2b585023810fa958ccb0d1e13b1f93_prof);

        
        $__internal_52e74f6e281a345bd243fefc42245d0fa393516f2b46a7a924c9bc36469ba4b3->leave($__internal_52e74f6e281a345bd243fefc42245d0fa393516f2b46a7a924c9bc36469ba4b3_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_a9cff77f0dc0d447adbb4a0c5e1941343cbf2887d1a6d6adb4079626d4b2a816 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a9cff77f0dc0d447adbb4a0c5e1941343cbf2887d1a6d6adb4079626d4b2a816->enter($__internal_a9cff77f0dc0d447adbb4a0c5e1941343cbf2887d1a6d6adb4079626d4b2a816_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_1b3ccdf5b2e6439b3c924e2b8ca829019fda08ff58d12eadb15a084c5d00f455 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1b3ccdf5b2e6439b3c924e2b8ca829019fda08ff58d12eadb15a084c5d00f455->enter($__internal_1b3ccdf5b2e6439b3c924e2b8ca829019fda08ff58d12eadb15a084c5d00f455_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

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
        
        $__internal_1b3ccdf5b2e6439b3c924e2b8ca829019fda08ff58d12eadb15a084c5d00f455->leave($__internal_1b3ccdf5b2e6439b3c924e2b8ca829019fda08ff58d12eadb15a084c5d00f455_prof);

        
        $__internal_a9cff77f0dc0d447adbb4a0c5e1941343cbf2887d1a6d6adb4079626d4b2a816->leave($__internal_a9cff77f0dc0d447adbb4a0c5e1941343cbf2887d1a6d6adb4079626d4b2a816_prof);

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
