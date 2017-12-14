<?php

/* @GymanApp/Members/searchForm.html.twig */
class __TwigTemplate_52dd482d8cc4a5b24ab2954ad66af1e2afe4cb56fb6d015760aa2e15b2baad2c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GymanAppBundle::layout.html.twig", "@GymanApp/Members/searchForm.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GymanAppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_db56c42a567e92df4734b3285302f4c8e67df7f2ad93adc6b24de68a8e0a27dd = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_db56c42a567e92df4734b3285302f4c8e67df7f2ad93adc6b24de68a8e0a27dd->enter($__internal_db56c42a567e92df4734b3285302f4c8e67df7f2ad93adc6b24de68a8e0a27dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/searchForm.html.twig"));

        $__internal_76e3f18104271722bbc2c969f30bb5e456fa7486c60cb50ed89c7e40fb25d9b1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_76e3f18104271722bbc2c969f30bb5e456fa7486c60cb50ed89c7e40fb25d9b1->enter($__internal_76e3f18104271722bbc2c969f30bb5e456fa7486c60cb50ed89c7e40fb25d9b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/searchForm.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_db56c42a567e92df4734b3285302f4c8e67df7f2ad93adc6b24de68a8e0a27dd->leave($__internal_db56c42a567e92df4734b3285302f4c8e67df7f2ad93adc6b24de68a8e0a27dd_prof);

        
        $__internal_76e3f18104271722bbc2c969f30bb5e456fa7486c60cb50ed89c7e40fb25d9b1->leave($__internal_76e3f18104271722bbc2c969f30bb5e456fa7486c60cb50ed89c7e40fb25d9b1_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_ce79a1e9804b0ba63f5a5bb38ac8352c7879fbaba99a7b9e2c09baaa3ad1ed3a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ce79a1e9804b0ba63f5a5bb38ac8352c7879fbaba99a7b9e2c09baaa3ad1ed3a->enter($__internal_ce79a1e9804b0ba63f5a5bb38ac8352c7879fbaba99a7b9e2c09baaa3ad1ed3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_a71f2e6843abea17f027d4b892d43499f4c0a78da12bcecb6fa711d011eba930 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a71f2e6843abea17f027d4b892d43499f4c0a78da12bcecb6fa711d011eba930->enter($__internal_a71f2e6843abea17f027d4b892d43499f4c0a78da12bcecb6fa711d011eba930_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Wyszukiwanie uczestnika";
        
        $__internal_a71f2e6843abea17f027d4b892d43499f4c0a78da12bcecb6fa711d011eba930->leave($__internal_a71f2e6843abea17f027d4b892d43499f4c0a78da12bcecb6fa711d011eba930_prof);

        
        $__internal_ce79a1e9804b0ba63f5a5bb38ac8352c7879fbaba99a7b9e2c09baaa3ad1ed3a->leave($__internal_ce79a1e9804b0ba63f5a5bb38ac8352c7879fbaba99a7b9e2c09baaa3ad1ed3a_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_e88abc1d62d5c4eb25f03a6d4709f9133be1ad6a3488988ae48727e88b3d4bbc = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e88abc1d62d5c4eb25f03a6d4709f9133be1ad6a3488988ae48727e88b3d4bbc->enter($__internal_e88abc1d62d5c4eb25f03a6d4709f9133be1ad6a3488988ae48727e88b3d4bbc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_cfd385edc3d21211de1e9eb1c7f14f704e32e0e435c2e8f8e4730702eee88551 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cfd385edc3d21211de1e9eb1c7f14f704e32e0e435c2e8f8e4730702eee88551->enter($__internal_cfd385edc3d21211de1e9eb1c7f14f704e32e0e435c2e8f8e4730702eee88551_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "    <div class=\"heading\">
        <h3>Wyszukiwanie uczestnika</h3>
    </div>

    <div class=\"container\">
        ";
        // line 11
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "

        <div class=\"row-fluid\">
            <div class=\"span12\">
                ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "query", array()), 'row');
        echo "
            </div>
        </div>

        <div class=\"row-fluid\">
            <div class=\"span4\">
                ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "section", array()), 'row');
        echo "
            </div>
            <div class=\"span4\">
                ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "belt", array()), 'row');
        echo "
            </div>
            <div class=\"span4\">
                ";
        // line 27
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "hasVoucher", array()), 'row');
        echo "
                ";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "hasOpenedEntry", array()), 'row');
        echo "
                ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "starred", array()), 'row');
        echo "
            </div>
        </div>

        <div class=\"\">
            <button class=\"btn btn-large btn-success\">";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("member_search_form.submit"), "html", null, true);
        echo "</button>
        </div>

        ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        echo "
        ";
        // line 38
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
    </div>
";
        
        $__internal_cfd385edc3d21211de1e9eb1c7f14f704e32e0e435c2e8f8e4730702eee88551->leave($__internal_cfd385edc3d21211de1e9eb1c7f14f704e32e0e435c2e8f8e4730702eee88551_prof);

        
        $__internal_e88abc1d62d5c4eb25f03a6d4709f9133be1ad6a3488988ae48727e88b3d4bbc->leave($__internal_e88abc1d62d5c4eb25f03a6d4709f9133be1ad6a3488988ae48727e88b3d4bbc_prof);

    }

    public function getTemplateName()
    {
        return "@GymanApp/Members/searchForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 38,  125 => 37,  119 => 34,  111 => 29,  107 => 28,  103 => 27,  97 => 24,  91 => 21,  82 => 15,  75 => 11,  68 => 6,  59 => 5,  41 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'GymanAppBundle::layout.html.twig' %}

{% block title %}Wyszukiwanie uczestnika{% endblock %}

{% block content %}
    <div class=\"heading\">
        <h3>Wyszukiwanie uczestnika</h3>
    </div>

    <div class=\"container\">
        {{ form_start(form) }}

        <div class=\"row-fluid\">
            <div class=\"span12\">
                {{ form_row(form.query) }}
            </div>
        </div>

        <div class=\"row-fluid\">
            <div class=\"span4\">
                {{ form_row(form.section) }}
            </div>
            <div class=\"span4\">
                {{ form_row(form.belt) }}
            </div>
            <div class=\"span4\">
                {{ form_row(form.hasVoucher) }}
                {{ form_row(form.hasOpenedEntry) }}
                {{ form_row(form.starred) }}
            </div>
        </div>

        <div class=\"\">
            <button class=\"btn btn-large btn-success\">{{ 'member_search_form.submit'|trans }}</button>
        </div>

        {{ form_rest(form) }}
        {{ form_end(form) }}
    </div>
{% endblock %}
", "@GymanApp/Members/searchForm.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/searchForm.html.twig");
    }
}
