<?php

/* ::base.html.twig */
class __TwigTemplate_fe619de58aceb639095863c014ce4ba16fc39b42ab571929718e31bd2726b802 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'overraid_body' => array($this, 'block_overraid_body'),
            'body_class' => array($this, 'block_body_class'),
            'content' => array($this, 'block_content'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c30254f89157863635130829b47d1e89a4b2bcf65c35315b8b4dd6fdf3452ab4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c30254f89157863635130829b47d1e89a4b2bcf65c35315b8b4dd6fdf3452ab4->enter($__internal_c30254f89157863635130829b47d1e89a4b2bcf65c35315b8b4dd6fdf3452ab4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        $__internal_9b03d9f48f803913e389cf59e654e7ce394bc8d57eada0f91bed132108a1755d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9b03d9f48f803913e389cf59e654e7ce394bc8d57eada0f91bed132108a1755d->enter($__internal_9b03d9f48f803913e389cf59e654e7ce394bc8d57eada0f91bed132108a1755d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 7
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "environment", array()) != "dev")) {
            // line 8
            echo "        ";
            // line 9
            echo "        ";
            // line 10
            echo "            ";
            // line 11
            echo "        ";
            // line 12
            echo "    ";
        }
        // line 13
        echo "
    ";
        // line 14
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 23
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\"/>
</head>

";
        // line 27
        $this->displayBlock('overraid_body', $context, $blocks);
        // line 192
        echo "</html>
";
        
        $__internal_c30254f89157863635130829b47d1e89a4b2bcf65c35315b8b4dd6fdf3452ab4->leave($__internal_c30254f89157863635130829b47d1e89a4b2bcf65c35315b8b4dd6fdf3452ab4_prof);

        
        $__internal_9b03d9f48f803913e389cf59e654e7ce394bc8d57eada0f91bed132108a1755d->leave($__internal_9b03d9f48f803913e389cf59e654e7ce394bc8d57eada0f91bed132108a1755d_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_af52b5259aebd67b26e36678dde78f6a3ca25d2f088c885db37256c8cf96c8bb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_af52b5259aebd67b26e36678dde78f6a3ca25d2f088c885db37256c8cf96c8bb->enter($__internal_af52b5259aebd67b26e36678dde78f6a3ca25d2f088c885db37256c8cf96c8bb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_bebca30fa8c156740ed089d4508448fc7e09e57a52aa82bf7216a90e427c3002 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bebca30fa8c156740ed089d4508448fc7e09e57a52aa82bf7216a90e427c3002->enter($__internal_bebca30fa8c156740ed089d4508448fc7e09e57a52aa82bf7216a90e427c3002_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Gyman.pl";
        
        $__internal_bebca30fa8c156740ed089d4508448fc7e09e57a52aa82bf7216a90e427c3002->leave($__internal_bebca30fa8c156740ed089d4508448fc7e09e57a52aa82bf7216a90e427c3002_prof);

        
        $__internal_af52b5259aebd67b26e36678dde78f6a3ca25d2f088c885db37256c8cf96c8bb->leave($__internal_af52b5259aebd67b26e36678dde78f6a3ca25d2f088c885db37256c8cf96c8bb_prof);

    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_47a88cb09e3a7e6d7e5b07f8a804219836fadb4f0250ab4a3ebebb1d2dd847a5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_47a88cb09e3a7e6d7e5b07f8a804219836fadb4f0250ab4a3ebebb1d2dd847a5->enter($__internal_47a88cb09e3a7e6d7e5b07f8a804219836fadb4f0250ab4a3ebebb1d2dd847a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_a2ab9803ead1c33cc2bcf516a741d09faa49d6eb0a8e7c3645954a636c0f1fa1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a2ab9803ead1c33cc2bcf516a741d09faa49d6eb0a8e7c3645954a636c0f1fa1->enter($__internal_a2ab9803ead1c33cc2bcf516a741d09faa49d6eb0a8e7c3645954a636c0f1fa1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 15
        echo "        ";
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "environment", array()) == "prod")) {
            // line 16
            echo "            <link rel=\"stylesheet\" href=\"/css/vendors.min.css\" />
            <link rel=\"stylesheet\" href=\"/css/project.min.css\" />
        ";
        } else {
            // line 19
            echo "            <link rel=\"stylesheet\" href=\"/css/vendors.css\" />
            <link rel=\"stylesheet\" href=\"/css/project.css\" />
        ";
        }
        // line 22
        echo "    ";
        
        $__internal_a2ab9803ead1c33cc2bcf516a741d09faa49d6eb0a8e7c3645954a636c0f1fa1->leave($__internal_a2ab9803ead1c33cc2bcf516a741d09faa49d6eb0a8e7c3645954a636c0f1fa1_prof);

        
        $__internal_47a88cb09e3a7e6d7e5b07f8a804219836fadb4f0250ab4a3ebebb1d2dd847a5->leave($__internal_47a88cb09e3a7e6d7e5b07f8a804219836fadb4f0250ab4a3ebebb1d2dd847a5_prof);

    }

    // line 27
    public function block_overraid_body($context, array $blocks = array())
    {
        $__internal_c74951252d51ec4963156d86775276278741a67f43b9fbc3a812c12446485a53 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c74951252d51ec4963156d86775276278741a67f43b9fbc3a812c12446485a53->enter($__internal_c74951252d51ec4963156d86775276278741a67f43b9fbc3a812c12446485a53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

        $__internal_a9f9a7bcd2082e2e29a17e36c9a47dc5dbc8c8f2caa293b87516d8d960e459dd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a9f9a7bcd2082e2e29a17e36c9a47dc5dbc8c8f2caa293b87516d8d960e459dd->enter($__internal_a9f9a7bcd2082e2e29a17e36c9a47dc5dbc8c8f2caa293b87516d8d960e459dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

        // line 28
        echo "    <body class=\"";
        $this->displayBlock('body_class', $context, $blocks);
        echo "\">
    <div id=\"spinner\">Ładuję...</div>

    ";
        // line 32
        echo "    ";
        // line 33
        echo "
    ";
        // line 34
        if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()))) {
            // line 35
            echo "        ";
            echo twig_include($this->env, $context, "navigation.html.twig");
            echo "
    ";
        }
        // line 37
        echo "
    <div id=\"header\">
        <div class=\"navbar\">
            <div class=\"navbar-inner\">
                <div class=\"container-fluid\">

                    <a href=\"";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_app_default_index");
        echo "\" class=\"brand\">
                        ";
        // line 44
        if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "logo", array()))) {
            // line 45
            echo "                            ";
            $context["logo"] = ((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "subdomain", array()), "name", array()) . "/") . twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "details", array()), "logo", array()));
            // line 46
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl(("uploads/gallery/" . ($context["logo"] ?? null))), "html", null, true);
            echo "\" id=\"applogo\" />
                        ";
        } else {
            // line 48
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/gymanapp/images/gyman_logo.png"), "html", null, true);
            echo "\" id=\"applogo\" />
                        ";
        }
        // line 50
        echo "                        <span id=\"appname\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "name", array()), "html", null, true);
        echo "</span>
                    </a>

                    ";
        // line 53
        if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()))) {
            // line 54
            echo "                    <div class=\"nav-no-collapse\">
                        <ul class=\"nav pull-right usernav\">
                            ";
            // line 57
            echo "                                ";
            // line 58
            echo "                            ";
            // line 59
            echo "
                            ";
            // line 60
            if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_MODERATOR")) {
                // line 61
                echo "                            <li>
                                <a href=\"";
                // line 62
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_members_search_form");
                echo "\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> ";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("search"), "html", null, true);
                echo "</span>
                                </a>
                            </li>
                            ";
            }
            // line 68
            echo "
                            <li>
                                <a href=\"";
            // line 70
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_dashboard_index");
            echo "\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> ";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("dashboard"), "html", null, true);
            echo "</span>
                                </a>
                            </li>

                            ";
            // line 76
            if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_MODERATOR")) {
                // line 77
                echo "                            <li>
                                <a href=\"";
                // line 78
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_settings");
                echo "\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> ";
                // line 80
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("open_settings"), "html", null, true);
                echo "</span>
                                </a>
                            </li>
                            ";
            }
            // line 84
            echo "
                            <li>
                                <a href=\"";
            // line 86
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_profile_show");
            echo "\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\">
                                        ";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.logged_in_as", array("%username%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()), "username", array()))), "html", null, true);
            echo "
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href=\"";
            // line 95
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
            echo "\">wyloguj</a>
                            </li>

                            ";
            // line 114
            echo "                        </ul>
                    </div>
                    ";
        } else {
            // line 117
            echo "                    <div class=\"nav-no-collapse\">
                        <ul class=\"nav pull-right usernav\">
                            <li>
                                <a href=\"";
            // line 120
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_login");
            echo "\">zaloguj</a>
                            </li>
                        </ul>
                    </div>
                    ";
        }
        // line 125
        echo "                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
    </div>
    <!-- end header -->

    <div id=\"wrapper\">
        <div id=\"content\" class=\"clearfix\">

            <div class=\"contentwrapper\">
                ";
        // line 136
        $this->displayBlock('content', $context, $blocks);
        // line 139
        echo "
            </div>
            <!-- End contentwrapper -->

        </div>
        <!-- End #content -->
    </div>
    <!-- end wrapper -->

    ";
        // line 148
        $this->displayBlock('javascripts', $context, $blocks);
        // line 190
        echo "    </body>
";
        
        $__internal_a9f9a7bcd2082e2e29a17e36c9a47dc5dbc8c8f2caa293b87516d8d960e459dd->leave($__internal_a9f9a7bcd2082e2e29a17e36c9a47dc5dbc8c8f2caa293b87516d8d960e459dd_prof);

        
        $__internal_c74951252d51ec4963156d86775276278741a67f43b9fbc3a812c12446485a53->leave($__internal_c74951252d51ec4963156d86775276278741a67f43b9fbc3a812c12446485a53_prof);

    }

    // line 28
    public function block_body_class($context, array $blocks = array())
    {
        $__internal_ee0b875ed3a5dc42817b96485b03fdbfd797b62d0c3057a3033c57e4986fc95c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ee0b875ed3a5dc42817b96485b03fdbfd797b62d0c3057a3033c57e4986fc95c->enter($__internal_ee0b875ed3a5dc42817b96485b03fdbfd797b62d0c3057a3033c57e4986fc95c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_15adf0375232c61f127f8884e80ba7d45a9ac0f862c9e9f444dd14b33b2457bf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_15adf0375232c61f127f8884e80ba7d45a9ac0f862c9e9f444dd14b33b2457bf->enter($__internal_15adf0375232c61f127f8884e80ba7d45a9ac0f862c9e9f444dd14b33b2457bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        
        $__internal_15adf0375232c61f127f8884e80ba7d45a9ac0f862c9e9f444dd14b33b2457bf->leave($__internal_15adf0375232c61f127f8884e80ba7d45a9ac0f862c9e9f444dd14b33b2457bf_prof);

        
        $__internal_ee0b875ed3a5dc42817b96485b03fdbfd797b62d0c3057a3033c57e4986fc95c->leave($__internal_ee0b875ed3a5dc42817b96485b03fdbfd797b62d0c3057a3033c57e4986fc95c_prof);

    }

    // line 136
    public function block_content($context, array $blocks = array())
    {
        $__internal_e8d52ec613b13f71dbd2dab57edac7ac38f6d3977518a3efb221d127d1233f7f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e8d52ec613b13f71dbd2dab57edac7ac38f6d3977518a3efb221d127d1233f7f->enter($__internal_e8d52ec613b13f71dbd2dab57edac7ac38f6d3977518a3efb221d127d1233f7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_eccf436a1001524d11f15eb3d4940a4d8171dd912884e7db4ad6c8bea0170319 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_eccf436a1001524d11f15eb3d4940a4d8171dd912884e7db4ad6c8bea0170319->enter($__internal_eccf436a1001524d11f15eb3d4940a4d8171dd912884e7db4ad6c8bea0170319_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 137
        echo "                    ";
        $this->displayBlock('body', $context, $blocks);
        // line 138
        echo "                ";
        
        $__internal_eccf436a1001524d11f15eb3d4940a4d8171dd912884e7db4ad6c8bea0170319->leave($__internal_eccf436a1001524d11f15eb3d4940a4d8171dd912884e7db4ad6c8bea0170319_prof);

        
        $__internal_e8d52ec613b13f71dbd2dab57edac7ac38f6d3977518a3efb221d127d1233f7f->leave($__internal_e8d52ec613b13f71dbd2dab57edac7ac38f6d3977518a3efb221d127d1233f7f_prof);

    }

    // line 137
    public function block_body($context, array $blocks = array())
    {
        $__internal_f55a148eae10ce72f4f7d3f6c8a061d6c1ddb884392e885445b5de1bd8ebd553 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f55a148eae10ce72f4f7d3f6c8a061d6c1ddb884392e885445b5de1bd8ebd553->enter($__internal_f55a148eae10ce72f4f7d3f6c8a061d6c1ddb884392e885445b5de1bd8ebd553_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_56ae144082218e2f7c32f562963c5f94993a87fb2fd6f1845a9d0cecbf931dda = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_56ae144082218e2f7c32f562963c5f94993a87fb2fd6f1845a9d0cecbf931dda->enter($__internal_56ae144082218e2f7c32f562963c5f94993a87fb2fd6f1845a9d0cecbf931dda_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_56ae144082218e2f7c32f562963c5f94993a87fb2fd6f1845a9d0cecbf931dda->leave($__internal_56ae144082218e2f7c32f562963c5f94993a87fb2fd6f1845a9d0cecbf931dda_prof);

        
        $__internal_f55a148eae10ce72f4f7d3f6c8a061d6c1ddb884392e885445b5de1bd8ebd553->leave($__internal_f55a148eae10ce72f4f7d3f6c8a061d6c1ddb884392e885445b5de1bd8ebd553_prof);

    }

    // line 148
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_a228fbd7e834bfdd3bff9a95be95f12de94ea7f9b005639a64756da79efb59df = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a228fbd7e834bfdd3bff9a95be95f12de94ea7f9b005639a64756da79efb59df->enter($__internal_a228fbd7e834bfdd3bff9a95be95f12de94ea7f9b005639a64756da79efb59df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_d3ea24d489a78c1cde197daf9617d58c560973228b37bf185a9968317537a85b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d3ea24d489a78c1cde197daf9617d58c560973228b37bf185a9968317537a85b->enter($__internal_d3ea24d489a78c1cde197daf9617d58c560973228b37bf185a9968317537a85b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 149
        echo "        ";
        // line 150
        echo "            ";
        // line 151
        echo "            ";
        // line 152
        echo "        ";
        // line 153
        echo "            <script type=\"text/javascript\" src=\"/js/vendors.js\"></script>
            <script type=\"text/javascript\" src=\"/js/project.js\"></script>
        ";
        // line 156
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 157
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>

        ";
        // line 159
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "has", array(0 => "notice"), "method")) {
            // line 160
            echo "        <script>
            ";
            // line 161
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 162
                echo "            \$.pnotify({
                title: '";
                // line 163
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("notification_caption"), "html", null, true);
                echo "',
                text: '";
                // line 164
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_escape_filter($this->env, $context["flashMessage"], "js")), "html", null, true);
                echo "',
                icon: false,
                opacity: 0.95,
                sticker: false,
                history: false
            });
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 171
            echo "        </script>
        ";
        }
        // line 173
        echo "
        <script>
            \$(function () {
                \$(\"#qLoverlay,#qLbar\").fadeOut(750);

                \$(document).on(\"click\", \"a.openNavigation\", function (e) {
                    e.preventDefault();
                    \$(\"#overlayNavigation\").fadeIn();
                });

                \$(document).on(\"click\", \"#overlayNavigation, #closeOverlayNavigation\", function () {
                    \$(\"#overlayNavigation\").fadeOut();
                });
            });
        </script>

    ";
        
        $__internal_d3ea24d489a78c1cde197daf9617d58c560973228b37bf185a9968317537a85b->leave($__internal_d3ea24d489a78c1cde197daf9617d58c560973228b37bf185a9968317537a85b_prof);

        
        $__internal_a228fbd7e834bfdd3bff9a95be95f12de94ea7f9b005639a64756da79efb59df->leave($__internal_a228fbd7e834bfdd3bff9a95be95f12de94ea7f9b005639a64756da79efb59df_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  460 => 173,  456 => 171,  443 => 164,  439 => 163,  436 => 162,  432 => 161,  429 => 160,  427 => 159,  422 => 157,  417 => 156,  413 => 153,  411 => 152,  409 => 151,  407 => 150,  405 => 149,  396 => 148,  379 => 137,  369 => 138,  366 => 137,  357 => 136,  340 => 28,  329 => 190,  327 => 148,  316 => 139,  314 => 136,  301 => 125,  293 => 120,  288 => 117,  283 => 114,  277 => 95,  268 => 89,  262 => 86,  258 => 84,  251 => 80,  246 => 78,  243 => 77,  241 => 76,  234 => 72,  229 => 70,  225 => 68,  218 => 64,  213 => 62,  210 => 61,  208 => 60,  205 => 59,  203 => 58,  201 => 57,  197 => 54,  195 => 53,  188 => 50,  182 => 48,  176 => 46,  173 => 45,  171 => 44,  167 => 43,  159 => 37,  153 => 35,  151 => 34,  148 => 33,  146 => 32,  139 => 28,  130 => 27,  120 => 22,  115 => 19,  110 => 16,  107 => 15,  98 => 14,  80 => 5,  69 => 192,  67 => 27,  61 => 23,  59 => 14,  56 => 13,  53 => 12,  51 => 11,  49 => 10,  47 => 9,  45 => 8,  43 => 7,  38 => 5,  32 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>
    <title>{% block title %}Gyman.pl{% endblock %}</title>

    {% if app.environment != \"dev\" %}
        {#<script src=\"//cdn.ravenjs.com/1.1.2/jquery,native/raven.min.js\"></script>#}
        {#<script>#}
            {#Raven.config('{{ sentry_url }}');#}
        {#</script>#}
    {% endif %}

    {% block stylesheets %}
        {% if app.environment == \"prod\" %}
            <link rel=\"stylesheet\" href=\"/css/vendors.min.css\" />
            <link rel=\"stylesheet\" href=\"/css/project.min.css\" />
        {% else %}
            <link rel=\"stylesheet\" href=\"/css/vendors.css\" />
            <link rel=\"stylesheet\" href=\"/css/project.css\" />
        {%  endif %}
    {% endblock %}

    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\"/>
</head>

{% block overraid_body %}
    <body class=\"{% block body_class %}{% endblock %}\">
    <div id=\"spinner\">Ładuję...</div>

    {#<div id=\"qLoverlay\"></div>#}
    {#<div id=\"qLbar\"></div>#}

    {% if app.user is not null %}
        {{ include(\"navigation.html.twig\") }}
    {% endif %}

    <div id=\"header\">
        <div class=\"navbar\">
            <div class=\"navbar-inner\">
                <div class=\"container-fluid\">

                    <a href=\"{{ path(\"gyman_app_default_index\") }}\" class=\"brand\">
                        {% if club.details.logo is not null %}
                            {% set logo = club.subdomain.name ~ '/' ~ club.details.logo %}
                            <img src=\"{{ asset('uploads/gallery/' ~ logo) }}\" id=\"applogo\" />
                        {% else %}
                            <img src=\"{{ asset('bundles/gymanapp/images/gyman_logo.png') }}\" id=\"applogo\" />
                        {% endif %}
                        <span id=\"appname\">{{ club.name }}</span>
                    </a>

                    {% if app.user is not null %}
                    <div class=\"nav-no-collapse\">
                        <ul class=\"nav pull-right usernav\">
                            {#<li>#}
                                {#{{ render(controller(\"GymanMultiDatabaseBundle:Default:switchClub\")) }}#}
                            {#</li>#}

                            {% if is_granted(\"ROLE_MODERATOR\") %}
                            <li>
                                <a href=\"{{ path('gyman_members_search_form') }}\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> {{ 'search'|trans }}</span>
                                </a>
                            </li>
                            {% endif %}

                            <li>
                                <a href=\"{{ path('gyman_dashboard_index') }}\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> {{ 'dashboard'|trans }}</span>
                                </a>
                            </li>

                            {% if is_granted(\"ROLE_MODERATOR\") %}
                            <li>
                                <a href=\"{{ path(\"gyman_settings\") }}\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> {{ 'open_settings'|trans }}</span>
                                </a>
                            </li>
                            {% endif %}

                            <li>
                                <a href=\"{{ path(\"fos_user_profile_show\") }}\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\">
                                        {{ 'layout.logged_in_as'|trans({'%username%' : app.user.username}) }}
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href=\"{{ path(\"fos_user_security_logout\") }}\">wyloguj</a>
                            </li>

                            {# todo: przywrócić!!!
                            {% if is_granted(\"ROLE_ADMIN\") %}
                            <li>
                                <a href=\"{{ path(\"gyman_dashboard_index\") }}\">
                                    <span class=\"icon16 icomoon-icon-equalizer-2\"></span>
                                    <span class=\"txt\"> {{ 'dashboard_button'|trans }}</span>
                                </a>
                            </li>
                            {% endif %}
                            <li>
                                <a href=\"#\" class=\"openNavigation\">
                                    <span class=\"icon16 icomoon-icon-exit\"></span>
                                    <span class=\"txt\"> {{ 'open_navigation'|trans }}</span>
                                </a>
                            </li>
                            #}
                        </ul>
                    </div>
                    {% else %}
                    <div class=\"nav-no-collapse\">
                        <ul class=\"nav pull-right usernav\">
                            <li>
                                <a href=\"{{ path(\"fos_user_security_login\") }}\">zaloguj</a>
                            </li>
                        </ul>
                    </div>
                    {% endif %}
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
    </div>
    <!-- end header -->

    <div id=\"wrapper\">
        <div id=\"content\" class=\"clearfix\">

            <div class=\"contentwrapper\">
                {% block content %}
                    {% block body %}{% endblock %}
                {% endblock content %}

            </div>
            <!-- End contentwrapper -->

        </div>
        <!-- End #content -->
    </div>
    <!-- end wrapper -->

    {% block javascripts %}
        {#{% if app.environment == \"prod\" %}#}
            {#<script type=\"text/javascript\" src=\"/js/vendors.min.js\"></script>#}
            {#<script type=\"text/javascript\" src=\"/js/project.min.js\"></script>#}
        {#{% else %}#}
            <script type=\"text/javascript\" src=\"/js/vendors.js\"></script>
            <script type=\"text/javascript\" src=\"/js/project.js\"></script>
        {#{% endif %}#}
        <script src=\"{{ asset('bundles/fosjsrouting/js/router.js') }}\"></script>
        <script src=\"{{ path('fos_js_routing_js', {\"callback\": \"fos.Router.setData\"}) }}\"></script>

        {% if app.session.flashbag.has('notice') %}
        <script>
            {% for flashMessage in app.session.flashbag.get('notice') %}
            \$.pnotify({
                title: '{{ 'notification_caption'|trans }}',
                text: '{{ flashMessage|e('js')|trans }}',
                icon: false,
                opacity: 0.95,
                sticker: false,
                history: false
            });
            {% endfor %}
        </script>
        {% endif %}

        <script>
            \$(function () {
                \$(\"#qLoverlay,#qLbar\").fadeOut(750);

                \$(document).on(\"click\", \"a.openNavigation\", function (e) {
                    e.preventDefault();
                    \$(\"#overlayNavigation\").fadeIn();
                });

                \$(document).on(\"click\", \"#overlayNavigation, #closeOverlayNavigation\", function () {
                    \$(\"#overlayNavigation\").fadeOut();
                });
            });
        </script>

    {% endblock javascripts %}
    </body>
{% endblock overraid_body %}
</html>
", "::base.html.twig", "/vagrant/app/Resources/views/base.html.twig");
    }
}
