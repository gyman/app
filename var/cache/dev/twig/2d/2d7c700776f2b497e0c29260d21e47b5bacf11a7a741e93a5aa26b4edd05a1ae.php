<?php

/* knp_menu_base.html.twig */
class __TwigTemplate_3f9154dda3f44ed656fae53c8d72e96033e5115e675dfc6b3c42d006aa8f7181 extends Twig_Template
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
        $__internal_2866d8f17c7738cb4c118672d004f9efe041ae701d5a835a819980abe4a385c2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2866d8f17c7738cb4c118672d004f9efe041ae701d5a835a819980abe4a385c2->enter($__internal_2866d8f17c7738cb4c118672d004f9efe041ae701d5a835a819980abe4a385c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        $__internal_8374d7ae44bc17bb3f940687613bceb08dde4e6dea598e9025c69a8e2db6662c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8374d7ae44bc17bb3f940687613bceb08dde4e6dea598e9025c69a8e2db6662c->enter($__internal_8374d7ae44bc17bb3f940687613bceb08dde4e6dea598e9025c69a8e2db6662c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        // line 1
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "compressed", array())) {
            $this->displayBlock("compressed_root", $context, $blocks);
        } else {
            $this->displayBlock("root", $context, $blocks);
        }
        
        $__internal_2866d8f17c7738cb4c118672d004f9efe041ae701d5a835a819980abe4a385c2->leave($__internal_2866d8f17c7738cb4c118672d004f9efe041ae701d5a835a819980abe4a385c2_prof);

        
        $__internal_8374d7ae44bc17bb3f940687613bceb08dde4e6dea598e9025c69a8e2db6662c->leave($__internal_8374d7ae44bc17bb3f940687613bceb08dde4e6dea598e9025c69a8e2db6662c_prof);

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
