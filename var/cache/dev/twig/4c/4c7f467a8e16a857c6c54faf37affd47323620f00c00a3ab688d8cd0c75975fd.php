<?php

/* GymanAppBundle:Members:Modal/_additional.html.twig */
class __TwigTemplate_e4eb42f33f7dddf006c20980e1f5bd4f4cc040cd65c8e73a28ae966e51e02622 extends Twig_Template
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
        $__internal_c76c2e06b392aa444a0fd1d928bebe89f0697ed5236140b42f1c519ff48b4498 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c76c2e06b392aa444a0fd1d928bebe89f0697ed5236140b42f1c519ff48b4498->enter($__internal_c76c2e06b392aa444a0fd1d928bebe89f0697ed5236140b42f1c519ff48b4498_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_additional.html.twig"));

        $__internal_34ca6053e2bd46b32a7d9451e1de0b66b8ee6bc0e974ca0d996d99cfb71f1c73 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_34ca6053e2bd46b32a7d9451e1de0b66b8ee6bc0e974ca0d996d99cfb71f1c73->enter($__internal_34ca6053e2bd46b32a7d9451e1de0b66b8ee6bc0e974ca0d996d99cfb71f1c73_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_additional.html.twig"));

        // line 1
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "barcode", array()), 'row');
        echo "
";
        // line 2
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "belt", array()), 'row');
        echo "
";
        // line 3
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "notes", array()), 'row');
        echo "
";
        // line 4
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "sections", array()), 'row');
        
        $__internal_c76c2e06b392aa444a0fd1d928bebe89f0697ed5236140b42f1c519ff48b4498->leave($__internal_c76c2e06b392aa444a0fd1d928bebe89f0697ed5236140b42f1c519ff48b4498_prof);

        
        $__internal_34ca6053e2bd46b32a7d9451e1de0b66b8ee6bc0e974ca0d996d99cfb71f1c73->leave($__internal_34ca6053e2bd46b32a7d9451e1de0b66b8ee6bc0e974ca0d996d99cfb71f1c73_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Members:Modal/_additional.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 4,  33 => 3,  29 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ form_row(form.barcode) }}
{{ form_row(form.belt) }}
{{ form_row(form.notes) }}
{{ form_row(form.sections) }}", "GymanAppBundle:Members:Modal/_additional.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/Modal/_additional.html.twig");
    }
}
