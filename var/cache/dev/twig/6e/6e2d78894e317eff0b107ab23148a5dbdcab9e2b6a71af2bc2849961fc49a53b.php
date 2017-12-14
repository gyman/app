<?php

/* knp_menu_base.html.twig */
class __TwigTemplate_22a3d9224a262ab5384b802ca329b53fac6b41e6a12da08604ce8f672c918f98 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_30dd482ed38b7f3ebe8553e3693f57410573952af53420558b423a41203c4397 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_30dd482ed38b7f3ebe8553e3693f57410573952af53420558b423a41203c4397->enter($__internal_30dd482ed38b7f3ebe8553e3693f57410573952af53420558b423a41203c4397_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        $__internal_452aacf75a111f0e589ea04d9deef5ff63e81c9847e557030a77a905adf6831b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_452aacf75a111f0e589ea04d9deef5ff63e81c9847e557030a77a905adf6831b->enter($__internal_452aacf75a111f0e589ea04d9deef5ff63e81c9847e557030a77a905adf6831b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        // line 1
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "compressed", array())) {
            $this->displayBlock("compressed_root", $context, $blocks);
        } else {
            $this->displayBlock("root", $context, $blocks);
        }
        
        $__internal_30dd482ed38b7f3ebe8553e3693f57410573952af53420558b423a41203c4397->leave($__internal_30dd482ed38b7f3ebe8553e3693f57410573952af53420558b423a41203c4397_prof);

        
        $__internal_452aacf75a111f0e589ea04d9deef5ff63e81c9847e557030a77a905adf6831b->leave($__internal_452aacf75a111f0e589ea04d9deef5ff63e81c9847e557030a77a905adf6831b_prof);

    }

    public function getTemplateName()
    {
        return "knp_menu_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if options.compressed %}{{ block('compressed_root') }}{% else %}{{ block('root') }}{% endif %}
", "knp_menu_base.html.twig", "/vagrant/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views/knp_menu_base.html.twig");
    }
}
