<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_f184338626187848d42506f19a29dbfa1cce28bcfe81fc19940527ad2918faa7 extends Twig_Template
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
        $__internal_aec6696328ceca97a499359fba4adec27e72f663cf28da3fca4df2359eac2572 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_aec6696328ceca97a499359fba4adec27e72f663cf28da3fca4df2359eac2572->enter($__internal_aec6696328ceca97a499359fba4adec27e72f663cf28da3fca4df2359eac2572_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_e839135dd8ae50bd3cd4909a983444de483e1b9e9798af1fd2ac350902b178af = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e839135dd8ae50bd3cd4909a983444de483e1b9e9798af1fd2ac350902b178af->enter($__internal_e839135dd8ae50bd3cd4909a983444de483e1b9e9798af1fd2ac350902b178af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_aec6696328ceca97a499359fba4adec27e72f663cf28da3fca4df2359eac2572->leave($__internal_aec6696328ceca97a499359fba4adec27e72f663cf28da3fca4df2359eac2572_prof);

        
        $__internal_e839135dd8ae50bd3cd4909a983444de483e1b9e9798af1fd2ac350902b178af->leave($__internal_e839135dd8ae50bd3cd4909a983444de483e1b9e9798af1fd2ac350902b178af_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1c411e080ae495474cfaafb9d313fbd90154d6b1b07166623232a5deaf42bdb3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1c411e080ae495474cfaafb9d313fbd90154d6b1b07166623232a5deaf42bdb3->enter($__internal_1c411e080ae495474cfaafb9d313fbd90154d6b1b07166623232a5deaf42bdb3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_904f776491ca3dccb500e6e082cf862735d1bb881c546cd2d1b7d47fb3a4b3a7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_904f776491ca3dccb500e6e082cf862735d1bb881c546cd2d1b7d47fb3a4b3a7->enter($__internal_904f776491ca3dccb500e6e082cf862735d1bb881c546cd2d1b7d47fb3a4b3a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

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
        
        $__internal_904f776491ca3dccb500e6e082cf862735d1bb881c546cd2d1b7d47fb3a4b3a7->leave($__internal_904f776491ca3dccb500e6e082cf862735d1bb881c546cd2d1b7d47fb3a4b3a7_prof);

        
        $__internal_1c411e080ae495474cfaafb9d313fbd90154d6b1b07166623232a5deaf42bdb3->leave($__internal_1c411e080ae495474cfaafb9d313fbd90154d6b1b07166623232a5deaf42bdb3_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_05c69bd24414ee075b02aa610e9a21a25300daaac127e21d717bcd05506f95bd = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_05c69bd24414ee075b02aa610e9a21a25300daaac127e21d717bcd05506f95bd->enter($__internal_05c69bd24414ee075b02aa610e9a21a25300daaac127e21d717bcd05506f95bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_8a6d695dc464bb16fb5cccb4dc059e638af4079e7cdaad788bbd2b73461f31f5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8a6d695dc464bb16fb5cccb4dc059e638af4079e7cdaad788bbd2b73461f31f5->enter($__internal_8a6d695dc464bb16fb5cccb4dc059e638af4079e7cdaad788bbd2b73461f31f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["exception"] ?? null), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? null), "html", null, true);
        echo ")
";
        
        $__internal_8a6d695dc464bb16fb5cccb4dc059e638af4079e7cdaad788bbd2b73461f31f5->leave($__internal_8a6d695dc464bb16fb5cccb4dc059e638af4079e7cdaad788bbd2b73461f31f5_prof);

        
        $__internal_05c69bd24414ee075b02aa610e9a21a25300daaac127e21d717bcd05506f95bd->leave($__internal_05c69bd24414ee075b02aa610e9a21a25300daaac127e21d717bcd05506f95bd_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_dc938e72580a3248967bbd39cd8e9309bf9fb59058f126927546efc3be383706 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_dc938e72580a3248967bbd39cd8e9309bf9fb59058f126927546efc3be383706->enter($__internal_dc938e72580a3248967bbd39cd8e9309bf9fb59058f126927546efc3be383706_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_7bf3d8ca396576f33ea76c61b90cc03df90d6705d4bd27387ae7e3b436a74bbd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7bf3d8ca396576f33ea76c61b90cc03df90d6705d4bd27387ae7e3b436a74bbd->enter($__internal_7bf3d8ca396576f33ea76c61b90cc03df90d6705d4bd27387ae7e3b436a74bbd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_7bf3d8ca396576f33ea76c61b90cc03df90d6705d4bd27387ae7e3b436a74bbd->leave($__internal_7bf3d8ca396576f33ea76c61b90cc03df90d6705d4bd27387ae7e3b436a74bbd_prof);

        
        $__internal_dc938e72580a3248967bbd39cd8e9309bf9fb59058f126927546efc3be383706->leave($__internal_dc938e72580a3248967bbd39cd8e9309bf9fb59058f126927546efc3be383706_prof);

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
