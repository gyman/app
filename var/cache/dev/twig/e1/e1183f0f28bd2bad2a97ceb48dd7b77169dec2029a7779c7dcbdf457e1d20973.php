<?php

/* GymanAppBundle:Vouchers:new.html.twig */
class __TwigTemplate_0a35b4f60530e74b880add58fbb9ec5337988238e7691cbeed23e1e5ab93919c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanAppBundle::layout.html.twig", "GymanAppBundle:Vouchers:new.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanAppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5f047fddd81020b892083998e578596957c13ca6fb068b8b66641d101c822964 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5f047fddd81020b892083998e578596957c13ca6fb068b8b66641d101c822964->enter($__internal_5f047fddd81020b892083998e578596957c13ca6fb068b8b66641d101c822964_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Vouchers:new.html.twig"));

        $__internal_309539954b7fa8f23c9b469141216a293ddbb1050abd69995ab55631f2e35732 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_309539954b7fa8f23c9b469141216a293ddbb1050abd69995ab55631f2e35732->enter($__internal_309539954b7fa8f23c9b469141216a293ddbb1050abd69995ab55631f2e35732_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Vouchers:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5f047fddd81020b892083998e578596957c13ca6fb068b8b66641d101c822964->leave($__internal_5f047fddd81020b892083998e578596957c13ca6fb068b8b66641d101c822964_prof);

        
        $__internal_309539954b7fa8f23c9b469141216a293ddbb1050abd69995ab55631f2e35732->leave($__internal_309539954b7fa8f23c9b469141216a293ddbb1050abd69995ab55631f2e35732_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_385c74850b6cfa831650516b929bac21938694b3b9f0dbf95ad3c7d66e165270 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_385c74850b6cfa831650516b929bac21938694b3b9f0dbf95ad3c7d66e165270->enter($__internal_385c74850b6cfa831650516b929bac21938694b3b9f0dbf95ad3c7d66e165270_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_18a66e544eabe1b58915888ad2b04841e1f5ccbb8a3dfbc90398e7f41f3ea554 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_18a66e544eabe1b58915888ad2b04841e1f5ccbb8a3dfbc90398e7f41f3ea554->enter($__internal_18a66e544eabe1b58915888ad2b04841e1f5ccbb8a3dfbc90398e7f41f3ea554_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 3
        echo "Dodaj karnet użytkownikowi ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "details", array()), "fullName", array(), "method"), "html", null, true);
        echo "
";
        
        $__internal_18a66e544eabe1b58915888ad2b04841e1f5ccbb8a3dfbc90398e7f41f3ea554->leave($__internal_18a66e544eabe1b58915888ad2b04841e1f5ccbb8a3dfbc90398e7f41f3ea554_prof);

        
        $__internal_385c74850b6cfa831650516b929bac21938694b3b9f0dbf95ad3c7d66e165270->leave($__internal_385c74850b6cfa831650516b929bac21938694b3b9f0dbf95ad3c7d66e165270_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_697dd0cafcce4316f75718505e3c1a8c7320943c1134a8700bde8c769db77f10 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_697dd0cafcce4316f75718505e3c1a8c7320943c1134a8700bde8c769db77f10->enter($__internal_697dd0cafcce4316f75718505e3c1a8c7320943c1134a8700bde8c769db77f10_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_7ad74b264ed860b17e975dc85677fa7592686a55e72ebdd8c247a0e1dc2f62a3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7ad74b264ed860b17e975dc85677fa7592686a55e72ebdd8c247a0e1dc2f62a3->enter($__internal_7ad74b264ed860b17e975dc85677fa7592686a55e72ebdd8c247a0e1dc2f62a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "<div class=\"heading\">
    <h3>Dodaj karnet użytkownikowi ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["member"] ?? null), "details", array()), "fullName", array(), "method"), "html", null, true);
        echo "</h3>
</div>

    <div class=\"row-fluid\">
        <div class=\"span6\">
            ";
        // line 13
        $this->loadTemplate("::_flash.html.twig", "GymanAppBundle:Vouchers:new.html.twig", 13)->display($context);
        // line 14
        echo "
            ";
        // line 15
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form');
        echo "
        </div>
        <div class=\"span6\">
            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "get", array(0 => "creditEntries"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "                <div class=\"alert alert-danger flash-notice\">
                    <p>";
            // line 20
            echo $context["flashMessage"];
            echo "</p>
                    <ol>
                        ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["creditEntries"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                if ((twig_length_filter($this->env, ($context["creditEntries"] ?? null)) > 0)) {
                    // line 23
                    echo "                        <li>
                            <strong>";
                    // line 24
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "startDate", array()), "Y-m-d H:i"), "html", null, true);
                    echo "</strong> na <strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "occurrence", array()), "event", array()), "title", array()), "html", null, true);
                    echo "</strong>
                            (sekcja: ";
                    // line 25
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["entry"], "occurrence", array()), "event", array()), "calendar", array()), "name", array()), "html", null, true);
                    echo ")
                        </li>
                        ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "                    </ol>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        </div>

    </div>

";
        
        $__internal_7ad74b264ed860b17e975dc85677fa7592686a55e72ebdd8c247a0e1dc2f62a3->leave($__internal_7ad74b264ed860b17e975dc85677fa7592686a55e72ebdd8c247a0e1dc2f62a3_prof);

        
        $__internal_697dd0cafcce4316f75718505e3c1a8c7320943c1134a8700bde8c769db77f10->leave($__internal_697dd0cafcce4316f75718505e3c1a8c7320943c1134a8700bde8c769db77f10_prof);

    }

    // line 37
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_94298dc96efe46d263c14a8a851037cbf6f33562b29417cf18167937f59a8f47 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_94298dc96efe46d263c14a8a851037cbf6f33562b29417cf18167937f59a8f47->enter($__internal_94298dc96efe46d263c14a8a851037cbf6f33562b29417cf18167937f59a8f47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_c3903ca81849a9f52b8256e13d30fd4288ab350c970eeff617f87e57e2eac389 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c3903ca81849a9f52b8256e13d30fd4288ab350c970eeff617f87e57e2eac389->enter($__internal_c3903ca81849a9f52b8256e13d30fd4288ab350c970eeff617f87e57e2eac389_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 38
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script type=\"text/javascript\" src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanreports/js/jquery-ui-1.9.2.custom.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanreports/js/bootstrap-datetimepicker.min.js"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
        \$(function(){
            \$(\"input[name*='startDate'], input[name*='endDate']\").datetimepicker({
                format: 'dd.mm.yyyy',
                weekStart: 1,
                autoclose: true,
                startView: 2,
                minView: 2,
                maxView: 2,
                clearBtn: true,
                todayBtn: true,
                todayHighlight: true,
                language: \"pl\"
            });
        });
    </script>
";
        
        $__internal_c3903ca81849a9f52b8256e13d30fd4288ab350c970eeff617f87e57e2eac389->leave($__internal_c3903ca81849a9f52b8256e13d30fd4288ab350c970eeff617f87e57e2eac389_prof);

        
        $__internal_94298dc96efe46d263c14a8a851037cbf6f33562b29417cf18167937f59a8f47->leave($__internal_94298dc96efe46d263c14a8a851037cbf6f33562b29417cf18167937f59a8f47_prof);

    }

    // line 61
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2cf7828defb301226444d378af31073d01492fe2d717a7a6ec63aa3be8bfed12 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2cf7828defb301226444d378af31073d01492fe2d717a7a6ec63aa3be8bfed12->enter($__internal_2cf7828defb301226444d378af31073d01492fe2d717a7a6ec63aa3be8bfed12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_2f7e9f006b62195e4d31b08e1c864aff5b3a2652af6b2dc58178a6f0ccb19235 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2f7e9f006b62195e4d31b08e1c864aff5b3a2652af6b2dc58178a6f0ccb19235->enter($__internal_2f7e9f006b62195e4d31b08e1c864aff5b3a2652af6b2dc58178a6f0ccb19235_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 62
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel='stylesheet' href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/bootstrap-datetimepicker.min.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_2f7e9f006b62195e4d31b08e1c864aff5b3a2652af6b2dc58178a6f0ccb19235->leave($__internal_2f7e9f006b62195e4d31b08e1c864aff5b3a2652af6b2dc58178a6f0ccb19235_prof);

        
        $__internal_2cf7828defb301226444d378af31073d01492fe2d717a7a6ec63aa3be8bfed12->leave($__internal_2cf7828defb301226444d378af31073d01492fe2d717a7a6ec63aa3be8bfed12_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Vouchers:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 63,  211 => 62,  202 => 61,  173 => 41,  169 => 40,  163 => 38,  154 => 37,  140 => 31,  132 => 28,  122 => 25,  116 => 24,  113 => 23,  108 => 22,  103 => 20,  100 => 19,  96 => 18,  90 => 15,  87 => 14,  85 => 13,  77 => 8,  74 => 7,  65 => 6,  52 => 3,  43 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"GymanAppBundle::layout.html.twig\" %}
{% block title %}
Dodaj karnet użytkownikowi {{ member.details.fullName() }}
{% endblock title %}

{% block content %}
<div class=\"heading\">
    <h3>Dodaj karnet użytkownikowi {{ member.details.fullName() }}</h3>
</div>

    <div class=\"row-fluid\">
        <div class=\"span6\">
            {% include \"::_flash.html.twig\" %}

            {{ form(form) }}
        </div>
        <div class=\"span6\">
            {% for flashMessage in app.session.flashbag.get('creditEntries') %}
                <div class=\"alert alert-danger flash-notice\">
                    <p>{{ flashMessage|raw }}</p>
                    <ol>
                        {% for entry in creditEntries if creditEntries|length > 0 %}
                        <li>
                            <strong>{{ entry.startDate|date(\"Y-m-d H:i\") }}</strong> na <strong>{{ entry.occurrence.event.title }}</strong>
                            (sekcja: {{ entry.occurrence.event.calendar.name }})
                        </li>
                        {% endfor %}
                    </ol>
                </div>
            {% endfor %}
        </div>

    </div>

{% endblock %}

{% block javascripts %}
    {{ parent() }}

    <script type=\"text/javascript\" src=\"{{ asset(\"bundles/gymanreports/js/jquery-ui-1.9.2.custom.js\") }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset(\"bundles/gymanreports/js/bootstrap-datetimepicker.min.js\") }}\"></script>

    <script type=\"text/javascript\">
        \$(function(){
            \$(\"input[name*='startDate'], input[name*='endDate']\").datetimepicker({
                format: 'dd.mm.yyyy',
                weekStart: 1,
                autoclose: true,
                startView: 2,
                minView: 2,
                maxView: 2,
                clearBtn: true,
                todayBtn: true,
                todayHighlight: true,
                language: \"pl\"
            });
        });
    </script>
{% endblock javascripts %}

{% block stylesheets %}
    {{ parent() }}
    <link rel='stylesheet' href=\"{{ asset('bundles/dendecalendar/css/bootstrap-datetimepicker.min.css') }}\" />
{% endblock stylesheets %}
", "GymanAppBundle:Vouchers:new.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Vouchers/new.html.twig");
    }
}
