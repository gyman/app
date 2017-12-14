<?php

/* @GymanApp/Default/_club_tabs.html.twig */
class __TwigTemplate_7a9ffb337877745032b700bec338da625369b3b81c1f0eec01ee564e26bb4b57 extends Twig_Template
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
        return array (  97 => 48,  87 => 41,  82 => 39,  77 => 37,  66 => 31,  61 => 29,  56 => 27,  51 => 25,  46 => 23,  41 => 21,  34 => 17,  21 => 6,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@GymanApp/Default/_club_tabs.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/_club_tabs.html.twig");
    }
}
