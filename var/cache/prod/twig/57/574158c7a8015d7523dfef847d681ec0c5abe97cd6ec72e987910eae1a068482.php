<?php

/* DashboardBundle:Default:activities.html.twig */
class __TwigTemplate_d8a3dc5180cccf50256ffb17b66db2d8f20bb8bc63fee95fe3ec38cf2d1de530 extends Twig_Template
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
        return array (  93 => 26,  86 => 24,  74 => 20,  71 => 19,  68 => 17,  63 => 14,  57 => 13,  48 => 12,  46 => 11,  40 => 10,  35 => 7,  31 => 5,  29 => 4,  25 => 3,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "DashboardBundle:Default:activities.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/activities.html.twig");
    }
}
