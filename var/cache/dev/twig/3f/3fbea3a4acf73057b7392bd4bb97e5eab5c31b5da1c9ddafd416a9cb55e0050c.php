<?php

/* knp_menu.html.twig */
class __TwigTemplate_c539a85634637e95add811ee956763ab43205f140eda22e2250c3ec65fad5abb extends Twig_Template
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
        $__internal_1438c73e22c16cb107ccf03c8313b4ab89a13634dcb98c0858b1cc97651b3c6f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1438c73e22c16cb107ccf03c8313b4ab89a13634dcb98c0858b1cc97651b3c6f->enter($__internal_1438c73e22c16cb107ccf03c8313b4ab89a13634dcb98c0858b1cc97651b3c6f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu.html.twig"));

        $__internal_24c54daf90f64b3f541105227e1dd9e45fed9365ab14ba7850111edf2f411a4d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_24c54daf90f64b3f541105227e1dd9e45fed9365ab14ba7850111edf2f411a4d->enter($__internal_24c54daf90f64b3f541105227e1dd9e45fed9365ab14ba7850111edf2f411a4d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1438c73e22c16cb107ccf03c8313b4ab89a13634dcb98c0858b1cc97651b3c6f->leave($__internal_1438c73e22c16cb107ccf03c8313b4ab89a13634dcb98c0858b1cc97651b3c6f_prof);

        
        $__internal_24c54daf90f64b3f541105227e1dd9e45fed9365ab14ba7850111edf2f411a4d->leave($__internal_24c54daf90f64b3f541105227e1dd9e45fed9365ab14ba7850111edf2f411a4d_prof);

    }

    // line 11
    public function block_compressed_root($context, array $blocks = array())
    {
        $__internal_3bd7d3445f42ecd23e0f0df6015399698370543e6447cce864c23e0c790ced54 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3bd7d3445f42ecd23e0f0df6015399698370543e6447cce864c23e0c790ced54->enter($__internal_3bd7d3445f42ecd23e0f0df6015399698370543e6447cce864c23e0c790ced54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "compressed_root"));

        $__internal_e2d6a2d6a430ba701c4ed72ed8195ba0e0fbc50d64246c5ea9bb8aab3b248ea9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e2d6a2d6a430ba701c4ed72ed8195ba0e0fbc50d64246c5ea9bb8aab3b248ea9->enter($__internal_e2d6a2d6a430ba701c4ed72ed8195ba0e0fbc50d64246c5ea9bb8aab3b248ea9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "compressed_root"));

        // line 12
        ob_start();
        // line 13
        $this->displayBlock("root", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_e2d6a2d6a430ba701c4ed72ed8195ba0e0fbc50d64246c5ea9bb8aab3b248ea9->leave($__internal_e2d6a2d6a430ba701c4ed72ed8195ba0e0fbc50d64246c5ea9bb8aab3b248ea9_prof);

        
        $__internal_3bd7d3445f42ecd23e0f0df6015399698370543e6447cce864c23e0c790ced54->leave($__internal_3bd7d3445f42ecd23e0f0df6015399698370543e6447cce864c23e0c790ced54_prof);

    }

    // line 17
    public function block_root($context, array $blocks = array())
    {
        $__internal_5b9f490f9770097f872c51e2b0a4c51f1de301c48aa2a937a7e9213dad7acb0f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5b9f490f9770097f872c51e2b0a4c51f1de301c48aa2a937a7e9213dad7acb0f->enter($__internal_5b9f490f9770097f872c51e2b0a4c51f1de301c48aa2a937a7e9213dad7acb0f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        $__internal_33c320022017e3ab0afef2fd89a1d995c5d98ec204a6fa8152cb26bdfe54e5c5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_33c320022017e3ab0afef2fd89a1d995c5d98ec204a6fa8152cb26bdfe54e5c5->enter($__internal_33c320022017e3ab0afef2fd89a1d995c5d98ec204a6fa8152cb26bdfe54e5c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "root"));

        // line 18
        $context["listAttributes"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "childrenAttributes", array());
        // line 19
        $this->displayBlock("list", $context, $blocks);
        
        $__internal_33c320022017e3ab0afef2fd89a1d995c5d98ec204a6fa8152cb26bdfe54e5c5->leave($__internal_33c320022017e3ab0afef2fd89a1d995c5d98ec204a6fa8152cb26bdfe54e5c5_prof);

        
        $__internal_5b9f490f9770097f872c51e2b0a4c51f1de301c48aa2a937a7e9213dad7acb0f->leave($__internal_5b9f490f9770097f872c51e2b0a4c51f1de301c48aa2a937a7e9213dad7acb0f_prof);

    }

    // line 22
    public function block_list($context, array $blocks = array())
    {
        $__internal_4f2f7c2d1c2e73ab11b4cc7015efe96da37aed5c01a2d43aed4270dd65e5b8a7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4f2f7c2d1c2e73ab11b4cc7015efe96da37aed5c01a2d43aed4270dd65e5b8a7->enter($__internal_4f2f7c2d1c2e73ab11b4cc7015efe96da37aed5c01a2d43aed4270dd65e5b8a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

        $__internal_2e6047421569c2450da43f6251ca9015db835f5f82fa1fd746abe35a3a438b21 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2e6047421569c2450da43f6251ca9015db835f5f82fa1fd746abe35a3a438b21->enter($__internal_2e6047421569c2450da43f6251ca9015db835f5f82fa1fd746abe35a3a438b21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "list"));

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
        
        $__internal_2e6047421569c2450da43f6251ca9015db835f5f82fa1fd746abe35a3a438b21->leave($__internal_2e6047421569c2450da43f6251ca9015db835f5f82fa1fd746abe35a3a438b21_prof);

        
        $__internal_4f2f7c2d1c2e73ab11b4cc7015efe96da37aed5c01a2d43aed4270dd65e5b8a7->leave($__internal_4f2f7c2d1c2e73ab11b4cc7015efe96da37aed5c01a2d43aed4270dd65e5b8a7_prof);

    }

    // line 31
    public function block_children($context, array $blocks = array())
    {
        $__internal_42431fa13c34058822e20fed87a7673b267cec0d048892f511a79bde00b86109 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_42431fa13c34058822e20fed87a7673b267cec0d048892f511a79bde00b86109->enter($__internal_42431fa13c34058822e20fed87a7673b267cec0d048892f511a79bde00b86109_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "children"));

        $__internal_1f73b0f599fb020e902f16ef9fd24b084ff992dbdf183bff0a074764eea31616 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1f73b0f599fb020e902f16ef9fd24b084ff992dbdf183bff0a074764eea31616->enter($__internal_1f73b0f599fb020e902f16ef9fd24b084ff992dbdf183bff0a074764eea31616_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "children"));

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
        
        $__internal_1f73b0f599fb020e902f16ef9fd24b084ff992dbdf183bff0a074764eea31616->leave($__internal_1f73b0f599fb020e902f16ef9fd24b084ff992dbdf183bff0a074764eea31616_prof);

        
        $__internal_42431fa13c34058822e20fed87a7673b267cec0d048892f511a79bde00b86109->leave($__internal_42431fa13c34058822e20fed87a7673b267cec0d048892f511a79bde00b86109_prof);

    }

    // line 51
    public function block_item($context, array $blocks = array())
    {
        $__internal_76cff3c9759492fc19eb5774bfbbc712e590aaba81b80432996d533cfdfb04c2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_76cff3c9759492fc19eb5774bfbbc712e590aaba81b80432996d533cfdfb04c2->enter($__internal_76cff3c9759492fc19eb5774bfbbc712e590aaba81b80432996d533cfdfb04c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

        $__internal_1e32ac7245366b106db5cf9556c22cbc84a235a160e22ab8be29d0250566b155 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1e32ac7245366b106db5cf9556c22cbc84a235a160e22ab8be29d0250566b155->enter($__internal_1e32ac7245366b106db5cf9556c22cbc84a235a160e22ab8be29d0250566b155_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "item"));

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
        
        $__internal_1e32ac7245366b106db5cf9556c22cbc84a235a160e22ab8be29d0250566b155->leave($__internal_1e32ac7245366b106db5cf9556c22cbc84a235a160e22ab8be29d0250566b155_prof);

        
        $__internal_76cff3c9759492fc19eb5774bfbbc712e590aaba81b80432996d533cfdfb04c2->leave($__internal_76cff3c9759492fc19eb5774bfbbc712e590aaba81b80432996d533cfdfb04c2_prof);

    }

    // line 97
    public function block_linkElement($context, array $blocks = array())
    {
        $__internal_c981b211b80fa234d1b7b378023687fdef0bb7f86f47174a99cca94ab4b5c715 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c981b211b80fa234d1b7b378023687fdef0bb7f86f47174a99cca94ab4b5c715->enter($__internal_c981b211b80fa234d1b7b378023687fdef0bb7f86f47174a99cca94ab4b5c715_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        $__internal_e60fdac0f1b8c7c24de3766056634399f1881e02ecefca0287979699b94c2e92 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e60fdac0f1b8c7c24de3766056634399f1881e02ecefca0287979699b94c2e92->enter($__internal_e60fdac0f1b8c7c24de3766056634399f1881e02ecefca0287979699b94c2e92_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "linkElement"));

        $context["knp_menu"] = $this;
        echo "<a href=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "uri", array()), "html", null, true);
        echo "\"";
        echo $context["knp_menu"]->macro_attributes(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "linkAttributes", array()));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</a>";
        
        $__internal_e60fdac0f1b8c7c24de3766056634399f1881e02ecefca0287979699b94c2e92->leave($__internal_e60fdac0f1b8c7c24de3766056634399f1881e02ecefca0287979699b94c2e92_prof);

        
        $__internal_c981b211b80fa234d1b7b378023687fdef0bb7f86f47174a99cca94ab4b5c715->leave($__internal_c981b211b80fa234d1b7b378023687fdef0bb7f86f47174a99cca94ab4b5c715_prof);

    }

    // line 99
    public function block_spanElement($context, array $blocks = array())
    {
        $__internal_d8d1d95082a1fd57856b3c5bcdc0a2fe2a2bea3333c5f643ed4128ad8d1e5067 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d8d1d95082a1fd57856b3c5bcdc0a2fe2a2bea3333c5f643ed4128ad8d1e5067->enter($__internal_d8d1d95082a1fd57856b3c5bcdc0a2fe2a2bea3333c5f643ed4128ad8d1e5067_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        $__internal_b20c3b41884e82cb6156f5daf30c49475969b397c931b52433c5f45e831daf57 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b20c3b41884e82cb6156f5daf30c49475969b397c931b52433c5f45e831daf57->enter($__internal_b20c3b41884e82cb6156f5daf30c49475969b397c931b52433c5f45e831daf57_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "spanElement"));

        $context["knp_menu"] = $this;
        echo "<span";
        echo $context["knp_menu"]->macro_attributes(twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "labelAttributes", array()));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</span>";
        
        $__internal_b20c3b41884e82cb6156f5daf30c49475969b397c931b52433c5f45e831daf57->leave($__internal_b20c3b41884e82cb6156f5daf30c49475969b397c931b52433c5f45e831daf57_prof);

        
        $__internal_d8d1d95082a1fd57856b3c5bcdc0a2fe2a2bea3333c5f643ed4128ad8d1e5067->leave($__internal_d8d1d95082a1fd57856b3c5bcdc0a2fe2a2bea3333c5f643ed4128ad8d1e5067_prof);

    }

    // line 101
    public function block_label($context, array $blocks = array())
    {
        $__internal_2c4902ecca4602278f7d404bfdcbd46a81489f7d8241f961003a97dd0e61512b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2c4902ecca4602278f7d404bfdcbd46a81489f7d8241f961003a97dd0e61512b->enter($__internal_2c4902ecca4602278f7d404bfdcbd46a81489f7d8241f961003a97dd0e61512b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        $__internal_cf6fb55276f7f585a3c5a0bcc117f9cc6579fac92d27206f762ab669d037363e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cf6fb55276f7f585a3c5a0bcc117f9cc6579fac92d27206f762ab669d037363e->enter($__internal_cf6fb55276f7f585a3c5a0bcc117f9cc6579fac92d27206f762ab669d037363e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "label"));

        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["options"] ?? null), "allow_safe_labels", array()) && twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "getExtra", array(0 => "safe_label", 1 => false), "method"))) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array());
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "label", array()), "html", null, true);
        }
        
        $__internal_cf6fb55276f7f585a3c5a0bcc117f9cc6579fac92d27206f762ab669d037363e->leave($__internal_cf6fb55276f7f585a3c5a0bcc117f9cc6579fac92d27206f762ab669d037363e_prof);

        
        $__internal_2c4902ecca4602278f7d404bfdcbd46a81489f7d8241f961003a97dd0e61512b->leave($__internal_2c4902ecca4602278f7d404bfdcbd46a81489f7d8241f961003a97dd0e61512b_prof);

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
            $__internal_0e6846ddbfc4f966d78fc78d9042f86897f1fc461ae1a1c5a95b5df097b62bc7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_0e6846ddbfc4f966d78fc78d9042f86897f1fc461ae1a1c5a95b5df097b62bc7->enter($__internal_0e6846ddbfc4f966d78fc78d9042f86897f1fc461ae1a1c5a95b5df097b62bc7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

            $__internal_4534c0b587e6ff63c6399a7a1e8cc503c61a35530fbddf71c5a037d6073dae70 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_4534c0b587e6ff63c6399a7a1e8cc503c61a35530fbddf71c5a037d6073dae70->enter($__internal_4534c0b587e6ff63c6399a7a1e8cc503c61a35530fbddf71c5a037d6073dae70_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "attributes"));

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
            
            $__internal_4534c0b587e6ff63c6399a7a1e8cc503c61a35530fbddf71c5a037d6073dae70->leave($__internal_4534c0b587e6ff63c6399a7a1e8cc503c61a35530fbddf71c5a037d6073dae70_prof);

            
            $__internal_0e6846ddbfc4f966d78fc78d9042f86897f1fc461ae1a1c5a95b5df097b62bc7->leave($__internal_0e6846ddbfc4f966d78fc78d9042f86897f1fc461ae1a1c5a95b5df097b62bc7_prof);


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
