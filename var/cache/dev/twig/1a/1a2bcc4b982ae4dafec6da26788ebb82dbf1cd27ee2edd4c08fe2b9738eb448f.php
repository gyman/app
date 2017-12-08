<?php

/* navigation.html.twig */
class __TwigTemplate_a6e4c96ada0b53d009917414f97a194bc4cbacec702964fd3d822acdaad7c254 extends Twig_Template
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
        $__internal_11d4b0850bd604bb9d59326afa382327a17d16b1b8853e2614f6746bd94b830f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_11d4b0850bd604bb9d59326afa382327a17d16b1b8853e2614f6746bd94b830f->enter($__internal_11d4b0850bd604bb9d59326afa382327a17d16b1b8853e2614f6746bd94b830f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "navigation.html.twig"));

        $__internal_eaa5a1b2dc12a5ce6f912992b74a65e3f93fbf5471a220ada8535db9840e34cb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_eaa5a1b2dc12a5ce6f912992b74a65e3f93fbf5471a220ada8535db9840e34cb->enter($__internal_eaa5a1b2dc12a5ce6f912992b74a65e3f93fbf5471a220ada8535db9840e34cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "navigation.html.twig"));

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
        
        $__internal_11d4b0850bd604bb9d59326afa382327a17d16b1b8853e2614f6746bd94b830f->leave($__internal_11d4b0850bd604bb9d59326afa382327a17d16b1b8853e2614f6746bd94b830f_prof);

        
        $__internal_eaa5a1b2dc12a5ce6f912992b74a65e3f93fbf5471a220ada8535db9840e34cb->leave($__internal_eaa5a1b2dc12a5ce6f912992b74a65e3f93fbf5471a220ada8535db9840e34cb_prof);

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
        return array (  75 => 33,  73 => 30,  68 => 28,  61 => 23,  59 => 18,  52 => 14,  48 => 13,  43 => 11,  35 => 6,  28 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"overlayNavigation\" style=\"display: none;\" class=\"container-fluid\">
    <a href=\"#\" id=\"closeOverlayNavigation\">{{ 'navigation.close'|trans }}</a>
    <div id=\"toolbox\">

        <div class=\"page-header\">
            <h4>{{ 'navigation.logged_in_as'|trans }}</h4>
        </div>
        <div id=\"loggedAs\" class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div class=\"span6\">
                    <img src=\"{{ app.user.getFoto() }}\" class=\"img-circle\">
                    <h3>
                        {{ app.user.getFullname() }}
                        <small>({{ ('roles.' ~ app.user.roles[0])|trans }})</small>
                    </h3>
                </div>
                <div class=\"span6\">
                    {{ knp_menu_render('profile', {
                        'template': ':Menu:profile.html.twig',
                        'currentAsLink' : true,
                        'depth' : 2,
                        'currentClass' : 'active'
                    }) }}
                </div>
            </div>
        </div>
        <div class=\"page-header\">
            <h4>{{ 'navigation.menu' }}:</h4>
        </div>
        {{ knp_menu_render('main', {
            'currentAsLink' : true,
            'template': ':Menu:main.html.twig',
        }) }}
    </div>
</div>
", "navigation.html.twig", "/vagrant/app/Resources/views/navigation.html.twig");
    }
}
