<?php

/* GymanAppBundle:Entries:renderHistory.html.twig */
class __TwigTemplate_8b56408a59b16a558e50b0f45dbca821347049c3f9f279a73c63a66a1ec3a35c extends Twig_Template
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
        $__internal_3df62af9996d3bb7142d28f83e905d2e3cc0216444823b2954e37ba923059968 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3df62af9996d3bb7142d28f83e905d2e3cc0216444823b2954e37ba923059968->enter($__internal_3df62af9996d3bb7142d28f83e905d2e3cc0216444823b2954e37ba923059968_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Entries:renderHistory.html.twig"));

        $__internal_d28e1a4a860deb226adcf0f51509447d7ba4ad665eddb45f5c6446cbb3459822 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d28e1a4a860deb226adcf0f51509447d7ba4ad665eddb45f5c6446cbb3459822->enter($__internal_d28e1a4a860deb226adcf0f51509447d7ba4ad665eddb45f5c6446cbb3459822_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Entries:renderHistory.html.twig"));

        // line 1
        echo "<table class=\"table table-bordered\">
    <thead>
        <tr>
            <th>";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("entry.type.table_header"), "html", null, true);
        echo "</th>
            <th>";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("entry.event.table_header"), "html", null, true);
        echo "</th>
            <th>";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("entry.startDate.table_header"), "html", null, true);
        echo "</th>
            <th>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("entry.endDate.table_header"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["entries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            if ((twig_length_filter($this->env, ($context["entries"] ?? null)) > 0)) {
                // line 12
                echo "        <tr>
            <td>
                ";
                // line 14
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(("entries.type." . twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "type", array()))), "html", null, true);
                echo "

                ";
                // line 16
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "isType", array(0 => "voucher"), "method")) {
                    // line 17
                    echo "                    (";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "voucher", array()), "startDate", array()), "m.d"), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "voucher", array()), "endDate", array()), "m.d"), "html", null, true);
                    echo ")
                ";
                }
                // line 19
                echo "
                ";
                // line 20
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "isType", array(0 => "paid"), "method")) {
                    // line 21
                    echo "                    (";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "price", array()), "amount", array()) . " ") . twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "price", array()), "currency", array())), "html", null, true);
                    echo ")
                ";
                }
                // line 23
                echo "
            </td>
            <td>
                ";
                // line 26
                if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "occurrence", array()))) {
                    // line 27
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "occurrence", array()), "event", array()), "title", array()), "html", null, true);
                    echo "
                ";
                }
                // line 29
                echo "            </td>
            <td>
            ";
                // line 31
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "startDate", array()), "d.m.Y H:i:s"), "html", null, true);
                echo "
            </td>
            <td>
                ";
                // line 34
                if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "endDate", array()))) {
                    // line 35
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "endDate", array()), "d.m.Y H:i:s"), "html", null, true);
                    echo "
                ";
                } else {
                    // line 37
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_close", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "id", array(), "method"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member.form.close_entry"), "html", null, true);
                    echo "</a>
                ";
                }
                // line 39
                echo "            </td>
        </tr>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "    </tbody>
</table>
";
        
        $__internal_3df62af9996d3bb7142d28f83e905d2e3cc0216444823b2954e37ba923059968->leave($__internal_3df62af9996d3bb7142d28f83e905d2e3cc0216444823b2954e37ba923059968_prof);

        
        $__internal_d28e1a4a860deb226adcf0f51509447d7ba4ad665eddb45f5c6446cbb3459822->leave($__internal_d28e1a4a860deb226adcf0f51509447d7ba4ad665eddb45f5c6446cbb3459822_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Entries:renderHistory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 42,  123 => 39,  115 => 37,  109 => 35,  107 => 34,  101 => 31,  97 => 29,  91 => 27,  89 => 26,  84 => 23,  78 => 21,  76 => 20,  73 => 19,  65 => 17,  63 => 16,  58 => 14,  54 => 12,  49 => 11,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<table class=\"table table-bordered\">
    <thead>
        <tr>
            <th>{{ 'entry.type.table_header'|trans }}</th>
            <th>{{ 'entry.event.table_header'|trans }}</th>
            <th>{{ 'entry.startDate.table_header'|trans }}</th>
            <th>{{ 'entry.endDate.table_header'|trans }}</th>
        </tr>
    </thead>
    <tbody>
    {% for entry in entries if entries|length > 0 %}
        <tr>
            <td>
                {{ (\"entries.type.\" ~ entry.type)|trans }}

                {% if(entry.isType('voucher')) %}
                    ({{ entry.voucher.startDate|date(\"m.d\") }} - {{ entry.voucher.endDate|date(\"m.d\") }})
                {% endif %}

                {% if(entry.isType('paid')) %}
                    ({{ entry.price.amount  ~ ' ' ~ entry.price.currency }})
                {% endif %}

            </td>
            <td>
                {% if entry.occurrence is not null %}
                    {{ entry.occurrence.event.title }}
                {% endif %}
            </td>
            <td>
            {{  entry.startDate|date(\"d.m.Y H:i:s\")  }}
            </td>
            <td>
                {% if entry.endDate is not null %}
                    {{  entry.endDate|date(\"d.m.Y H:i:s\")  }}
                {% else %}
                    <a href=\"{{ path(\"gyman_entry_close\", {id: entry.id()}) }}\">{{ 'member.form.close_entry'|trans }}</a>
                {% endif %}
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
", "GymanAppBundle:Entries:renderHistory.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Entries/renderHistory.html.twig");
    }
}
