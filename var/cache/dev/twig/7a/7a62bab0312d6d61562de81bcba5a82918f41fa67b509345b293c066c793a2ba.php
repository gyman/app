<?php

/* GymanAppBundle:Default:index.html.twig */
class __TwigTemplate_c79d7d883332c539c3071a28e9ca2100be93b25d7bf0fd94a99d0a26fb43b1d9 extends Twig_Template
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
        $__internal_e87ec8b47ee17027c23752bff30e20b095a5833884d9b3ad8269b1a7ddd22542 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e87ec8b47ee17027c23752bff30e20b095a5833884d9b3ad8269b1a7ddd22542->enter($__internal_e87ec8b47ee17027c23752bff30e20b095a5833884d9b3ad8269b1a7ddd22542_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:index.html.twig"));

        $__internal_f3e6e5e501e998ff6d4934dab61f96399a23fb3b2efd67327c6cd66067624b9b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f3e6e5e501e998ff6d4934dab61f96399a23fb3b2efd67327c6cd66067624b9b->enter($__internal_f3e6e5e501e998ff6d4934dab61f96399a23fb3b2efd67327c6cd66067624b9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e87ec8b47ee17027c23752bff30e20b095a5833884d9b3ad8269b1a7ddd22542->leave($__internal_e87ec8b47ee17027c23752bff30e20b095a5833884d9b3ad8269b1a7ddd22542_prof);

        
        $__internal_f3e6e5e501e998ff6d4934dab61f96399a23fb3b2efd67327c6cd66067624b9b->leave($__internal_f3e6e5e501e998ff6d4934dab61f96399a23fb3b2efd67327c6cd66067624b9b_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_c69a2ff14ccfa246ab4e25c2082969bd1f8e4ec7b32efd02e08f7609eb02c06a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c69a2ff14ccfa246ab4e25c2082969bd1f8e4ec7b32efd02e08f7609eb02c06a->enter($__internal_c69a2ff14ccfa246ab4e25c2082969bd1f8e4ec7b32efd02e08f7609eb02c06a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_c969c247bd50114225ea07a4f1314fac598fa7b25d46cc4c2403b76be578229f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c969c247bd50114225ea07a4f1314fac598fa7b25d46cc4c2403b76be578229f->enter($__internal_c969c247bd50114225ea07a4f1314fac598fa7b25d46cc4c2403b76be578229f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("title.welcome.main_page"), "html", null, true);
        echo "
";
        
        $__internal_c969c247bd50114225ea07a4f1314fac598fa7b25d46cc4c2403b76be578229f->leave($__internal_c969c247bd50114225ea07a4f1314fac598fa7b25d46cc4c2403b76be578229f_prof);

        
        $__internal_c69a2ff14ccfa246ab4e25c2082969bd1f8e4ec7b32efd02e08f7609eb02c06a->leave($__internal_c69a2ff14ccfa246ab4e25c2082969bd1f8e4ec7b32efd02e08f7609eb02c06a_prof);

    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_696686cae8d337b3b5ba29c8e81751900784e6cbef90b49c2f6cee2d82ce8a5e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_696686cae8d337b3b5ba29c8e81751900784e6cbef90b49c2f6cee2d82ce8a5e->enter($__internal_696686cae8d337b3b5ba29c8e81751900784e6cbef90b49c2f6cee2d82ce8a5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_a3719dcbe8f2e008df724837477c1fe0c7a92d67bdd8c989074e559b368a726e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a3719dcbe8f2e008df724837477c1fe0c7a92d67bdd8c989074e559b368a726e->enter($__internal_a3719dcbe8f2e008df724837477c1fe0c7a92d67bdd8c989074e559b368a726e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

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
        
        $__internal_a3719dcbe8f2e008df724837477c1fe0c7a92d67bdd8c989074e559b368a726e->leave($__internal_a3719dcbe8f2e008df724837477c1fe0c7a92d67bdd8c989074e559b368a726e_prof);

        
        $__internal_696686cae8d337b3b5ba29c8e81751900784e6cbef90b49c2f6cee2d82ce8a5e->leave($__internal_696686cae8d337b3b5ba29c8e81751900784e6cbef90b49c2f6cee2d82ce8a5e_prof);

    }

    // line 47
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_ca74b07c6731bbebdb8863e06bafe1713627b002a1811b97436815a3e691dd0e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ca74b07c6731bbebdb8863e06bafe1713627b002a1811b97436815a3e691dd0e->enter($__internal_ca74b07c6731bbebdb8863e06bafe1713627b002a1811b97436815a3e691dd0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_8efc6985d498d1f7ee6c220572bc31958eaccdca4742c58894fec9dcc86a2229 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8efc6985d498d1f7ee6c220572bc31958eaccdca4742c58894fec9dcc86a2229->enter($__internal_8efc6985d498d1f7ee6c220572bc31958eaccdca4742c58894fec9dcc86a2229_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 48
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel='stylesheet' href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/fullcalendar.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_8efc6985d498d1f7ee6c220572bc31958eaccdca4742c58894fec9dcc86a2229->leave($__internal_8efc6985d498d1f7ee6c220572bc31958eaccdca4742c58894fec9dcc86a2229_prof);

        
        $__internal_ca74b07c6731bbebdb8863e06bafe1713627b002a1811b97436815a3e691dd0e->leave($__internal_ca74b07c6731bbebdb8863e06bafe1713627b002a1811b97436815a3e691dd0e_prof);

    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
        $__internal_a3612f09d9d0eb441971a33781bbe95eac79a3c300bcc01929a24629d604c44e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a3612f09d9d0eb441971a33781bbe95eac79a3c300bcc01929a24629d604c44e->enter($__internal_a3612f09d9d0eb441971a33781bbe95eac79a3c300bcc01929a24629d604c44e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_680bfed5e59313dca10d8824aee44e101fb231b49a837af8982d4d43533e0b1c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_680bfed5e59313dca10d8824aee44e101fb231b49a837af8982d4d43533e0b1c->enter($__internal_680bfed5e59313dca10d8824aee44e101fb231b49a837af8982d4d43533e0b1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
        
        $__internal_680bfed5e59313dca10d8824aee44e101fb231b49a837af8982d4d43533e0b1c->leave($__internal_680bfed5e59313dca10d8824aee44e101fb231b49a837af8982d4d43533e0b1c_prof);

        
        $__internal_a3612f09d9d0eb441971a33781bbe95eac79a3c300bcc01929a24629d604c44e->leave($__internal_a3612f09d9d0eb441971a33781bbe95eac79a3c300bcc01929a24629d604c44e_prof);

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
