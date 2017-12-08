<?php

/* GymanAppBundle:Members:Modal/_picture.html.twig */
class __TwigTemplate_f1928db4920899759af30e34e2e19ad512e7745a42ef70295579259ce26b67ca extends Twig_Template
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
        $__internal_4339aa903b2220421967dba204285fe3aa54e7ea263c2929306e155c6afc7c21 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4339aa903b2220421967dba204285fe3aa54e7ea263c2929306e155c6afc7c21->enter($__internal_4339aa903b2220421967dba204285fe3aa54e7ea263c2929306e155c6afc7c21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_picture.html.twig"));

        $__internal_ff168373ee190dfb64b2546d1b320992d12310b2f95d426c1cd6e8bb8febadcd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ff168373ee190dfb64b2546d1b320992d12310b2f95d426c1cd6e8bb8febadcd->enter($__internal_ff168373ee190dfb64b2546d1b320992d12310b2f95d426c1cd6e8bb8febadcd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_picture.html.twig"));

        // line 1
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("gyman.members.menu.tabs_picture", array("template" => "GymanAppBundle:Members:Menu/picture.html.twig", "currentAsLink" => true, "depth" => 1, "currentClass" => "active"));
        // line 6
        echo "

<div class=\"tab-content\">
    <div id=\"filePane\" class=\"tab-pane fade in active\">
        <img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl(($context["member"] ?? null)), "html", null, true);
        echo "\" class=\"thumbnail\" id=\"memberFoto\"/>

        ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "uploadFile", array()), 'widget');
        echo "

        <div class=\"control-group error\">
            <div class=\"help-block\">
                ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "uploadFile", array()), 'errors');
        echo "
            </div>
        </div>
    </div>
    <div class=\"tab-pane fade in\" id=\"webcamDiv\">
        <div id=\"camera\" data-upload-url=\"\" style=\"width: 240px; height: 300px\"></div>
    </div>
</div>";
        
        $__internal_4339aa903b2220421967dba204285fe3aa54e7ea263c2929306e155c6afc7c21->leave($__internal_4339aa903b2220421967dba204285fe3aa54e7ea263c2929306e155c6afc7c21_prof);

        
        $__internal_ff168373ee190dfb64b2546d1b320992d12310b2f95d426c1cd6e8bb8febadcd->leave($__internal_ff168373ee190dfb64b2546d1b320992d12310b2f95d426c1cd6e8bb8febadcd_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle:Members:Modal/_picture.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 16,  38 => 12,  33 => 10,  27 => 6,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ knp_menu_render('gyman.members.menu.tabs_picture', {
    'template': 'GymanAppBundle:Members:Menu/picture.html.twig',
    'currentAsLink' : true,
    'depth' : 1,
    'currentClass' : 'active'
}) }}

<div class=\"tab-content\">
    <div id=\"filePane\" class=\"tab-pane fade in active\">
        <img src=\"{{ avatar(member) }}\" class=\"thumbnail\" id=\"memberFoto\"/>

        {{ form_widget(form.uploadFile) }}

        <div class=\"control-group error\">
            <div class=\"help-block\">
                {{ form_errors(form.uploadFile) }}
            </div>
        </div>
    </div>
    <div class=\"tab-pane fade in\" id=\"webcamDiv\">
        <div id=\"camera\" data-upload-url=\"\" style=\"width: 240px; height: 300px\"></div>
    </div>
</div>", "GymanAppBundle:Members:Modal/_picture.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Members/Modal/_picture.html.twig");
    }
}
