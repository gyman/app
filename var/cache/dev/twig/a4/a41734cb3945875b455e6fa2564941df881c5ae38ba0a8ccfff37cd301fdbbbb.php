<?php

/* knp_menu_base.html.twig */
class __TwigTemplate_5657876699da4306bae7398ee9a35d5765c269702ae0095c4f1d52b7c164fe94 extends Twig_Template
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
        $__internal_c2306f8d01db6bd6f4ee224a6d9a72be39f12ae8d051a92d9c5b73083db536a8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c2306f8d01db6bd6f4ee224a6d9a72be39f12ae8d051a92d9c5b73083db536a8->enter($__internal_c2306f8d01db6bd6f4ee224a6d9a72be39f12ae8d051a92d9c5b73083db536a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        $__internal_d158275bbb12c415250c5c30a716fa8a297f83d02d2c5acfd94871c975608c1b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d158275bbb12c415250c5c30a716fa8a297f83d02d2c5acfd94871c975608c1b->enter($__internal_d158275bbb12c415250c5c30a716fa8a297f83d02d2c5acfd94871c975608c1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        // line 1
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "compressed", array())) {
            $this->displayBlock("compressed_root", $context, $blocks);
        } else {
            $this->displayBlock("root", $context, $blocks);
        }
        
        $__internal_c2306f8d01db6bd6f4ee224a6d9a72be39f12ae8d051a92d9c5b73083db536a8->leave($__internal_c2306f8d01db6bd6f4ee224a6d9a72be39f12ae8d051a92d9c5b73083db536a8_prof);

        
        $__internal_d158275bbb12c415250c5c30a716fa8a297f83d02d2c5acfd94871c975608c1b->leave($__internal_d158275bbb12c415250c5c30a716fa8a297f83d02d2c5acfd94871c975608c1b_prof);

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
