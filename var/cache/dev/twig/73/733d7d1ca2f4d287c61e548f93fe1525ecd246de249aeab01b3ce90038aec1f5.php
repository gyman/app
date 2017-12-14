<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_041d13ab9d40042cc7259eeb7ae798d5c7883c3e0e2938ac008bfda74d660f9a extends Twig_Template
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
        $__internal_e29c579520f9980a0f2e2ef203755cdd60e5b9f154c76aa3217085facb0d6590 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e29c579520f9980a0f2e2ef203755cdd60e5b9f154c76aa3217085facb0d6590->enter($__internal_e29c579520f9980a0f2e2ef203755cdd60e5b9f154c76aa3217085facb0d6590_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_8883e3a3337575875e7527188396d642222929c5b862da56e47088319b6c21c6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8883e3a3337575875e7527188396d642222929c5b862da56e47088319b6c21c6->enter($__internal_8883e3a3337575875e7527188396d642222929c5b862da56e47088319b6c21c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

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
        
        $__internal_e29c579520f9980a0f2e2ef203755cdd60e5b9f154c76aa3217085facb0d6590->leave($__internal_e29c579520f9980a0f2e2ef203755cdd60e5b9f154c76aa3217085facb0d6590_prof);

        
        $__internal_8883e3a3337575875e7527188396d642222929c5b862da56e47088319b6c21c6->leave($__internal_8883e3a3337575875e7527188396d642222929c5b862da56e47088319b6c21c6_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_75887ce2aeb37191a7382f47e4d0ba3d9845ed45be7dfb011c7e424aa3c38760 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_75887ce2aeb37191a7382f47e4d0ba3d9845ed45be7dfb011c7e424aa3c38760->enter($__internal_75887ce2aeb37191a7382f47e4d0ba3d9845ed45be7dfb011c7e424aa3c38760_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_4df82b397aad7bbe43566b41a24e71387a5e38b07b0049d15ee958bfcde01e2d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4df82b397aad7bbe43566b41a24e71387a5e38b07b0049d15ee958bfcde01e2d->enter($__internal_4df82b397aad7bbe43566b41a24e71387a5e38b07b0049d15ee958bfcde01e2d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_4df82b397aad7bbe43566b41a24e71387a5e38b07b0049d15ee958bfcde01e2d->leave($__internal_4df82b397aad7bbe43566b41a24e71387a5e38b07b0049d15ee958bfcde01e2d_prof);

        
        $__internal_75887ce2aeb37191a7382f47e4d0ba3d9845ed45be7dfb011c7e424aa3c38760->leave($__internal_75887ce2aeb37191a7382f47e4d0ba3d9845ed45be7dfb011c7e424aa3c38760_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_437714efdec2df6235fc3339b4db9c4ade73f4bd0690a83dcc038095ecf16caa = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_437714efdec2df6235fc3339b4db9c4ade73f4bd0690a83dcc038095ecf16caa->enter($__internal_437714efdec2df6235fc3339b4db9c4ade73f4bd0690a83dcc038095ecf16caa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_de5e7eae4818a5396f2cf88b4a35b3f594412c3d4e9acbccfb800ddd3e30846a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de5e7eae4818a5396f2cf88b4a35b3f594412c3d4e9acbccfb800ddd3e30846a->enter($__internal_de5e7eae4818a5396f2cf88b4a35b3f594412c3d4e9acbccfb800ddd3e30846a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_de5e7eae4818a5396f2cf88b4a35b3f594412c3d4e9acbccfb800ddd3e30846a->leave($__internal_de5e7eae4818a5396f2cf88b4a35b3f594412c3d4e9acbccfb800ddd3e30846a_prof);

        
        $__internal_437714efdec2df6235fc3339b4db9c4ade73f4bd0690a83dcc038095ecf16caa->leave($__internal_437714efdec2df6235fc3339b4db9c4ade73f4bd0690a83dcc038095ecf16caa_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_0fbb4e5247f30d615c57ab3af02bc87c3334747a7dce64b39fa1e0415597632e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0fbb4e5247f30d615c57ab3af02bc87c3334747a7dce64b39fa1e0415597632e->enter($__internal_0fbb4e5247f30d615c57ab3af02bc87c3334747a7dce64b39fa1e0415597632e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_6de68cfa3584f252402efdb9a0a4dd8d8daebe24477c31704c49c33b83955c57 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6de68cfa3584f252402efdb9a0a4dd8d8daebe24477c31704c49c33b83955c57->enter($__internal_6de68cfa3584f252402efdb9a0a4dd8d8daebe24477c31704c49c33b83955c57_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6de68cfa3584f252402efdb9a0a4dd8d8daebe24477c31704c49c33b83955c57->leave($__internal_6de68cfa3584f252402efdb9a0a4dd8d8daebe24477c31704c49c33b83955c57_prof);

        
        $__internal_0fbb4e5247f30d615c57ab3af02bc87c3334747a7dce64b39fa1e0415597632e->leave($__internal_0fbb4e5247f30d615c57ab3af02bc87c3334747a7dce64b39fa1e0415597632e_prof);

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
