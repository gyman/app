<?php

/* GymanAppBundle:Entries:createNewEntry.html.twig */
class __TwigTemplate_7f35c12cc59e470e73eedcd5dfbea40df13ad781e05b70b66a03aef70cab62d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "GymanAppBundle:Entries:createNewEntry.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ef94502c3e9337a4e9331cef97a631a5e140bb5f0c6c3741afb6a53f3d5e3795 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ef94502c3e9337a4e9331cef97a631a5e140bb5f0c6c3741afb6a53f3d5e3795->enter($__internal_ef94502c3e9337a4e9331cef97a631a5e140bb5f0c6c3741afb6a53f3d5e3795_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Entries:createNewEntry.html.twig"));

        $__internal_08febb193633b79f57e2c2a06416618c6bc1e6063f0a944354fb90e5ae0972d5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_08febb193633b79f57e2c2a06416618c6bc1e6063f0a944354fb90e5ae0972d5->enter($__internal_08febb193633b79f57e2c2a06416618c6bc1e6063f0a944354fb90e5ae0972d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Entries:createNewEntry.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ef94502c3e9337a4e9331cef97a631a5e140bb5f0c6c3741afb6a53f3d5e3795->leave($__internal_ef94502c3e9337a4e9331cef97a631a5e140bb5f0c6c3741afb6a53f3d5e3795_prof);

        
        $__internal_08febb193633b79f57e2c2a06416618c6bc1e6063f0a944354fb90e5ae0972d5->leave($__internal_08febb193633b79f57e2c2a06416618c6bc1e6063f0a944354fb90e5ae0972d5_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_53153e8d15721cc0194f7bcb4bb1b220a42e1ff559e87ebd2c2116ebc9490390 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_53153e8d15721cc0194f7bcb4bb1b220a42e1ff559e87ebd2c2116ebc9490390->enter($__internal_53153e8d15721cc0194f7bcb4bb1b220a42e1ff559e87ebd2c2116ebc9490390_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_c92022532ed4d958d93eb8d88aeefd56d0be74c45aac21613ee60d1bd826c8ef = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c92022532ed4d958d93eb8d88aeefd56d0be74c45aac21613ee60d1bd826c8ef->enter($__internal_c92022532ed4d958d93eb8d88aeefd56d0be74c45aac21613ee60d1bd826c8ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel='stylesheet' href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dendecalendar/css/bootstrap-datetimepicker.min.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_c92022532ed4d958d93eb8d88aeefd56d0be74c45aac21613ee60d1bd826c8ef->leave($__internal_c92022532ed4d958d93eb8d88aeefd56d0be74c45aac21613ee60d1bd826c8ef_prof);

        
        $__internal_53153e8d15721cc0194f7bcb4bb1b220a42e1ff559e87ebd2c2116ebc9490390->leave($__internal_53153e8d15721cc0194f7bcb4bb1b220a42e1ff559e87ebd2c2116ebc9490390_prof);

    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        $__internal_4688c22879bee01fdd1d4e633e9265e706dac8773298632bb18aafd08349742c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4688c22879bee01fdd1d4e633e9265e706dac8773298632bb18aafd08349742c->enter($__internal_4688c22879bee01fdd1d4e633e9265e706dac8773298632bb18aafd08349742c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_70ecbd0bee69dd1c034528837e73da51e2c3c69ee637aa899a2fe087b9d60463 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_70ecbd0bee69dd1c034528837e73da51e2c3c69ee637aa899a2fe087b9d60463->enter($__internal_70ecbd0bee69dd1c034528837e73da51e2c3c69ee637aa899a2fe087b9d60463_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 9
        echo "    <div class=\"contentwrapper\">

        <div class=\"heading\">

            <h3>Otwórz wejście</h3>

        </div>

        <div class=\"span12\">
            ";
        // line 18
        $this->loadTemplate("::_flash.html.twig", "GymanAppBundle:Entries:createNewEntry.html.twig", 18)->display($context);
        // line 19
        echo "            ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
            ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "entryType", array()), 'row');
        echo "
            ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "price", array()), 'row');
        echo "
            ";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        echo "
            ";
        // line 23
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
        </div>

    </div>

";
        
        $__internal_70ecbd0bee69dd1c034528837e73da51e2c3c69ee637aa899a2fe087b9d60463->leave($__internal_70ecbd0bee69dd1c034528837e73da51e2c3c69ee637aa899a2fe087b9d60463_prof);

        
        $__internal_4688c22879bee01fdd1d4e633e9265e706dac8773298632bb18aafd08349742c->leave($__internal_4688c22879bee01fdd1d4e633e9265e706dac8773298632bb18aafd08349742c_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Entries:createNewEntry.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 23,  102 => 22,  98 => 21,  94 => 20,  89 => 19,  87 => 18,  76 => 9,  67 => 8,  55 => 5,  50 => 4,  41 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"::base.html.twig\" %}

{% block stylesheets %}
    {{ parent() }}
    <link rel='stylesheet' href=\"{{ asset('bundles/dendecalendar/css/bootstrap-datetimepicker.min.css') }}\" />
{% endblock stylesheets %}

{% block content %}
    <div class=\"contentwrapper\">

        <div class=\"heading\">

            <h3>Otwórz wejście</h3>

        </div>

        <div class=\"span12\">
            {% include \"::_flash.html.twig\" %}
            {{ form_start(form) }}
            {{ form_row(form.entryType) }}
            {{ form_row(form.price) }}
            {{ form_rest(form) }}
            {{ form_end(form) }}
        </div>

    </div>

{% endblock %}
", "GymanAppBundle:Entries:createNewEntry.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Entries/createNewEntry.html.twig");
    }
}
