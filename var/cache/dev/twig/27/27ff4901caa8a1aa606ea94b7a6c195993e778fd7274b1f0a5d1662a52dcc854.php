<?php

/* GymanSettingsBundle:Default:details.html.twig */
class __TwigTemplate_9322c9d3702cd5d7e2396df2018d3c5ae57871a4d12447fcc9dd052105ecae59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanSettingsBundle::layout.html.twig", "GymanSettingsBundle:Default:details.html.twig", 1);
        $this->blocks = array(
            'settings_page' => array($this, 'block_settings_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanSettingsBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_495b67677ae078fe0b8881d435da08fc65d73e9f2f343d431b66ed5b667cb345 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_495b67677ae078fe0b8881d435da08fc65d73e9f2f343d431b66ed5b667cb345->enter($__internal_495b67677ae078fe0b8881d435da08fc65d73e9f2f343d431b66ed5b667cb345_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:details.html.twig"));

        $__internal_4baf77bf24a3ea3ba254f3601fb4177e178ce85c4041279b273bf657559e5383 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4baf77bf24a3ea3ba254f3601fb4177e178ce85c4041279b273bf657559e5383->enter($__internal_4baf77bf24a3ea3ba254f3601fb4177e178ce85c4041279b273bf657559e5383_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:details.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_495b67677ae078fe0b8881d435da08fc65d73e9f2f343d431b66ed5b667cb345->leave($__internal_495b67677ae078fe0b8881d435da08fc65d73e9f2f343d431b66ed5b667cb345_prof);

        
        $__internal_4baf77bf24a3ea3ba254f3601fb4177e178ce85c4041279b273bf657559e5383->leave($__internal_4baf77bf24a3ea3ba254f3601fb4177e178ce85c4041279b273bf657559e5383_prof);

    }

    // line 3
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_28e1c109aaf3036e336dc0c2e85d00e0528414a75eaac2c2b8f7011e750efd1a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_28e1c109aaf3036e336dc0c2e85d00e0528414a75eaac2c2b8f7011e750efd1a->enter($__internal_28e1c109aaf3036e336dc0c2e85d00e0528414a75eaac2c2b8f7011e750efd1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_61d7aca33d90f657a6633d06bf82093635530541d933cadd720cc3e335121d04 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_61d7aca33d90f657a6633d06bf82093635530541d933cadd720cc3e335121d04->enter($__internal_61d7aca33d90f657a6633d06bf82093635530541d933cadd720cc3e335121d04_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        // line 4
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        ";
        // line 6
        $this->loadTemplate("::_flash.html.twig", "GymanSettingsBundle:Default:details.html.twig", 6)->display($context);
        // line 7
        echo "    </div>
    ";
        // line 8
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "vars", array()), "errors", array())) > 0)) {
            // line 9
            echo "        <div class=\"alert alert-danger flash-notice\">
            <ul>
                ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "vars", array()), "errors", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 12
                echo "                    <li>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["error"], "message", array()), "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "            </ul>
        </div>
    ";
        }
        // line 17
        echo "</div>

";
        // line 19
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "

<div class=\"row-fluid\">
    <div class=\"span6\">
        ";
        // line 23
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "name", array()), 'row');
        echo "
        ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "subdomain", array()), 'row');
        echo "
        ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "uploadLogo", array()), 'row');
        echo "
    </div>
    <div class=\"span6\">
        <fieldset>
            <legend>Contact details</legend>
            <div class=\"row-fluid\">
                <div class=\"span6\">
                    ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "address", array()), 'row');
        echo "
                    ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "zipcode", array()), 'row');
        echo "
                    ";
        // line 34
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "city", array()), 'row');
        echo "
                    ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "country", array()), 'row');
        echo "
                    ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "phone_number", array()), 'row');
        echo "
                    ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "email_address", array()), 'row');
        echo "
                </div>
                <div class=\"span6\">
                    ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "opened_from", array()), 'row');
        echo "
                    ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "opened_till", array()), 'row');
        echo "
                    ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "about", array()), 'row');
        echo "
                    ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "details", array()), "account_number", array()), 'row');
        echo "
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class=\"row-fluid\">
    <div class=\"span12\">
        <div class=\"form-actions\">
            ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "submit", array()), 'widget', array("attr" => array("class" => "btn btn-primary")));
        echo "
        </div>
    </div>
</div>

";
        // line 58
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

";
        
        $__internal_61d7aca33d90f657a6633d06bf82093635530541d933cadd720cc3e335121d04->leave($__internal_61d7aca33d90f657a6633d06bf82093635530541d933cadd720cc3e335121d04_prof);

        
        $__internal_28e1c109aaf3036e336dc0c2e85d00e0528414a75eaac2c2b8f7011e750efd1a->leave($__internal_28e1c109aaf3036e336dc0c2e85d00e0528414a75eaac2c2b8f7011e750efd1a_prof);

    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle:Default:details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 58,  162 => 53,  149 => 43,  145 => 42,  141 => 41,  137 => 40,  131 => 37,  127 => 36,  123 => 35,  119 => 34,  115 => 33,  111 => 32,  101 => 25,  97 => 24,  93 => 23,  86 => 19,  82 => 17,  77 => 14,  68 => 12,  64 => 11,  60 => 9,  58 => 8,  55 => 7,  53 => 6,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanSettingsBundle::layout.html.twig' %}

{% block settings_page %}
<div class=\"row-fluid\">
    <div class=\"span12\">
        {% include \"::_flash.html.twig\" %}
    </div>
    {% if form.vars.errors|length > 0 %}
        <div class=\"alert alert-danger flash-notice\">
            <ul>
                {% for error in form.vars.errors %}
                    <li>{{ error.message }}</li>
                {% endfor %}
            </ul>
        </div>
    {% endif %}
</div>

{{ form_start(form) }}

<div class=\"row-fluid\">
    <div class=\"span6\">
        {{ form_row(form.name) }}
        {{ form_row(form.subdomain) }}
        {{ form_row(form.uploadLogo) }}
    </div>
    <div class=\"span6\">
        <fieldset>
            <legend>Contact details</legend>
            <div class=\"row-fluid\">
                <div class=\"span6\">
                    {{ form_row(form.details.address) }}
                    {{ form_row(form.details.zipcode) }}
                    {{ form_row(form.details.city) }}
                    {{ form_row(form.details.country) }}
                    {{ form_row(form.details.phone_number) }}
                    {{ form_row(form.details.email_address) }}
                </div>
                <div class=\"span6\">
                    {{ form_row(form.details.opened_from) }}
                    {{ form_row(form.details.opened_till) }}
                    {{ form_row(form.details.about) }}
                    {{ form_row(form.details.account_number) }}
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class=\"row-fluid\">
    <div class=\"span12\">
        <div class=\"form-actions\">
            {{ form_widget(form.submit, {attr: {class: 'btn btn-primary'}}) }}
        </div>
    </div>
</div>

{{ form_end(form) }}

{% endblock settings_page %}", "GymanSettingsBundle:Default:details.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/Default/details.html.twig");
    }
}
