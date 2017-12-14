<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_f64194d46e5ca9e98912cb6a9a973d1877bee33f7513fe7f905f50ea0e7ca265 extends Twig_Template
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
        $__internal_4b206a5f4a9489375d782120081bdf5f468f78af7969efdc9627ee35a3f8cf23 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4b206a5f4a9489375d782120081bdf5f468f78af7969efdc9627ee35a3f8cf23->enter($__internal_4b206a5f4a9489375d782120081bdf5f468f78af7969efdc9627ee35a3f8cf23_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_1694bf805bde57557398dec0790e0571823ba6b9153d1fa36dae2d4cfeded084 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1694bf805bde57557398dec0790e0571823ba6b9153d1fa36dae2d4cfeded084->enter($__internal_1694bf805bde57557398dec0790e0571823ba6b9153d1fa36dae2d4cfeded084_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4b206a5f4a9489375d782120081bdf5f468f78af7969efdc9627ee35a3f8cf23->leave($__internal_4b206a5f4a9489375d782120081bdf5f468f78af7969efdc9627ee35a3f8cf23_prof);

        
        $__internal_1694bf805bde57557398dec0790e0571823ba6b9153d1fa36dae2d4cfeded084->leave($__internal_1694bf805bde57557398dec0790e0571823ba6b9153d1fa36dae2d4cfeded084_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_92b6e3838a01a8ad216ed6fc813c8b124f4dcab4a7e877b9cd06d72901e943cd = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_92b6e3838a01a8ad216ed6fc813c8b124f4dcab4a7e877b9cd06d72901e943cd->enter($__internal_92b6e3838a01a8ad216ed6fc813c8b124f4dcab4a7e877b9cd06d72901e943cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_7f758d9a05850f299b5a97b924e9a03c8a0a92cf6ef5cfb4b730a3568b75353a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7f758d9a05850f299b5a97b924e9a03c8a0a92cf6ef5cfb4b730a3568b75353a->enter($__internal_7f758d9a05850f299b5a97b924e9a03c8a0a92cf6ef5cfb4b730a3568b75353a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

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
        
        $__internal_7f758d9a05850f299b5a97b924e9a03c8a0a92cf6ef5cfb4b730a3568b75353a->leave($__internal_7f758d9a05850f299b5a97b924e9a03c8a0a92cf6ef5cfb4b730a3568b75353a_prof);

        
        $__internal_92b6e3838a01a8ad216ed6fc813c8b124f4dcab4a7e877b9cd06d72901e943cd->leave($__internal_92b6e3838a01a8ad216ed6fc813c8b124f4dcab4a7e877b9cd06d72901e943cd_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_0f7d12e6e1a7f484dd9252b49771b96eafd3809aedc837a45e4dacdeff9c5fe8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0f7d12e6e1a7f484dd9252b49771b96eafd3809aedc837a45e4dacdeff9c5fe8->enter($__internal_0f7d12e6e1a7f484dd9252b49771b96eafd3809aedc837a45e4dacdeff9c5fe8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_09d37aa473a0c0032f5a5cea3ca1f928bfc08a7cd5735b9a50c1a8a99b4a0c2f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_09d37aa473a0c0032f5a5cea3ca1f928bfc08a7cd5735b9a50c1a8a99b4a0c2f->enter($__internal_09d37aa473a0c0032f5a5cea3ca1f928bfc08a7cd5735b9a50c1a8a99b4a0c2f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? null), "html", null, true);
        echo ")
";
        
        $__internal_09d37aa473a0c0032f5a5cea3ca1f928bfc08a7cd5735b9a50c1a8a99b4a0c2f->leave($__internal_09d37aa473a0c0032f5a5cea3ca1f928bfc08a7cd5735b9a50c1a8a99b4a0c2f_prof);

        
        $__internal_0f7d12e6e1a7f484dd9252b49771b96eafd3809aedc837a45e4dacdeff9c5fe8->leave($__internal_0f7d12e6e1a7f484dd9252b49771b96eafd3809aedc837a45e4dacdeff9c5fe8_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_9ec1fc0e36d60c6dd3512f0f58c1b82820bd2ac5919ac5eec1df1ba53c4f3d56 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9ec1fc0e36d60c6dd3512f0f58c1b82820bd2ac5919ac5eec1df1ba53c4f3d56->enter($__internal_9ec1fc0e36d60c6dd3512f0f58c1b82820bd2ac5919ac5eec1df1ba53c4f3d56_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_bbf308319652ed38a3bdf554e0d16fe7f02c2578e325403db084d800e352213a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bbf308319652ed38a3bdf554e0d16fe7f02c2578e325403db084d800e352213a->enter($__internal_bbf308319652ed38a3bdf554e0d16fe7f02c2578e325403db084d800e352213a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_bbf308319652ed38a3bdf554e0d16fe7f02c2578e325403db084d800e352213a->leave($__internal_bbf308319652ed38a3bdf554e0d16fe7f02c2578e325403db084d800e352213a_prof);

        
        $__internal_9ec1fc0e36d60c6dd3512f0f58c1b82820bd2ac5919ac5eec1df1ba53c4f3d56->leave($__internal_9ec1fc0e36d60c6dd3512f0f58c1b82820bd2ac5919ac5eec1df1ba53c4f3d56_prof);

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
