<?php

/* DashboardBundle:Default:listClassMembers.html.twig */
class __TwigTemplate_150673eecb68c2c9301db44a2922116138d514f6c326bde83476e372eab4c09f extends Twig_Template
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
        $__internal_d6c89f0745edfa75c793a3bcb5b8e9f91ee7a80afdce6b60dffc7778f535eb31 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d6c89f0745edfa75c793a3bcb5b8e9f91ee7a80afdce6b60dffc7778f535eb31->enter($__internal_d6c89f0745edfa75c793a3bcb5b8e9f91ee7a80afdce6b60dffc7778f535eb31_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:listClassMembers.html.twig"));

        $__internal_1576b896671194ddf3ddf469e8f14a29258038f5d3708f2062f4cbc5e2188d2a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1576b896671194ddf3ddf469e8f14a29258038f5d3708f2062f4cbc5e2188d2a->enter($__internal_1576b896671194ddf3ddf469e8f14a29258038f5d3708f2062f4cbc5e2188d2a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:listClassMembers.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d6c89f0745edfa75c793a3bcb5b8e9f91ee7a80afdce6b60dffc7778f535eb31->leave($__internal_d6c89f0745edfa75c793a3bcb5b8e9f91ee7a80afdce6b60dffc7778f535eb31_prof);

        
        $__internal_1576b896671194ddf3ddf469e8f14a29258038f5d3708f2062f4cbc5e2188d2a->leave($__internal_1576b896671194ddf3ddf469e8f14a29258038f5d3708f2062f4cbc5e2188d2a_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_8a8d93a5bf2d191febbfb1de0dac30bf5be1ec44687564b454e557e32e758d44 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8a8d93a5bf2d191febbfb1de0dac30bf5be1ec44687564b454e557e32e758d44->enter($__internal_8a8d93a5bf2d191febbfb1de0dac30bf5be1ec44687564b454e557e32e758d44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_d983072e3581b46dc9b732534ddb27ee12d0a775ebfc595ab8932c1cb019349d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d983072e3581b46dc9b732534ddb27ee12d0a775ebfc595ab8932c1cb019349d->enter($__internal_d983072e3581b46dc9b732534ddb27ee12d0a775ebfc595ab8932c1cb019349d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
    ";
        // line 19
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "
    <div class=\"span3 offset1\">
        ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "instructor_id", array()), 'row');
        echo "
        ";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "subject", array()), 'row');
        echo "
    </div>
    <div class=\"span7 offset1\">
        ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "note", array()), 'row');
        echo "
        ";
        // line 27
        echo "    </div>
    ";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
</div>

<div class=\"row-fluid\"><div class=\"span12\"><hr /></div></div>

<div class=\"row-fluid\">
    <div class=\"span4 offset2\">
        <label for=\"listFilter\">
            Szukaj:
            <input type=\"text\" name=\"listFilter\"/>
        </label>
        <ul class=\"media-list\" style=\"max-height:500px; overflow-y: scroll; overflow-x: hidden\">
            ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allMembers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 41
            echo "                <li class=\"media\">
                    <a class=\"pull-left\" href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_member_edit", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\">
                        <img class=\"pull-left media-object thumbnail\" src=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl($context["member"]), "html", null, true);
            echo "\" style=\"max-width: 30px; margin-right: 10px\"/>
                        <div class=\"media-body\" data-barcode=\"";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "barcode", array()), "html", null, true);
            echo "\">
                            <h4 class=\"media-heading\">
                                ";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "lastname", array()), "html", null, true);
            echo "
                            </h4>
                            karnet:
                            ";
            // line 49
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "currentVoucherId", array()))) {
                // line 50
                echo "                                ważny do <span class=\"label\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "voucherEndDate", array()), "Y.m.d"), "html", null, true);
                echo "</span><br />
                                pozostało ";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "voucherLeftAmount", array()), "html", null, true);
                echo " wejść
                            ";
            } else {
                // line 53
                echo "                                brak
                            ";
            }
            // line 55
            echo "                        </div>
                    </a>
                    <a href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_create_for_member", array("occurrence" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "member" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\" class=\"pull-right btn\">Dodaj</a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "        </ul>
    </div>

    <div class=\"span3 offset1\">
        <h3>Weszło: ";
        // line 64
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["membersThatEntered"] ?? null)), "html", null, true);
        echo " osób</h3>
        <ul class=\"media-list\" style=\"height: 90%; overflow-y: scroll; overflow-x: hidden\">
            ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["membersThatEntered"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 67
            echo "                <li class=\"media\">
                    <a class=\"pull-left\" href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_member_edit", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\">
                        <img class=\"pull-left media-object thumbnail\" src=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl($context["member"]), "html", null, true);
            echo "\" style=\"max-width: 60px; margin-right: 10px\"/>
                        <div class=\"media-body\">
                            <h4 class=\"media-heading\">
                                ";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "lastname", array()), "html", null, true);
            echo "
                            </h4>
                            karnet:
                            ";
            // line 75
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "currentVoucherId", array()))) {
                // line 76
                echo "                                ok
                            ";
            } else {
                // line 78
                echo "                                brak
                            ";
            }
            // line 80
            echo "                        </div>
                    </a>
                    <a onClick=\"return confirm('Jesteś pewien?');\" href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_remove_from_occurrence", array("occurrence" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "member" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\" class=\"pull-right btn\">Usuń</a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "        </ul>
    </div>
</div>

";
        
        $__internal_d983072e3581b46dc9b732534ddb27ee12d0a775ebfc595ab8932c1cb019349d->leave($__internal_d983072e3581b46dc9b732534ddb27ee12d0a775ebfc595ab8932c1cb019349d_prof);

        
        $__internal_8a8d93a5bf2d191febbfb1de0dac30bf5be1ec44687564b454e557e32e758d44->leave($__internal_8a8d93a5bf2d191febbfb1de0dac30bf5be1ec44687564b454e557e32e758d44_prof);

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
        return array (  229 => 85,  220 => 82,  216 => 80,  212 => 78,  208 => 76,  206 => 75,  198 => 72,  192 => 69,  188 => 68,  185 => 67,  181 => 66,  176 => 64,  170 => 60,  161 => 57,  157 => 55,  153 => 53,  148 => 51,  143 => 50,  141 => 49,  133 => 46,  128 => 44,  124 => 43,  120 => 42,  117 => 41,  113 => 40,  98 => 28,  95 => 27,  91 => 25,  85 => 22,  81 => 21,  76 => 19,  70 => 16,  65 => 13,  57 => 9,  53 => 8,  49 => 6,  40 => 5,  11 => 1,);
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
    {{ form_start(form, {attr: {class: \"form-horizontal\"}}) }}
    <div class=\"span3 offset1\">
        {{ form_row(form.instructor_id) }}
        {{ form_row(form.subject) }}
    </div>
    <div class=\"span7 offset1\">
        {{ form_row(form.note) }}
        {#<button type=\"submit\">Zapisz</button>#}
    </div>
    {{ form_end(form) }}
</div>

<div class=\"row-fluid\"><div class=\"span12\"><hr /></div></div>

<div class=\"row-fluid\">
    <div class=\"span4 offset2\">
        <label for=\"listFilter\">
            Szukaj:
            <input type=\"text\" name=\"listFilter\"/>
        </label>
        <ul class=\"media-list\" style=\"max-height:500px; overflow-y: scroll; overflow-x: hidden\">
            {%  for member in allMembers %}
                <li class=\"media\">
                    <a class=\"pull-left\" href=\"{{ path(\"gyman_member_edit\", {id: member.id}) }}\">
                        <img class=\"pull-left media-object thumbnail\" src=\"{{ avatar(member) }}\" style=\"max-width: 30px; margin-right: 10px\"/>
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
        <h3>Weszło: {{ membersThatEntered|length }} osób</h3>
        <ul class=\"media-list\" style=\"height: 90%; overflow-y: scroll; overflow-x: hidden\">
            {% for member in membersThatEntered %}
                <li class=\"media\">
                    <a class=\"pull-left\" href=\"{{ path(\"gyman_member_edit\", {id: member.id}) }}\">
                        <img class=\"pull-left media-object thumbnail\" src=\"{{ avatar(member) }}\" style=\"max-width: 60px; margin-right: 10px\"/>
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
                    <a onClick=\"return confirm('Jesteś pewien?');\" href=\"{{ path(\"gyman_entry_remove_from_occurrence\", {occurrence: occurrence.id, member: member.id}) }}\" class=\"pull-right btn\">Usuń</a>
                </li>
            {% endfor %}
        </ul>
    </div>
</div>

{% endblock content %}
", "DashboardBundle:Default:listClassMembers.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/listClassMembers.html.twig");
    }
}
