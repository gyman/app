<?php

/* GymanSettingsBundle::layout.html.twig */
class __TwigTemplate_a73ec39d1be350380a70571fc5d130ff1aad7fd55cbdd32a9d6f0f57f45738cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "GymanSettingsBundle::layout.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'settings_page' => array($this, 'block_settings_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ab36f7d1a93b0e5778500d184b7a26ccd25c69e7026e0e6b3af0737ab9fe4af4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ab36f7d1a93b0e5778500d184b7a26ccd25c69e7026e0e6b3af0737ab9fe4af4->enter($__internal_ab36f7d1a93b0e5778500d184b7a26ccd25c69e7026e0e6b3af0737ab9fe4af4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::layout.html.twig"));

        $__internal_493d0a832e513591f54529058ea91d889bde3908a99c68d6c12e3c7de67f127c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_493d0a832e513591f54529058ea91d889bde3908a99c68d6c12e3c7de67f127c->enter($__internal_493d0a832e513591f54529058ea91d889bde3908a99c68d6c12e3c7de67f127c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ab36f7d1a93b0e5778500d184b7a26ccd25c69e7026e0e6b3af0737ab9fe4af4->leave($__internal_ab36f7d1a93b0e5778500d184b7a26ccd25c69e7026e0e6b3af0737ab9fe4af4_prof);

        
        $__internal_493d0a832e513591f54529058ea91d889bde3908a99c68d6c12e3c7de67f127c->leave($__internal_493d0a832e513591f54529058ea91d889bde3908a99c68d6c12e3c7de67f127c_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_f325ebc68811d45f3358715ce32c5643162e61541500b0d0bc322cd0a7b1aadf = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f325ebc68811d45f3358715ce32c5643162e61541500b0d0bc322cd0a7b1aadf->enter($__internal_f325ebc68811d45f3358715ce32c5643162e61541500b0d0bc322cd0a7b1aadf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_297e3fe244d87ea634e44c9d5c3f3359308e3149662dce9b80f0a96eaeb97017 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_297e3fe244d87ea634e44c9d5c3f3359308e3149662dce9b80f0a96eaeb97017->enter($__internal_297e3fe244d87ea634e44c9d5c3f3359308e3149662dce9b80f0a96eaeb97017_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <div class=\"heading\">
        <h3>";
        // line 5
        echo "settings.header.title";
        echo "</h3>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span12\">
            ";
        // line 10
        $this->loadTemplate("::_flash.html.twig", "GymanSettingsBundle::layout.html.twig", 10)->display($context);
        // line 11
        echo "        </div>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span2\">
            ";
        // line 16
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("main", array("template" => "GymanSettingsBundle:Menu:main.html.twig", "currentAsLink" => true, "depth" => 2, "currentClass" => "active"));
        // line 21
        echo "
        </div>
        <div class=\"span10\">
            ";
        // line 24
        $this->displayBlock('settings_page', $context, $blocks);
        // line 25
        echo "        </div>
    </div>

";
        
        $__internal_297e3fe244d87ea634e44c9d5c3f3359308e3149662dce9b80f0a96eaeb97017->leave($__internal_297e3fe244d87ea634e44c9d5c3f3359308e3149662dce9b80f0a96eaeb97017_prof);

        
        $__internal_f325ebc68811d45f3358715ce32c5643162e61541500b0d0bc322cd0a7b1aadf->leave($__internal_f325ebc68811d45f3358715ce32c5643162e61541500b0d0bc322cd0a7b1aadf_prof);

    }

    // line 24
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_c2c23b9f412f8819f1781c4b6999897230bb07b6000255de7461ce89af898eb8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c2c23b9f412f8819f1781c4b6999897230bb07b6000255de7461ce89af898eb8->enter($__internal_c2c23b9f412f8819f1781c4b6999897230bb07b6000255de7461ce89af898eb8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_b7791e027ef1e866bf9e34db3b6b86a68f3349544c489efc0a71e3925c8e019d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b7791e027ef1e866bf9e34db3b6b86a68f3349544c489efc0a71e3925c8e019d->enter($__internal_b7791e027ef1e866bf9e34db3b6b86a68f3349544c489efc0a71e3925c8e019d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        
        $__internal_b7791e027ef1e866bf9e34db3b6b86a68f3349544c489efc0a71e3925c8e019d->leave($__internal_b7791e027ef1e866bf9e34db3b6b86a68f3349544c489efc0a71e3925c8e019d_prof);

        
        $__internal_c2c23b9f412f8819f1781c4b6999897230bb07b6000255de7461ce89af898eb8->leave($__internal_c2c23b9f412f8819f1781c4b6999897230bb07b6000255de7461ce89af898eb8_prof);

    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 24,  79 => 25,  77 => 24,  72 => 21,  70 => 16,  63 => 11,  61 => 10,  53 => 5,  50 => 4,  41 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '::base.html.twig' %}

{% block content %}
    <div class=\"heading\">
        <h3>{{ 'settings.header.title' }}</h3>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span12\">
            {% include \"::_flash.html.twig\" %}
        </div>
    </div>

    <div class=\"row-fluid\">
        <div class=\"span2\">
            {{ knp_menu_render('main', {
                'template': 'GymanSettingsBundle:Menu:main.html.twig',
                'currentAsLink' : true,
                'depth' : 2,
                'currentClass' : 'active'
            }) }}
        </div>
        <div class=\"span10\">
            {% block settings_page %}{% endblock settings_page %}
        </div>
    </div>

{% endblock content %}", "GymanSettingsBundle::layout.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/layout.html.twig");
    }
}
