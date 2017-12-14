<?php

/* GymanAppBundle:Members:Modal/_additional.html.twig */
class __TwigTemplate_29292c5b8154b0351974f325703fdbc55c33f9afc8e61defb952751ffaf81578 extends Twig_Template
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
        $__internal_abbdc2ea77f209b0e5cfcb188f68182ba9a30df0491d340a15216909e2b16907 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_abbdc2ea77f209b0e5cfcb188f68182ba9a30df0491d340a15216909e2b16907->enter($__internal_abbdc2ea77f209b0e5cfcb188f68182ba9a30df0491d340a15216909e2b16907_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_additional.html.twig"));

        $__internal_0ae6826421c4fd4f75e4b98df93cac6b0430cc8fb4a9997ac41023bcffa6d1d6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0ae6826421c4fd4f75e4b98df93cac6b0430cc8fb4a9997ac41023bcffa6d1d6->enter($__internal_0ae6826421c4fd4f75e4b98df93cac6b0430cc8fb4a9997ac41023bcffa6d1d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_additional.html.twig"));

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
        
        $__internal_abbdc2ea77f209b0e5cfcb188f68182ba9a30df0491d340a15216909e2b16907->leave($__internal_abbdc2ea77f209b0e5cfcb188f68182ba9a30df0491d340a15216909e2b16907_prof);

        
        $__internal_0ae6826421c4fd4f75e4b98df93cac6b0430cc8fb4a9997ac41023bcffa6d1d6->leave($__internal_0ae6826421c4fd4f75e4b98df93cac6b0430cc8fb4a9997ac41023bcffa6d1d6_prof);

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
