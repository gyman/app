<?php

/* knp_menu.html.twig */
class __TwigTemplate_9c204c39bfa74e00ecc9313c47854bb9c42d28a9a47a006e6af720ed96d99c90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu_base.html.twig", "knp_menu.html.twig", 1);
        $this->blocks = array(
            'compressed_root' => array($this, 'block_compressed_root'),
            'root' => array($this, 'block_root'),
            'list' => array($this, 'block_list'),
            'children' => array($this, 'block_children'),
            'item' => array($this, 'block_item'),
            'linkElement' => array($this, 'block_linkElement'),
            'spanElement' => array($this, 'block_spanElement'),
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6ba484fdb86e3e120e79dcca574ed7b5e63ead07e1463e6d58da36fb4adcf3b0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6ba484fdb86e3e120e79dcca574ed7b5e63ead07e1463e6d58da36fb4adcf3b0->enter($__internal_6ba484fdb86e3e120e79dcca574ed7b5e63ead07e1463e6d58da36fb4adcf3b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu.html.twig"));

        $__internal_e9f50e2e87f457a27b41b171ab6191d2e27d15f90cf6b73ca826dab581c10908 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e9f50e2e87f457a27b41b171ab6191d2e27d15f90cf6b73ca826dab581c10908->enter($__internal_e9f50e2e87f457a27b41b171ab6191d2e27d15f90cf6b73ca826dab581c10908_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6ba484fdb86e3e120e79dcca574ed7b5e63ead07e1463e6d58da36fb4adcf3b0->leave($__internal_6ba484fdb86e3e120e79dcca574ed7b5e63ead07e1463e6d58da36fb4adcf3b0_prof);

        
        $__internal_e9f50e2e87f457a27b41b171ab6191d2e27d15f90cf6b73ca826dab581c10908->leave($__internal_e9f50e2e87f457a27b41b171ab6191d2e27d15f90cf6b73ca826dab581c10908_prof);

    }

    // line 11
    public function block_compressed_root($context, array $blocks = array())
    {
        $__internal_7b098b02988afe6fc1ab3c6116342aca6550e4768adbe19f910cde9203ccf0a8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7b098b02988afe6fc1ab3c6116342aca6550e4768adbe19f910cde9203ccf0a8->enter($__internal_7b098b02988afe6fc1ab3c6116342aca6550e4768adbe19f910cde9203ccf0a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "compressed_root"));

        $__internal_bed4e2605195cbe97b52ea04b10952e9b741a07ce3b49ab84a7dd39e3112d86e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bed4e2605195cbe97b52ea04b10952e9b741a07ce3b49ab84a7dd39e3112d86e->enter($__internal_bed4e2605195cbe97b52ea04b10952e9b741a07ce3b49ab84a7dd39e3112d86e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "compressed_root"));

        // line 12
        ob_start();
        // line 13
        $this->displayBlock("root", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_bed4e2605195cbe97b52ea04b10952e9b741a07ce3b49ab84a7dd39e3112d86e->leave($__internal_bed4e2605195cbe97b52ea04b10952e9b741a07ce3b49ab84a7dd39e3112d86e_prof);

        
        $__internal_7b098b02988afe6fc1ab3c6116342aca6550e4768adbe19f910cde9203ccf0a8->leave($__internal_7b098b02988afe6fc1ab3c6116342aca6550e4768adbe19f910cde9203ccf0a8_prof);

    }

    // line 17
    public function block_root($context, array $blocks = array())
    {
        $__internal_0684c4becebef75ec63e702e030763957257e5f7caa4fcbb73a16865fb6d3fac = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0684c4becebef75ec63e702e030763957257e5f7caa4fcbb73a16865fb6d3fac->enter($__internal_0684c4becebef75ec63e702e030763957257e5f7caa4fcbb73a16865fb6d3fac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        $__internal_f33136eb973a3a8b7362c8bf6d60be64e197175d70344af24b745545715acb49 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f33136eb973a3a8b7362c8bf6d60be64e197175d70344af24b745545715acb49->enter($__internal_f33136eb973a3a8b7362c8bf6d60be64e197175d70344af24b745545715acb49_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        // line 18
        $context["listAttributes"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttributes", array());
        // line 19
        $this->displayBlock("list", $context, $blocks);
        
        $__internal_f33136eb973a3a8b7362c8bf6d60be64e197175d70344af24b745545715acb49->leave($__internal_f33136eb973a3a8b7362c8bf6d60be64e197175d70344af24b745545715acb49_prof);

        
        $__internal_0684c4becebef75ec63e702e030763957257e5f7caa4fcbb73a16865fb6d3fac->leave($__internal_0684c4becebef75ec63e702e030763957257e5f7caa4fcbb73a16865fb6d3fac_prof);

    }

    // line 22
    public function block_list($context, array $blocks = array())
    {
        $__internal_397489282103953fd7339186918a055beb01be52d06edf2e5f277b5d09457fc6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_397489282103953fd7339186918a055beb01be52d06edf2e5f277b5d09457fc6->enter($__internal_397489282103953fd7339186918a055beb01be52d06edf2e5f277b5d09457fc6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_d58b55d3d7f6fecfb98956444bfef8251b11aa00bc43966032c56d8b2b139f8d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d58b55d3d7f6fecfb98956444bfef8251b11aa00bc43966032c56d8b2b139f8d->enter($__internal_d58b55d3d7f6fecfb98956444bfef8251b11aa00bc43966032c56d8b2b139f8d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        // line 23
        if (((twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "hasChildren", array()) &&  !(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()) === 0)) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayChildren", array()))) {
            // line 24
            echo "    ";
            $context["knp_menu"] = $this;
            // line 25
            echo "    <ul";
            echo $context["knp_menu"]->macro_attributes(($context["listAttributes"] ?? null));
            echo ">
        ";
            // line 26
            $this->displayBlock("children", $context, $blocks);
            echo "
    </ul>
";
        }
        
        $__internal_d58b55d3d7f6fecfb98956444bfef8251b11aa00bc43966032c56d8b2b139f8d->leave($__internal_d58b55d3d7f6fecfb98956444bfef8251b11aa00bc43966032c56d8b2b139f8d_prof);

        
        $__internal_397489282103953fd7339186918a055beb01be52d06edf2e5f277b5d09457fc6->leave($__internal_397489282103953fd7339186918a055beb01be52d06edf2e5f277b5d09457fc6_prof);

    }

    // line 31
    public function block_children($context, array $blocks = array())
    {
        $__internal_d37810ef13d4e36db577532e444fa30bebdb0acdd872a6dc46789841d8b3b1e0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d37810ef13d4e36db577532e444fa30bebdb0acdd872a6dc46789841d8b3b1e0->enter($__internal_d37810ef13d4e36db577532e444fa30bebdb0acdd872a6dc46789841d8b3b1e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "children"));

        $__internal_cad96530d0d4b6e4fc331c82e5e340de737ada911f4673b9e1ec09ac64ad7af2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cad96530d0d4b6e4fc331c82e5e340de737ada911f4673b9e1ec09ac64ad7af2->enter($__internal_cad96530d0d4b6e4fc331c82e5e340de737ada911f4673b9e1ec09ac64ad7af2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "children"));

        // line 33
        $context["currentOptions"] = ($context["options"] ?? null);
        // line 34
        $context["currentItem"] = ($context["item"] ?? null);
        // line 36
        if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()))) {
            // line 37
            $context["options"] = twig_array_merge(($context["options"] ?? null), array("depth" => (twig_get_attribute($this->env, $this->getSourceContext(), ($context["currentOptions"] ?? null), "depth", array()) - 1)));
        }
        // line 40
        if (( !(null === twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "matchingDepth", array())) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "matchingDepth", array()) > 0))) {
            // line 41
            $context["options"] = twig_array_merge(($context["options"] ?? null), array("matchingDepth" => (twig_get_attribute($this->env, $this->getSourceContext(), ($context["currentOptions"] ?? null), "matchingDepth", array()) - 1)));
        }
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), ($context["currentItem"] ?? null), "children", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 44
            echo "    ";
            $this->displayBlock("item", $context, $blocks);
            echo "
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        $context["item"] = ($context["currentItem"] ?? null);
        // line 48
        $context["options"] = ($context["currentOptions"] ?? null);
        
        $__internal_cad96530d0d4b6e4fc331c82e5e340de737ada911f4673b9e1ec09ac64ad7af2->leave($__internal_cad96530d0d4b6e4fc331c82e5e340de737ada911f4673b9e1ec09ac64ad7af2_prof);

        
        $__internal_d37810ef13d4e36db577532e444fa30bebdb0acdd872a6dc46789841d8b3b1e0->leave($__internal_d37810ef13d4e36db577532e444fa30bebdb0acdd872a6dc46789841d8b3b1e0_prof);

    }

    // line 51
    public function block_item($context, array $blocks = array())
    {
        $__internal_00e0364532b267be1b4e1f7229645c32f464151e4e1279d07881e9a7d99c006f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_00e0364532b267be1b4e1f7229645c32f464151e4e1279d07881e9a7d99c006f->enter($__internal_00e0364532b267be1b4e1f7229645c32f464151e4e1279d07881e9a7d99c006f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_612f5b604d69dc50e9ca785eeb34bb5ee4a8923dadbef659f680c0f478ceeabe = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_612f5b604d69dc50e9ca785eeb34bb5ee4a8923dadbef659f680c0f478ceeabe->enter($__internal_612f5b604d69dc50e9ca785eeb34bb5ee4a8923dadbef659f680c0f478ceeabe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        // line 52
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayed", array())) {
            // line 54
            $context["classes"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attribute", array(0 => "class"), "method"))) ? (array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 55
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["matcher"] ?? null), "isCurrent", array(0 => ($context["item"] ?? null)), "method")) {
                // line 56
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "currentClass", array())));
            } elseif (twig_get_attribute($this->env, $this->getSourceContext(),             // line 57
($context["matcher"] ?? null), "isAncestor", array(0 => ($context["item"] ?? null), 1 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "matchingDepth", array())), "method")) {
                // line 58
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "ancestorClass", array())));
            }
            // line 60
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "actsLikeFirst", array())) {
                // line 61
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "firstClass", array())));
            }
            // line 63
            if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "actsLikeLast", array())) {
                // line 64
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "lastClass", array())));
            }
            // line 66
            echo "
    ";
            // line 68
            echo "    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "hasChildren", array()) &&  !(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "depth", array()) === 0))) {
                // line 69
                echo "        ";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "branch_class", array())) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "displayChildren", array()))) {
                    // line 70
                    $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "branch_class", array())));
                    // line 71
                    echo "        ";
                }
                // line 72
                echo "    ";
            } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "leaf_class", array()))) {
                // line 73
                $context["classes"] = twig_array_merge(($context["classes"] ?? null), array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "leaf_class", array())));
            }
            // line 76
            $context["attributes"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "attributes", array());
            // line 77
            if ( !twig_test_empty(($context["classes"] ?? null))) {
                // line 78
                $context["attributes"] = twig_array_merge(($context["attributes"] ?? null), array("class" => twig_join_filter(($context["classes"] ?? null), " ")));
            }
            // line 81
            echo "    ";
            $context["knp_menu"] = $this;
            // line 82
            echo "    <li";
            echo $context["knp_menu"]->macro_attributes(($context["attributes"] ?? null));
            echo ">";
            // line 83
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "uri", array())) && ( !twig_get_attribute($this->env, $this->getSourceContext(), ($context["matcher"] ?? null), "isCurrent", array(0 => ($context["item"] ?? null)), "method") || twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "currentAsLink", array())))) {
                // line 84
                echo "        ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 86
                echo "        ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 89
            $context["childrenClasses"] = (( !twig_test_empty(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttribute", array(0 => "class"), "method"))) ? (array(0 => twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 90
            $context["childrenClasses"] = twig_array_merge(($context["childrenClasses"] ?? null), array(0 => ("menu_level_" . twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "level", array()))));
            // line 91
            $context["listAttributes"] = twig_array_merge(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttributes", array()), array("class" => twig_join_filter(($context["childrenClasses"] ?? null), " ")));
            // line 92
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
    </li>
";
        }
        
        $__internal_612f5b604d69dc50e9ca785eeb34bb5ee4a8923dadbef659f680c0f478ceeabe->leave($__internal_612f5b604d69dc50e9ca785eeb34bb5ee4a8923dadbef659f680c0f478ceeabe_prof);

        
        $__internal_00e0364532b267be1b4e1f7229645c32f464151e4e1279d07881e9a7d99c006f->leave($__internal_00e0364532b267be1b4e1f7229645c32f464151e4e1279d07881e9a7d99c006f_prof);

    }

    // line 97
    public function block_linkElement($context, array $blocks = array())
    {
        $__internal_153dfe20e9b227752dc7f853fcc6548775037d3dffde21a8d7248075021dfab5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_153dfe20e9b227752dc7f853fcc6548775037d3dffde21a8d7248075021dfab5->enter($__internal_153dfe20e9b227752dc7f853fcc6548775037d3dffde21a8d7248075021dfab5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        $__internal_5d3e2105999811b95451564b503e19c60208444f8e30c863308d8559492315cc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5d3e2105999811b95451564b503e19c60208444f8e30c863308d8559492315cc->enter($__internal_5d3e2105999811b95451564b503e19c60208444f8e30c863308d8559492315cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        $context["knp_menu"] = $this;
        echo "<a href=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "uri", array()), "html", null, true);
        echo "\"";
        echo $context["knp_menu"]->macro_attributes(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "linkAttributes", array()));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</a>";
        
        $__internal_5d3e2105999811b95451564b503e19c60208444f8e30c863308d8559492315cc->leave($__internal_5d3e2105999811b95451564b503e19c60208444f8e30c863308d8559492315cc_prof);

        
        $__internal_153dfe20e9b227752dc7f853fcc6548775037d3dffde21a8d7248075021dfab5->leave($__internal_153dfe20e9b227752dc7f853fcc6548775037d3dffde21a8d7248075021dfab5_prof);

    }

    // line 99
    public function block_spanElement($context, array $blocks = array())
    {
        $__internal_76e020c2b7e6ec3d26a7b3b38ae2a2ca5add925c43221e5d3a4e2706c0168a13 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_76e020c2b7e6ec3d26a7b3b38ae2a2ca5add925c43221e5d3a4e2706c0168a13->enter($__internal_76e020c2b7e6ec3d26a7b3b38ae2a2ca5add925c43221e5d3a4e2706c0168a13_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        $__internal_6eb8929bf4a6abb2ff8832f18c81bf2175e2e524a085894f5b9d93f1b3e117d0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6eb8929bf4a6abb2ff8832f18c81bf2175e2e524a085894f5b9d93f1b3e117d0->enter($__internal_6eb8929bf4a6abb2ff8832f18c81bf2175e2e524a085894f5b9d93f1b3e117d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        $context["knp_menu"] = $this;
        echo "<span";
        echo $context["knp_menu"]->macro_attributes(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "labelAttributes", array()));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</span>";
        
        $__internal_6eb8929bf4a6abb2ff8832f18c81bf2175e2e524a085894f5b9d93f1b3e117d0->leave($__internal_6eb8929bf4a6abb2ff8832f18c81bf2175e2e524a085894f5b9d93f1b3e117d0_prof);

        
        $__internal_76e020c2b7e6ec3d26a7b3b38ae2a2ca5add925c43221e5d3a4e2706c0168a13->leave($__internal_76e020c2b7e6ec3d26a7b3b38ae2a2ca5add925c43221e5d3a4e2706c0168a13_prof);

    }

    // line 101
    public function block_label($context, array $blocks = array())
    {
        $__internal_feb84a4461277a49993c6e8148d8f0830554ecfd035a9c7c15f7a7043a05793e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_feb84a4461277a49993c6e8148d8f0830554ecfd035a9c7c15f7a7043a05793e->enter($__internal_feb84a4461277a49993c6e8148d8f0830554ecfd035a9c7c15f7a7043a05793e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_f79397ca0a0e841d7149eb3ac6fc6bb326e2a56ccfb6dc97af98cf76ca7c27d7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f79397ca0a0e841d7149eb3ac6fc6bb326e2a56ccfb6dc97af98cf76ca7c27d7->enter($__internal_f79397ca0a0e841d7149eb3ac6fc6bb326e2a56ccfb6dc97af98cf76ca7c27d7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "allow_safe_labels", array()) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "getExtra", array(0 => "safe_label", 1 => false), "method"))) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array());
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array()), "html", null, true);
        }
        
        $__internal_f79397ca0a0e841d7149eb3ac6fc6bb326e2a56ccfb6dc97af98cf76ca7c27d7->leave($__internal_f79397ca0a0e841d7149eb3ac6fc6bb326e2a56ccfb6dc97af98cf76ca7c27d7_prof);

        
        $__internal_feb84a4461277a49993c6e8148d8f0830554ecfd035a9c7c15f7a7043a05793e->leave($__internal_feb84a4461277a49993c6e8148d8f0830554ecfd035a9c7c15f7a7043a05793e_prof);

    }

    // line 3
    public function macro_attributes($__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_9160dbaff5d4b29da3150d47e39ddf67de8724b8d462262c0fbfa6d769377e6d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_9160dbaff5d4b29da3150d47e39ddf67de8724b8d462262c0fbfa6d769377e6d->enter($__internal_9160dbaff5d4b29da3150d47e39ddf67de8724b8d462262c0fbfa6d769377e6d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_4d04e1b8d0c017b9a37514399df308d0cb55af1803a91585880cfc8e5dbe9186 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_4d04e1b8d0c017b9a37514399df308d0cb55af1803a91585880cfc8e5dbe9186->enter($__internal_4d04e1b8d0c017b9a37514399df308d0cb55af1803a91585880cfc8e5dbe9186_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributes"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 5
                if (( !(null === $context["value"]) &&  !($context["value"] === false))) {
                    // line 6
                    echo sprintf(" %s=\"%s\"", $context["name"], ((($context["value"] === true)) ? (twig_escape_filter($this->env, $context["name"])) : (twig_escape_filter($this->env, $context["value"]))));
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            
            $__internal_4d04e1b8d0c017b9a37514399df308d0cb55af1803a91585880cfc8e5dbe9186->leave($__internal_4d04e1b8d0c017b9a37514399df308d0cb55af1803a91585880cfc8e5dbe9186_prof);

            
            $__internal_9160dbaff5d4b29da3150d47e39ddf67de8724b8d462262c0fbfa6d769377e6d->leave($__internal_9160dbaff5d4b29da3150d47e39ddf67de8724b8d462262c0fbfa6d769377e6d_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "knp_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  385 => 6,  383 => 5,  379 => 4,  361 => 3,  339 => 101,  316 => 99,  291 => 97,  276 => 92,  274 => 91,  272 => 90,  270 => 89,  266 => 86,  262 => 84,  260 => 83,  256 => 82,  253 => 81,  250 => 78,  248 => 77,  246 => 76,  243 => 73,  240 => 72,  237 => 71,  235 => 70,  232 => 69,  229 => 68,  226 => 66,  223 => 64,  221 => 63,  218 => 61,  216 => 60,  213 => 58,  211 => 57,  209 => 56,  207 => 55,  205 => 54,  203 => 52,  194 => 51,  184 => 48,  182 => 47,  165 => 44,  148 => 43,  145 => 41,  143 => 40,  140 => 37,  138 => 36,  136 => 34,  134 => 33,  125 => 31,  111 => 26,  106 => 25,  103 => 24,  101 => 23,  92 => 22,  82 => 19,  80 => 18,  71 => 17,  58 => 13,  56 => 12,  47 => 11,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'knp_menu_base.html.twig' %}

{% macro attributes(attributes) %}
{% for name, value in attributes %}
    {%- if value is not none and value is not same as(false) -%}
        {{- ' %s=\"%s\"'|format(name, value is same as(true) ? name|e : value|e)|raw -}}
    {%- endif -%}
{%- endfor -%}
{% endmacro %}

{% block compressed_root %}
{% spaceless %}
{{ block('root') }}
{% endspaceless %}
{% endblock %}

{% block root %}
{% set listAttributes = item.childrenAttributes %}
{{ block('list') -}}
{% endblock %}

{% block list %}
{% if item.hasChildren and options.depth is not same as(0) and item.displayChildren %}
    {% import _self as knp_menu %}
    <ul{{ knp_menu.attributes(listAttributes) }}>
        {{ block('children') }}
    </ul>
{% endif %}
{% endblock %}

{% block children %}
{# save current variables #}
{% set currentOptions = options %}
{% set currentItem = item %}
{# update the depth for children #}
{% if options.depth is not none %}
{% set options = options|merge({'depth': currentOptions.depth - 1}) %}
{% endif %}
{# update the matchingDepth for children #}
{% if options.matchingDepth is not none and options.matchingDepth > 0 %}
{% set options = options|merge({'matchingDepth': currentOptions.matchingDepth - 1}) %}
{% endif %}
{% for item in currentItem.children %}
    {{ block('item') }}
{% endfor %}
{# restore current variables #}
{% set item = currentItem %}
{% set options = currentOptions %}
{% endblock %}

{% block item %}
{% if item.displayed %}
{# building the class of the item #}
    {%- set classes = item.attribute('class') is not empty ? [item.attribute('class')] : [] %}
    {%- if matcher.isCurrent(item) %}
        {%- set classes = classes|merge([options.currentClass]) %}
    {%- elseif matcher.isAncestor(item, options.matchingDepth) %}
        {%- set classes = classes|merge([options.ancestorClass]) %}
    {%- endif %}
    {%- if item.actsLikeFirst %}
        {%- set classes = classes|merge([options.firstClass]) %}
    {%- endif %}
    {%- if item.actsLikeLast %}
        {%- set classes = classes|merge([options.lastClass]) %}
    {%- endif %}

    {# Mark item as \"leaf\" (no children) or as \"branch\" (has children that are displayed) #}
    {% if item.hasChildren and options.depth is not same as(0) %}
        {% if options.branch_class is not empty and item.displayChildren %}
            {%- set classes = classes|merge([options.branch_class]) %}
        {% endif %}
    {% elseif options.leaf_class is not empty %}
        {%- set classes = classes|merge([options.leaf_class]) %}
    {%- endif %}

    {%- set attributes = item.attributes %}
    {%- if classes is not empty %}
        {%- set attributes = attributes|merge({'class': classes|join(' ')}) %}
    {%- endif %}
{# displaying the item #}
    {% import _self as knp_menu %}
    <li{{ knp_menu.attributes(attributes) }}>
        {%- if item.uri is not empty and (not matcher.isCurrent(item) or options.currentAsLink) %}
        {{ block('linkElement') }}
        {%- else %}
        {{ block('spanElement') }}
        {%- endif %}
{# render the list of children#}
        {%- set childrenClasses = item.childrenAttribute('class') is not empty ? [item.childrenAttribute('class')] : [] %}
        {%- set childrenClasses = childrenClasses|merge(['menu_level_' ~ item.level]) %}
        {%- set listAttributes = item.childrenAttributes|merge({'class': childrenClasses|join(' ') }) %}
        {{ block('list') }}
    </li>
{% endif %}
{% endblock %}

{% block linkElement %}{% import _self as knp_menu %}<a href=\"{{ item.uri }}\"{{ knp_menu.attributes(item.linkAttributes) }}>{{ block('label') }}</a>{% endblock %}

{% block spanElement %}{% import _self as knp_menu %}<span{{ knp_menu.attributes(item.labelAttributes) }}>{{ block('label') }}</span>{% endblock %}

{% block label %}{% if options.allow_safe_labels and item.getExtra('safe_label', false) %}{{ item.label|raw }}{% else %}{{ item.label }}{% endif %}{% endblock %}
", "knp_menu.html.twig", "/vagrant/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views/knp_menu.html.twig");
    }
}
