<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_7771cdc3d3100b008bf007c4bf8a5bea85e26b59f5ad4599d8174192984d0da5 extends Twig_Template
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
        $__internal_161697dbc95d7eda81c1b64d2b5060546c686dcee3366b6c37d2e54d7aac3963 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_161697dbc95d7eda81c1b64d2b5060546c686dcee3366b6c37d2e54d7aac3963->enter($__internal_161697dbc95d7eda81c1b64d2b5060546c686dcee3366b6c37d2e54d7aac3963_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_d0407197bb43ecf98e4959bb1403e83c8cf392e20485177071a2b47c7c49d0de = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d0407197bb43ecf98e4959bb1403e83c8cf392e20485177071a2b47c7c49d0de->enter($__internal_d0407197bb43ecf98e4959bb1403e83c8cf392e20485177071a2b47c7c49d0de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

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
        
        $__internal_161697dbc95d7eda81c1b64d2b5060546c686dcee3366b6c37d2e54d7aac3963->leave($__internal_161697dbc95d7eda81c1b64d2b5060546c686dcee3366b6c37d2e54d7aac3963_prof);

        
        $__internal_d0407197bb43ecf98e4959bb1403e83c8cf392e20485177071a2b47c7c49d0de->leave($__internal_d0407197bb43ecf98e4959bb1403e83c8cf392e20485177071a2b47c7c49d0de_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_164a523583783602a738ca79b775590899bc5fc2f89e177abdfcac66a956f3ce = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_164a523583783602a738ca79b775590899bc5fc2f89e177abdfcac66a956f3ce->enter($__internal_164a523583783602a738ca79b775590899bc5fc2f89e177abdfcac66a956f3ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_1838151abcd3087c23f8e0b26192ad426646dfe309f8415cf08595fa6986f933 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1838151abcd3087c23f8e0b26192ad426646dfe309f8415cf08595fa6986f933->enter($__internal_1838151abcd3087c23f8e0b26192ad426646dfe309f8415cf08595fa6986f933_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_1838151abcd3087c23f8e0b26192ad426646dfe309f8415cf08595fa6986f933->leave($__internal_1838151abcd3087c23f8e0b26192ad426646dfe309f8415cf08595fa6986f933_prof);

        
        $__internal_164a523583783602a738ca79b775590899bc5fc2f89e177abdfcac66a956f3ce->leave($__internal_164a523583783602a738ca79b775590899bc5fc2f89e177abdfcac66a956f3ce_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_0944fa9790b7b74d494729d4fcf2636f803f3957e3bbb9907ad7d4c541894777 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0944fa9790b7b74d494729d4fcf2636f803f3957e3bbb9907ad7d4c541894777->enter($__internal_0944fa9790b7b74d494729d4fcf2636f803f3957e3bbb9907ad7d4c541894777_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_381adb33a55401f220eefcb86f8c357b16378011ea18eba819a39dde19c50302 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_381adb33a55401f220eefcb86f8c357b16378011ea18eba819a39dde19c50302->enter($__internal_381adb33a55401f220eefcb86f8c357b16378011ea18eba819a39dde19c50302_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_381adb33a55401f220eefcb86f8c357b16378011ea18eba819a39dde19c50302->leave($__internal_381adb33a55401f220eefcb86f8c357b16378011ea18eba819a39dde19c50302_prof);

        
        $__internal_0944fa9790b7b74d494729d4fcf2636f803f3957e3bbb9907ad7d4c541894777->leave($__internal_0944fa9790b7b74d494729d4fcf2636f803f3957e3bbb9907ad7d4c541894777_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_28575b869c660028cc16c2bb8f0061e3f77b3c54e4fdec5a5e3b0426400e5b46 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_28575b869c660028cc16c2bb8f0061e3f77b3c54e4fdec5a5e3b0426400e5b46->enter($__internal_28575b869c660028cc16c2bb8f0061e3f77b3c54e4fdec5a5e3b0426400e5b46_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_a3eed441d8bed450c75799301f722245c83ecea106e8617bcfbbfc70b99428aa = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a3eed441d8bed450c75799301f722245c83ecea106e8617bcfbbfc70b99428aa->enter($__internal_a3eed441d8bed450c75799301f722245c83ecea106e8617bcfbbfc70b99428aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_a3eed441d8bed450c75799301f722245c83ecea106e8617bcfbbfc70b99428aa->leave($__internal_a3eed441d8bed450c75799301f722245c83ecea106e8617bcfbbfc70b99428aa_prof);

        
        $__internal_28575b869c660028cc16c2bb8f0061e3f77b3c54e4fdec5a5e3b0426400e5b46->leave($__internal_28575b869c660028cc16c2bb8f0061e3f77b3c54e4fdec5a5e3b0426400e5b46_prof);

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
