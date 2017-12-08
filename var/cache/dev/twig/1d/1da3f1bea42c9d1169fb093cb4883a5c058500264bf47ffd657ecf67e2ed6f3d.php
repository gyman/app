<?php

/* DashboardBundle:Default:activities.html.twig */
class __TwigTemplate_8bb5134d3bc63143956ac9d1dff3c7dc938556cd7f3bd84c997a34de6e1fc877 extends Twig_Template
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
        $__internal_9296751d9824bc0d0e24a46818b5f1f05fd673780f96d6d91d5a0cb0c90efb61 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9296751d9824bc0d0e24a46818b5f1f05fd673780f96d6d91d5a0cb0c90efb61->enter($__internal_9296751d9824bc0d0e24a46818b5f1f05fd673780f96d6d91d5a0cb0c90efb61_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:activities.html.twig"));

        $__internal_dceff46da90cce2fd3ce7946955153207c2770b63ed9bf7bdd7e21c87a1fdba7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_dceff46da90cce2fd3ce7946955153207c2770b63ed9bf7bdd7e21c87a1fdba7->enter($__internal_dceff46da90cce2fd3ce7946955153207c2770b63ed9bf7bdd7e21c87a1fdba7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:activities.html.twig"));

        // line 1
        echo "<div class=\"reminder\" id=\"activitiesTab\" data-date=\"";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date"] ?? null), "Y-m-d H:i:s"), "html", null, true);
        echo "\">

    <h4><a href=\"#\" class=\"prevActivityDay\">&LeftTriangle;</a> <a href=\"#\" class=\"nextActivityDay\">&RightTriangle;</a>Zajęcia w dniu ";
        // line 3
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date"] ?? null), "d.m.Y (l)"), "html", null, true);
        echo ":
        ";
        // line 4
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_ADMIN")) {
            // line 5
            echo "        <a class=\"icon tip\" href=\"\" oldtitle=\"Configure\" title=\"\" data-hasqtip=\"true\"><span class=\"icon16 icomoon-icon-clock\"></span></a>
        ";
        }
        // line 7
        echo "    </h4>

    <ul>
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["occurrences"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["occurrence"]) {
            if ((twig_length_filter($this->env, ($context["occurrences"] ?? null)) > 0)) {
                // line 11
                echo "            ";
                // line 12
                echo "            <li class=\"clearfix";
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "isOngoing", array(), "method")) {
                    echo " ongoingEvent";
                } elseif (twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "isPast", array(), "method")) {
                    echo " passedEvent";
                }
                echo "\">
                <span class=\"number\">";
                // line 13
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "startDate", array()), "H:i"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "endDate", array()), "H:i"), "html", null, true);
                echo "</span>
                <span class=\"txt\">";
                // line 14
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "event", array()), "title", array()), "html", null, true);
                echo "</span>

                ";
                // line 17
                echo "
                ";
                // line 19
                echo "
                <a class=\"btn btn-warning\" href=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_dashboard_listClassMembers", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["occurrence"], "entries", array()), "count", array()), "html", null, true);
                echo " osób</a>

            </li>
        ";
                $context['_iterated'] = true;
            }
        }
        if (!$context['_iterated']) {
            // line 24
            echo "            <li>brak wydarzeń dla tego dnia</li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['occurrence'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "    </ul>
</div>
";
        
        $__internal_9296751d9824bc0d0e24a46818b5f1f05fd673780f96d6d91d5a0cb0c90efb61->leave($__internal_9296751d9824bc0d0e24a46818b5f1f05fd673780f96d6d91d5a0cb0c90efb61_prof);

        
        $__internal_dceff46da90cce2fd3ce7946955153207c2770b63ed9bf7bdd7e21c87a1fdba7->leave($__internal_dceff46da90cce2fd3ce7946955153207c2770b63ed9bf7bdd7e21c87a1fdba7_prof);

    }

    public function getTemplateName()
    {
        return "DashboardBundle:Default:activities.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 26,  92 => 24,  80 => 20,  77 => 19,  74 => 17,  69 => 14,  63 => 13,  54 => 12,  52 => 11,  46 => 10,  41 => 7,  37 => 5,  35 => 4,  31 => 3,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"reminder\" id=\"activitiesTab\" data-date=\"{{ date|date(\"Y-m-d H:i:s\") }}\">

    <h4><a href=\"#\" class=\"prevActivityDay\">&LeftTriangle;</a> <a href=\"#\" class=\"nextActivityDay\">&RightTriangle;</a>Zajęcia w dniu {{ date|date(\"d.m.Y (l)\") }}:
        {%  if is_granted(\"ROLE_ADMIN\") %}
        <a class=\"icon tip\" href=\"\" oldtitle=\"Configure\" title=\"\" data-hasqtip=\"true\"><span class=\"icon16 icomoon-icon-clock\"></span></a>
        {% endif %}
    </h4>

    <ul>
        {% for occurrence in occurrences if occurrences|length > 0 %}
            {# @var occurrence \\Gyman\\Domain\\Calendar\\Event\\Occurrence #}
            <li class=\"clearfix{% if occurrence.isOngoing() %} ongoingEvent{% elseif occurrence.isPast() %} passedEvent{% endif %}\">
                <span class=\"number\">{{ occurrence.startDate|date(\"H:i\") }} - {{ occurrence.endDate|date(\"H:i\") }}</span>
                <span class=\"txt\">{{ occurrence.event.title }}</span>

                {#&#123;&#35; if occurrence.isOngoing() %}<span class=\"label label-success\" style=\"margin-left: 10px; margin-top: 7px;\">trwa</span>{% endif %}#}

                {#{% if occurrence.isPast(true) %}<span class=\"label\" style=\"margin-left: 10px; margin-top: 7px;\">zakonczone</span>{% endif %}#}

                <a class=\"btn btn-warning\" href=\"{{ path('gyman_dashboard_listClassMembers', {id: occurrence.id}) }}\">{{ occurrence.entries.count }} osób</a>

            </li>
        {% else %}
            <li>brak wydarzeń dla tego dnia</li>
        {% endfor %}
    </ul>
</div>
", "DashboardBundle:Default:activities.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/activities.html.twig");
    }
}
