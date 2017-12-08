<?php

/* GymanAppBundle:Members:Modal/_details.html.twig */
class __TwigTemplate_de21794cd587604e177b290b61fccad17b20217e61afc3fa78c6b7d12ea6c014 extends Twig_Template
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
        $__internal_0b4abad7436bc40ce5aeded62ed976da69e1ee7ecca2718f382bba3d68c5d1d9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0b4abad7436bc40ce5aeded62ed976da69e1ee7ecca2718f382bba3d68c5d1d9->enter($__internal_0b4abad7436bc40ce5aeded62ed976da69e1ee7ecca2718f382bba3d68c5d1d9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_details.html.twig"));

        $__internal_e3e8657244e4abde28dce6e0db015ed73138c064f73a94299702ed4440bb3f02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e3e8657244e4abde28dce6e0db015ed73138c064f73a94299702ed4440bb3f02->enter($__internal_e3e8657244e4abde28dce6e0db015ed73138c064f73a94299702ed4440bb3f02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_details.html.twig"));

        // line 1
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "firstname", array()), 'row');
        echo "
";
        // line 2
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "lastname", array()), 'row');
        echo "
";
        // line 3
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "birthdate", array()), 'row');
        echo "
";
        // line 4
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "gender", array()), 'row');
        echo "
";
        // line 5
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "zipcode", array()), 'row');
        echo "
";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "phone", array()), 'row');
        echo "
";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "email", array()), 'row');
        echo "
";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "starred", array()), 'row');
        echo "
";
        
        $__internal_0b4abad7436bc40ce5aeded62ed976da69e1ee7ecca2718f382bba3d68c5d1d9->leave($__internal_0b4abad7436bc40ce5aeded62ed976da69e1ee7ecca2718f382bba3d68c5d1d9_prof);

        
        $__internal_e3e8657244e4abde28dce6e0db015ed73138c064f73a94299702ed4440bb3f02->leave($__internal_e3e8657244e4abde28dce6e0db015ed73138c064f73a94299702ed4440bb3f02_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Members:Modal/_details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 8,  49 => 7,  45 => 6,  41 => 5,  37 => 4,  33 => 3,  29 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ form_row(form.firstname) }}
{{ form_row(form.lastname) }}
{{ form_row(form.birthdate) }}
{{ form_row(form.gender) }}
{{ form_row(form.zipcode) }}
{{ form_row(form.phone) }}
{{ form_row(form.email) }}
{{ form_row(form.starred) }}
", "GymanAppBundle:Members:Modal/_details.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/Modal/_details.html.twig");
    }
}
