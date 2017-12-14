<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_982e1f12c0b447afcaa4ca1d7815ac726304dd52eb179a34ffb955a68fa8e1d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_681cd96ca948475dc77d1317de9b2a56997b42cc9fe4816cb067e13e99bfdc2e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_681cd96ca948475dc77d1317de9b2a56997b42cc9fe4816cb067e13e99bfdc2e->enter($__internal_681cd96ca948475dc77d1317de9b2a56997b42cc9fe4816cb067e13e99bfdc2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_50f2e196d630be21636deff9d372ff3c00ae6c2992d0ccc47b63cbe988042241 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_50f2e196d630be21636deff9d372ff3c00ae6c2992d0ccc47b63cbe988042241->enter($__internal_50f2e196d630be21636deff9d372ff3c00ae6c2992d0ccc47b63cbe988042241_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_681cd96ca948475dc77d1317de9b2a56997b42cc9fe4816cb067e13e99bfdc2e->leave($__internal_681cd96ca948475dc77d1317de9b2a56997b42cc9fe4816cb067e13e99bfdc2e_prof);

        
        $__internal_50f2e196d630be21636deff9d372ff3c00ae6c2992d0ccc47b63cbe988042241->leave($__internal_50f2e196d630be21636deff9d372ff3c00ae6c2992d0ccc47b63cbe988042241_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_014464bba317a4d2d13c2dadd8cb94ef9f532f94fad25e4aa0fc1325896dfeb2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_014464bba317a4d2d13c2dadd8cb94ef9f532f94fad25e4aa0fc1325896dfeb2->enter($__internal_014464bba317a4d2d13c2dadd8cb94ef9f532f94fad25e4aa0fc1325896dfeb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_3df756ccd2d6649ed93054e4e975c470bb312da09b6e7faff1d8f3ac33fa168b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3df756ccd2d6649ed93054e4e975c470bb312da09b6e7faff1d8f3ac33fa168b->enter($__internal_3df756ccd2d6649ed93054e4e975c470bb312da09b6e7faff1d8f3ac33fa168b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_3df756ccd2d6649ed93054e4e975c470bb312da09b6e7faff1d8f3ac33fa168b->leave($__internal_3df756ccd2d6649ed93054e4e975c470bb312da09b6e7faff1d8f3ac33fa168b_prof);

        
        $__internal_014464bba317a4d2d13c2dadd8cb94ef9f532f94fad25e4aa0fc1325896dfeb2->leave($__internal_014464bba317a4d2d13c2dadd8cb94ef9f532f94fad25e4aa0fc1325896dfeb2_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_f612c005143670f373c1ea07b59e5f94130f18a14263291985a800b0e159ff03 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f612c005143670f373c1ea07b59e5f94130f18a14263291985a800b0e159ff03->enter($__internal_f612c005143670f373c1ea07b59e5f94130f18a14263291985a800b0e159ff03_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_b51b9f18b8c7c65f54fea5aa1cfa2445e15d93f3b316a7c0a29c9ec842f2e40a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b51b9f18b8c7c65f54fea5aa1cfa2445e15d93f3b316a7c0a29c9ec842f2e40a->enter($__internal_b51b9f18b8c7c65f54fea5aa1cfa2445e15d93f3b316a7c0a29c9ec842f2e40a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_b51b9f18b8c7c65f54fea5aa1cfa2445e15d93f3b316a7c0a29c9ec842f2e40a->leave($__internal_b51b9f18b8c7c65f54fea5aa1cfa2445e15d93f3b316a7c0a29c9ec842f2e40a_prof);

        
        $__internal_f612c005143670f373c1ea07b59e5f94130f18a14263291985a800b0e159ff03->leave($__internal_f612c005143670f373c1ea07b59e5f94130f18a14263291985a800b0e159ff03_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_e6e3e1fef229d3027807bbadd20770b98c71e78e0d247d71bf19415e66db0a66 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e6e3e1fef229d3027807bbadd20770b98c71e78e0d247d71bf19415e66db0a66->enter($__internal_e6e3e1fef229d3027807bbadd20770b98c71e78e0d247d71bf19415e66db0a66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_fca94a7968ec304042b2cde8b350935d743ae478857e406c0877eaad5446d1ff = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fca94a7968ec304042b2cde8b350935d743ae478857e406c0877eaad5446d1ff->enter($__internal_fca94a7968ec304042b2cde8b350935d743ae478857e406c0877eaad5446d1ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_fca94a7968ec304042b2cde8b350935d743ae478857e406c0877eaad5446d1ff->leave($__internal_fca94a7968ec304042b2cde8b350935d743ae478857e406c0877eaad5446d1ff_prof);

        
        $__internal_e6e3e1fef229d3027807bbadd20770b98c71e78e0d247d71bf19415e66db0a66->leave($__internal_e6e3e1fef229d3027807bbadd20770b98c71e78e0d247d71bf19415e66db0a66_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 33,  120 => 10,  103 => 7,  88 => 34,  86 => 33,  76 => 26,  66 => 19,  59 => 15,  53 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/layout.html.twig");
    }
}
