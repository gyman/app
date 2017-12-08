<?php

/* DashboardBundle:Default:listClassMembers.html.twig */
class __TwigTemplate_080e646695fd2d29f0520884b233473f56dd9cfc685b281c28f20def2a78e1d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DashboardBundle::layout.html.twig", "DashboardBundle:Default:listClassMembers.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DashboardBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_de69c0d9d2e27120b988089c0844bd4de3675c1e9ae613ef19a1863b16c8f9b7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_de69c0d9d2e27120b988089c0844bd4de3675c1e9ae613ef19a1863b16c8f9b7->enter($__internal_de69c0d9d2e27120b988089c0844bd4de3675c1e9ae613ef19a1863b16c8f9b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:listClassMembers.html.twig"));

        $__internal_26d6f314c442459d3c0ad487d7f80bcf35b605c1188614d98df53114bbf78507 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_26d6f314c442459d3c0ad487d7f80bcf35b605c1188614d98df53114bbf78507->enter($__internal_26d6f314c442459d3c0ad487d7f80bcf35b605c1188614d98df53114bbf78507_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:listClassMembers.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_de69c0d9d2e27120b988089c0844bd4de3675c1e9ae613ef19a1863b16c8f9b7->leave($__internal_de69c0d9d2e27120b988089c0844bd4de3675c1e9ae613ef19a1863b16c8f9b7_prof);

        
        $__internal_26d6f314c442459d3c0ad487d7f80bcf35b605c1188614d98df53114bbf78507->leave($__internal_26d6f314c442459d3c0ad487d7f80bcf35b605c1188614d98df53114bbf78507_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_1758c6552ad848e6ffda245ec8bf29405424924d7fc7c49efef7244c575ac710 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1758c6552ad848e6ffda245ec8bf29405424924d7fc7c49efef7244c575ac710->enter($__internal_1758c6552ad848e6ffda245ec8bf29405424924d7fc7c49efef7244c575ac710_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_8119c1ce83ee0efc22a1ccb3781d221999485a501ad265e9b721c57a6d550019 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8119c1ce83ee0efc22a1ccb3781d221999485a501ad265e9b721c57a6d550019->enter($__internal_8119c1ce83ee0efc22a1ccb3781d221999485a501ad265e9b721c57a6d550019_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "<div class=\"heading\">
    <h3>
        ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "event", array()), "title", array()), "html", null, true);
        echo "
        <small>";
        // line 9
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "startDate", array()), "y.m.d H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "endDate", array()), "H:i"), "html", null, true);
        echo "</small>
    </h3>

    ";
        // line 13
        echo "</div>


";
        // line 16
        echo twig_include($this->env, $context, "_flash.html.twig");
        echo "

<div class=\"row-fluid\">
    <div class=\"span5 offset1\">
        <label for=\"listFilter\">
            Szukaj:
            <input type=\"text\" name=\"listFilter\"/>
        </label>
        <ul class=\"media-list\" style=\"max-height:800px%; overflow-y: scroll; overflow-x: hidden\">
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allMembers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 26
            echo "                <li class=\"media\">
                    <a class=\"pull-left\" href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_member_edit", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\">
                        <img class=\"pull-left media-object thumbnail\" src=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl($context["member"]), "html", null, true);
            echo "\" style=\"max-width: 60px; margin-right: 10px\"/>
                        <div class=\"media-body\" data-barcode=\"";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "barcode", array()), "html", null, true);
            echo "\">
                            <h4 class=\"media-heading\">
                                ";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "lastname", array()), "html", null, true);
            echo "
                            </h4>
                            karnet:
                            ";
            // line 34
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "currentVoucherId", array()))) {
                // line 35
                echo "                                ważny do <span class=\"label\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "voucherEndDate", array()), "Y.m.d"), "html", null, true);
                echo "</span><br />
                                pozostało ";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "voucherLeftAmount", array()), "html", null, true);
                echo " wejść
                            ";
            } else {
                // line 38
                echo "                                brak
                            ";
            }
            // line 40
            echo "                        </div>
                    </a>
                    <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_create_for_member", array("occurrence" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "member" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\" class=\"pull-right btn\">Dodaj</a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "        </ul>
    </div>

    <div class=\"span3 offset1\">
        <ul class=\"media-list\" style=\"height: 90%; overflow-y: scroll; overflow-x: hidden\">
            ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["membersThatEntered"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 51
            echo "                <li class=\"media\">
                    <a class=\"pull-left\" onClick=\"return confirm('Jesteś pewien?');\" href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_remove_from_occurrence", array("occurrence" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "member" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\">
                        <img class=\"pull-left media-object thumbnail\" src=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl($context["member"]), "html", null, true);
            echo "\" style=\"max-width: 30px; margin-right: 10px\"/>
                        <div class=\"media-body\">
                            <h4 class=\"media-heading\">
                                ";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "lastname", array()), "html", null, true);
            echo "
                            </h4>
                            karnet:
                            ";
            // line 59
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "currentVoucherId", array()))) {
                // line 60
                echo "                                ok
                            ";
            } else {
                // line 62
                echo "                                brak
                            ";
            }
            // line 64
            echo "                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "        </ul>
        <h3>Weszło: ";
        // line 69
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["membersThatEntered"] ?? null)), "html", null, true);
        echo "</h3>
    </div>
</div>

";
        
        $__internal_8119c1ce83ee0efc22a1ccb3781d221999485a501ad265e9b721c57a6d550019->leave($__internal_8119c1ce83ee0efc22a1ccb3781d221999485a501ad265e9b721c57a6d550019_prof);

        
        $__internal_1758c6552ad848e6ffda245ec8bf29405424924d7fc7c49efef7244c575ac710->leave($__internal_1758c6552ad848e6ffda245ec8bf29405424924d7fc7c49efef7244c575ac710_prof);

    }

    public function getTemplateName()
    {
        return "DashboardBundle:Default:listClassMembers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 69,  190 => 68,  181 => 64,  177 => 62,  173 => 60,  171 => 59,  163 => 56,  157 => 53,  153 => 52,  150 => 51,  146 => 50,  139 => 45,  130 => 42,  126 => 40,  122 => 38,  117 => 36,  112 => 35,  110 => 34,  102 => 31,  97 => 29,  93 => 28,  89 => 27,  86 => 26,  82 => 25,  70 => 16,  65 => 13,  57 => 9,  53 => 8,  49 => 6,  40 => 5,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"DashboardBundle::layout.html.twig\" %}

{# @var occurrence Gyman\\Domain\\Calendar\\Event\\Occurrence occurrence #}

{% block content %}
<div class=\"heading\">
    <h3>
        {{ occurrence.event.title }}
        <small>{{ occurrence.startDate|date(\"y.m.d H:i\") }} - {{ occurrence.endDate|date(\"H:i\") }}</small>
    </h3>

    {#<a href=\"{{ path(\"gyman_entries_close_for_occurrence\", {'occurrence': occurrence.id}) }}\" onclick=\"return confirm('Czy zamknąć wejścia wszystkim uczestnikom tych zajęć?');\" class=\"btn btn-warning pull-right\">Zamknij wszystkie wejścia</a>#}
</div>


{{ include(\"_flash.html.twig\") }}

<div class=\"row-fluid\">
    <div class=\"span5 offset1\">
        <label for=\"listFilter\">
            Szukaj:
            <input type=\"text\" name=\"listFilter\"/>
        </label>
        <ul class=\"media-list\" style=\"max-height:800px%; overflow-y: scroll; overflow-x: hidden\">
            {%  for member in allMembers %}
                <li class=\"media\">
                    <a class=\"pull-left\" href=\"{{ path(\"gyman_member_edit\", {id: member.id}) }}\">
                        <img class=\"pull-left media-object thumbnail\" src=\"{{ avatar(member) }}\" style=\"max-width: 60px; margin-right: 10px\"/>
                        <div class=\"media-body\" data-barcode=\"{{ member.barcode }}\">
                            <h4 class=\"media-heading\">
                                {{ member.firstname }} {{ member.lastname }}
                            </h4>
                            karnet:
                            {% if member.currentVoucherId is not null %}
                                ważny do <span class=\"label\">{{ member.voucherEndDate|date(\"Y.m.d\") }}</span><br />
                                pozostało {{ member.voucherLeftAmount }} wejść
                            {% else %}
                                brak
                            {% endif %}
                        </div>
                    </a>
                    <a href=\"{{ path(\"gyman_entry_create_for_member\", {occurrence: occurrence.id, member: member.id}) }}\" class=\"pull-right btn\">Dodaj</a>
                </li>
            {% endfor %}
        </ul>
    </div>

    <div class=\"span3 offset1\">
        <ul class=\"media-list\" style=\"height: 90%; overflow-y: scroll; overflow-x: hidden\">
            {% for member in membersThatEntered %}
                <li class=\"media\">
                    <a class=\"pull-left\" onClick=\"return confirm('Jesteś pewien?');\" href=\"{{ path(\"gyman_entry_remove_from_occurrence\", {occurrence: occurrence.id, member: member.id}) }}\">
                        <img class=\"pull-left media-object thumbnail\" src=\"{{ avatar(member) }}\" style=\"max-width: 30px; margin-right: 10px\"/>
                        <div class=\"media-body\">
                            <h4 class=\"media-heading\">
                                {{ member.firstname }} {{ member.lastname }}
                            </h4>
                            karnet:
                            {% if member.currentVoucherId is not null %}
                                ok
                            {% else %}
                                brak
                            {% endif %}
                        </div>
                    </a>
                </li>
            {% endfor %}
        </ul>
        <h3>Weszło: {{ membersThatEntered|length }}</h3>
    </div>
</div>

{% endblock content %}
", "DashboardBundle:Default:listClassMembers.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/listClassMembers.html.twig");
    }
}
