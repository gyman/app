<?php

/* :Menu:main.html.twig */
class __TwigTemplate_953fc6af24e56fc2b68556c89a7946b47ac706eb64af74c621cdceca37304b91 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", ":Menu:main.html.twig", 1);
        $this->blocks = array(
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_423888ad25f29e78ba2bb1e4f34cd749d17b9c2c1b99e5eaa81419c1ccfd4c41 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_423888ad25f29e78ba2bb1e4f34cd749d17b9c2c1b99e5eaa81419c1ccfd4c41->enter($__internal_423888ad25f29e78ba2bb1e4f34cd749d17b9c2c1b99e5eaa81419c1ccfd4c41_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:main.html.twig"));

        $__internal_a548b1d5fe0099726288fcc1ba2d049a647e0c16a39798e99b5be590556af7ba = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a548b1d5fe0099726288fcc1ba2d049a647e0c16a39798e99b5be590556af7ba->enter($__internal_a548b1d5fe0099726288fcc1ba2d049a647e0c16a39798e99b5be590556af7ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", ":Menu:main.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_423888ad25f29e78ba2bb1e4f34cd749d17b9c2c1b99e5eaa81419c1ccfd4c41->leave($__internal_423888ad25f29e78ba2bb1e4f34cd749d17b9c2c1b99e5eaa81419c1ccfd4c41_prof);

        
        $__internal_a548b1d5fe0099726288fcc1ba2d049a647e0c16a39798e99b5be590556af7ba->leave($__internal_a548b1d5fe0099726288fcc1ba2d049a647e0c16a39798e99b5be590556af7ba_prof);

    }

    // line 3
    public function block_label($context, array $blocks = array())
    {
        $__internal_e9b219db0be0c40cadf8e8f6539afcea0f1ceb5885492ddad4d8448e3a35ee07 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e9b219db0be0c40cadf8e8f6539afcea0f1ceb5885492ddad4d8448e3a35ee07->enter($__internal_e9b219db0be0c40cadf8e8f6539afcea0f1ceb5885492ddad4d8448e3a35ee07_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_6c585e90c8af584e3159cd94c554e6fa1194b149f0001e4e4828065a6883d680 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6c585e90c8af584e3159cd94c554e6fa1194b149f0001e4e4828065a6883d680->enter($__internal_6c585e90c8af584e3159cd94c554e6fa1194b149f0001e4e4828065a6883d680_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        // line 4
        echo "    <span class=\"icon ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "extras", array()), "icon", array()), "html", null, true);
        echo "\"></span>
    <span class=\"txt\">";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array())), "html", null, true);
        echo "</span>
";
        
        $__internal_6c585e90c8af584e3159cd94c554e6fa1194b149f0001e4e4828065a6883d680->leave($__internal_6c585e90c8af584e3159cd94c554e6fa1194b149f0001e4e4828065a6883d680_prof);

        
        $__internal_e9b219db0be0c40cadf8e8f6539afcea0f1ceb5885492ddad4d8448e3a35ee07->leave($__internal_e9b219db0be0c40cadf8e8f6539afcea0f1ceb5885492ddad4d8448e3a35ee07_prof);

    }

    public function getTemplateName()
    {
        return ":Menu:main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'knp_menu.html.twig' %}

{% block label %}
    <span class=\"icon {{ item.extras.icon }}\"></span>
    <span class=\"txt\">{{ item.label|trans }}</span>
{% endblock %}", ":Menu:main.html.twig", "/vagrant/app/Resources/views/Menu/main.html.twig");
    }
}
