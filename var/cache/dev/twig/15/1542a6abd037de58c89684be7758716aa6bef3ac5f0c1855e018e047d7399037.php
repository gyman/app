<?php

/* @GymanApp/Members/searchForm.html.twig */
class __TwigTemplate_00f31939e64ade90066404b70a959d4d6b13fff727d124a1a043989d67abb6a2 extends Twig_Template
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
        $__internal_9949db4df36ac64969b885598c75bd067dab746ff24e586622fa714a7cacc86f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9949db4df36ac64969b885598c75bd067dab746ff24e586622fa714a7cacc86f->enter($__internal_9949db4df36ac64969b885598c75bd067dab746ff24e586622fa714a7cacc86f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/searchForm.html.twig"));

        $__internal_c6a11cedec8a456514dad72a7c517e4063e1af5250257ecbb6e77820d305b5af = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c6a11cedec8a456514dad72a7c517e4063e1af5250257ecbb6e77820d305b5af->enter($__internal_c6a11cedec8a456514dad72a7c517e4063e1af5250257ecbb6e77820d305b5af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Members/searchForm.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9949db4df36ac64969b885598c75bd067dab746ff24e586622fa714a7cacc86f->leave($__internal_9949db4df36ac64969b885598c75bd067dab746ff24e586622fa714a7cacc86f_prof);

        
        $__internal_c6a11cedec8a456514dad72a7c517e4063e1af5250257ecbb6e77820d305b5af->leave($__internal_c6a11cedec8a456514dad72a7c517e4063e1af5250257ecbb6e77820d305b5af_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_a5e34b6d5edb5b460e81387769500175fc9c687221d22a3dcc3393ae914c5714 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a5e34b6d5edb5b460e81387769500175fc9c687221d22a3dcc3393ae914c5714->enter($__internal_a5e34b6d5edb5b460e81387769500175fc9c687221d22a3dcc3393ae914c5714_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_b4af14b621c5ea2399909518d76e0dfee2603942a716ed961ae8df0be51a3266 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b4af14b621c5ea2399909518d76e0dfee2603942a716ed961ae8df0be51a3266->enter($__internal_b4af14b621c5ea2399909518d76e0dfee2603942a716ed961ae8df0be51a3266_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Wyszukiwanie uczestnika";
        
        $__internal_b4af14b621c5ea2399909518d76e0dfee2603942a716ed961ae8df0be51a3266->leave($__internal_b4af14b621c5ea2399909518d76e0dfee2603942a716ed961ae8df0be51a3266_prof);

        
        $__internal_a5e34b6d5edb5b460e81387769500175fc9c687221d22a3dcc3393ae914c5714->leave($__internal_a5e34b6d5edb5b460e81387769500175fc9c687221d22a3dcc3393ae914c5714_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_7aa8861c0bdbacb37cfd5c52da705886182bcf1156446edd8cd86553967d143e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7aa8861c0bdbacb37cfd5c52da705886182bcf1156446edd8cd86553967d143e->enter($__internal_7aa8861c0bdbacb37cfd5c52da705886182bcf1156446edd8cd86553967d143e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_230a575b8280a9dd14bde262556abb3f48fbc4d9659b9922d268e59a307b1c88 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_230a575b8280a9dd14bde262556abb3f48fbc4d9659b9922d268e59a307b1c88->enter($__internal_230a575b8280a9dd14bde262556abb3f48fbc4d9659b9922d268e59a307b1c88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
        
        $__internal_230a575b8280a9dd14bde262556abb3f48fbc4d9659b9922d268e59a307b1c88->leave($__internal_230a575b8280a9dd14bde262556abb3f48fbc4d9659b9922d268e59a307b1c88_prof);

        
        $__internal_7aa8861c0bdbacb37cfd5c52da705886182bcf1156446edd8cd86553967d143e->leave($__internal_7aa8861c0bdbacb37cfd5c52da705886182bcf1156446edd8cd86553967d143e_prof);

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
