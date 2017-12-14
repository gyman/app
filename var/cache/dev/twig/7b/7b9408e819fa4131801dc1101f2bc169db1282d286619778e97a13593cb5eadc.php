<?php

/* GymanAppBundle:Members:edit.html.twig */
class __TwigTemplate_22861d1519b4a9c28c463a878e2e93d70ca71014189230b35629b4f9a07a01db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanAppBundle::layout.html.twig", "GymanAppBundle:Members:edit.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanAppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9db572cb747bf39745be71b3094b96eadbb860aefe1fd5d2eb48b66ad2ad6924 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9db572cb747bf39745be71b3094b96eadbb860aefe1fd5d2eb48b66ad2ad6924->enter($__internal_9db572cb747bf39745be71b3094b96eadbb860aefe1fd5d2eb48b66ad2ad6924_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:edit.html.twig"));

        $__internal_77e1da63153f9b602adf768c92907f3636f753617a02653b2f160a822151ff7c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_77e1da63153f9b602adf768c92907f3636f753617a02653b2f160a822151ff7c->enter($__internal_77e1da63153f9b602adf768c92907f3636f753617a02653b2f160a822151ff7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9db572cb747bf39745be71b3094b96eadbb860aefe1fd5d2eb48b66ad2ad6924->leave($__internal_9db572cb747bf39745be71b3094b96eadbb860aefe1fd5d2eb48b66ad2ad6924_prof);

        
        $__internal_77e1da63153f9b602adf768c92907f3636f753617a02653b2f160a822151ff7c->leave($__internal_77e1da63153f9b602adf768c92907f3636f753617a02653b2f160a822151ff7c_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_f911b0620390191398f863e8201e81030629ffb5e0a5f0c5b2bb687848c82576 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f911b0620390191398f863e8201e81030629ffb5e0a5f0c5b2bb687848c82576->enter($__internal_f911b0620390191398f863e8201e81030629ffb5e0a5f0c5b2bb687848c82576_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_a102782fc9477cc317986f0f24a1d07b5263655e8b11d405836bd327965f1c4e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a102782fc9477cc317986f0f24a1d07b5263655e8b11d405836bd327965f1c4e->enter($__internal_a102782fc9477cc317986f0f24a1d07b5263655e8b11d405836bd327965f1c4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        $this->displayParentBlock("title", $context, $blocks);
        echo " - edycja użytkownika ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "details", array()), "firstname", array()) . " ") . twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "details", array()), "lastname", array())), "html", null, true);
        echo "
";
        
        $__internal_a102782fc9477cc317986f0f24a1d07b5263655e8b11d405836bd327965f1c4e->leave($__internal_a102782fc9477cc317986f0f24a1d07b5263655e8b11d405836bd327965f1c4e_prof);

        
        $__internal_f911b0620390191398f863e8201e81030629ffb5e0a5f0c5b2bb687848c82576->leave($__internal_f911b0620390191398f863e8201e81030629ffb5e0a5f0c5b2bb687848c82576_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_6fca07d0696bcbdcabab7f1848d2b98419f8c8eda44851bc4f6b32229e16d730 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6fca07d0696bcbdcabab7f1848d2b98419f8c8eda44851bc4f6b32229e16d730->enter($__internal_6fca07d0696bcbdcabab7f1848d2b98419f8c8eda44851bc4f6b32229e16d730_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_67293c6fbf5661abfe18a5da7f77f3cbb8b973e2d769ff8072703cc02d4f06ae = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_67293c6fbf5661abfe18a5da7f77f3cbb8b973e2d769ff8072703cc02d4f06ae->enter($__internal_67293c6fbf5661abfe18a5da7f77f3cbb8b973e2d769ff8072703cc02d4f06ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "<div class=\"heading\">
    <h3>";
        // line 9
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "details", array()), "firstname", array()) . " ") . twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "details", array()), "lastname", array())), "html", null, true);
        echo "</h3>
</div>

<div class=\"row-fluid\">
";
        // line 13
        $this->loadTemplate("::_flash.html.twig", "GymanAppBundle:Members:edit.html.twig", 13)->display($context);
        // line 14
        echo "
";
        // line 15
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', array("attr" => array("id" => "memberForm", "class" => "form-horizontal row-fluid", "novalidate" => "novalidate"), "action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_member_edit", array("id" => twig_get_attribute($this->env, $this->getSourceContext(),         // line 21
($context["member"] ?? null), "id", array())))));
        // line 22
        echo "

";
        // line 24
        $this->loadTemplate("@GymanApp/Members/member_form_inner.html.twig", "GymanAppBundle:Members:edit.html.twig", 24)->display($context);
        // line 25
        echo "
<div class=\"row-fluid\">
    <div class=\"span12\">
        <button class=\"btn btn-large btn-primary pull-right\" type=\"submit\" style=\"margin-left: 10px\">
            Zapisz
        </button>

        ";
        // line 32
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "hasOpenedEntry", array())) {
            // line 33
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_close", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "lastEntry", array()), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-large btn-success pull-right\" style=\"margin-left: 10px\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member.form.close_entry"), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 35
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_new", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-large btn-success pull-right\" style=\"margin-left: 10px\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member.form.add_entry"), "html", null, true);
            echo "</a>
        ";
        }
        // line 37
        echo "
        <a href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_member_sendInvitation", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-large btn-success pull-right\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member.form.send_invitation"), "html", null, true);
        echo "</a>

        ";
        // line 41
        echo "    </div>
</div>

";
        // line 44
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

</div>
";
        
        $__internal_67293c6fbf5661abfe18a5da7f77f3cbb8b973e2d769ff8072703cc02d4f06ae->leave($__internal_67293c6fbf5661abfe18a5da7f77f3cbb8b973e2d769ff8072703cc02d4f06ae_prof);

        
        $__internal_6fca07d0696bcbdcabab7f1848d2b98419f8c8eda44851bc4f6b32229e16d730->leave($__internal_6fca07d0696bcbdcabab7f1848d2b98419f8c8eda44851bc4f6b32229e16d730_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Members:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 44,  134 => 41,  127 => 38,  124 => 37,  116 => 35,  108 => 33,  106 => 32,  97 => 25,  95 => 24,  91 => 22,  89 => 21,  88 => 15,  85 => 14,  83 => 13,  76 => 9,  73 => 8,  64 => 7,  50 => 4,  41 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanAppBundle::layout.html.twig' %}

{% block title %}
{{ parent() }} - edycja użytkownika {{ member.details.firstname ~ ' ' ~ member.details.lastname  }}
{% endblock title %}

{% block content %}
<div class=\"heading\">
    <h3>{{ member.details.firstname ~ \" \" ~ member.details.lastname }}</h3>
</div>

<div class=\"row-fluid\">
{% include \"::_flash.html.twig\" %}

{{ form_start(form, {
    attr : {
        'id' : \"memberForm\",
        'class' : \"form-horizontal row-fluid\",
        'novalidate' : 'novalidate'
    },
    action : path('gyman_member_edit', {\"id\" : member.id})
}) }}

{%  include \"@GymanApp/Members/member_form_inner.html.twig\" %}

<div class=\"row-fluid\">
    <div class=\"span12\">
        <button class=\"btn btn-large btn-primary pull-right\" type=\"submit\" style=\"margin-left: 10px\">
            Zapisz
        </button>

        {% if member.hasOpenedEntry %}
            <a href=\"{{ path(\"gyman_entry_close\", {id : member.lastEntry.id}) }}\" class=\"btn btn-large btn-success pull-right\" style=\"margin-left: 10px\">{{ \"member.form.close_entry\"|trans }}</a>
        {% else %}
            <a href=\"{{ path(\"gyman_entry_new\", {id : member.id}) }}\" class=\"btn btn-large btn-success pull-right\" style=\"margin-left: 10px\">{{ \"member.form.add_entry\"|trans }}</a>
        {% endif %}

        <a href=\"{{ path(\"gyman_member_sendInvitation\", {id : member.id}) }}\" class=\"btn btn-large btn-success pull-right\">{{ \"member.form.send_invitation\"|trans }}</a>

        {# todo: remove user #}
    </div>
</div>

{{ form_end(form) }}

</div>
{% endblock content %}
", "GymanAppBundle:Members:edit.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/edit.html.twig");
    }
}
