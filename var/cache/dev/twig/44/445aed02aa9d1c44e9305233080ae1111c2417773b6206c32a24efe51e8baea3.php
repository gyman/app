<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_dcacd14bacb08319ae9f61ffc29eb0b607cb949078d938053895decfb06cf688 extends Twig_Template
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
        $__internal_9d23c71ae35114acdd399504b2ea4335c561136ae350d09270bf47fb05082459 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9d23c71ae35114acdd399504b2ea4335c561136ae350d09270bf47fb05082459->enter($__internal_9d23c71ae35114acdd399504b2ea4335c561136ae350d09270bf47fb05082459_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_96a53413df7b7c4be09e397912584e36c4c56b4fdfb0383b8f50ee9c82363183 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_96a53413df7b7c4be09e397912584e36c4c56b4fdfb0383b8f50ee9c82363183->enter($__internal_96a53413df7b7c4be09e397912584e36c4c56b4fdfb0383b8f50ee9c82363183_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9d23c71ae35114acdd399504b2ea4335c561136ae350d09270bf47fb05082459->leave($__internal_9d23c71ae35114acdd399504b2ea4335c561136ae350d09270bf47fb05082459_prof);

        
        $__internal_96a53413df7b7c4be09e397912584e36c4c56b4fdfb0383b8f50ee9c82363183->leave($__internal_96a53413df7b7c4be09e397912584e36c4c56b4fdfb0383b8f50ee9c82363183_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_f240d65de43692a8a6ac48b121a71e413829bb3426fa5701fb89209feeca132c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f240d65de43692a8a6ac48b121a71e413829bb3426fa5701fb89209feeca132c->enter($__internal_f240d65de43692a8a6ac48b121a71e413829bb3426fa5701fb89209feeca132c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_e9b27935ffda28a092684af63b12fb796391705ecf366bdd0ed8f7b6c8f4ebf9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e9b27935ffda28a092684af63b12fb796391705ecf366bdd0ed8f7b6c8f4ebf9->enter($__internal_e9b27935ffda28a092684af63b12fb796391705ecf366bdd0ed8f7b6c8f4ebf9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

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
        
        $__internal_e9b27935ffda28a092684af63b12fb796391705ecf366bdd0ed8f7b6c8f4ebf9->leave($__internal_e9b27935ffda28a092684af63b12fb796391705ecf366bdd0ed8f7b6c8f4ebf9_prof);

        
        $__internal_f240d65de43692a8a6ac48b121a71e413829bb3426fa5701fb89209feeca132c->leave($__internal_f240d65de43692a8a6ac48b121a71e413829bb3426fa5701fb89209feeca132c_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_4210d4e20a2c56131ca69fd1081e23889b1628737a82c2ee591ae0cd822a5eec = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4210d4e20a2c56131ca69fd1081e23889b1628737a82c2ee591ae0cd822a5eec->enter($__internal_4210d4e20a2c56131ca69fd1081e23889b1628737a82c2ee591ae0cd822a5eec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_ea840fbb549eb49f9dcff0331c6be6c103a6e79b523e452a3925f67bbefa91dd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ea840fbb549eb49f9dcff0331c6be6c103a6e79b523e452a3925f67bbefa91dd->enter($__internal_ea840fbb549eb49f9dcff0331c6be6c103a6e79b523e452a3925f67bbefa91dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

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
        
        $__internal_ea840fbb549eb49f9dcff0331c6be6c103a6e79b523e452a3925f67bbefa91dd->leave($__internal_ea840fbb549eb49f9dcff0331c6be6c103a6e79b523e452a3925f67bbefa91dd_prof);

        
        $__internal_4210d4e20a2c56131ca69fd1081e23889b1628737a82c2ee591ae0cd822a5eec->leave($__internal_4210d4e20a2c56131ca69fd1081e23889b1628737a82c2ee591ae0cd822a5eec_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_b764421ac30ee2dd305bea3272ed45924ac651350454216a57f66aadf0709a1a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b764421ac30ee2dd305bea3272ed45924ac651350454216a57f66aadf0709a1a->enter($__internal_b764421ac30ee2dd305bea3272ed45924ac651350454216a57f66aadf0709a1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_de52fcfa1a8c6e6935d3fd45659a6411f673835a59ffe6bc8b49fbfd32c68839 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de52fcfa1a8c6e6935d3fd45659a6411f673835a59ffe6bc8b49fbfd32c68839->enter($__internal_de52fcfa1a8c6e6935d3fd45659a6411f673835a59ffe6bc8b49fbfd32c68839_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

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
        
        $__internal_de52fcfa1a8c6e6935d3fd45659a6411f673835a59ffe6bc8b49fbfd32c68839->leave($__internal_de52fcfa1a8c6e6935d3fd45659a6411f673835a59ffe6bc8b49fbfd32c68839_prof);

        
        $__internal_b764421ac30ee2dd305bea3272ed45924ac651350454216a57f66aadf0709a1a->leave($__internal_b764421ac30ee2dd305bea3272ed45924ac651350454216a57f66aadf0709a1a_prof);

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
