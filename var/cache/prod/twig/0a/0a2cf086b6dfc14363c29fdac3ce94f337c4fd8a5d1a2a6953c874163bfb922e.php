<?php

/* ::fields.html.twig */
class __TwigTemplate_82efb6078df198416625c5cd587cbc58f996347df9110e7f4a8fbf0083f40ba9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("form_div_layout.html.twig", "::fields.html.twig", 1);
        $_trait_0 = $this->loadTemplate("GymanAppBundle::individual_widgets.html.twig", "::fields.html.twig", 2);
        // line 2
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."GymanAppBundle::individual_widgets.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->loadTemplate("GymanSettingsBundle::individual_widgets.html.twig", "::fields.html.twig", 3);
        // line 3
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."GymanSettingsBundle::individual_widgets.html.twig".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'form_row' => array($this, 'block_form_row'),
                'form_errors' => array($this, 'block_form_errors'),
                'form_widget_simple' => array($this, 'block_form_widget_simple'),
                'form_label' => array($this, 'block_form_label'),
                'textarea_widget' => array($this, 'block_textarea_widget'),
                'choice_widget' => array($this, 'block_choice_widget'),
                'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
                'checkbox_widget' => array($this, 'block_checkbox_widget'),
                'checkbox_row' => array($this, 'block_checkbox_row'),
                'horizontal_checkbox_row' => array($this, 'block_horizontal_checkbox_row'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_form_row($context, array $blocks = array())
    {
        // line 6
        ob_start();
        // line 7
        echo "<div class=\"control-group ";
        if ( !twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "vars", array()), "valid", array())) {
            echo "error";
        }
        echo "\">
    ";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        echo "
    <div class=\"controls\">
        ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
        <div class=\"help-block\">
            ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
        </div>
    </div>
</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 19
    public function block_form_errors($context, array $blocks = array())
    {
        // line 20
        ob_start();
        // line 21
        echo "    ";
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 22
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 23
                echo "        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["error"], "message", array()), "html", null, true);
                echo "<br />
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 29
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 30
        ob_start();
        // line 31
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text"));
        // line 32
        echo "<input type=\"";
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty(($context["value"] ?? null))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo "/>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 36
    public function block_form_label($context, array $blocks = array())
    {
        // line 37
        ob_start();
        // line 38
        echo "    ";
        if ( !(($context["label"] ?? null) === false)) {
            // line 39
            echo "        ";
            if ( !($context["compound"] ?? null)) {
                // line 40
                echo "            ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("for" => ($context["id"] ?? null)));
                // line 41
                echo "        ";
            }
            // line 42
            echo "        ";
            if (($context["required"] ?? null)) {
                // line 43
                echo "            ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("class" => twig_trim_filter((((twig_get_attribute($this->env, $this->getSourceContext(), ($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " required"))));
                // line 44
                echo "        ";
            }
            // line 45
            echo "        ";
            if (twig_test_empty(($context["label"] ?? null))) {
                // line 46
                echo "            ";
                $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(($context["name"] ?? null));
                // line 47
                echo "        ";
            }
            // line 48
            echo "<label class=\"control-label\"";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["label_attr"] ?? null));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["label"] ?? null), array(), ($context["translation_domain"] ?? null)), "html", null, true);
            echo "</label>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 53
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 54
        ob_start();
        // line 55
        echo "<textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "</textarea>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_choice_widget($context, array $blocks = array())
    {
        // line 60
        ob_start();
        // line 61
        echo "    ";
        if (($context["expanded"] ?? null)) {
            // line 62
            echo "        ";
            $this->displayBlock("choice_widget_expanded", $context, $blocks);
            echo "
    ";
        } else {
            // line 64
            echo "        ";
            $this->displayBlock("choice_widget_collapsed", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 69
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 70
        echo "    ";
        ob_start();
        // line 71
        echo "        ";
        $context["child_vars"] = array("attr" => ($context["attr"] ?? null));
        // line 72
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 73
            echo "            <div>
                ";
            // line 74
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'label', ($context["child_vars"] ?? null));
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 80
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 81
        ob_start();
        // line 82
        echo "<input type=\"checkbox\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"";
        }
        if (($context["checked"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " />
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 86
    public function block_checkbox_row($context, array $blocks = array())
    {
        // line 87
        ob_start();
        // line 88
        echo "    ";
        if ((array_key_exists("form_type", $context) && (($context["form_type"] ?? null) == "horizontal"))) {
            // line 89
            echo "        ";
            $this->displayBlock("horizontal_checkbox_row", $context, $blocks);
            echo "
    ";
        } else {
            // line 91
            echo "<div class=\"control-group\">
        ";
            // line 92
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
            echo "
    <div class=\"controls\">
        ";
            // line 94
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
            echo "
        ";
            // line 95
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
    </div>
</div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 102
    public function block_horizontal_checkbox_row($context, array $blocks = array())
    {
        // line 103
        ob_start();
        // line 104
        echo "<div class=\"control-group\">
    <div class=\"controls\">
            ";
        // line 106
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        echo "
            ";
        // line 107
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
    </div>
</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "::fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 107,  336 => 106,  332 => 104,  330 => 103,  327 => 102,  317 => 95,  313 => 94,  308 => 92,  305 => 91,  299 => 89,  296 => 88,  294 => 87,  291 => 86,  275 => 82,  273 => 81,  270 => 80,  265 => 77,  256 => 74,  253 => 73,  248 => 72,  245 => 71,  242 => 70,  239 => 69,  230 => 64,  224 => 62,  221 => 61,  219 => 60,  216 => 59,  206 => 55,  204 => 54,  201 => 53,  179 => 48,  176 => 47,  173 => 46,  170 => 45,  167 => 44,  164 => 43,  161 => 42,  158 => 41,  155 => 40,  152 => 39,  149 => 38,  147 => 37,  144 => 36,  128 => 32,  125 => 31,  123 => 30,  120 => 29,  114 => 25,  105 => 23,  100 => 22,  97 => 21,  95 => 20,  92 => 19,  82 => 12,  77 => 10,  72 => 8,  65 => 7,  63 => 6,  60 => 5,  51 => 1,  21 => 3,  14 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "::fields.html.twig", "/vagrant/app/Resources/views/fields.html.twig");
    }
}
