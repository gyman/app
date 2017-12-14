<?php

/* navigation.html.twig */
class __TwigTemplate_19e46da80bbb5c32b17f136165a9913120a94830b9c9b93c673a153226e05a84 extends Twig_Template
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
        // line 1
        echo "<div id=\"overlayNavigation\" style=\"display: none;\" class=\"container-fluid\">
    <a href=\"#\" id=\"closeOverlayNavigation\">";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("navigation.close"), "html", null, true);
        echo "</a>
    <div id=\"toolbox\">

        <div class=\"page-header\">
            <h4>";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("navigation.logged_in_as"), "html", null, true);
        echo "</h4>
        </div>
        <div id=\"loggedAs\" class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div class=\"span6\">
                    <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()), "getFoto", array(), "method"), "html", null, true);
        echo "\" class=\"img-circle\">
                    <h3>
                        ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()), "getFullname", array(), "method"), "html", null, true);
        echo "
                        <small>(";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(("roles." . twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()), "roles", array()), 0, array(), "array"))), "html", null, true);
        echo ")</small>
                    </h3>
                </div>
                <div class=\"span6\">
                    ";
        // line 18
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("profile", array("template" => ":Menu:profile.html.twig", "currentAsLink" => true, "depth" => 2, "currentClass" => "active"));
        // line 23
        echo "
                </div>
            </div>
        </div>
        <div class=\"page-header\">
            <h4>";
        // line 28
        echo "navigation.menu";
        echo ":</h4>
        </div>
        ";
        // line 30
        echo $this->env->getExtension('Knp\Menu\Twig\MenuExtension')->render("main", array("currentAsLink" => true, "template" => ":Menu:main.html.twig"));
        // line 33
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 33,  67 => 30,  62 => 28,  55 => 23,  53 => 18,  46 => 14,  42 => 13,  37 => 11,  29 => 6,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "navigation.html.twig", "/vagrant/app/Resources/views/navigation.html.twig");
    }
}
