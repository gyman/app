<?php

/* @GymanApp/Members/member_form_inner.html.twig */
class __TwigTemplate_dc7efdf7a10ceaaf20830ded7821fa7c221b12ed2063ccabe8233bb547b5034f extends Twig_Template
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
        $__internal_be7a4e536174ea79a651b0775267f170e774af1ca3bd96cdd4daef8044dd287c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_be7a4e536174ea79a651b0775267f170e774af1ca3bd96cdd4daef8044dd287c->enter($__internal_be7a4e536174ea79a651b0775267f170e774af1ca3bd96cdd4daef8044dd287c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/member_form_inner.html.twig"));

        $__internal_105207ba955f9cdad6e817797c0cd77ecad2f928857e92c694cee7b170fe5ee1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_105207ba955f9cdad6e817797c0cd77ecad2f928857e92c694cee7b170fe5ee1->enter($__internal_105207ba955f9cdad6e817797c0cd77ecad2f928857e92c694cee7b170fe5ee1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/member_form_inner.html.twig"));

        // line 1
        echo "<div class=\"span4\">
    ";
        // line 2
        if (array_key_exists("member", $context)) {
            // line 3
            echo "        ";
            $this->loadTemplate("GymanAppBundle:Members:Modal/_picture.html.twig", "@GymanApp/Members/member_form_inner.html.twig", 3)->display(array_merge($context, array("form" => ($context["form"] ?? null), "member" => ($context["member"] ?? null))));
            // line 4
            echo "    ";
        } else {
            // line 5
            echo "        ";
            $this->loadTemplate("GymanAppBundle:Members:Modal/_picture.html.twig", "@GymanApp/Members/member_form_inner.html.twig", 5)->display(array_merge($context, array("form" => ($context["form"] ?? null))));
            // line 6
            echo "    ";
        }
        // line 7
        echo "</div>

<div class=\"span8\">
    ";
        // line 10
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("gyman.members.menu.tabs", array("template" => "GymanAppBundle:Members:Menu/tabs.html.twig", "currentAsLink" => true, "depth" => 1, "currentClass" => "active"));
        // line 15
        echo "

    <div class=\"tab-content\">
        <div id=\"detailsPane\" class=\"tab-pane fade in active\">
            ";
        // line 19
        $this->loadTemplate("GymanAppBundle:Members:Modal/_details.html.twig", "@GymanApp/Members/member_form_inner.html.twig", 19)->display(array_merge($context, array("form" => ($context["form"] ?? null))));
        // line 20
        echo "        </div>


        ";
        // line 23
        if ((array_key_exists("member", $context) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "id", array(), "method"))) {
            // line 24
            echo "        <div class=\"tab-pane fade in\" id=\"voucherPane\">
            ";
            // line 25
            $this->loadTemplate("@GymanApp/Members/Modal/_voucher.html.twig", "@GymanApp/Members/member_form_inner.html.twig", 25)->display(array_merge($context, array("member" => ($context["member"] ?? null))));
            // line 26
            echo "
            <div class=\"page-header\">
                <h4>Karnety <small>(ostatnich 10)</small></h4>
            </div>
            ";
            // line 30
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("GymanAppBundle:Vouchers:renderHistory", array("member" => ($context["member"] ?? null))));
            echo "
        </div>
        ";
        }
        // line 33
        echo "
        ";
        // line 34
        if ((array_key_exists("member", $context) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "id", array(), "method"))) {
            // line 35
            echo "        <div class=\"tab-pane fade in\" id=\"entriesPane\">
            <div class=\"page-header\">
                <h4>Wejścia <small>(ostatnich 15)</small></h4>
            </div>
            ";
            // line 39
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("GymanAppBundle:Entries:renderHistory", array("member" => ($context["member"] ?? null))));
            echo "

            ";
            // line 42
            echo "            ";
            // line 43
            echo "        </div>
        ";
        }
        // line 45
        echo "
        <div class=\"tab-pane fade in\" id=\"additionalsPane\">
            ";
        // line 47
        $this->loadTemplate("GymanAppBundle:Members:Modal/_additional.html.twig", "@GymanApp/Members/member_form_inner.html.twig", 47)->display(array_merge($context, array("form" => ($context["form"] ?? null))));
        // line 48
        echo "        </div>
    </div>

    ";
        // line 52
        echo "        ";
        // line 53
        echo "            ";
        // line 54
        echo "                ";
        // line 55
        echo "
                ";
        // line 57
        echo "                    ";
        // line 58
        echo "                ";
        // line 59
        echo "                    ";
        // line 60
        echo "                ";
        // line 61
        echo "            ";
        // line 62
        echo "        ";
        // line 63
        echo "    ";
        // line 64
        echo "</div>

";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        echo "
";
        
        $__internal_be7a4e536174ea79a651b0775267f170e774af1ca3bd96cdd4daef8044dd287c->leave($__internal_be7a4e536174ea79a651b0775267f170e774af1ca3bd96cdd4daef8044dd287c_prof);

        
        $__internal_105207ba955f9cdad6e817797c0cd77ecad2f928857e92c694cee7b170fe5ee1->leave($__internal_105207ba955f9cdad6e817797c0cd77ecad2f928857e92c694cee7b170fe5ee1_prof);

    }

    public function getTemplateName()
    {
        return "@GymanApp/Members/member_form_inner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 66,  137 => 64,  135 => 63,  133 => 62,  131 => 61,  129 => 60,  127 => 59,  125 => 58,  123 => 57,  120 => 55,  118 => 54,  116 => 53,  114 => 52,  109 => 48,  107 => 47,  103 => 45,  99 => 43,  97 => 42,  92 => 39,  86 => 35,  84 => 34,  81 => 33,  75 => 30,  69 => 26,  67 => 25,  64 => 24,  62 => 23,  57 => 20,  55 => 19,  49 => 15,  47 => 10,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,  28 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"span4\">
    {% if member is defined %}
        {% include 'GymanAppBundle:Members:Modal/_picture.html.twig' with {'form' : form, 'member' : member} %}
    {% else %}
        {% include 'GymanAppBundle:Members:Modal/_picture.html.twig' with {'form' : form} %}
    {% endif %}
</div>

<div class=\"span8\">
    {{ knp_menu_render('gyman.members.menu.tabs', {
        'template': 'GymanAppBundle:Members:Menu/tabs.html.twig',
        'currentAsLink' : true,
        'depth' : 1,
        'currentClass' : 'active',
    }) }}

    <div class=\"tab-content\">
        <div id=\"detailsPane\" class=\"tab-pane fade in active\">
            {% include 'GymanAppBundle:Members:Modal/_details.html.twig' with {'form' : form} %}
        </div>


        {% if member is defined and member.id() %}
        <div class=\"tab-pane fade in\" id=\"voucherPane\">
            {%  include '@GymanApp/Members/Modal/_voucher.html.twig' with {'member' : member}%}

            <div class=\"page-header\">
                <h4>Karnety <small>(ostatnich 10)</small></h4>
            </div>
            {{ render(controller('GymanAppBundle:Vouchers:renderHistory', {'member' : member})) }}
        </div>
        {% endif %}

        {% if member is defined and member.id() %}
        <div class=\"tab-pane fade in\" id=\"entriesPane\">
            <div class=\"page-header\">
                <h4>Wejścia <small>(ostatnich 15)</small></h4>
            </div>
            {{ render(controller('GymanAppBundle:Entries:renderHistory', {'member' : member })) }}

            {#{% include 'GymanAppBundle:Members:Modal/_sell.html.twig' with {'member' : member} %}#}
            {#<div id=\"timeline\">{% render controller('TimelineBundle:Default:timeline', {subject: member }) %}</div>#}
        </div>
        {% endif %}

        <div class=\"tab-pane fade in\" id=\"additionalsPane\">
            {% include 'GymanAppBundle:Members:Modal/_additional.html.twig' with {'form' : form} %}
        </div>
    </div>

    {#{% block memberToolbox %}#}
        {#<div class=\"pull-right hideForNewMember\" id=\"memberModalToolbox\">#}
            {#{% if member.id is defined and member.id is not null%}#}
                {#<a href=\"{{ path(\"_voucher_new\",{id: member.getId()}) }}\" class=\"btn openUrlInModal\"><i class=\"icomoon-icon-signup\"></i> Karnet</a>#}

                {#{% if member.hasOpenedEntry() %}#}
                    {#<a href=\"{{ path(\"_entry_close\",{id: member.getLastEntry().getId()}) }}\" class=\"btn btn-warning openUrlInModal\"><i class=\"icomoon-icon-enter\"></i> Wyjście</a>#}
                {#{% else %}#}
                    {#<a href=\"{{ path(\"_entrance_add\",{id: member.getId()}) }}\" class=\"btn openUrlInModal\"><i class=\"icomoon-icon-enter\"></i> Wejście</a>#}
                {#{% endif %}#}
            {#{% endif %}#}
        {#</div>#}
    {#{% endblock memberToolbox %}#}
</div>

{{ form_rest(form) }}
", "@GymanApp/Members/member_form_inner.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/member_form_inner.html.twig");
    }
}
