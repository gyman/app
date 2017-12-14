<?php

/* @GymanApp/Members/Modal/_voucher.html.twig */
class __TwigTemplate_3beb99f861cdf410c38bedcc36efd6843d37254ebe34b8f211bd19a2c087755b extends Twig_Template
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
        $__internal_3b083f9874f25b5ab826c257b2288e971dfacd836734c5d99272c4d621266946 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3b083f9874f25b5ab826c257b2288e971dfacd836734c5d99272c4d621266946->enter($__internal_3b083f9874f25b5ab826c257b2288e971dfacd836734c5d99272c4d621266946_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/Modal/_voucher.html.twig"));

        $__internal_cebe5f573f3570d09910c6d5152ab86e6c6495eb7c353fd6de9f8dc16639c2c7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cebe5f573f3570d09910c6d5152ab86e6c6495eb7c353fd6de9f8dc16639c2c7->enter($__internal_cebe5f573f3570d09910c6d5152ab86e6c6495eb7c353fd6de9f8dc16639c2c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/Modal/_voucher.html.twig"));

        // line 1
        echo "<div class=\"container-fluid\">

    ";
        // line 3
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "hasCurrentVoucher", array()) && twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "currentVoucher", array(), "method"), "isCurrent", array(), "method"))) {
            // line 4
            echo "        ";
            $context["voucher"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "currentVoucher", array());
            // line 5
            echo "    <div class=\"row-fluid\">

        ";
            // line 7
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "endDate", array(), "method"))) {
                // line 8
                echo "        <div class=\"span6\">
            <div class=\"page-header\">
                <h4>Wykorzystane dni</h4>
            </div>

            <div style=\"
            width: 100%;
            height: 30px;
            background: lightgray;
            display: block;
            border: 1px solid darkgrey;
            line-height: 30px;
            position: relative;
            \">
                <div style=\"width: ";
                // line 22
                echo twig_escape_filter($this->env, ((100 * twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "passedDaysAmount", array(), "method")) / twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "totalDaysAmount", array(), "method")), "html", null, true);
                echo "%;
                    height: 30px;
                    background: darkgrey;
                    border-right: 1px solid white;
                    display: block;
                    text-align: center;\">

                </div>
                <div style=\"width: 100%; position: absolute; top: 0; left: 0; text-align: center;\">
                    ";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "passedDaysAmount", array(), "method"), "html", null, true);
                echo " dni z ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "totalDaysAmount", array(), "method"), "html", null, true);
                echo "
                </div>
            </div>
        </div>
        ";
            }
            // line 36
            echo "
        ";
            // line 37
            if ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "isUnlimited", array(), "method")) {
                // line 38
                echo "        <div class=\"span6\">
            <div class=\"page-header\">
                <h4>Wykorzystane wejścia</h4>
            </div>

            <div style=\"width: 100%;
            width: 100%;
            height: 30px;
            background: lightgray;
            display: block;
            border: 1px solid darkgrey;
            line-height: 30px;
            position: relative;
            \">
                <div style=\"width: ";
                // line 52
                echo twig_escape_filter($this->env, ((100 * twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "usedEntriesAmount", array(), "method")) / twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "maximumAmount", array(), "method")), "html", null, true);
                echo "%; height: 30px; background: darkgrey; border-right: 1px solid white; display: block;\"></div>
                <div style=\"width: 100%; position: absolute; top: 0; left: 0; text-align: center;\">
                    wykorzystano ";
                // line 54
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "usedEntriesAmount", array(), "method"), "html", null, true);
                echo " wejść z ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["voucher"] ?? null), "maximumAmount", array(), "method"), "html", null, true);
                echo "
                </div>
            </div>
        </div>
        ";
            }
            // line 59
            echo "    </div>
        ";
        } else {
            // line 61
            echo "            <div class=\"page-header\">
                <h4>Brak aktualnego karnetu.</h4>
            </div>

            <div class=\"row-fluid\">
                <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_voucher_new", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "id", array(), "method"))), "html", null, true);
            echo "\" class=\"btn btn-large btn-primary\">Sprzedaj karnet</a>
            </div>

        ";
        }
        // line 70
        echo "</div>
";
        
        $__internal_3b083f9874f25b5ab826c257b2288e971dfacd836734c5d99272c4d621266946->leave($__internal_3b083f9874f25b5ab826c257b2288e971dfacd836734c5d99272c4d621266946_prof);

        
        $__internal_cebe5f573f3570d09910c6d5152ab86e6c6495eb7c353fd6de9f8dc16639c2c7->leave($__internal_cebe5f573f3570d09910c6d5152ab86e6c6495eb7c353fd6de9f8dc16639c2c7_prof);

    }

    public function getTemplateName()
    {
        return "@GymanApp/Members/Modal/_voucher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 70,  125 => 66,  118 => 61,  114 => 59,  104 => 54,  99 => 52,  83 => 38,  81 => 37,  78 => 36,  68 => 31,  56 => 22,  40 => 8,  38 => 7,  34 => 5,  31 => 4,  29 => 3,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container-fluid\">

    {% if member.hasCurrentVoucher and member.currentVoucher().isCurrent() %}
        {% set voucher = member.currentVoucher %}
    <div class=\"row-fluid\">

        {% if voucher.endDate() is not null %}
        <div class=\"span6\">
            <div class=\"page-header\">
                <h4>Wykorzystane dni</h4>
            </div>

            <div style=\"
            width: 100%;
            height: 30px;
            background: lightgray;
            display: block;
            border: 1px solid darkgrey;
            line-height: 30px;
            position: relative;
            \">
                <div style=\"width: {{ 100 * voucher.passedDaysAmount() / voucher.totalDaysAmount() }}%;
                    height: 30px;
                    background: darkgrey;
                    border-right: 1px solid white;
                    display: block;
                    text-align: center;\">

                </div>
                <div style=\"width: 100%; position: absolute; top: 0; left: 0; text-align: center;\">
                    {{ voucher.passedDaysAmount() }} dni z {{ voucher.totalDaysAmount() }}
                </div>
            </div>
        </div>
        {% endif %}

        {% if not voucher.isUnlimited() %}
        <div class=\"span6\">
            <div class=\"page-header\">
                <h4>Wykorzystane wejścia</h4>
            </div>

            <div style=\"width: 100%;
            width: 100%;
            height: 30px;
            background: lightgray;
            display: block;
            border: 1px solid darkgrey;
            line-height: 30px;
            position: relative;
            \">
                <div style=\"width: {{ 100 * voucher.usedEntriesAmount() / voucher.maximumAmount() }}%; height: 30px; background: darkgrey; border-right: 1px solid white; display: block;\"></div>
                <div style=\"width: 100%; position: absolute; top: 0; left: 0; text-align: center;\">
                    wykorzystano {{ voucher.usedEntriesAmount() }} wejść z {{ voucher.maximumAmount() }}
                </div>
            </div>
        </div>
        {% endif %}
    </div>
        {% else %}
            <div class=\"page-header\">
                <h4>Brak aktualnego karnetu.</h4>
            </div>

            <div class=\"row-fluid\">
                <a href=\"{{ path(\"gyman_voucher_new\", {id: member.id()}) }}\" class=\"btn btn-large btn-primary\">Sprzedaj karnet</a>
            </div>

        {% endif %}
</div>
", "@GymanApp/Members/Modal/_voucher.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/Modal/_voucher.html.twig");
    }
}
