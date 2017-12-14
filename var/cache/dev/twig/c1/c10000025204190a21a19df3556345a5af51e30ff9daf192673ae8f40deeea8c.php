<?php

/* GymanAppBundle:Members:Modal/_details.html.twig */
class __TwigTemplate_9bf7eb99179f1ae6b7bd7405086332c1695610f8dcdbece2c1de811b4cfdebcb extends Twig_Template
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
        $__internal_bc86dad3116c9dddd844cde720472c658d7bd1e791e8e7bfe26aae8faf520ac7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bc86dad3116c9dddd844cde720472c658d7bd1e791e8e7bfe26aae8faf520ac7->enter($__internal_bc86dad3116c9dddd844cde720472c658d7bd1e791e8e7bfe26aae8faf520ac7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_details.html.twig"));

        $__internal_a0c3db5e90d40c66490392c3770aeb628df759bf640db50ea09d4a3d499f0eec = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a0c3db5e90d40c66490392c3770aeb628df759bf640db50ea09d4a3d499f0eec->enter($__internal_a0c3db5e90d40c66490392c3770aeb628df759bf640db50ea09d4a3d499f0eec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_details.html.twig"));

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
        
        $__internal_bc86dad3116c9dddd844cde720472c658d7bd1e791e8e7bfe26aae8faf520ac7->leave($__internal_bc86dad3116c9dddd844cde720472c658d7bd1e791e8e7bfe26aae8faf520ac7_prof);

        
        $__internal_a0c3db5e90d40c66490392c3770aeb628df759bf640db50ea09d4a3d499f0eec->leave($__internal_a0c3db5e90d40c66490392c3770aeb628df759bf640db50ea09d4a3d499f0eec_prof);

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
