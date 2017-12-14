<?php

/* GymanAppBundle:Vouchers:update.html.twig */
class __TwigTemplate_95df217350a1bb878bb5ec8085833aff4b0f9737efbb778f46c3c798be3f8d1c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanAppBundle::layout.html.twig", "GymanAppBundle:Vouchers:update.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanAppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_77f31c13eb4e4e65698710c8b5cf99e14d9022f4ed97cba46d14c9be7a051635 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_77f31c13eb4e4e65698710c8b5cf99e14d9022f4ed97cba46d14c9be7a051635->enter($__internal_77f31c13eb4e4e65698710c8b5cf99e14d9022f4ed97cba46d14c9be7a051635_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Vouchers:update.html.twig"));

        $__internal_1079d602bb560ce311d76f53a8d416a3769decfd111d9e30ce366339eb79e96c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1079d602bb560ce311d76f53a8d416a3769decfd111d9e30ce366339eb79e96c->enter($__internal_1079d602bb560ce311d76f53a8d416a3769decfd111d9e30ce366339eb79e96c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Vouchers:update.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_77f31c13eb4e4e65698710c8b5cf99e14d9022f4ed97cba46d14c9be7a051635->leave($__internal_77f31c13eb4e4e65698710c8b5cf99e14d9022f4ed97cba46d14c9be7a051635_prof);

        
        $__internal_1079d602bb560ce311d76f53a8d416a3769decfd111d9e30ce366339eb79e96c->leave($__internal_1079d602bb560ce311d76f53a8d416a3769decfd111d9e30ce366339eb79e96c_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_d933f4e3cdc1e667ad1e24da988f1be5a5fdccc0451e45569ad155c0b6b65a70 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d933f4e3cdc1e667ad1e24da988f1be5a5fdccc0451e45569ad155c0b6b65a70->enter($__internal_d933f4e3cdc1e667ad1e24da988f1be5a5fdccc0451e45569ad155c0b6b65a70_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_5ac865d7c4ba4b0c8939b65b168ab19e3c1308c2809505b542a08b2e42621edd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5ac865d7c4ba4b0c8939b65b168ab19e3c1308c2809505b542a08b2e42621edd->enter($__internal_5ac865d7c4ba4b0c8939b65b168ab19e3c1308c2809505b542a08b2e42621edd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_5ac865d7c4ba4b0c8939b65b168ab19e3c1308c2809505b542a08b2e42621edd->leave($__internal_5ac865d7c4ba4b0c8939b65b168ab19e3c1308c2809505b542a08b2e42621edd_prof);

        
        $__internal_d933f4e3cdc1e667ad1e24da988f1be5a5fdccc0451e45569ad155c0b6b65a70->leave($__internal_d933f4e3cdc1e667ad1e24da988f1be5a5fdccc0451e45569ad155c0b6b65a70_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_7297f491fdb49e5e5c089fc34fd21197c13162f32d8b5cbf9b61bbbb38f30027 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7297f491fdb49e5e5c089fc34fd21197c13162f32d8b5cbf9b61bbbb38f30027->enter($__internal_7297f491fdb49e5e5c089fc34fd21197c13162f32d8b5cbf9b61bbbb38f30027_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_d6dc550657b923bb136f85afe66623b729644915d4a733224a8e7e48d5bf34c2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d6dc550657b923bb136f85afe66623b729644915d4a733224a8e7e48d5bf34c2->enter($__internal_d6dc550657b923bb136f85afe66623b729644915d4a733224a8e7e48d5bf34c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "<div class=\"heading\">
    ";
        // line 9
        echo "</div>

    <div class=\"row-fluid\">
        <div class=\"span6\">
            ";
        // line 13
        $this->loadTemplate("::_flash.html.twig", "GymanAppBundle:Vouchers:update.html.twig", 13)->display($context);
        // line 14
        echo "
            ";
        // line 15
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form');
        echo "
        </div>
    </div>

";
        
        $__internal_d6dc550657b923bb136f85afe66623b729644915d4a733224a8e7e48d5bf34c2->leave($__internal_d6dc550657b923bb136f85afe66623b729644915d4a733224a8e7e48d5bf34c2_prof);

        
        $__internal_7297f491fdb49e5e5c089fc34fd21197c13162f32d8b5cbf9b61bbbb38f30027->leave($__internal_7297f491fdb49e5e5c089fc34fd21197c13162f32d8b5cbf9b61bbbb38f30027_prof);

    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f20e34b0aa24429883d567196fef04ca307dd5bc540ddd62de8e46bb7830a993 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f20e34b0aa24429883d567196fef04ca307dd5bc540ddd62de8e46bb7830a993->enter($__internal_f20e34b0aa24429883d567196fef04ca307dd5bc540ddd62de8e46bb7830a993_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_218fcfd2cd34740ddaf4b98f4c64948c8f948edfdc1ed2032c6a236812346f37 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_218fcfd2cd34740ddaf4b98f4c64948c8f948edfdc1ed2032c6a236812346f37->enter($__internal_218fcfd2cd34740ddaf4b98f4c64948c8f948edfdc1ed2032c6a236812346f37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 22
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanreports/js/jquery-ui-1.9.2.custom.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanreports/js/bootstrap-datetimepicker.min.js"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
        \$(function(){
            \$(\"input[name*='startDate'], input[name*='endDate']\").datetimepicker({
                format: 'dd.mm.yyyy',
                weekStart: 1,
                autoclose: true,
                startView: 2,
                minView: 2,
                maxView: 2,
                clearBtn: true,
                todayBtn: true,
                todayHighlight: true,
                language: \"pl\"
            });
        });
    </script>
";
        
        $__internal_218fcfd2cd34740ddaf4b98f4c64948c8f948edfdc1ed2032c6a236812346f37->leave($__internal_218fcfd2cd34740ddaf4b98f4c64948c8f948edfdc1ed2032c6a236812346f37_prof);

        
        $__internal_f20e34b0aa24429883d567196fef04ca307dd5bc540ddd62de8e46bb7830a993->leave($__internal_f20e34b0aa24429883d567196fef04ca307dd5bc540ddd62de8e46bb7830a993_prof);

    }

    // line 45
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b5974c09a238745650725620096a423d12f5dec0d43476bb81de31d122542ead = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b5974c09a238745650725620096a423d12f5dec0d43476bb81de31d122542ead->enter($__internal_b5974c09a238745650725620096a423d12f5dec0d43476bb81de31d122542ead_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_b93c131ed41c179dd785fc18c30066e00abb8f699e46e6817182a7bb934a3b32 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b93c131ed41c179dd785fc18c30066e00abb8f699e46e6817182a7bb934a3b32->enter($__internal_b93c131ed41c179dd785fc18c30066e00abb8f699e46e6817182a7bb934a3b32_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 46
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel='stylesheet' href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/bootstrap-datetimepicker.min.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_b93c131ed41c179dd785fc18c30066e00abb8f699e46e6817182a7bb934a3b32->leave($__internal_b93c131ed41c179dd785fc18c30066e00abb8f699e46e6817182a7bb934a3b32_prof);

        
        $__internal_b5974c09a238745650725620096a423d12f5dec0d43476bb81de31d122542ead->leave($__internal_b5974c09a238745650725620096a423d12f5dec0d43476bb81de31d122542ead_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Vouchers:update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 47,  155 => 46,  146 => 45,  117 => 25,  113 => 24,  107 => 22,  98 => 21,  83 => 15,  80 => 14,  78 => 13,  72 => 9,  69 => 7,  60 => 6,  43 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"GymanAppBundle::layout.html.twig\" %}
{% block title %}
{#Dodaj karnet użytkownikowi {{ member.details.fullName() }}#}
{% endblock title %}

{% block content %}
<div class=\"heading\">
    {#<h3>Dodaj karnet użytkownikowi {{ member.details.fullName() }}</h3>#}
</div>

    <div class=\"row-fluid\">
        <div class=\"span6\">
            {% include \"::_flash.html.twig\" %}

            {{ form(form) }}
        </div>
    </div>

{% endblock %}

{% block javascripts %}
    {{ parent() }}

    <script type=\"text/javascript\" src=\"{{ asset(\"bundles/gymanreports/js/jquery-ui-1.9.2.custom.js\") }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset(\"bundles/gymanreports/js/bootstrap-datetimepicker.min.js\") }}\"></script>

    <script type=\"text/javascript\">
        \$(function(){
            \$(\"input[name*='startDate'], input[name*='endDate']\").datetimepicker({
                format: 'dd.mm.yyyy',
                weekStart: 1,
                autoclose: true,
                startView: 2,
                minView: 2,
                maxView: 2,
                clearBtn: true,
                todayBtn: true,
                todayHighlight: true,
                language: \"pl\"
            });
        });
    </script>
{% endblock javascripts %}

{% block stylesheets %}
    {{ parent() }}
    <link rel='stylesheet' href=\"{{ asset('bundles/dendecalendar/css/bootstrap-datetimepicker.min.css') }}\" />
{% endblock stylesheets %}
", "GymanAppBundle:Vouchers:update.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Vouchers/update.html.twig");
    }
}
