<?php

/* GymanAppBundle:Default:Menu/tabs.html.twig */
class __TwigTemplate_eff645f0404d07f2ac059fb4b0062774adc7a35e18f0e7876ab8fd462a3a4d51 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "GymanAppBundle:Default:Menu/tabs.html.twig", 1);
        $this->blocks = array(
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f82619781a77f1fbeb64907f89e2c28981bfd94493762f93ad63340a04fa479b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f82619781a77f1fbeb64907f89e2c28981bfd94493762f93ad63340a04fa479b->enter($__internal_f82619781a77f1fbeb64907f89e2c28981bfd94493762f93ad63340a04fa479b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:Menu/tabs.html.twig"));

        $__internal_0a24b7d3b3738573992bd913d5be6fab2b9829e9237a54acd2d8e4f5bc9ef800 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0a24b7d3b3738573992bd913d5be6fab2b9829e9237a54acd2d8e4f5bc9ef800->enter($__internal_0a24b7d3b3738573992bd913d5be6fab2b9829e9237a54acd2d8e4f5bc9ef800_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:Menu/tabs.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f82619781a77f1fbeb64907f89e2c28981bfd94493762f93ad63340a04fa479b->leave($__internal_f82619781a77f1fbeb64907f89e2c28981bfd94493762f93ad63340a04fa479b_prof);

        
        $__internal_0a24b7d3b3738573992bd913d5be6fab2b9829e9237a54acd2d8e4f5bc9ef800->leave($__internal_0a24b7d3b3738573992bd913d5be6fab2b9829e9237a54acd2d8e4f5bc9ef800_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_d5dcb3b94359fd83c262cf894de56a2fb00951f58e7dbd93b0c3e2dcf64c35ce = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d5dcb3b94359fd83c262cf894de56a2fb00951f58e7dbd93b0c3e2dcf64c35ce->enter($__internal_d5dcb3b94359fd83c262cf894de56a2fb00951f58e7dbd93b0c3e2dcf64c35ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_9c99e09bc4aadc4737d159f3daa54f26699e3acdd6bbabad784fd543b020c1ff = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9c99e09bc4aadc4737d159f3daa54f26699e3acdd6bbabad784fd543b020c1ff->enter($__internal_9c99e09bc4aadc4737d159f3daa54f26699e3acdd6bbabad784fd543b020c1ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "
";
        
        $__internal_9c99e09bc4aadc4737d159f3daa54f26699e3acdd6bbabad784fd543b020c1ff->leave($__internal_9c99e09bc4aadc4737d159f3daa54f26699e3acdd6bbabad784fd543b020c1ff_prof);

        
        $__internal_d5dcb3b94359fd83c262cf894de56a2fb00951f58e7dbd93b0c3e2dcf64c35ce->leave($__internal_d5dcb3b94359fd83c262cf894de56a2fb00951f58e7dbd93b0c3e2dcf64c35ce_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Default:Menu/tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'knp_menu.html.twig' %}

{% block label %}
    <span class=\"icon {{ item.extras.icon }}\"></span>
    {{ item.label|trans }}
{% endblock %}
", "GymanAppBundle:Default:Menu/tabs.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/Menu/tabs.html.twig");
    }
}
