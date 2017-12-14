<?php

/* DashboardBundle:Default:index.html.twig */
class __TwigTemplate_9ae760eeb309b00d6db7ba1074beb6b679bdf8b285cbeccdb7f752fccbfd067a extends Twig_Template
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
        $__internal_03be233eae0afe4d756ad0a6e9a82db5f8bfdada7c7aed3e0e2e4d7df554bf12 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_03be233eae0afe4d756ad0a6e9a82db5f8bfdada7c7aed3e0e2e4d7df554bf12->enter($__internal_03be233eae0afe4d756ad0a6e9a82db5f8bfdada7c7aed3e0e2e4d7df554bf12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:index.html.twig"));

        $__internal_9333f0d68dac6c0ccd9a10b6a3e54ddd130c50b91ddbf1ed86154ba79c0d5b58 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9333f0d68dac6c0ccd9a10b6a3e54ddd130c50b91ddbf1ed86154ba79c0d5b58->enter($__internal_9333f0d68dac6c0ccd9a10b6a3e54ddd130c50b91ddbf1ed86154ba79c0d5b58_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_03be233eae0afe4d756ad0a6e9a82db5f8bfdada7c7aed3e0e2e4d7df554bf12->leave($__internal_03be233eae0afe4d756ad0a6e9a82db5f8bfdada7c7aed3e0e2e4d7df554bf12_prof);

        
        $__internal_9333f0d68dac6c0ccd9a10b6a3e54ddd130c50b91ddbf1ed86154ba79c0d5b58->leave($__internal_9333f0d68dac6c0ccd9a10b6a3e54ddd130c50b91ddbf1ed86154ba79c0d5b58_prof);

    }

    // line 5
    public function block_body_class($context, array $blocks = array())
    {
        $__internal_7d522f5f430acfb530acaed88e640b6973b30fbab7a0a868f1c0f75a49153454 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7d522f5f430acfb530acaed88e640b6973b30fbab7a0a868f1c0f75a49153454->enter($__internal_7d522f5f430acfb530acaed88e640b6973b30fbab7a0a868f1c0f75a49153454_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_4f3b8a42cd9df736e3236af69c956df74865a9e0a71e2584c53e0a64fad12ce6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4f3b8a42cd9df736e3236af69c956df74865a9e0a71e2584c53e0a64fad12ce6->enter($__internal_4f3b8a42cd9df736e3236af69c956df74865a9e0a71e2584c53e0a64fad12ce6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        echo "dashboard";
        
        $__internal_4f3b8a42cd9df736e3236af69c956df74865a9e0a71e2584c53e0a64fad12ce6->leave($__internal_4f3b8a42cd9df736e3236af69c956df74865a9e0a71e2584c53e0a64fad12ce6_prof);

        
        $__internal_7d522f5f430acfb530acaed88e640b6973b30fbab7a0a868f1c0f75a49153454->leave($__internal_7d522f5f430acfb530acaed88e640b6973b30fbab7a0a868f1c0f75a49153454_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_bd83f6f3652c979b0fd90129236deafb0fa0bd7656482399327fc4acd9b9352c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bd83f6f3652c979b0fd90129236deafb0fa0bd7656482399327fc4acd9b9352c->enter($__internal_bd83f6f3652c979b0fd90129236deafb0fa0bd7656482399327fc4acd9b9352c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_90d057c1732e3fe463b614707aeb0bd3e134315091164e82e4a48e8067d561bf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_90d057c1732e3fe463b614707aeb0bd3e134315091164e82e4a48e8067d561bf->enter($__internal_90d057c1732e3fe463b614707aeb0bd3e134315091164e82e4a48e8067d561bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
        
        $__internal_90d057c1732e3fe463b614707aeb0bd3e134315091164e82e4a48e8067d561bf->leave($__internal_90d057c1732e3fe463b614707aeb0bd3e134315091164e82e4a48e8067d561bf_prof);

        
        $__internal_bd83f6f3652c979b0fd90129236deafb0fa0bd7656482399327fc4acd9b9352c->leave($__internal_bd83f6f3652c979b0fd90129236deafb0fa0bd7656482399327fc4acd9b9352c_prof);

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
