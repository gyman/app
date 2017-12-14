<?php

/* GymanAppBundle:Default:index.html.twig */
class __TwigTemplate_a1d4468c4e1a49ffbb55e00cf37a68deb0688d9ea0b69caeaf6531e6e2c446e5 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("title.welcome.main_page"), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
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
    }

    // line 47
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 48
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel='stylesheet' href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/fullcalendar.css"), "html", null, true);
        echo "\" />
";
    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
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
        return array (  176 => 73,  169 => 69,  166 => 68,  164 => 67,  158 => 64,  153 => 61,  150 => 59,  147 => 57,  142 => 53,  139 => 52,  133 => 49,  128 => 48,  125 => 47,  99 => 29,  90 => 28,  80 => 21,  76 => 20,  69 => 16,  65 => 15,  61 => 14,  57 => 13,  54 => 12,  52 => 11,  49 => 10,  44 => 8,  41 => 7,  34 => 4,  31 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GymanAppBundle:Default:index.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/index.html.twig");
    }
}
