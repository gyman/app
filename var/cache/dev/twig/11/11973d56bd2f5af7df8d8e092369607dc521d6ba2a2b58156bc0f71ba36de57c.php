<?php

/* MailerBundle:Templates:creditEntry.html.twig */
class __TwigTemplate_71efa8c9a012fd66ab196812e81a3c561062ce8718f7617362a3141a1ec4dfb4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("MailerBundle::layout.html.twig", "MailerBundle:Templates:creditEntry.html.twig", 5);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MailerBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c8205c63a9958456c6b2ee33a054cd0f045ef694b82f7419bec4c8cda4978dd5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c8205c63a9958456c6b2ee33a054cd0f045ef694b82f7419bec4c8cda4978dd5->enter($__internal_c8205c63a9958456c6b2ee33a054cd0f045ef694b82f7419bec4c8cda4978dd5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MailerBundle:Templates:creditEntry.html.twig"));

        $__internal_c9a0e8ea5dab8cd06b7beec2f00276b13e6f2b24c0de53258c2ac4aa12ee86d3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c9a0e8ea5dab8cd06b7beec2f00276b13e6f2b24c0de53258c2ac4aa12ee86d3->enter($__internal_c9a0e8ea5dab8cd06b7beec2f00276b13e6f2b24c0de53258c2ac4aa12ee86d3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MailerBundle:Templates:creditEntry.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c8205c63a9958456c6b2ee33a054cd0f045ef694b82f7419bec4c8cda4978dd5->leave($__internal_c8205c63a9958456c6b2ee33a054cd0f045ef694b82f7419bec4c8cda4978dd5_prof);

        
        $__internal_c9a0e8ea5dab8cd06b7beec2f00276b13e6f2b24c0de53258c2ac4aa12ee86d3->leave($__internal_c9a0e8ea5dab8cd06b7beec2f00276b13e6f2b24c0de53258c2ac4aa12ee86d3_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_44be868f29a4fbf6397f291a019aef43926611082d50464d28fa535551d68a52 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_44be868f29a4fbf6397f291a019aef43926611082d50464d28fa535551d68a52->enter($__internal_44be868f29a4fbf6397f291a019aef43926611082d50464d28fa535551d68a52_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_6192ea2b933f912421be1c64ebcc3c07bbfcea0ce03bc4d01619e706aca01218 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6192ea2b933f912421be1c64ebcc3c07bbfcea0ce03bc4d01619e706aca01218->enter($__internal_6192ea2b933f912421be1c64ebcc3c07bbfcea0ce03bc4d01619e706aca01218_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "        <div>
            ";
        // line 10
        echo "            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Witam,</p>

                            <p>To jest automatyczny komunikat ze strony http://";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "subdomain", array()), "name", array()), "html", null, true);
        echo ".";
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "</p>

                            <p>Odnotowano wejście na zajęcia w klubie '";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "name", array()), "html", null, true);
        echo "' (";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "city", array()), "html", null, true);
        echo ").</p>
                            <p>Nazwa zajęć to '";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "occurrence", array()), "event", array()), "calendar", array()), "name", array()), "html", null, true);
        echo "'</p>
                            <p>Data i godzina wejścia: '";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "startDate", array()), "d.m.Y H:i"), "html", null, true);
        echo "'</p>

                            ";
        // line 22
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "isType", array(0 => "voucher"), "method")) {
            // line 23
            echo "                            <p>Ważność Twojego obecnego karnetu:
                                ";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "startDate", array()), "d.m.Y"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "endDate", array()), "d.m.Y"), "html", null, true);
            echo "
                                (pozostało ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "leftDaysAmount", array(), "method"), "html", null, true);
            echo " dni)
                            </p>
                                ";
            // line 27
            if ( !twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "isUnlimited", array(), "method")) {
                // line 28
                echo "                                <p>
                                    Pozostała ilość wejść: ";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "leftEntriesAmount", array(), "method"), "html", null, true);
                echo "
                                    (wykorzystano ";
                // line 30
                echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "entries", array())), "html", null, true);
                echo " z ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "voucher", array()), "maximumAmount", array(), "method"), "html", null, true);
                echo " wejść)
                                </p>
                                ";
            }
            // line 33
            echo "                            ";
        }
        // line 34
        echo "
                            ";
        // line 35
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "isType", array(0 => "credit"), "method")) {
            // line 36
            echo "                                ";
            $context["creditEntries"] = twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "member", array()), "filterCreditEntries", array(), "method");
            // line 37
            echo "                                ";
            $context["lastVoucher"] = twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "member", array()), "vouchers", array()), "last", array());
            // line 38
            echo "
                                ";
            // line 39
            if ( !(null === ($context["lastVoucher"] ?? null))) {
                // line 40
                echo "                                    <p>Twój karnet skończył się ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["lastVoucher"] ?? null), "endDate", array()), "m.d.Y"), "html", null, true);
                echo " </p>
                                ";
            }
            // line 42
            echo "
                                <p> ";
            // line 44
            echo "                                    Prosimy o pilne opłacenie składki członkowskiej:<br />
                                    Odbiorca: Stowarzyszenie \"Rio Grappling Club\"<br />
                                    Tytuł: składka członkowska \"<< miesiąc >>\" (np. maj)<br />
                                    Numer konta: ";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "account_number", array()), "html", null, true);
            echo "<br />
                                </p>

                                <p>Nie masz obecnie karnetu, a wejście było typu \"kredytowe\". Oznacza to,
                                    że przy zakupie karnetu zostanie ono odjęte z puli wejść.</p>

                                <p>Masz do tej pory na koncie ";
            // line 53
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["creditEntries"] ?? null)), "html", null, true);
            echo " wejść kredytowych:</p>

                                <ul>
                                ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["creditEntries"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["creditEntry"]) {
                // line 57
                echo "                                    <li>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["creditEntry"], "startDate", array()), "d.m.Y H:i"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "occurrence", array()), "event", array()), "calendar", array()), "name", array()), "html", null, true);
                echo "</li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['creditEntry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                                </ul>
                            ";
        }
        // line 61
        echo "
                            <p>
                                Jeżeli Twoim zdaniem w powyższe dane wkradł się błąd,
                                skontaktuj się z właścicielem klubu (";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "email_address", array()), "html", null, true);
        echo ")
                            </p>

                            <p>
                                -- <br/>
                                Z poważaniem<br />
                                Ekipa Gyman.pl
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
";
        
        $__internal_6192ea2b933f912421be1c64ebcc3c07bbfcea0ce03bc4d01619e706aca01218->leave($__internal_6192ea2b933f912421be1c64ebcc3c07bbfcea0ce03bc4d01619e706aca01218_prof);

        
        $__internal_44be868f29a4fbf6397f291a019aef43926611082d50464d28fa535551d68a52->leave($__internal_44be868f29a4fbf6397f291a019aef43926611082d50464d28fa535551d68a52_prof);

    }

    public function getTemplateName()
    {
        return "MailerBundle:Templates:creditEntry.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 64,  182 => 61,  178 => 59,  167 => 57,  163 => 56,  157 => 53,  148 => 47,  143 => 44,  140 => 42,  134 => 40,  132 => 39,  129 => 38,  126 => 37,  123 => 36,  121 => 35,  118 => 34,  115 => 33,  107 => 30,  103 => 29,  100 => 28,  98 => 27,  93 => 25,  87 => 24,  84 => 23,  82 => 22,  77 => 20,  73 => 19,  67 => 18,  60 => 16,  52 => 10,  49 => 8,  40 => 7,  11 => 5,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# @var club \\Gyman\\Bundle\\ClubBundle\\Entity\\Club #}
{# @var entry \\Gyman\\Domain\\Entry #}
{# @var lastVoucher \\Gyman\\Domain\\Voucher #}

{% extends \"MailerBundle::layout.html.twig\" %}

{% block content %}
        <div>
            {#<img src=\"{{  }}\" style=\"float:right\" />#}
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Witam,</p>

                            <p>To jest automatyczny komunikat ze strony http://{{ club.subdomain.name }}.{{ baseUrl }}</p>

                            <p>Odnotowano wejście na zajęcia w klubie '{{ club.name }}' ({{ club.details.city }}).</p>
                            <p>Nazwa zajęć to '{{ entry.occurrence.event.calendar.name }}'</p>
                            <p>Data i godzina wejścia: '{{ entry.startDate|date('d.m.Y H:i') }}'</p>

                            {% if entry.isType(\"voucher\") %}
                            <p>Ważność Twojego obecnego karnetu:
                                {{ entry.voucher.startDate|date('d.m.Y') }} - {{ entry.voucher.endDate|date('d.m.Y') }}
                                (pozostało {{ entry.voucher.leftDaysAmount()}} dni)
                            </p>
                                {% if not entry.voucher.isUnlimited() %}
                                <p>
                                    Pozostała ilość wejść: {{ entry.voucher.leftEntriesAmount() }}
                                    (wykorzystano {{ entry.voucher.entries|length }} z {{ entry.voucher.maximumAmount() }} wejść)
                                </p>
                                {% endif %}
                            {% endif %}

                            {% if entry.isType(\"credit\") %}
                                {% set creditEntries = entry.member.filterCreditEntries() %}
                                {% set lastVoucher = entry.member.vouchers.last %}

                                {% if lastVoucher is not null %}
                                    <p>Twój karnet skończył się {{ lastVoucher.endDate|date(\"m.d.Y\") }} </p>
                                {% endif %}

                                <p> {# todo: take title and receiver from settings #}
                                    Prosimy o pilne opłacenie składki członkowskiej:<br />
                                    Odbiorca: Stowarzyszenie \"Rio Grappling Club\"<br />
                                    Tytuł: składka członkowska \"<< miesiąc >>\" (np. maj)<br />
                                    Numer konta: {{ club.details.account_number }}<br />
                                </p>

                                <p>Nie masz obecnie karnetu, a wejście było typu \"kredytowe\". Oznacza to,
                                    że przy zakupie karnetu zostanie ono odjęte z puli wejść.</p>

                                <p>Masz do tej pory na koncie {{ creditEntries|length }} wejść kredytowych:</p>

                                <ul>
                                {% for creditEntry in creditEntries %}
                                    <li>{{ creditEntry.startDate|date('d.m.Y H:i') }} - {{ entry.occurrence.event.calendar.name }}</li>
                                {% endfor %}
                                </ul>
                            {% endif %}

                            <p>
                                Jeżeli Twoim zdaniem w powyższe dane wkradł się błąd,
                                skontaktuj się z właścicielem klubu ({{ club.details.email_address }})
                            </p>

                            <p>
                                -- <br/>
                                Z poważaniem<br />
                                Ekipa Gyman.pl
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
{% endblock %}
", "MailerBundle:Templates:creditEntry.html.twig", "/vagrant/src/Bundle/MailerBundle/Resources/views/Templates/creditEntry.html.twig");
    }
}
