<?php

/* @GymanApp/Default/_club_tabs.html.twig */
class __TwigTemplate_23fe14cf67320b696e25d28f98e970a19863060be2f708c7e5c7c0d65f555966 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3a2319b1b5a12068afda0ada1bf9de3b55ecd50c60b2b59ed9267c95fe8ec0a1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3a2319b1b5a12068afda0ada1bf9de3b55ecd50c60b2b59ed9267c95fe8ec0a1->enter($__internal_3a2319b1b5a12068afda0ada1bf9de3b55ecd50c60b2b59ed9267c95fe8ec0a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Default/_club_tabs.html.twig"));

        $__internal_499d147ffe60bb73c6cd1d63c299a99a3b81418abf572a3709fc4cf9c964ba7f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_499d147ffe60bb73c6cd1d63c299a99a3b81418abf572a3709fc4cf9c964ba7f->enter($__internal_499d147ffe60bb73c6cd1d63c299a99a3b81418abf572a3709fc4cf9c964ba7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Default/_club_tabs.html.twig"));

        // line 1
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("gyman.landing.menu.tabs", array("template" => "GymanAppBundle:Default:Menu/tabs.html.twig", "currentAsLink" => true, "depth" => 1, "currentClass" => ""));
        // line 6
        echo "

<div class=\"tab-content\">
    <div id=\"schedulePane\" class=\"tab-pane fade in active\">
        <fieldset class=\"row-fluid\">
            <div id=\"calendar\"></div>
        </fieldset>
    </div>

    <div class=\"tab-pane fade in\" id=\"addressPane\">
        <fieldset class=\"row-fluid\">
            <legend>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "name", array()), "html", null, true);
        echo "</legend>
            <address class=\"span3\">
                <dl>
                    <dt>Street</dt>
                    <dd>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "address", array()), "html", null, true);
        echo "</dd>
                    <dt>Postcode</dt>
                    <dd>";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "zipcode", array()), "html", null, true);
        echo "</dd>
                    <dt>City</dt>
                    <dd>";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "city", array()), "html", null, true);
        echo "</dd>
                    <dt>Country</dt>
                    <dd>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "country", array()), "html", null, true);
        echo "</dd>
                    <dt>Tel:</dt>
                    <dd>";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "phone_number", array()), "html", null, true);
        echo "</dd>
                    <dt>e-mail:</dt>
                    <dd><a href=\"mailto:";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "email_address", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "email_address", array()), "html", null, true);
        echo "</a></dd>
                </dl>
            </address>

            <dl class=\"span4\">
                <dt>Opened from</dt>
                <dd>";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "opened_from", array()), "html", null, true);
        echo "</dd>
                <dt>Opened till</dt>
                <dd>";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "opened_till", array()), "html", null, true);
        echo "</dd>
                <dt>About us</dt>
                <dd>";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "about", array()), "html", null, true);
        echo "</dd>
            </dl>
        </fieldset>
    </div>

    <div class=\"tab-pane fade in\" id=\"mapPane\">
        <iframe width=\"100%\" height=\"100%\" frameborder=\"0\" style=\"border:0; height: 300px;\"
                src=\"https://www.google.com/maps/embed/v1/place?key=";
        // line 48
        echo twig_escape_filter($this->env, ($context["google_maps_api_key"] ?? null), "html", null, true);
        echo "&q=";
        echo twig_escape_filter($this->env, twig_urlencode_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "address", array())), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, twig_urlencode_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "city", array())), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, twig_urlencode_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "country", array())), "html", null, true);
        echo "\" allowfullscreen>
        </iframe>
    </div>
</div>";
        
        $__internal_3a2319b1b5a12068afda0ada1bf9de3b55ecd50c60b2b59ed9267c95fe8ec0a1->leave($__internal_3a2319b1b5a12068afda0ada1bf9de3b55ecd50c60b2b59ed9267c95fe8ec0a1_prof);

        
        $__internal_499d147ffe60bb73c6cd1d63c299a99a3b81418abf572a3709fc4cf9c964ba7f->leave($__internal_499d147ffe60bb73c6cd1d63c299a99a3b81418abf572a3709fc4cf9c964ba7f_prof);

    }

    public function getTemplateName()
    {
        return "@GymanApp/Default/_club_tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 48,  93 => 41,  88 => 39,  83 => 37,  72 => 31,  67 => 29,  62 => 27,  57 => 25,  52 => 23,  47 => 21,  40 => 17,  27 => 6,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ knp_menu_render('gyman.landing.menu.tabs', {
    'template': 'GymanAppBundle:Default:Menu/tabs.html.twig',
    'currentAsLink' : true,
    'depth' : 1,
    'currentClass' : '',
}) }}

<div class=\"tab-content\">
    <div id=\"schedulePane\" class=\"tab-pane fade in active\">
        <fieldset class=\"row-fluid\">
            <div id=\"calendar\"></div>
        </fieldset>
    </div>

    <div class=\"tab-pane fade in\" id=\"addressPane\">
        <fieldset class=\"row-fluid\">
            <legend>{{ club.name }}</legend>
            <address class=\"span3\">
                <dl>
                    <dt>Street</dt>
                    <dd>{{ club.details.address }}</dd>
                    <dt>Postcode</dt>
                    <dd>{{ club.details.zipcode }}</dd>
                    <dt>City</dt>
                    <dd>{{ club.details.city }}</dd>
                    <dt>Country</dt>
                    <dd>{{ club.details.country }}</dd>
                    <dt>Tel:</dt>
                    <dd>{{ club.details.phone_number }}</dd>
                    <dt>e-mail:</dt>
                    <dd><a href=\"mailto:{{ club.details.email_address }}\">{{ club.details.email_address }}</a></dd>
                </dl>
            </address>

            <dl class=\"span4\">
                <dt>Opened from</dt>
                <dd>{{ club.details.opened_from }}</dd>
                <dt>Opened till</dt>
                <dd>{{ club.details.opened_till }}</dd>
                <dt>About us</dt>
                <dd>{{ club.details.about }}</dd>
            </dl>
        </fieldset>
    </div>

    <div class=\"tab-pane fade in\" id=\"mapPane\">
        <iframe width=\"100%\" height=\"100%\" frameborder=\"0\" style=\"border:0; height: 300px;\"
                src=\"https://www.google.com/maps/embed/v1/place?key={{ google_maps_api_key }}&q={{ club.details.address|url_encode }},{{ club.details.city|url_encode }},{{ club.details.country|url_encode }}\" allowfullscreen>
        </iframe>
    </div>
</div>", "@GymanApp/Default/_club_tabs.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/_club_tabs.html.twig");
    }
}
