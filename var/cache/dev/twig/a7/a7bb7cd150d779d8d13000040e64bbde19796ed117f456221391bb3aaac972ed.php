<?php

/* @GymanApp/Vouchers/renderHistory.html.twig */
class __TwigTemplate_cfa09e53490a7bfd4a3644e5f34c9d799f4923c72d13237bf39b66b22c165abf extends Twig_Template
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
        $__internal_accdba1fe343844f9b58b19552985e96d933ec31168dafcaf7bf2be7ea07298e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_accdba1fe343844f9b58b19552985e96d933ec31168dafcaf7bf2be7ea07298e->enter($__internal_accdba1fe343844f9b58b19552985e96d933ec31168dafcaf7bf2be7ea07298e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Vouchers/renderHistory.html.twig"));

        $__internal_a80eb6fe05be74b120a03bd136b3b8e3d2520fa26a371d34274976e5832ff9bc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a80eb6fe05be74b120a03bd136b3b8e3d2520fa26a371d34274976e5832ff9bc->enter($__internal_a80eb6fe05be74b120a03bd136b3b8e3d2520fa26a371d34274976e5832ff9bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Vouchers/renderHistory.html.twig"));

        // line 1
        echo "<table class=\"table table-bordered\">
    <thead>
    <tr>
        <th>";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("vouchers.dates.table_header"), "html", null, true);
        echo "</th>
        <th>";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("vouchers.entries.table_header"), "html", null, true);
        echo "</th>
        <th>";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("vouchers.price.table_header"), "html", null, true);
        echo "</th>
        <th>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("vouchers.actions.table_header"), "html", null, true);
        echo "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["vouchers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
            // line 12
            echo "    ";
            // line 13
            echo "        <tr";
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "current", array())) {
                echo " style=\"background-color: #f9f2bd\"";
            }
            echo ">
            <td>
                od: <strong>";
            // line 15
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "startDate", array()), "d.m.y"), "html", null, true);
            echo "</strong>

                do: <span";
            // line 17
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "isClosed", array(), "method")) {
                echo " style=\"text-decoration: line-through;\"";
            }
            echo ">
                    <strong>";
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "endDate", array()), "d.m.y"), "html", null, true);
            echo "</strong>
                </span>

                ";
            // line 21
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "closed", array())) {
                // line 22
                echo "                    <br />(zamknięty ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "closedAt", array()), "d.m.y"), "html", null, true);
                echo ")
                ";
            }
            // line 24
            echo "
                ";
            // line 25
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "endDate", array()))) {
                // line 26
                echo "                    <br />ważny przez <strong>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "totalDaysAmount", array()), "html", null, true);
                echo "</strong> dni
                ";
            }
            // line 28
            echo "            </td>
            <td>
                ";
            // line 30
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "unlimited", array())) {
                // line 31
                echo "                    bez limitu wejść
                ";
            } else {
                // line 33
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "leftEntriesAmount", array()) > 0)) {
                    // line 34
                    echo "                        zostało <strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "leftEntriesAmount", array()), "html", null, true);
                    echo "</strong> z <strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "maximumAmount", array()), "html", null, true);
                    echo " wejść</strong>
                    ";
                } else {
                    // line 36
                    echo "                        brak wolnych wejść
                    ";
                }
                // line 38
                echo "                ";
            }
            // line 39
            echo "            </td>
            <td>
                ";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "price", array()), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 44
            if (( !twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "closed", array()) && (twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "leftDaysAmount", array()) > 0))) {
                // line 45
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_vouchers_close", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "id", array()))), "html", null, true);
                echo "\" onClick=\"return confirm('";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("members.close_voucher.confirm_alert"), "html", null, true);
                echo "')\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member.form.close_voucher"), "html", null, true);
                echo "</a> |
                ";
            }
            // line 47
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_voucher_update", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["voucher"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member.form.update_voucher"), "html", null, true);
            echo "</a>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "    </tbody>
</table>
";
        
        $__internal_accdba1fe343844f9b58b19552985e96d933ec31168dafcaf7bf2be7ea07298e->leave($__internal_accdba1fe343844f9b58b19552985e96d933ec31168dafcaf7bf2be7ea07298e_prof);

        
        $__internal_a80eb6fe05be74b120a03bd136b3b8e3d2520fa26a371d34274976e5832ff9bc->leave($__internal_a80eb6fe05be74b120a03bd136b3b8e3d2520fa26a371d34274976e5832ff9bc_prof);

    }

    public function getTemplateName()
    {
        return "@GymanApp/Vouchers/renderHistory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 51,  149 => 47,  139 => 45,  137 => 44,  131 => 41,  127 => 39,  124 => 38,  120 => 36,  112 => 34,  109 => 33,  105 => 31,  103 => 30,  99 => 28,  93 => 26,  91 => 25,  88 => 24,  82 => 22,  80 => 21,  74 => 18,  68 => 17,  63 => 15,  55 => 13,  53 => 12,  49 => 11,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<table class=\"table table-bordered\">
    <thead>
    <tr>
        <th>{{ 'vouchers.dates.table_header'|trans }}</th>
        <th>{{ 'vouchers.entries.table_header'|trans }}</th>
        <th>{{ 'vouchers.price.table_header'|trans }}</th>
        <th>{{ 'vouchers.actions.table_header'|trans }}</th>
    </tr>
    </thead>
    <tbody>
    {% for voucher in vouchers %}
    {# @var voucher \\Gyman\\Domain\\Voucher #}
        <tr{% if voucher.current %} style=\"background-color: #f9f2bd\"{% endif %}>
            <td>
                od: <strong>{{  voucher.startDate|date(\"d.m.y\")  }}</strong>

                do: <span{% if voucher.isClosed() %} style=\"text-decoration: line-through;\"{% endif %}>
                    <strong>{{ voucher.endDate|date(\"d.m.y\") }}</strong>
                </span>

                {% if voucher.closed %}
                    <br />(zamknięty {{  voucher.closedAt|date(\"d.m.y\") }})
                {% endif %}

                {% if voucher.endDate is not null %}
                    <br />ważny przez <strong>{{ voucher.totalDaysAmount }}</strong> dni
                {% endif %}
            </td>
            <td>
                {% if voucher.unlimited %}
                    bez limitu wejść
                {% else %}
                    {% if voucher.leftEntriesAmount > 0 %}
                        zostało <strong>{{ voucher.leftEntriesAmount }}</strong> z <strong>{{ voucher.maximumAmount }} wejść</strong>
                    {% else %}
                        brak wolnych wejść
                    {% endif %}
                {% endif %}
            </td>
            <td>
                {{  voucher.price }}
            </td>
            <td>
                {% if not voucher.closed and voucher.leftDaysAmount > 0 %}
                <a href=\"{{ path(\"gyman_vouchers_close\", {id : voucher.id}) }}\" onClick=\"return confirm('{{ 'members.close_voucher.confirm_alert'|trans }}')\">{{ \"member.form.close_voucher\"|trans }}</a> |
                {% endif %}
                <a href=\"{{ path(\"gyman_voucher_update\", {id : voucher.id}) }}\">{{ \"member.form.update_voucher\"|trans }}</a>
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
", "@GymanApp/Vouchers/renderHistory.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Vouchers/renderHistory.html.twig");
    }
}
