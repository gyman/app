<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_13eebf14da51dc32a27c8a0300b95dbe8c8ba4b4096b84cf7f39af4b89587253 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_b3229834103de565f6bf3b49e1eaf4bda4eb31e01c42e29ddfb3781f8078c1a2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b3229834103de565f6bf3b49e1eaf4bda4eb31e01c42e29ddfb3781f8078c1a2->enter($__internal_b3229834103de565f6bf3b49e1eaf4bda4eb31e01c42e29ddfb3781f8078c1a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_3cd92489f6f0c4a0b113a65827c8f256e38561702cf110be6f30dc5e664307e4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3cd92489f6f0c4a0b113a65827c8f256e38561702cf110be6f30dc5e664307e4->enter($__internal_3cd92489f6f0c4a0b113a65827c8f256e38561702cf110be6f30dc5e664307e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b3229834103de565f6bf3b49e1eaf4bda4eb31e01c42e29ddfb3781f8078c1a2->leave($__internal_b3229834103de565f6bf3b49e1eaf4bda4eb31e01c42e29ddfb3781f8078c1a2_prof);

        
        $__internal_3cd92489f6f0c4a0b113a65827c8f256e38561702cf110be6f30dc5e664307e4->leave($__internal_3cd92489f6f0c4a0b113a65827c8f256e38561702cf110be6f30dc5e664307e4_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4283030f2c42bc30ec78931e4923a7af200f25008f977700c88475d06c9f5533 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4283030f2c42bc30ec78931e4923a7af200f25008f977700c88475d06c9f5533->enter($__internal_4283030f2c42bc30ec78931e4923a7af200f25008f977700c88475d06c9f5533_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_013c656d0607044e7aba212f5111682f18b94f580c4451dd2ae802a51ae00f2f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_013c656d0607044e7aba212f5111682f18b94f580c4451dd2ae802a51ae00f2f->enter($__internal_013c656d0607044e7aba212f5111682f18b94f580c4451dd2ae802a51ae00f2f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_013c656d0607044e7aba212f5111682f18b94f580c4451dd2ae802a51ae00f2f->leave($__internal_013c656d0607044e7aba212f5111682f18b94f580c4451dd2ae802a51ae00f2f_prof);

        
        $__internal_4283030f2c42bc30ec78931e4923a7af200f25008f977700c88475d06c9f5533->leave($__internal_4283030f2c42bc30ec78931e4923a7af200f25008f977700c88475d06c9f5533_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_450a45136ec17b4d2d0cc38707da765ac8fc0c9a005d6e8b42982b788ce55274 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_450a45136ec17b4d2d0cc38707da765ac8fc0c9a005d6e8b42982b788ce55274->enter($__internal_450a45136ec17b4d2d0cc38707da765ac8fc0c9a005d6e8b42982b788ce55274_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_0fc06ee7b0e897fd50fbb0458a820124b75ab544bc3d7592a10c6f39659ad3c0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0fc06ee7b0e897fd50fbb0458a820124b75ab544bc3d7592a10c6f39659ad3c0->enter($__internal_0fc06ee7b0e897fd50fbb0458a820124b75ab544bc3d7592a10c6f39659ad3c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_0fc06ee7b0e897fd50fbb0458a820124b75ab544bc3d7592a10c6f39659ad3c0->leave($__internal_0fc06ee7b0e897fd50fbb0458a820124b75ab544bc3d7592a10c6f39659ad3c0_prof);

        
        $__internal_450a45136ec17b4d2d0cc38707da765ac8fc0c9a005d6e8b42982b788ce55274->leave($__internal_450a45136ec17b4d2d0cc38707da765ac8fc0c9a005d6e8b42982b788ce55274_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_8413125599c19a1987229f9289c59a212995c8bb6b644199c9c4f3de43c91aae = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8413125599c19a1987229f9289c59a212995c8bb6b644199c9c4f3de43c91aae->enter($__internal_8413125599c19a1987229f9289c59a212995c8bb6b644199c9c4f3de43c91aae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_47e847fa664f18da549717d04cb350d65ddc0c226710f275fbd6b072596ff203 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_47e847fa664f18da549717d04cb350d65ddc0c226710f275fbd6b072596ff203->enter($__internal_47e847fa664f18da549717d04cb350d65ddc0c226710f275fbd6b072596ff203_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? null))));
        echo "
";
        
        $__internal_47e847fa664f18da549717d04cb350d65ddc0c226710f275fbd6b072596ff203->leave($__internal_47e847fa664f18da549717d04cb350d65ddc0c226710f275fbd6b072596ff203_prof);

        
        $__internal_8413125599c19a1987229f9289c59a212995c8bb6b644199c9c4f3de43c91aae->leave($__internal_8413125599c19a1987229f9289c59a212995c8bb6b644199c9c4f3de43c91aae_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
