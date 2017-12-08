<?php

/* DashboardBundle:Default:searchUser.html.twig */
class __TwigTemplate_ed7995af06cf01c6346f9fefe0a01beb56f41f6df2c2710d7cfc55dff95898e9 extends Twig_Template
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
        $__internal_5fb2c5ad53a61cd0584bb7355135396a58e6d0d12380a19053b09f8fa56274f9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5fb2c5ad53a61cd0584bb7355135396a58e6d0d12380a19053b09f8fa56274f9->enter($__internal_5fb2c5ad53a61cd0584bb7355135396a58e6d0d12380a19053b09f8fa56274f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:searchUser.html.twig"));

        $__internal_de309ac2e72375309baf5c709b5fee77b9bf6e9851866237705c27bf07674cbf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de309ac2e72375309baf5c709b5fee77b9bf6e9851866237705c27bf07674cbf->enter($__internal_de309ac2e72375309baf5c709b5fee77b9bf6e9851866237705c27bf07674cbf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:searchUser.html.twig"));

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
        
        $__internal_5fb2c5ad53a61cd0584bb7355135396a58e6d0d12380a19053b09f8fa56274f9->leave($__internal_5fb2c5ad53a61cd0584bb7355135396a58e6d0d12380a19053b09f8fa56274f9_prof);

        
        $__internal_de309ac2e72375309baf5c709b5fee77b9bf6e9851866237705c27bf07674cbf->leave($__internal_de309ac2e72375309baf5c709b5fee77b9bf6e9851866237705c27bf07674cbf_prof);

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
        return array (  44 => 12,  35 => 6,  31 => 5,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"reminder\" id=\"searchTab\">
    <h4>Szukaj uczestnika</h4>


    {{ form_start(searchForm, {attr: {class: \"input-append\", id: \"membersSearchAutocompleteForm\"}}) }}
        {{ form_widget(searchForm.query, {attr: {placeholder: \"imię/nazwisko uczestnika lub kod\", autocomplete: \"off\"}}) }}
        <button id=\"clickToOpenFoundUser\" class=\"add-on btn-warning btn-large\">
            <i class=\"icon16 icomoon-icon-search-2\"></i>Pokaż
        </button>
    </form>

    <a href=\"{{ path(\"gyman_members_search_form\") }}\">Zaawansowane</a>
</div>

{# @todo: translacje! #}
", "DashboardBundle:Default:searchUser.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/searchUser.html.twig");
    }
}
