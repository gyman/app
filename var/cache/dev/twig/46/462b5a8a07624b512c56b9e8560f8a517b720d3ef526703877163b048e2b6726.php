<?php

/* GymanSettingsBundle:Default:details.html.twig */
class __TwigTemplate_d4aa776d35c2b8e25dbd3f46bffa8b041cc434ef1fa4362ad878c046ae78a224 extends Twig_Template
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
        $__internal_2e0a47bbd90d0e578bc78f888122aad2134ab110d50747e4ba5ad0bb21a86de3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2e0a47bbd90d0e578bc78f888122aad2134ab110d50747e4ba5ad0bb21a86de3->enter($__internal_2e0a47bbd90d0e578bc78f888122aad2134ab110d50747e4ba5ad0bb21a86de3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:details.html.twig"));

        $__internal_7d0c670ee9f3a631c441e58256234f54c78c4a2fe20a31a420db16ad5e895772 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7d0c670ee9f3a631c441e58256234f54c78c4a2fe20a31a420db16ad5e895772->enter($__internal_7d0c670ee9f3a631c441e58256234f54c78c4a2fe20a31a420db16ad5e895772_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanSettingsBundle:Default:details.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2e0a47bbd90d0e578bc78f888122aad2134ab110d50747e4ba5ad0bb21a86de3->leave($__internal_2e0a47bbd90d0e578bc78f888122aad2134ab110d50747e4ba5ad0bb21a86de3_prof);

        
        $__internal_7d0c670ee9f3a631c441e58256234f54c78c4a2fe20a31a420db16ad5e895772->leave($__internal_7d0c670ee9f3a631c441e58256234f54c78c4a2fe20a31a420db16ad5e895772_prof);

    }

    // line 3
    public function block_settings_page($context, array $blocks = array())
    {
        $__internal_f97707865ea52bf5dbfe576a55ec2189e5f28b6d99fcd334a0f5ed4845fcbbc2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f97707865ea52bf5dbfe576a55ec2189e5f28b6d99fcd334a0f5ed4845fcbbc2->enter($__internal_f97707865ea52bf5dbfe576a55ec2189e5f28b6d99fcd334a0f5ed4845fcbbc2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

        $__internal_d2c5706d9167bd5b6869dd130d6d6ec23c0de994c9705560489230123dd32867 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d2c5706d9167bd5b6869dd130d6d6ec23c0de994c9705560489230123dd32867->enter($__internal_d2c5706d9167bd5b6869dd130d6d6ec23c0de994c9705560489230123dd32867_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "settings_page"));

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
        
        $__internal_d2c5706d9167bd5b6869dd130d6d6ec23c0de994c9705560489230123dd32867->leave($__internal_d2c5706d9167bd5b6869dd130d6d6ec23c0de994c9705560489230123dd32867_prof);

        
        $__internal_f97707865ea52bf5dbfe576a55ec2189e5f28b6d99fcd334a0f5ed4845fcbbc2->leave($__internal_f97707865ea52bf5dbfe576a55ec2189e5f28b6d99fcd334a0f5ed4845fcbbc2_prof);

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
