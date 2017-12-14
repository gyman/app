<?php

/* GymanAppBundle:Members:Modal/_picture.html.twig */
class __TwigTemplate_f71d998f44181c122e03f52bfb51e4f92e847e9583a714f81d06027cae896e28 extends Twig_Template
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
        $__internal_000c21e48624b77e23656e4cb738275bfddb7a509fd6140e76a4f5f73c9ef35e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_000c21e48624b77e23656e4cb738275bfddb7a509fd6140e76a4f5f73c9ef35e->enter($__internal_000c21e48624b77e23656e4cb738275bfddb7a509fd6140e76a4f5f73c9ef35e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_picture.html.twig"));

        $__internal_9491e35872d4a89fcb674927662d1e26049ac6288a2db53c0b3dcaa634e55f23 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9491e35872d4a89fcb674927662d1e26049ac6288a2db53c0b3dcaa634e55f23->enter($__internal_9491e35872d4a89fcb674927662d1e26049ac6288a2db53c0b3dcaa634e55f23_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle:Members:Modal/_picture.html.twig"));

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
        
        $__internal_000c21e48624b77e23656e4cb738275bfddb7a509fd6140e76a4f5f73c9ef35e->leave($__internal_000c21e48624b77e23656e4cb738275bfddb7a509fd6140e76a4f5f73c9ef35e_prof);

        
        $__internal_9491e35872d4a89fcb674927662d1e26049ac6288a2db53c0b3dcaa634e55f23->leave($__internal_9491e35872d4a89fcb674927662d1e26049ac6288a2db53c0b3dcaa634e55f23_prof);

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
