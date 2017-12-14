<?php

/* DashboardBundle:Default:searchUser.html.twig */
class __TwigTemplate_e77a73661295d63fb34e0244ca8f6559a1532614bc1606c4a5628a09cbc7368c extends Twig_Template
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
        $__internal_10fecf3b5fd01e8371ef3505987588482b0b9ea2600533f19625e9a1e9756db8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_10fecf3b5fd01e8371ef3505987588482b0b9ea2600533f19625e9a1e9756db8->enter($__internal_10fecf3b5fd01e8371ef3505987588482b0b9ea2600533f19625e9a1e9756db8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:searchUser.html.twig"));

        $__internal_f523bc3af7288d87a3ef3b0436f7eab42e60f194c84e1b0e3c3270d17284b437 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f523bc3af7288d87a3ef3b0436f7eab42e60f194c84e1b0e3c3270d17284b437->enter($__internal_f523bc3af7288d87a3ef3b0436f7eab42e60f194c84e1b0e3c3270d17284b437_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DashboardBundle:Default:searchUser.html.twig"));

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
        
        $__internal_10fecf3b5fd01e8371ef3505987588482b0b9ea2600533f19625e9a1e9756db8->leave($__internal_10fecf3b5fd01e8371ef3505987588482b0b9ea2600533f19625e9a1e9756db8_prof);

        
        $__internal_f523bc3af7288d87a3ef3b0436f7eab42e60f194c84e1b0e3c3270d17284b437->leave($__internal_f523bc3af7288d87a3ef3b0436f7eab42e60f194c84e1b0e3c3270d17284b437_prof);

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
