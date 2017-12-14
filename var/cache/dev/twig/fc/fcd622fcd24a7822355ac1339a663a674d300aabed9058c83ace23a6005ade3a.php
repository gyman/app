<?php

/* GymanReportsBundle:Default:index.html.twig */
class __TwigTemplate_02843048942e1511556da02282ac19a57834a6879462c084ce0867cf412e24e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanReportsBundle::layout.html.twig", "GymanReportsBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanReportsBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_226ce3a9ad99c01f3016275045eb2bd3c0f278e0f84f306d3d52abd15193dc10 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_226ce3a9ad99c01f3016275045eb2bd3c0f278e0f84f306d3d52abd15193dc10->enter($__internal_226ce3a9ad99c01f3016275045eb2bd3c0f278e0f84f306d3d52abd15193dc10_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanReportsBundle:Default:index.html.twig"));

        $__internal_3ad76fe15c6197a273c4b140eca6f1e5ae197a49d56048d9ede904f3578b9960 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3ad76fe15c6197a273c4b140eca6f1e5ae197a49d56048d9ede904f3578b9960->enter($__internal_3ad76fe15c6197a273c4b140eca6f1e5ae197a49d56048d9ede904f3578b9960_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanReportsBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_226ce3a9ad99c01f3016275045eb2bd3c0f278e0f84f306d3d52abd15193dc10->leave($__internal_226ce3a9ad99c01f3016275045eb2bd3c0f278e0f84f306d3d52abd15193dc10_prof);

        
        $__internal_3ad76fe15c6197a273c4b140eca6f1e5ae197a49d56048d9ede904f3578b9960->leave($__internal_3ad76fe15c6197a273c4b140eca6f1e5ae197a49d56048d9ede904f3578b9960_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_959cdf278761dc74da44a2722c53635fef6fd214f36fbc1d2c6e6dbea94fd39c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_959cdf278761dc74da44a2722c53635fef6fd214f36fbc1d2c6e6dbea94fd39c->enter($__internal_959cdf278761dc74da44a2722c53635fef6fd214f36fbc1d2c6e6dbea94fd39c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_18bab4ebc429f9af5afc9a7f49a9775972468c58fb0fc30797a30cd0c116a1cd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_18bab4ebc429f9af5afc9a7f49a9775972468c58fb0fc30797a30cd0c116a1cd->enter($__internal_18bab4ebc429f9af5afc9a7f49a9775972468c58fb0fc30797a30cd0c116a1cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<div class=\"heading\">
    <h3>Raporty</h3>
</div>

<div class=\"form-row row-fluid\">
    <div class=\"span12\">


        ";
        // line 12
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
        <div class=\"row-fluid\">
            ";
        // line 14
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "strategy", array()), 'row');
        echo "
        </div>
        <div class=\"row-fluid\">
            ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "startDate", array()), 'widget');
        echo "
            ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "endDate", array()), 'widget');
        echo "

            <div>
                <ul class=\"inline\">
                    <li>";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "submit", array()), 'widget', array("attr" => array("class" => "btn btn-success")));
        echo "</li>
                    <li><a class=\"btn\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["links"] ?? null), "lastMonthLink", array()), "html", null, true);
        echo "\">Poprzedni miesiąc</a></li>
                    <li><a class=\"btn\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["links"] ?? null), "thisMonthLink", array()), "html", null, true);
        echo "\">Ten miesiąc</a></li>
                    <li><a class=\"btn\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["links"] ?? null), "lastWeekLink", array()), "html", null, true);
        echo "\">Poprzedni tydzień</a></li>
                    <li><a class=\"btn\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["links"] ?? null), "thisWeekLink", array()), "html", null, true);
        echo "\">Ten tydzień</a></li>
                    <li><a class=\"btn\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["links"] ?? null), "yesterdayLink", array()), "html", null, true);
        echo "\">Wczoraj</a></li>
                    <li><a class=\"btn\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["links"] ?? null), "todayLink", array()), "html", null, true);
        echo "\">Dzisiaj</a></li>
                </ul>
            </div>
        </div>
        ";
        // line 32
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

        <ol>
            ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            if ((twig_length_filter($this->env, ($context["rows"] ?? null)) > 0)) {
                // line 36
                echo "                <li>
                    ";
                // line 37
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["row"], "route", array(), "any", true, true)) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["row"], "route", array()), "html", null, true);
                    echo "\">";
                }
                // line 38
                echo "                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["row"], "title", array()), "html", null, true);
                echo "
                    ";
                // line 39
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["row"], "route", array(), "any", true, true)) {
                    echo "</a>";
                }
                // line 40
                echo "                    - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["row"], "sum", array()), "html", null, true);
                echo " PLN
                </li>
            ";
                $context['_iterated'] = true;
            }
        }
        if (!$context['_iterated']) {
            // line 43
            echo "                <li>Brak wyników - zmień zakres czasu</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "        </ol>

        <strong>suma: ";
        // line 47
        echo twig_escape_filter($this->env, ($context["sum"] ?? null), "html", null, true);
        echo " PLN</strong>

    </div>
</div>

";
        
        $__internal_18bab4ebc429f9af5afc9a7f49a9775972468c58fb0fc30797a30cd0c116a1cd->leave($__internal_18bab4ebc429f9af5afc9a7f49a9775972468c58fb0fc30797a30cd0c116a1cd_prof);

        
        $__internal_959cdf278761dc74da44a2722c53635fef6fd214f36fbc1d2c6e6dbea94fd39c->leave($__internal_959cdf278761dc74da44a2722c53635fef6fd214f36fbc1d2c6e6dbea94fd39c_prof);

    }

    // line 54
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_2fb4ca655182b03335cf86149029b41fc18d11e9ad698a5c74193de530d16ebb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2fb4ca655182b03335cf86149029b41fc18d11e9ad698a5c74193de530d16ebb->enter($__internal_2fb4ca655182b03335cf86149029b41fc18d11e9ad698a5c74193de530d16ebb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_108784c9efb9f35a7a44d715e72bf7dadd9a6a869218246034c043a7668262e7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_108784c9efb9f35a7a44d715e72bf7dadd9a6a869218246034c043a7668262e7->enter($__internal_108784c9efb9f35a7a44d715e72bf7dadd9a6a869218246034c043a7668262e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 55
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanreports/js/jquery-ui-1.9.2.custom.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanreports/js/bootstrap-datetimepicker.min.js"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
        \$(function(){
           \$.uniform.restore(\"select#uniform-reports_date_filter_strategy\");

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
        
        $__internal_108784c9efb9f35a7a44d715e72bf7dadd9a6a869218246034c043a7668262e7->leave($__internal_108784c9efb9f35a7a44d715e72bf7dadd9a6a869218246034c043a7668262e7_prof);

        
        $__internal_2fb4ca655182b03335cf86149029b41fc18d11e9ad698a5c74193de530d16ebb->leave($__internal_2fb4ca655182b03335cf86149029b41fc18d11e9ad698a5c74193de530d16ebb_prof);

    }

    // line 80
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_27ae2d98ef3c6f93f90f18341839d3de360906decafbf931bcae414668407a5e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_27ae2d98ef3c6f93f90f18341839d3de360906decafbf931bcae414668407a5e->enter($__internal_27ae2d98ef3c6f93f90f18341839d3de360906decafbf931bcae414668407a5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_662f06dea2b7d97dea39cdbcd7dc6c717306072e1b2bd6479e076cf64b690995 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_662f06dea2b7d97dea39cdbcd7dc6c717306072e1b2bd6479e076cf64b690995->enter($__internal_662f06dea2b7d97dea39cdbcd7dc6c717306072e1b2bd6479e076cf64b690995_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 81
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/bootstrap-datetimepicker.min.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_662f06dea2b7d97dea39cdbcd7dc6c717306072e1b2bd6479e076cf64b690995->leave($__internal_662f06dea2b7d97dea39cdbcd7dc6c717306072e1b2bd6479e076cf64b690995_prof);

        
        $__internal_27ae2d98ef3c6f93f90f18341839d3de360906decafbf931bcae414668407a5e->leave($__internal_27ae2d98ef3c6f93f90f18341839d3de360906decafbf931bcae414668407a5e_prof);

    }

    public function getTemplateName()
    {
        return "GymanReportsBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 82,  240 => 81,  231 => 80,  200 => 58,  196 => 57,  190 => 55,  181 => 54,  165 => 47,  161 => 45,  154 => 43,  144 => 40,  140 => 39,  135 => 38,  129 => 37,  126 => 36,  120 => 35,  114 => 32,  107 => 28,  103 => 27,  99 => 26,  95 => 25,  91 => 24,  87 => 23,  83 => 22,  76 => 18,  72 => 17,  66 => 14,  61 => 12,  51 => 4,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{%  extends 'GymanReportsBundle::layout.html.twig' %}

{% block body %}
<div class=\"heading\">
    <h3>Raporty</h3>
</div>

<div class=\"form-row row-fluid\">
    <div class=\"span12\">


        {{ form_start(form) }}
        <div class=\"row-fluid\">
            {{ form_row(form.strategy) }}
        </div>
        <div class=\"row-fluid\">
            {{ form_widget(form.startDate) }}
            {{ form_widget(form.endDate) }}

            <div>
                <ul class=\"inline\">
                    <li>{{ form_widget(form.submit, {attr: { class: \"btn btn-success\"}}) }}</li>
                    <li><a class=\"btn\" href=\"{{ links.lastMonthLink }}\">Poprzedni miesiąc</a></li>
                    <li><a class=\"btn\" href=\"{{ links.thisMonthLink }}\">Ten miesiąc</a></li>
                    <li><a class=\"btn\" href=\"{{ links.lastWeekLink }}\">Poprzedni tydzień</a></li>
                    <li><a class=\"btn\" href=\"{{ links.thisWeekLink }}\">Ten tydzień</a></li>
                    <li><a class=\"btn\" href=\"{{ links.yesterdayLink }}\">Wczoraj</a></li>
                    <li><a class=\"btn\" href=\"{{ links.todayLink }}\">Dzisiaj</a></li>
                </ul>
            </div>
        </div>
        {{ form_end(form) }}

        <ol>
            {% for row in rows if rows|length > 0 %}
                <li>
                    {% if row.route is defined %}<a href=\"{{ row.route }}\">{% endif %}
                    {{ row.title }}
                    {% if row.route is defined %}</a>{% endif %}
                    - {{ row.sum }} PLN
                </li>
            {% else %}
                <li>Brak wyników - zmień zakres czasu</li>
            {%  endfor %}
        </ol>

        <strong>suma: {{ sum }} PLN</strong>

    </div>
</div>

{% endblock body %}

{% block javascripts %}
    {{ parent() }}

    <script type=\"text/javascript\" src=\"{{ asset(\"bundles/gymanreports/js/jquery-ui-1.9.2.custom.js\") }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset(\"bundles/gymanreports/js/bootstrap-datetimepicker.min.js\") }}\"></script>

    <script type=\"text/javascript\">
        \$(function(){
           \$.uniform.restore(\"select#uniform-reports_date_filter_strategy\");

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
    <link rel=\"stylesheet\" href=\"{{ asset(\"bundles/dendecalendar/css/bootstrap-datetimepicker.min.css\") }}\" />
{% endblock stylesheets %}
", "GymanReportsBundle:Default:index.html.twig", "/vagrant/src/Bundle/ReportsBundle/Resources/views/Default/index.html.twig");
    }
}
