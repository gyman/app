<?php

/* GymanSettingsBundle::individual_widgets.html.twig */
class __TwigTemplate_872a1619de6ff633e9101048d96aab8df7c4913504003d6c6785b6745c7534cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '_club_sections_sections_entry_title_widget' => array($this, 'block__club_sections_sections_entry_title_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('_club_sections_sections_entry_title_widget', $context, $blocks);
        // line 6
        echo "


";
    }

    // line 1
    public function block__club_sections_sections_entry_title_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
    &nbsp;
    <a href=\"#\" class=\"remove-collection-entry\" data-entry-id=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "parent", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">[";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("remove_collection_element"), "html", null, true);
        echo "]</a>
";
    }

    public function getTemplateName()
    {
        return "GymanSettingsBundle::individual_widgets.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  38 => 4,  32 => 2,  29 => 1,  22 => 6,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GymanSettingsBundle::individual_widgets.html.twig", "/vagrant/src/Bundle/SettingsBundle/Resources/views/individual_widgets.html.twig");
    }
}
