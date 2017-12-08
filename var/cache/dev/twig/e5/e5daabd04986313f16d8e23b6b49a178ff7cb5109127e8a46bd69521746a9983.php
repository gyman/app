<?php

/* DashboardBundle:Default:index.html.twig */
class __TwigTemplate_4ed2fa97dbd64fe1abb4003fef5e5aede7485ac49fc22961d141527376c61fb3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DashboardBundle::layout.html.twig", "DashboardBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body_class' => array($this, 'block_body_class'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DashboardBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2864533ee64b820c938fb5d6ff7c35fc9f53d61b0ec35f26432848ea32a488ab = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2864533ee64b820c938fb5d6ff7c35fc9f53d61b0ec35f26432848ea32a488ab->enter($__internal_2864533ee64b820c938fb5d6ff7c35fc9f53d61b0ec35f26432848ea32a488ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:index.html.twig"));

        $__internal_de22021b9046d4ca55aebfef07cf9842b82f30a94d4df9ef1b3fb36356975794 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de22021b9046d4ca55aebfef07cf9842b82f30a94d4df9ef1b3fb36356975794->enter($__internal_de22021b9046d4ca55aebfef07cf9842b82f30a94d4df9ef1b3fb36356975794_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2864533ee64b820c938fb5d6ff7c35fc9f53d61b0ec35f26432848ea32a488ab->leave($__internal_2864533ee64b820c938fb5d6ff7c35fc9f53d61b0ec35f26432848ea32a488ab_prof);

        
        $__internal_de22021b9046d4ca55aebfef07cf9842b82f30a94d4df9ef1b3fb36356975794->leave($__internal_de22021b9046d4ca55aebfef07cf9842b82f30a94d4df9ef1b3fb36356975794_prof);

    }

    // line 5
    public function block_body_class($context, array $blocks = array())
    {
        $__internal_a8a3eb6472136074db32bc7918dfb4887a0dce116db9f5554914071bfaadeeca = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a8a3eb6472136074db32bc7918dfb4887a0dce116db9f5554914071bfaadeeca->enter($__internal_a8a3eb6472136074db32bc7918dfb4887a0dce116db9f5554914071bfaadeeca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_9cf1c3a2d8e889b8e84495b1c3952f2c37106fee86b1cad0465b00ee175b2889 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9cf1c3a2d8e889b8e84495b1c3952f2c37106fee86b1cad0465b00ee175b2889->enter($__internal_9cf1c3a2d8e889b8e84495b1c3952f2c37106fee86b1cad0465b00ee175b2889_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        echo "dashboard";
        
        $__internal_9cf1c3a2d8e889b8e84495b1c3952f2c37106fee86b1cad0465b00ee175b2889->leave($__internal_9cf1c3a2d8e889b8e84495b1c3952f2c37106fee86b1cad0465b00ee175b2889_prof);

        
        $__internal_a8a3eb6472136074db32bc7918dfb4887a0dce116db9f5554914071bfaadeeca->leave($__internal_a8a3eb6472136074db32bc7918dfb4887a0dce116db9f5554914071bfaadeeca_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_7f03a8912dc051b7447fb9ddf519a8c9d07656e7dbdae74cf39e5fcddcf90cda = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7f03a8912dc051b7447fb9ddf519a8c9d07656e7dbdae74cf39e5fcddcf90cda->enter($__internal_7f03a8912dc051b7447fb9ddf519a8c9d07656e7dbdae74cf39e5fcddcf90cda_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_2966a049c3e4f1762452c5f575549fa874509f2ea9c5e9b76f5a2cf373e64795 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2966a049c3e4f1762452c5f575549fa874509f2ea9c5e9b76f5a2cf373e64795->enter($__internal_2966a049c3e4f1762452c5f575549fa874509f2ea9c5e9b76f5a2cf373e64795_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "
    <div class=\"heading\">

        <h3>Pulpit nawigatora</h3>

    </div><!-- End .heading-->

    <div class=\"form-row row-fluid\">
        <div class=\"span4\">
            ";
        // line 17
        $this->loadTemplate("DashboardBundle:Default:activities.html.twig", "DashboardBundle:Default:index.html.twig", 17)->display($context);
        // line 18
        echo "            ";
        // line 19
        echo "            ";
        // line 20
        echo "        </div>

        <div class=\"span4\">
            ";
        // line 23
        $this->loadTemplate("DashboardBundle:Default:searchUser.html.twig", "DashboardBundle:Default:index.html.twig", 23)->display($context);
        // line 24
        echo "             ";
        // line 25
        echo "
            <div class=\"reminder\">
                <h4>Zadania</h4>

                ";
        // line 29
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("actions", array("template" => ":Menu:dashboard_actions.html.twig", "currentAsLink" => true, "depth" => 2, "currentClass" => "active"));
        // line 34
        echo "
            </div>
        </div>

        <div class=\"span4\">
            ";
        // line 40
        echo "                ";
        // line 41
        echo "                ";
        // line 42
        echo "            ";
        // line 43
        echo "        </div>
    </div>

    ";
        // line 47
        echo "    ";
        // line 48
        echo "    ";
        // line 49
        echo "    ";
        // line 50
        echo "    ";
        
        $__internal_2966a049c3e4f1762452c5f575549fa874509f2ea9c5e9b76f5a2cf373e64795->leave($__internal_2966a049c3e4f1762452c5f575549fa874509f2ea9c5e9b76f5a2cf373e64795_prof);

        
        $__internal_7f03a8912dc051b7447fb9ddf519a8c9d07656e7dbdae74cf39e5fcddcf90cda->leave($__internal_7f03a8912dc051b7447fb9ddf519a8c9d07656e7dbdae74cf39e5fcddcf90cda_prof);

    }

    public function getTemplateName()
    {
        return "DashboardBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 50,  124 => 49,  122 => 48,  120 => 47,  115 => 43,  113 => 42,  111 => 41,  109 => 40,  102 => 34,  100 => 29,  94 => 25,  92 => 24,  90 => 23,  85 => 20,  83 => 19,  81 => 18,  79 => 17,  68 => 8,  59 => 7,  41 => 5,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"DashboardBundle::layout.html.twig\" %}

{#@todo: tłumaczenia!#}

{% block body_class %}dashboard{% endblock %}

{% block body %}

    <div class=\"heading\">

        <h3>Pulpit nawigatora</h3>

    </div><!-- End .heading-->

    <div class=\"form-row row-fluid\">
        <div class=\"span4\">
            {% include \"DashboardBundle:Default:activities.html.twig\" %}
            {#{% include \"DashboardBundle:Default:hierarchy.html.twig\" %}#}
            {#<div class=\"reminder\" id=\"activitiesTab\" data-date=\"{{ date|date(\"Y-m-d H:i:s\") }}\"></div>#}
        </div>

        <div class=\"span4\">
            {% include \"DashboardBundle:Default:searchUser.html.twig\" %}
             {#{% include \"DashboardBundle:Default:popularActivities.html.twig\" %}#}

            <div class=\"reminder\">
                <h4>Zadania</h4>

                {{ knp_menu_render('actions', {
                'template': ':Menu:dashboard_actions.html.twig',
                'currentAsLink' : true,
                'depth' : 2,
                'currentClass' : 'active'
                }) }}
            </div>
        </div>

        <div class=\"span4\">
            {#<div class=\"reminder\" id=\"timeline\">#}
                {#<h4>Wydarzenia</h4>#}
                {#<div id=\"dashboardTimeline\"></div>#}
            {#</div>#}
        </div>
    </div>

    {#<div class=\"form-row row-fluid\">#}
    {#<div class=\"span12\">#}
    {#<div id=\"frequencyChart\" style=\"min-width: 400px; height: 400px; margin: 0 auto\"></div>#}
    {#</div>#}
    {#</div>#}
{% endblock body %}

{#{% block javascripts %}#}
    {#{{ parent() }}#}
    {#<script>#}
        {#&#123;&#35; { chart(frequencyChart) } &#35;&#125;#}
        {#&#123;&#35; { chart(popularityChart) } &#35;&#125;#}
    {#</script>#}
{#{% endblock %}#}
", "DashboardBundle:Default:index.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/index.html.twig");
    }
}
