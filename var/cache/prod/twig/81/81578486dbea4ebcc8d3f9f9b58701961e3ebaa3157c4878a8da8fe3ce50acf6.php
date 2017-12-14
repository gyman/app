<?php

/* DashboardBundle:Default:index.html.twig */
class __TwigTemplate_7c4f319b9f5909ccc897bbe649c138cfb9c847ca2fbcf52be6e391debbd5044c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DashboardBundle::layout.html.twig", "DashboardBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body_class' => array($this, 'block_body_class'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DashboardBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body_class($context, array $blocks = array())
    {
        echo "dashboard";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"heading\">

        <h3>Pulpit nawigatora</h3>

    </div><!-- End .heading-->

    <div class=\"form-row row-fluid\">
        <div class=\"span4\">
            ";
        // line 17
        $this->loadTemplate("DashboardBundle:Default:activities.html.twig", "DashboardBundle:Default:index.html.twig", 17)->display($context);
        // line 18
        echo "            ";
        // line 19
        echo "            ";
        // line 20
        echo "        </div>

        <div class=\"span4\">
            ";
        // line 23
        $this->loadTemplate("DashboardBundle:Default:searchUser.html.twig", "DashboardBundle:Default:index.html.twig", 23)->display($context);
        // line 24
        echo "             ";
        // line 25
        echo "
            <div class=\"reminder\">
                <h4>Zadania</h4>

                ";
        // line 29
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("actions", array("template" => ":Menu:dashboard_actions.html.twig", "currentAsLink" => true, "depth" => 2, "currentClass" => "active"));
        // line 34
        echo "
            </div>
        </div>

        <div class=\"span4\">
            ";
        // line 40
        echo "                ";
        // line 41
        echo "                ";
        // line 42
        echo "            ";
        // line 43
        echo "        </div>
    </div>

    ";
        // line 47
        echo "    ";
        // line 48
        echo "    ";
        // line 49
        echo "    ";
        // line 50
        echo "    ";
    }

    public function getTemplateName()
    {
        return "DashboardBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 50,  94 => 49,  92 => 48,  90 => 47,  85 => 43,  83 => 42,  81 => 41,  79 => 40,  72 => 34,  70 => 29,  64 => 25,  62 => 24,  60 => 23,  55 => 20,  53 => 19,  51 => 18,  49 => 17,  38 => 8,  35 => 7,  29 => 5,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "DashboardBundle:Default:index.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/index.html.twig");
    }
}
