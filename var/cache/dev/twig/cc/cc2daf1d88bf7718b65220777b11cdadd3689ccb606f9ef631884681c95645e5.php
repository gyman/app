<?php

/* GymanAppBundle::layout.html.twig */
class __TwigTemplate_6c95c3d69942cb59fcaabbb4df86eb04edd5b4a95d65dbfd62f2c45c02b4ffdd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "GymanAppBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d0cf6b354bc72592f7fcd2d5b9262734f8cc56a0b0562595e1cce7d05be65c73 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d0cf6b354bc72592f7fcd2d5b9262734f8cc56a0b0562595e1cce7d05be65c73->enter($__internal_d0cf6b354bc72592f7fcd2d5b9262734f8cc56a0b0562595e1cce7d05be65c73_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle::layout.html.twig"));

        $__internal_b5aa26a9036b257b006ca8bc8f7dae09042d6039c3318f50ac93b27c644ba7b3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b5aa26a9036b257b006ca8bc8f7dae09042d6039c3318f50ac93b27c644ba7b3->enter($__internal_b5aa26a9036b257b006ca8bc8f7dae09042d6039c3318f50ac93b27c644ba7b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d0cf6b354bc72592f7fcd2d5b9262734f8cc56a0b0562595e1cce7d05be65c73->leave($__internal_d0cf6b354bc72592f7fcd2d5b9262734f8cc56a0b0562595e1cce7d05be65c73_prof);

        
        $__internal_b5aa26a9036b257b006ca8bc8f7dae09042d6039c3318f50ac93b27c644ba7b3->leave($__internal_b5aa26a9036b257b006ca8bc8f7dae09042d6039c3318f50ac93b27c644ba7b3_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_78468a00ac9a2caa2fd3168b3029671860121ea34a554c191b8bdc1833591134 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_78468a00ac9a2caa2fd3168b3029671860121ea34a554c191b8bdc1833591134->enter($__internal_78468a00ac9a2caa2fd3168b3029671860121ea34a554c191b8bdc1833591134_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_12db6fbb10a9c275b7610f36a6d9855816d6eab8cf4780ccc992333e55db1f93 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_12db6fbb10a9c275b7610f36a6d9855816d6eab8cf4780ccc992333e55db1f93->enter($__internal_12db6fbb10a9c275b7610f36a6d9855816d6eab8cf4780ccc992333e55db1f93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo "Użytkownik";
        echo "
";
        
        $__internal_12db6fbb10a9c275b7610f36a6d9855816d6eab8cf4780ccc992333e55db1f93->leave($__internal_12db6fbb10a9c275b7610f36a6d9855816d6eab8cf4780ccc992333e55db1f93_prof);

        
        $__internal_78468a00ac9a2caa2fd3168b3029671860121ea34a554c191b8bdc1833591134->leave($__internal_78468a00ac9a2caa2fd3168b3029671860121ea34a554c191b8bdc1833591134_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"::base.html.twig\" %}

{% block title %}
    {{ parent() }} - {{ \"Użytkownik\" }}
{% endblock title %}

", "GymanAppBundle::layout.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/layout.html.twig");
    }
}
