<?php

/* @FOSUser/Security/login.html.twig */
class __TwigTemplate_ec99d3fea4fb16f0f07a390de1a8bc22e75263324741f985e122a5a3b6467f2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AccountBundle::loginLayout.html.twig", "@FOSUser/Security/login.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AccountBundle::loginLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_983ff58a86438e4d8ebda05e3ed9b1fa9fe3d48fb22d77ae0df161f532fa460a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_983ff58a86438e4d8ebda05e3ed9b1fa9fe3d48fb22d77ae0df161f532fa460a->enter($__internal_983ff58a86438e4d8ebda05e3ed9b1fa9fe3d48fb22d77ae0df161f532fa460a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Security/login.html.twig"));

        $__internal_990ada22267fe67ac2b79c4f8562732a42aa47e55cb196287adbc52ff9ffaac3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_990ada22267fe67ac2b79c4f8562732a42aa47e55cb196287adbc52ff9ffaac3->enter($__internal_990ada22267fe67ac2b79c4f8562732a42aa47e55cb196287adbc52ff9ffaac3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Security/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_983ff58a86438e4d8ebda05e3ed9b1fa9fe3d48fb22d77ae0df161f532fa460a->leave($__internal_983ff58a86438e4d8ebda05e3ed9b1fa9fe3d48fb22d77ae0df161f532fa460a_prof);

        
        $__internal_990ada22267fe67ac2b79c4f8562732a42aa47e55cb196287adbc52ff9ffaac3->leave($__internal_990ada22267fe67ac2b79c4f8562732a42aa47e55cb196287adbc52ff9ffaac3_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_7b0d6123f9b39d544d9f082cc7f0544146a44c4cd3942b7e053bf7651b6001a1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7b0d6123f9b39d544d9f082cc7f0544146a44c4cd3942b7e053bf7651b6001a1->enter($__internal_7b0d6123f9b39d544d9f082cc7f0544146a44c4cd3942b7e053bf7651b6001a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        $__internal_e94c93e704b5f9a141e79b6b28095fcc9d3456d416f15df750877483b6dfb0b0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e94c93e704b5f9a141e79b6b28095fcc9d3456d416f15df750877483b6dfb0b0->enter($__internal_e94c93e704b5f9a141e79b6b28095fcc9d3456d416f15df750877483b6dfb0b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        echo "    ";
        echo twig_include($this->env, $context, "@FOSUser/Security/_form.html.twig");
        echo "
";
        
        $__internal_e94c93e704b5f9a141e79b6b28095fcc9d3456d416f15df750877483b6dfb0b0->leave($__internal_e94c93e704b5f9a141e79b6b28095fcc9d3456d416f15df750877483b6dfb0b0_prof);

        
        $__internal_7b0d6123f9b39d544d9f082cc7f0544146a44c4cd3942b7e053bf7651b6001a1->leave($__internal_7b0d6123f9b39d544d9f082cc7f0544146a44c4cd3942b7e053bf7651b6001a1_prof);

    }

    public function getTemplateName()
    {
        return "@FOSUser/Security/login.html.twig";
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
        return new Twig_Source("{% extends \"AccountBundle::loginLayout.html.twig\" %}

{% block fos_user_content %}
    {{  include(\"@FOSUser/Security/_form.html.twig\") }}
{% endblock fos_user_content %}
", "@FOSUser/Security/login.html.twig", "/vagrant/app/Resources/FOSUserBundle/views/Security/login.html.twig");
    }
}
