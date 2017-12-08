<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_b95544fc9c243ea16b6658e109c121f1bc1d2771b81e6e3c092a211987e4a73f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_582948377990f246aac55de597639126c9a3a322db9c8dab615e1b0ae526d6b6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_582948377990f246aac55de597639126c9a3a322db9c8dab615e1b0ae526d6b6->enter($__internal_582948377990f246aac55de597639126c9a3a322db9c8dab615e1b0ae526d6b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_5b11951306ff5e99293d685c13344594ed277bfb9106f644433609c70feafc63 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5b11951306ff5e99293d685c13344594ed277bfb9106f644433609c70feafc63->enter($__internal_5b11951306ff5e99293d685c13344594ed277bfb9106f644433609c70feafc63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_582948377990f246aac55de597639126c9a3a322db9c8dab615e1b0ae526d6b6->leave($__internal_582948377990f246aac55de597639126c9a3a322db9c8dab615e1b0ae526d6b6_prof);

        
        $__internal_5b11951306ff5e99293d685c13344594ed277bfb9106f644433609c70feafc63->leave($__internal_5b11951306ff5e99293d685c13344594ed277bfb9106f644433609c70feafc63_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_bba8950bfaa1494c698e84a080be58a93d18558cbf9f911f054b3695cf864856 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bba8950bfaa1494c698e84a080be58a93d18558cbf9f911f054b3695cf864856->enter($__internal_bba8950bfaa1494c698e84a080be58a93d18558cbf9f911f054b3695cf864856_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_0f424cc3f5f5f4c9ed004ff143628eb74f1e4957aad49398a3fca2c567119136 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0f424cc3f5f5f4c9ed004ff143628eb74f1e4957aad49398a3fca2c567119136->enter($__internal_0f424cc3f5f5f4c9ed004ff143628eb74f1e4957aad49398a3fca2c567119136_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
";
        
        $__internal_0f424cc3f5f5f4c9ed004ff143628eb74f1e4957aad49398a3fca2c567119136->leave($__internal_0f424cc3f5f5f4c9ed004ff143628eb74f1e4957aad49398a3fca2c567119136_prof);

        
        $__internal_bba8950bfaa1494c698e84a080be58a93d18558cbf9f911f054b3695cf864856->leave($__internal_bba8950bfaa1494c698e84a080be58a93d18558cbf9f911f054b3695cf864856_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_4391062ea358b15bb048f189732bc23fc8463685762ff4d4e977568cc81f9da8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4391062ea358b15bb048f189732bc23fc8463685762ff4d4e977568cc81f9da8->enter($__internal_4391062ea358b15bb048f189732bc23fc8463685762ff4d4e977568cc81f9da8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_cbd0fa0a4903109072097f66507775a06110c6ce2299c10bcc596dff050eb506 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cbd0fa0a4903109072097f66507775a06110c6ce2299c10bcc596dff050eb506->enter($__internal_cbd0fa0a4903109072097f66507775a06110c6ce2299c10bcc596dff050eb506_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? null), "html", null, true);
        echo ")
";
        
        $__internal_cbd0fa0a4903109072097f66507775a06110c6ce2299c10bcc596dff050eb506->leave($__internal_cbd0fa0a4903109072097f66507775a06110c6ce2299c10bcc596dff050eb506_prof);

        
        $__internal_4391062ea358b15bb048f189732bc23fc8463685762ff4d4e977568cc81f9da8->leave($__internal_4391062ea358b15bb048f189732bc23fc8463685762ff4d4e977568cc81f9da8_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_f7c60a3a793874c8e1215e595bc1207aa3f84975440d3df3b2e23dadd01d740a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f7c60a3a793874c8e1215e595bc1207aa3f84975440d3df3b2e23dadd01d740a->enter($__internal_f7c60a3a793874c8e1215e595bc1207aa3f84975440d3df3b2e23dadd01d740a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_47c1e46daf22ba8d389dc89a106bf5f012dd1b161a7145e854e59192904ac035 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_47c1e46daf22ba8d389dc89a106bf5f012dd1b161a7145e854e59192904ac035->enter($__internal_47c1e46daf22ba8d389dc89a106bf5f012dd1b161a7145e854e59192904ac035_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_47c1e46daf22ba8d389dc89a106bf5f012dd1b161a7145e854e59192904ac035->leave($__internal_47c1e46daf22ba8d389dc89a106bf5f012dd1b161a7145e854e59192904ac035_prof);

        
        $__internal_f7c60a3a793874c8e1215e595bc1207aa3f84975440d3df3b2e23dadd01d740a->leave($__internal_f7c60a3a793874c8e1215e595bc1207aa3f84975440d3df3b2e23dadd01d740a_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 141,  217 => 140,  200 => 137,  191 => 136,  51 => 4,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "/vagrant/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
