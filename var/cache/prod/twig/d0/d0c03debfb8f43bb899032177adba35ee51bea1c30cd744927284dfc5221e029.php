<?php

/* DashboardBundle:Default:searchUser.html.twig */
class __TwigTemplate_47716d8afe744fa3a5c66352eee1820ecdd35075b0084d5a89fbf0c9035e68e9 extends Twig_Template
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
        echo "<div class=\"reminder\" id=\"searchTab\">
    <h4>Szukaj uczestnika</h4>


    ";
        // line 5
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["searchForm"] ?? null), 'form_start', array("attr" => array("class" => "input-append", "id" => "membersSearchAutocompleteForm")));
        echo "
        ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->getSourceContext(), ($context["searchForm"] ?? null), "query", array()), 'widget', array("attr" => array("placeholder" => "imię/nazwisko uczestnika lub kod", "autocomplete" => "off")));
        echo "
        <button id=\"clickToOpenFoundUser\" class=\"add-on btn-warning btn-large\">
            <i class=\"icon16 icomoon-icon-search-2\"></i>Pokaż
        </button>
    </form>

    <a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_members_search_form");
        echo "\">Zaawansowane</a>
</div>

";
    }

    public function getTemplateName()
    {
        return "DashboardBundle:Default:searchUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 12,  29 => 6,  25 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "DashboardBundle:Default:searchUser.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/searchUser.html.twig");
    }
}
