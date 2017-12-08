<?php

/* GymanAppBundle:Default:index.html.twig */
class __TwigTemplate_f525638747cbf72a1bca8dc4a09795424df927c745f70f34d05d237c7b0d8eff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanAppBundle::layout.html.twig", "GymanAppBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanAppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_43671f8e1840275f1eb74d3feb577725dd66c6e3cb7057041660a5da8b15a5f5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_43671f8e1840275f1eb74d3feb577725dd66c6e3cb7057041660a5da8b15a5f5->enter($__internal_43671f8e1840275f1eb74d3feb577725dd66c6e3cb7057041660a5da8b15a5f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:index.html.twig"));

        $__internal_92d16224b22ce91ce78155e0feb6bca0d4fec3db26d49b61c83d5ac6a7d57c23 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_92d16224b22ce91ce78155e0feb6bca0d4fec3db26d49b61c83d5ac6a7d57c23->enter($__internal_92d16224b22ce91ce78155e0feb6bca0d4fec3db26d49b61c83d5ac6a7d57c23_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_43671f8e1840275f1eb74d3feb577725dd66c6e3cb7057041660a5da8b15a5f5->leave($__internal_43671f8e1840275f1eb74d3feb577725dd66c6e3cb7057041660a5da8b15a5f5_prof);

        
        $__internal_92d16224b22ce91ce78155e0feb6bca0d4fec3db26d49b61c83d5ac6a7d57c23->leave($__internal_92d16224b22ce91ce78155e0feb6bca0d4fec3db26d49b61c83d5ac6a7d57c23_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_ed720771d308e54c257fde8da8dee72fa04f117d425931bbae5303212120ca34 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ed720771d308e54c257fde8da8dee72fa04f117d425931bbae5303212120ca34->enter($__internal_ed720771d308e54c257fde8da8dee72fa04f117d425931bbae5303212120ca34_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_31faf4a10b9d6820ed683830b7e3b264feb0668c8c14e349bd1f2936d4f408ea = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_31faf4a10b9d6820ed683830b7e3b264feb0668c8c14e349bd1f2936d4f408ea->enter($__internal_31faf4a10b9d6820ed683830b7e3b264feb0668c8c14e349bd1f2936d4f408ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("title.welcome.main_page"), "html", null, true);
        echo "
";
        
        $__internal_31faf4a10b9d6820ed683830b7e3b264feb0668c8c14e349bd1f2936d4f408ea->leave($__internal_31faf4a10b9d6820ed683830b7e3b264feb0668c8c14e349bd1f2936d4f408ea_prof);

        
        $__internal_ed720771d308e54c257fde8da8dee72fa04f117d425931bbae5303212120ca34->leave($__internal_ed720771d308e54c257fde8da8dee72fa04f117d425931bbae5303212120ca34_prof);

    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_9e02a1332150b930986113325fab5656ec8cab244d2d906f297baefc6fdb8357 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9e02a1332150b930986113325fab5656ec8cab244d2d906f297baefc6fdb8357->enter($__internal_9e02a1332150b930986113325fab5656ec8cab244d2d906f297baefc6fdb8357_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_b840ef7524689e9292563017196520ddd95329463c5fcf59b5918ca5ccdaf3c8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b840ef7524689e9292563017196520ddd95329463c5fcf59b5918ca5ccdaf3c8->enter($__internal_b840ef7524689e9292563017196520ddd95329463c5fcf59b5918ca5ccdaf3c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 8
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 10
        echo "
    ";
        // line 11
        $context["lang"] = ((array_key_exists("calendarLang", $context)) ? (($context["calendarLang"] ?? null)) : ("pl"));
        // line 12
        echo "
    <script src='";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/js/jquery.min.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/js/moment.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/js/fullcalendar.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl((("bundles/dendecalendar/js/lang/" . ($context["lang"] ?? null)) . ".js")), "html", null, true);
        echo "'></script>

    <script>
        var eventClickHandler = function() {};
        var dende_calendar_lang = '";
        // line 20
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo "';
        var dende_calendar_tz = '";
        // line 21
        echo twig_escape_filter($this->env, ((array_key_exists("calendarTimezone", $context)) ? (($context["calendarTimezone"] ?? null)) : ("Europe/Warsaw")), "html", null, true);
        echo "';

        \$(document).ready(function() {
            \$('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                allDaySlot: false,
                slotDuration: '00:30:00',
                minTime: '";
        // line 28
        if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "opened_from", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "opened_from", array()), "html", null, true);
            echo ":00";
        } else {
            echo "08:00";
        }
        echo "',
                maxTime: '";
        // line 29
        if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "opened_till", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "opened_till", array()), "html", null, true);
            echo ":00";
        } else {
            echo "22:00";
        }
        echo "',
                timeZone: dende_calendar_tz,
                slotLabelFormat: 'H:00',
                selectable: false,
                lang: dende_calendar_lang,
                events: Routing.generate('dende_calendar_default_getevents', {noroute: true}),
                contentHeight: \"auto\",
                height: \"auto\",
                editable: false,
                eventStartEditable: false,
                eventDurationEditable: false,
                columnFormat: 'ddd'
            })
        });

    </script>
";
        
        $__internal_b840ef7524689e9292563017196520ddd95329463c5fcf59b5918ca5ccdaf3c8->leave($__internal_b840ef7524689e9292563017196520ddd95329463c5fcf59b5918ca5ccdaf3c8_prof);

        
        $__internal_9e02a1332150b930986113325fab5656ec8cab244d2d906f297baefc6fdb8357->leave($__internal_9e02a1332150b930986113325fab5656ec8cab244d2d906f297baefc6fdb8357_prof);

    }

    // line 47
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_0b57f9bb61ddc08f773087ddbde717d6a2bd179c26b55d2c55ecae17b337aa1d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0b57f9bb61ddc08f773087ddbde717d6a2bd179c26b55d2c55ecae17b337aa1d->enter($__internal_0b57f9bb61ddc08f773087ddbde717d6a2bd179c26b55d2c55ecae17b337aa1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_1311a81490ab0b835c33e6d221510f3b30e30cf6f7929374341ed2ea9e24e047 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1311a81490ab0b835c33e6d221510f3b30e30cf6f7929374341ed2ea9e24e047->enter($__internal_1311a81490ab0b835c33e6d221510f3b30e30cf6f7929374341ed2ea9e24e047_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 48
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel='stylesheet' href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/fullcalendar.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_1311a81490ab0b835c33e6d221510f3b30e30cf6f7929374341ed2ea9e24e047->leave($__internal_1311a81490ab0b835c33e6d221510f3b30e30cf6f7929374341ed2ea9e24e047_prof);

        
        $__internal_0b57f9bb61ddc08f773087ddbde717d6a2bd179c26b55d2c55ecae17b337aa1d->leave($__internal_0b57f9bb61ddc08f773087ddbde717d6a2bd179c26b55d2c55ecae17b337aa1d_prof);

    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
        $__internal_a08f2307e3ddee913dfc103c940ee4b2f31e030c10bf6aa81bbd6dd39253ddb8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a08f2307e3ddee913dfc103c940ee4b2f31e030c10bf6aa81bbd6dd39253ddb8->enter($__internal_a08f2307e3ddee913dfc103c940ee4b2f31e030c10bf6aa81bbd6dd39253ddb8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_4ad164ab06392fae93a94d233d1088132d9bf7665c4dfce9746f545096c2650f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4ad164ab06392fae93a94d233d1088132d9bf7665c4dfce9746f545096c2650f->enter($__internal_4ad164ab06392fae93a94d233d1088132d9bf7665c4dfce9746f545096c2650f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 53
        echo "<div class=\"contentwrapper\" style=\"margin-top: 20px\">


    ";
        // line 57
        echo "
        ";
        // line 59
        echo "
    ";
        // line 61
        echo "
    <div class=\"row-fluid\">
        <div class=\"span8\">
            ";
        // line 64
        echo twig_include($this->env, $context, "@GymanApp/Default/_club_tabs.html.twig");
        echo "
        </div>

        ";
        // line 67
        if ((null === twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()))) {
            // line 68
            echo "        <div class=\"span4 well\">
            ";
            // line 69
            echo twig_include($this->env, $context, "@GymanApp/Default/_login_form.html.twig");
            echo "
        </div>

        ";
        }
        // line 73
        echo "    </div>
</div>

";
        
        $__internal_4ad164ab06392fae93a94d233d1088132d9bf7665c4dfce9746f545096c2650f->leave($__internal_4ad164ab06392fae93a94d233d1088132d9bf7665c4dfce9746f545096c2650f_prof);

        
        $__internal_a08f2307e3ddee913dfc103c940ee4b2f31e030c10bf6aa81bbd6dd39253ddb8->leave($__internal_a08f2307e3ddee913dfc103c940ee4b2f31e030c10bf6aa81bbd6dd39253ddb8_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 73,  223 => 69,  220 => 68,  218 => 67,  212 => 64,  207 => 61,  204 => 59,  201 => 57,  196 => 53,  187 => 52,  175 => 49,  170 => 48,  161 => 47,  129 => 29,  120 => 28,  110 => 21,  106 => 20,  99 => 16,  95 => 15,  91 => 14,  87 => 13,  84 => 12,  82 => 11,  79 => 10,  74 => 8,  65 => 7,  52 => 4,  43 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanAppBundle::layout.html.twig' %}

{% block title %}
    {{ \"title.welcome.main_page\"|trans }}
{% endblock title %}

{% block javascripts %}
    {{ parent() }}
    {# @var club \\Gyman\\Bundle\\ClubBundle\\Entity\\Club #}

    {% set lang = calendarLang is defined ? calendarLang : 'pl' %}

    <script src='{{ asset(\"bundles/dendecalendar/js/jquery.min.js\") }}'></script>
    <script src='{{ asset(\"bundles/dendecalendar/js/moment.js\") }}'></script>
    <script src='{{ asset(\"bundles/dendecalendar/js/fullcalendar.js\") }}'></script>
    <script src='{{ asset(\"bundles/dendecalendar/js/lang/\" ~ lang ~ \".js\") }}'></script>

    <script>
        var eventClickHandler = function() {};
        var dende_calendar_lang = '{{ lang }}';
        var dende_calendar_tz = '{{ calendarTimezone is defined ? calendarTimezone : 'Europe/Warsaw' }}';

        \$(document).ready(function() {
            \$('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                allDaySlot: false,
                slotDuration: '00:30:00',
                minTime: '{% if club.details.opened_from is not null %}{{ club.details.opened_from }}:00{% else %}08:00{% endif %}',
                maxTime: '{% if club.details.opened_till is not null %}{{ club.details.opened_till }}:00{% else %}22:00{% endif %}',
                timeZone: dende_calendar_tz,
                slotLabelFormat: 'H:00',
                selectable: false,
                lang: dende_calendar_lang,
                events: Routing.generate('dende_calendar_default_getevents', {noroute: true}),
                contentHeight: \"auto\",
                height: \"auto\",
                editable: false,
                eventStartEditable: false,
                eventDurationEditable: false,
                columnFormat: 'ddd'
            })
        });

    </script>
{% endblock javascripts %}

{% block stylesheets %}
    {{ parent() }}
    <link rel='stylesheet' href=\"{{ asset('bundles/dendecalendar/css/fullcalendar.css') }}\" />
{% endblock stylesheets %}

{% block content %}
<div class=\"contentwrapper\" style=\"margin-top: 20px\">


    {#<div class=\"heading\">#}

        {#<h3>Dodaj użytkownika</h3>#}

    {#</div>#}

    <div class=\"row-fluid\">
        <div class=\"span8\">
            {{ include('@GymanApp/Default/_club_tabs.html.twig') }}
        </div>

        {% if app.user is null %}
        <div class=\"span4 well\">
            {{ include('@GymanApp/Default/_login_form.html.twig') }}
        </div>

        {% endif %}
    </div>
</div>

{% endblock content %}

", "GymanAppBundle:Default:index.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/index.html.twig");
    }
}
