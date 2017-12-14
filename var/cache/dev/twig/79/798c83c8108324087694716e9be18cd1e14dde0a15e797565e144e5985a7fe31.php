<?php

/* knp_menu.html.twig */
class __TwigTemplate_5e65a053e79a1ab3e9ea0602e8f19bb8e038e576fcd4b7a60d321e8545f0182e extends Twig_Template
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
        $__internal_3aa0bd717b22c17c77d8a4f74ad5b7091fe79717a76993886662ddff77a45ac0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3aa0bd717b22c17c77d8a4f74ad5b7091fe79717a76993886662ddff77a45ac0->enter($__internal_3aa0bd717b22c17c77d8a4f74ad5b7091fe79717a76993886662ddff77a45ac0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu.html.twig"));

        $__internal_6320d5dcc6fd8498245cf11257518a415b29f2354d92343c3854a64c8b440b25 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6320d5dcc6fd8498245cf11257518a415b29f2354d92343c3854a64c8b440b25->enter($__internal_6320d5dcc6fd8498245cf11257518a415b29f2354d92343c3854a64c8b440b25_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3aa0bd717b22c17c77d8a4f74ad5b7091fe79717a76993886662ddff77a45ac0->leave($__internal_3aa0bd717b22c17c77d8a4f74ad5b7091fe79717a76993886662ddff77a45ac0_prof);

        
        $__internal_6320d5dcc6fd8498245cf11257518a415b29f2354d92343c3854a64c8b440b25->leave($__internal_6320d5dcc6fd8498245cf11257518a415b29f2354d92343c3854a64c8b440b25_prof);

    }

    // line 11
    public function block_compressed_root($context, array $blocks = array())
    {
        $__internal_584de3d8390ba94f292a23c387e55e164d9438b74cb3dfca4b76ead7c4746f69 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_584de3d8390ba94f292a23c387e55e164d9438b74cb3dfca4b76ead7c4746f69->enter($__internal_584de3d8390ba94f292a23c387e55e164d9438b74cb3dfca4b76ead7c4746f69_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "compressed_root"));

        $__internal_82942058441e95a461f963584e2edf8179865ab9bd4a94fab079d6e358717bab = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_82942058441e95a461f963584e2edf8179865ab9bd4a94fab079d6e358717bab->enter($__internal_82942058441e95a461f963584e2edf8179865ab9bd4a94fab079d6e358717bab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "compressed_root"));

        // line 12
        ob_start();
        // line 13
        $this->displayBlock("root", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_82942058441e95a461f963584e2edf8179865ab9bd4a94fab079d6e358717bab->leave($__internal_82942058441e95a461f963584e2edf8179865ab9bd4a94fab079d6e358717bab_prof);

        
        $__internal_584de3d8390ba94f292a23c387e55e164d9438b74cb3dfca4b76ead7c4746f69->leave($__internal_584de3d8390ba94f292a23c387e55e164d9438b74cb3dfca4b76ead7c4746f69_prof);

    }

    // line 17
    public function block_root($context, array $blocks = array())
    {
        $__internal_8e18f9164585abe16e4bc1f40756377fa69c16020ec79ec596ff34c7fcf2fe4a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8e18f9164585abe16e4bc1f40756377fa69c16020ec79ec596ff34c7fcf2fe4a->enter($__internal_8e18f9164585abe16e4bc1f40756377fa69c16020ec79ec596ff34c7fcf2fe4a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        $__internal_44d4a39f201f52664f0815a3abfebb24cfa1995fd8f93afe28c5012fbfa27198 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_44d4a39f201f52664f0815a3abfebb24cfa1995fd8f93afe28c5012fbfa27198->enter($__internal_44d4a39f201f52664f0815a3abfebb24cfa1995fd8f93afe28c5012fbfa27198_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        // line 18
        $context["listAttributes"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttributes", array());
        // line 19
        $this->displayBlock("list", $context, $blocks);
        
        $__internal_44d4a39f201f52664f0815a3abfebb24cfa1995fd8f93afe28c5012fbfa27198->leave($__internal_44d4a39f201f52664f0815a3abfebb24cfa1995fd8f93afe28c5012fbfa27198_prof);

        
        $__internal_8e18f9164585abe16e4bc1f40756377fa69c16020ec79ec596ff34c7fcf2fe4a->leave($__internal_8e18f9164585abe16e4bc1f40756377fa69c16020ec79ec596ff34c7fcf2fe4a_prof);

    }

    // line 22
    public function block_list($context, array $blocks = array())
    {
        $__internal_eb9a94a8320bb1eac4a948014deda92cad38c2fa09e1319e5a4cada5a06fa4bd = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eb9a94a8320bb1eac4a948014deda92cad38c2fa09e1319e5a4cada5a06fa4bd->enter($__internal_eb9a94a8320bb1eac4a948014deda92cad38c2fa09e1319e5a4cada5a06fa4bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_b3d9777f1e4d89fcaf443d0e879092545bebaee68dfc05623c972fec3b592ef0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b3d9777f1e4d89fcaf443d0e879092545bebaee68dfc05623c972fec3b592ef0->enter($__internal_b3d9777f1e4d89fcaf443d0e879092545bebaee68dfc05623c972fec3b592ef0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

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
        
        $__internal_b3d9777f1e4d89fcaf443d0e879092545bebaee68dfc05623c972fec3b592ef0->leave($__internal_b3d9777f1e4d89fcaf443d0e879092545bebaee68dfc05623c972fec3b592ef0_prof);

        
        $__internal_eb9a94a8320bb1eac4a948014deda92cad38c2fa09e1319e5a4cada5a06fa4bd->leave($__internal_eb9a94a8320bb1eac4a948014deda92cad38c2fa09e1319e5a4cada5a06fa4bd_prof);

    }

    // line 31
    public function block_children($context, array $blocks = array())
    {
        $__internal_1f0ac8eeec41a0bc2b753bd7231ed6fe231c4eadf40655eb058fd1e22b3a790f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1f0ac8eeec41a0bc2b753bd7231ed6fe231c4eadf40655eb058fd1e22b3a790f->enter($__internal_1f0ac8eeec41a0bc2b753bd7231ed6fe231c4eadf40655eb058fd1e22b3a790f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "children"));

        $__internal_cf43e2af44c75d553f86a3fb6f97a83941cac25fc982be6625e642e3f6ec1167 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cf43e2af44c75d553f86a3fb6f97a83941cac25fc982be6625e642e3f6ec1167->enter($__internal_cf43e2af44c75d553f86a3fb6f97a83941cac25fc982be6625e642e3f6ec1167_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "children"));

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
        
        $__internal_cf43e2af44c75d553f86a3fb6f97a83941cac25fc982be6625e642e3f6ec1167->leave($__internal_cf43e2af44c75d553f86a3fb6f97a83941cac25fc982be6625e642e3f6ec1167_prof);

        
        $__internal_1f0ac8eeec41a0bc2b753bd7231ed6fe231c4eadf40655eb058fd1e22b3a790f->leave($__internal_1f0ac8eeec41a0bc2b753bd7231ed6fe231c4eadf40655eb058fd1e22b3a790f_prof);

    }

    // line 51
    public function block_item($context, array $blocks = array())
    {
        $__internal_4a38137174b898884b0f7bfbd3e917014046065ed30fae0895c7d0b890c7ff0e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4a38137174b898884b0f7bfbd3e917014046065ed30fae0895c7d0b890c7ff0e->enter($__internal_4a38137174b898884b0f7bfbd3e917014046065ed30fae0895c7d0b890c7ff0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_d084bca4c64104454aa5bd1fdbd6534f05afb0d549226979ec5ddce5bef1598c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d084bca4c64104454aa5bd1fdbd6534f05afb0d549226979ec5ddce5bef1598c->enter($__internal_d084bca4c64104454aa5bd1fdbd6534f05afb0d549226979ec5ddce5bef1598c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

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
        
        $__internal_d084bca4c64104454aa5bd1fdbd6534f05afb0d549226979ec5ddce5bef1598c->leave($__internal_d084bca4c64104454aa5bd1fdbd6534f05afb0d549226979ec5ddce5bef1598c_prof);

        
        $__internal_4a38137174b898884b0f7bfbd3e917014046065ed30fae0895c7d0b890c7ff0e->leave($__internal_4a38137174b898884b0f7bfbd3e917014046065ed30fae0895c7d0b890c7ff0e_prof);

    }

    // line 97
    public function block_linkElement($context, array $blocks = array())
    {
        $__internal_f8ef252b81fcecdda1adca0ba98d581842a8fa2ded08f29815a63354d22089b0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f8ef252b81fcecdda1adca0ba98d581842a8fa2ded08f29815a63354d22089b0->enter($__internal_f8ef252b81fcecdda1adca0ba98d581842a8fa2ded08f29815a63354d22089b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        $__internal_ce3de718c0305973bd829d20a2ed599fd7ff80702e177103e14bc89749075e70 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ce3de718c0305973bd829d20a2ed599fd7ff80702e177103e14bc89749075e70->enter($__internal_ce3de718c0305973bd829d20a2ed599fd7ff80702e177103e14bc89749075e70_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        $context["knp_menu"] = $this;
        echo "<a href=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "uri", array()), "html", null, true);
        echo "\"";
        echo $context["knp_menu"]->macro_attributes(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "linkAttributes", array()));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</a>";
        
        $__internal_ce3de718c0305973bd829d20a2ed599fd7ff80702e177103e14bc89749075e70->leave($__internal_ce3de718c0305973bd829d20a2ed599fd7ff80702e177103e14bc89749075e70_prof);

        
        $__internal_f8ef252b81fcecdda1adca0ba98d581842a8fa2ded08f29815a63354d22089b0->leave($__internal_f8ef252b81fcecdda1adca0ba98d581842a8fa2ded08f29815a63354d22089b0_prof);

    }

    // line 99
    public function block_spanElement($context, array $blocks = array())
    {
        $__internal_f3dfe87eb2a64c49682b55f9ed821eebe74a33f7eee992fa35c6511a834ce604 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f3dfe87eb2a64c49682b55f9ed821eebe74a33f7eee992fa35c6511a834ce604->enter($__internal_f3dfe87eb2a64c49682b55f9ed821eebe74a33f7eee992fa35c6511a834ce604_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        $__internal_18b9a5c982b2553412e63f51c4d7a272539c17ff3d793e2cb79de3167878ee88 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_18b9a5c982b2553412e63f51c4d7a272539c17ff3d793e2cb79de3167878ee88->enter($__internal_18b9a5c982b2553412e63f51c4d7a272539c17ff3d793e2cb79de3167878ee88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        $context["knp_menu"] = $this;
        echo "<span";
        echo $context["knp_menu"]->macro_attributes(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "labelAttributes", array()));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</span>";
        
        $__internal_18b9a5c982b2553412e63f51c4d7a272539c17ff3d793e2cb79de3167878ee88->leave($__internal_18b9a5c982b2553412e63f51c4d7a272539c17ff3d793e2cb79de3167878ee88_prof);

        
        $__internal_f3dfe87eb2a64c49682b55f9ed821eebe74a33f7eee992fa35c6511a834ce604->leave($__internal_f3dfe87eb2a64c49682b55f9ed821eebe74a33f7eee992fa35c6511a834ce604_prof);

    }

    // line 101
    public function block_label($context, array $blocks = array())
    {
        $__internal_fde656a34f9b7bde6ef22cd1f81714a2aecc8891db7fe6cefc5ce70c2fd5e2c0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fde656a34f9b7bde6ef22cd1f81714a2aecc8891db7fe6cefc5ce70c2fd5e2c0->enter($__internal_fde656a34f9b7bde6ef22cd1f81714a2aecc8891db7fe6cefc5ce70c2fd5e2c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_c803630ccd2e825be48bacee9910b21d13bdb7d7b3e09035f6969b93477024ea = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c803630ccd2e825be48bacee9910b21d13bdb7d7b3e09035f6969b93477024ea->enter($__internal_c803630ccd2e825be48bacee9910b21d13bdb7d7b3e09035f6969b93477024ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "allow_safe_labels", array()) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "getExtra", array(0 => "safe_label", 1 => false), "method"))) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array());
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array()), "html", null, true);
        }
        
        $__internal_c803630ccd2e825be48bacee9910b21d13bdb7d7b3e09035f6969b93477024ea->leave($__internal_c803630ccd2e825be48bacee9910b21d13bdb7d7b3e09035f6969b93477024ea_prof);

        
        $__internal_fde656a34f9b7bde6ef22cd1f81714a2aecc8891db7fe6cefc5ce70c2fd5e2c0->leave($__internal_fde656a34f9b7bde6ef22cd1f81714a2aecc8891db7fe6cefc5ce70c2fd5e2c0_prof);

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
            $__internal_9824cd1377dc1cd0d105025ff86dfbd9b044eed4d0e0d982accff3bc0d7e684a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_9824cd1377dc1cd0d105025ff86dfbd9b044eed4d0e0d982accff3bc0d7e684a->enter($__internal_9824cd1377dc1cd0d105025ff86dfbd9b044eed4d0e0d982accff3bc0d7e684a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_08c254283a6dd7cdec87fd4b3838cd6d5c0cadcfccd3812846d382cf2471ce3f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_08c254283a6dd7cdec87fd4b3838cd6d5c0cadcfccd3812846d382cf2471ce3f->enter($__internal_08c254283a6dd7cdec87fd4b3838cd6d5c0cadcfccd3812846d382cf2471ce3f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_08c254283a6dd7cdec87fd4b3838cd6d5c0cadcfccd3812846d382cf2471ce3f->leave($__internal_08c254283a6dd7cdec87fd4b3838cd6d5c0cadcfccd3812846d382cf2471ce3f_prof);

            
            $__internal_9824cd1377dc1cd0d105025ff86dfbd9b044eed4d0e0d982accff3bc0d7e684a->leave($__internal_9824cd1377dc1cd0d105025ff86dfbd9b044eed4d0e0d982accff3bc0d7e684a_prof);


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
