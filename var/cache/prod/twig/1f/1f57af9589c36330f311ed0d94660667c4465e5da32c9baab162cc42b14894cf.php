<?php

/* GymanAppBundle::individual_widgets.html.twig */
class __TwigTemplate_c1e0dd4878480e258f2dee0d8a4e6890d31cb7545554dc46e88e739fca054e33 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '_gyman_entries_entry_startDate_widget' => array($this, 'block__gyman_entries_entry_startDate_widget'),
            '_dende_schedulebundle_event_activity_widget' => array($this, 'block__dende_schedulebundle_event_activity_widget'),
            '_dende_schedulebundle_event_startDate_widget' => array($this, 'block__dende_schedulebundle_event_startDate_widget'),
            '_gyman_members_member_form_type_birthdate_widget' => array($this, 'block__gyman_members_member_form_type_birthdate_widget'),
            '_dende_schedulebundle_event_endDate_widget' => array($this, 'block__dende_schedulebundle_event_endDate_widget'),
            '_filter_filters_row' => array($this, 'block__filter_filters_row'),
            '_filter_filters_widget' => array($this, 'block__filter_filters_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('_gyman_entries_entry_startDate_widget', $context, $blocks);
        // line 9
        echo "
";
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('_dende_schedulebundle_event_activity_widget', $context, $blocks);
        // line 17
        echo "
";
        // line 18
        $this->displayBlock('_dende_schedulebundle_event_startDate_widget', $context, $blocks);
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('_gyman_members_member_form_type_birthdate_widget', $context, $blocks);
        // line 35
        echo "
";
        // line 36
        $this->displayBlock('_dende_schedulebundle_event_endDate_widget', $context, $blocks);
        // line 44
        echo "
";
        // line 45
        $this->displayBlock('_filter_filters_row', $context, $blocks);
        // line 50
        echo "
";
        // line 51
        $this->displayBlock('_filter_filters_widget', $context, $blocks);
        // line 79
        echo "



";
    }

    // line 1
    public function block__gyman_entries_entry_startDate_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        <div class=\"input-append date\" id=\"entryStartDate\">
            ";
        // line 4
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 12
    public function block__dende_schedulebundle_event_activity_widget($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "        ";
        $this->displayBlock("choice_widget_collapsed", $context, $blocks);
        echo " <div><a id=\"addNewActivity\" href=\"#\" class=\"btn btn-link\">+ dodaj nowe</a></div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 18
    public function block__dende_schedulebundle_event_startDate_widget($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        ob_start();
        // line 20
        echo "        <div class=\"input-append date\" id=\"eventStartDate\">
            ";
        // line 21
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 27
    public function block__gyman_members_member_form_type_birthdate_widget($context, array $blocks = array())
    {
        // line 28
        echo "    ";
        ob_start();
        // line 29
        echo "        <div class=\"input-append date\" id=\"memberBirthdate\">
            ";
        // line 30
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 36
    public function block__dende_schedulebundle_event_endDate_widget($context, array $blocks = array())
    {
        // line 37
        echo "    ";
        ob_start();
        // line 38
        echo "        <div class=\"input-append date\" id=\"eventEndDate\">
            ";
        // line 39
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 45
    public function block__filter_filters_row($context, array $blocks = array())
    {
        // line 46
        echo "    <div class=\"alert\">
    ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
    </div>
";
    }

    // line 51
    public function block__filter_filters_widget($context, array $blocks = array())
    {
        // line 52
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subfilter"]) {
            // line 53
            echo "        <div class=\"control-group ";
            if ( !twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "vars", array()), "valid", array())) {
                echo "error";
            }
            echo "\">
            ";
            // line 54
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["subfilter"], 'label');
            echo "
            ";
            // line 55
            if (twig_in_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["subfilter"], "vars", array()), "name", array()), array(0 => "Age", 1 => "Belt", 2 => "Price", 3 => "RegistrationDate", 4 => "VoucherStart", 5 => "VoucherEnd"))) {
                // line 56
                echo "                <div class=\"controls\">
                    ";
                // line 57
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["subfilter"]);
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 58
                    echo "                        ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'widget');
                    echo "
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "                    <div class=\"help-block\">
                        ";
                // line 61
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["subfilter"]);
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 62
                    echo "                            ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'errors');
                    echo "
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "                    </div>
                </div>
            ";
            } else {
                // line 67
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["subfilter"]);
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 68
                    echo "                <div class=\"controls\">
                    ";
                    // line 69
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["subfilter"], 'widget');
                    echo "
                    <div class=\"help-block\">
                        ";
                    // line 71
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["subfilter"], 'errors');
                    echo "
                    </div>
                </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 75
                echo "            ";
            }
            // line 76
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subfilter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GymanAppBundle::individual_widgets.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  258 => 77,  252 => 76,  249 => 75,  239 => 71,  234 => 69,  231 => 68,  226 => 67,  221 => 64,  212 => 62,  208 => 61,  205 => 60,  196 => 58,  192 => 57,  189 => 56,  187 => 55,  183 => 54,  176 => 53,  171 => 52,  168 => 51,  161 => 47,  158 => 46,  155 => 45,  146 => 39,  143 => 38,  140 => 37,  137 => 36,  128 => 30,  125 => 29,  122 => 28,  119 => 27,  110 => 21,  107 => 20,  104 => 19,  101 => 18,  93 => 14,  90 => 13,  87 => 12,  78 => 4,  75 => 3,  72 => 2,  69 => 1,  61 => 79,  59 => 51,  56 => 50,  54 => 45,  51 => 44,  49 => 36,  46 => 35,  44 => 27,  41 => 26,  39 => 18,  36 => 17,  34 => 12,  31 => 11,  28 => 9,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GymanAppBundle::individual_widgets.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/individual_widgets.html.twig");
    }
}
