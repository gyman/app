<?php

/* GymanSettingsBundle::layout.html.twig */
class __TwigTemplate_cbcd63daa8f7141fa670a7012c8885023c9a3005eff62473428dccbf18a03103 extends Twig_Template
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
        $__internal_d43eae0bc0b1f1fef5f6caa2b3438579c2fea43401ac6837799eb0e8d4a431f3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d43eae0bc0b1f1fef5f6caa2b3438579c2fea43401ac6837799eb0e8d4a431f3->enter($__internal_d43eae0bc0b1f1fef5f6caa2b3438579c2fea43401ac6837799eb0e8d4a431f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::layout.html.twig"));

        $__internal_4d53ba6cc9b1c2085afefa8aa6b3244c73a8740fa6f5c41cd6191f2e77221534 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4d53ba6cc9b1c2085afefa8aa6b3244c73a8740fa6f5c41cd6191f2e77221534->enter($__internal_4d53ba6cc9b1c2085afefa8aa6b3244c73a8740fa6f5c41cd6191f2e77221534_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d43eae0bc0b1f1fef5f6caa2b3438579c2fea43401ac6837799eb0e8d4a431f3->leave($__internal_d43eae0bc0b1f1fef5f6caa2b3438579c2fea43401ac6837799eb0e8d4a431f3_prof);

        
        $__internal_4d53ba6cc9b1c2085afefa8aa6b3244c73a8740fa6f5c41cd6191f2e77221534->leave($__internal_4d53ba6cc9b1c2085afefa8aa6b3244c73a8740fa6f5c41cd6191f2e77221534_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_ceb953b1ac2c1e87c3d32a9ed1d6d5844c414075543ce411d50b97ffd5b12498 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ceb953b1ac2c1e87c3d32a9ed1d6d5844c414075543ce411d50b97ffd5b12498->enter($__internal_ceb953b1ac2c1e87c3d32a9ed1d6d5844c414075543ce411d50b97ffd5b12498_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_a254ba84c87fee47913dc69c2697501926f88104b6cd0c9588c21eb8cd12c3f0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a254ba84c87fee47913dc69c2697501926f88104b6cd0c9588c21eb8cd12c3f0->enter($__internal_a254ba84c87fee47913dc69c2697501926f88104b6cd0c9588c21eb8cd12c3f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
        <div class=\"span4\">
            ";
        // line 16
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("main", array("template" => "GymanSettingsBundle:Menu:main.html.twig", "currentAsLink" => true, "depth" => 2, "currentClass" => "active"));
        // line 21
        echo "
        </div>
        <div class=\"span8\">
            ";
        // line 24
        $this->displayBlock('settings_page', $context, $blocks);
        // line 25
        echo "        </div>
    </div>

";
        
        $__internal_a254ba84c87fee47913dc69c2697501926f88104b6cd0c9588c21eb8cd12c3f0->leave($__internal_a254ba84c87fee47913dc69c2697501926f88104b6cd0c9588c21eb8cd12c3f0_prof);

        
        $__internal_ceb953b1ac2c1e87c3d32a9ed1d6d5844c414075543ce411d50b97ffd5b12498->leave($__internal_ceb953b1ac2c1e87c3d32a9ed1d6d5844c414075543ce411d50b97ffd5b12498_prof);

    }

    // line 24
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_90387d8907e53d6b95011a9e371e3133d4c0ba30e61144cb97edddf039432570 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_90387d8907e53d6b95011a9e371e3133d4c0ba30e61144cb97edddf039432570->enter($__internal_90387d8907e53d6b95011a9e371e3133d4c0ba30e61144cb97edddf039432570_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_275f75a98a538ad19b547a00e773f290e7b06fb29b9fb25c79da55a9c3750489 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_275f75a98a538ad19b547a00e773f290e7b06fb29b9fb25c79da55a9c3750489->enter($__internal_275f75a98a538ad19b547a00e773f290e7b06fb29b9fb25c79da55a9c3750489_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        
        $__internal_275f75a98a538ad19b547a00e773f290e7b06fb29b9fb25c79da55a9c3750489->leave($__internal_275f75a98a538ad19b547a00e773f290e7b06fb29b9fb25c79da55a9c3750489_prof);

        
        $__internal_90387d8907e53d6b95011a9e371e3133d4c0ba30e61144cb97edddf039432570->leave($__internal_90387d8907e53d6b95011a9e371e3133d4c0ba30e61144cb97edddf039432570_prof);

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
        <div class=\"span4\">
            {{ knp_menu_render('main', {
                'template': 'GymanSettingsBundle:Menu:main.html.twig',
                'currentAsLink' : true,
                'depth' : 2,
                'currentClass' : 'active'
            }) }}
        </div>
        <div class=\"span8\">
            {% block settings_page %}{% endblock settings_page %}
        </div>
    </div>

{% endblock content %}", "GymanSettingsBundle::layout.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/layout.html.twig");
    }
}
