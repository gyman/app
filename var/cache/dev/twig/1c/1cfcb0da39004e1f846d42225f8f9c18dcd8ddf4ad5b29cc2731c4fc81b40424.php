<?php

/* ::base.html.twig */
class __TwigTemplate_a87fee5c9f52484a1bbf0be3c7c178523b0a0de8f1fda681d9b6c7f9d8a45a6a extends Twig_Template
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
        $__internal_6f9352f0f7584cb166ea54585dc75fec784933fbff5ddcb2b7b5f81f22465272 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6f9352f0f7584cb166ea54585dc75fec784933fbff5ddcb2b7b5f81f22465272->enter($__internal_6f9352f0f7584cb166ea54585dc75fec784933fbff5ddcb2b7b5f81f22465272_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        $__internal_241ccc0a9bcc3c5bf3b3bcec5f69733818ab7468adfb39015ae421ddbd06e196 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_241ccc0a9bcc3c5bf3b3bcec5f69733818ab7468adfb39015ae421ddbd06e196->enter($__internal_241ccc0a9bcc3c5bf3b3bcec5f69733818ab7468adfb39015ae421ddbd06e196_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

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
        // line 190
        echo "</html>
";
        
        $__internal_6f9352f0f7584cb166ea54585dc75fec784933fbff5ddcb2b7b5f81f22465272->leave($__internal_6f9352f0f7584cb166ea54585dc75fec784933fbff5ddcb2b7b5f81f22465272_prof);

        
        $__internal_241ccc0a9bcc3c5bf3b3bcec5f69733818ab7468adfb39015ae421ddbd06e196->leave($__internal_241ccc0a9bcc3c5bf3b3bcec5f69733818ab7468adfb39015ae421ddbd06e196_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_805e64e54cc0ab5b7fa136271980d365eb85c46a644da996c6e9801cd1b56681 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_805e64e54cc0ab5b7fa136271980d365eb85c46a644da996c6e9801cd1b56681->enter($__internal_805e64e54cc0ab5b7fa136271980d365eb85c46a644da996c6e9801cd1b56681_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_ccf07c0e3a93ecbbf0493351260322721d13c395d7822eed82d9f0b7a298320f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ccf07c0e3a93ecbbf0493351260322721d13c395d7822eed82d9f0b7a298320f->enter($__internal_ccf07c0e3a93ecbbf0493351260322721d13c395d7822eed82d9f0b7a298320f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Gyman.pl";
        
        $__internal_ccf07c0e3a93ecbbf0493351260322721d13c395d7822eed82d9f0b7a298320f->leave($__internal_ccf07c0e3a93ecbbf0493351260322721d13c395d7822eed82d9f0b7a298320f_prof);

        
        $__internal_805e64e54cc0ab5b7fa136271980d365eb85c46a644da996c6e9801cd1b56681->leave($__internal_805e64e54cc0ab5b7fa136271980d365eb85c46a644da996c6e9801cd1b56681_prof);

    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_fb12bbcda3a3c51a3f3661baf1ba3059b95a62bddb3d02d7e40bc7a53f724143 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fb12bbcda3a3c51a3f3661baf1ba3059b95a62bddb3d02d7e40bc7a53f724143->enter($__internal_fb12bbcda3a3c51a3f3661baf1ba3059b95a62bddb3d02d7e40bc7a53f724143_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_98c769cc1813992ad0650faac021e1d8ea21976c2158b21e40f6922aac1b29a9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_98c769cc1813992ad0650faac021e1d8ea21976c2158b21e40f6922aac1b29a9->enter($__internal_98c769cc1813992ad0650faac021e1d8ea21976c2158b21e40f6922aac1b29a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

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
        
        $__internal_98c769cc1813992ad0650faac021e1d8ea21976c2158b21e40f6922aac1b29a9->leave($__internal_98c769cc1813992ad0650faac021e1d8ea21976c2158b21e40f6922aac1b29a9_prof);

        
        $__internal_fb12bbcda3a3c51a3f3661baf1ba3059b95a62bddb3d02d7e40bc7a53f724143->leave($__internal_fb12bbcda3a3c51a3f3661baf1ba3059b95a62bddb3d02d7e40bc7a53f724143_prof);

    }

    // line 27
    public function block_overraid_body($context, array $blocks = array())
    {
        $__internal_12d7db56ae8926bea68ff58a147cf8d6d00ae88eaa4464c8a1d6f3c2585724ee = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_12d7db56ae8926bea68ff58a147cf8d6d00ae88eaa4464c8a1d6f3c2585724ee->enter($__internal_12d7db56ae8926bea68ff58a147cf8d6d00ae88eaa4464c8a1d6f3c2585724ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

        $__internal_57ff0377a9e03c78ad0c12c400fab123a01eec5bd728505f9c76215ab785c584 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_57ff0377a9e03c78ad0c12c400fab123a01eec5bd728505f9c76215ab785c584->enter($__internal_57ff0377a9e03c78ad0c12c400fab123a01eec5bd728505f9c76215ab785c584_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

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
            echo "\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["club"] ?? null), "name", array()), "html", null, true);
            echo "\" />
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
                                    <span class=\"txt\"> ";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.logged_in_as", array("%username%" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "user", array()), "username", array()))), "html", null, true);
            echo "</span>
                                </a>
                            </li>

                            <li>
                                <a href=\"";
            // line 93
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
            echo "\">wyloguj</a>
                            </li>

                            ";
            // line 112
            echo "                        </ul>
                    </div>
                    ";
        } else {
            // line 115
            echo "                    <div class=\"nav-no-collapse\">
                        <ul class=\"nav pull-right usernav\">
                            <li>
                                <a href=\"";
            // line 118
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_login");
            echo "\">zaloguj</a>
                            </li>
                        </ul>
                    </div>
                    ";
        }
        // line 123
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
        // line 134
        $this->displayBlock('content', $context, $blocks);
        // line 137
        echo "
            </div>
            <!-- End contentwrapper -->

        </div>
        <!-- End #content -->
    </div>
    <!-- end wrapper -->

    ";
        // line 146
        $this->displayBlock('javascripts', $context, $blocks);
        // line 188
        echo "    </body>
";
        
        $__internal_57ff0377a9e03c78ad0c12c400fab123a01eec5bd728505f9c76215ab785c584->leave($__internal_57ff0377a9e03c78ad0c12c400fab123a01eec5bd728505f9c76215ab785c584_prof);

        
        $__internal_12d7db56ae8926bea68ff58a147cf8d6d00ae88eaa4464c8a1d6f3c2585724ee->leave($__internal_12d7db56ae8926bea68ff58a147cf8d6d00ae88eaa4464c8a1d6f3c2585724ee_prof);

    }

    // line 28
    public function block_body_class($context, array $blocks = array())
    {
        $__internal_c7ff03b99780d54c8b17a7420bf29c18088fe75edcef57c3905a98210707454f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c7ff03b99780d54c8b17a7420bf29c18088fe75edcef57c3905a98210707454f->enter($__internal_c7ff03b99780d54c8b17a7420bf29c18088fe75edcef57c3905a98210707454f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_2be1413362ba9efebd9789363c073de52d6fb3f3f04f709fb7b52473afbd4c26 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2be1413362ba9efebd9789363c073de52d6fb3f3f04f709fb7b52473afbd4c26->enter($__internal_2be1413362ba9efebd9789363c073de52d6fb3f3f04f709fb7b52473afbd4c26_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        
        $__internal_2be1413362ba9efebd9789363c073de52d6fb3f3f04f709fb7b52473afbd4c26->leave($__internal_2be1413362ba9efebd9789363c073de52d6fb3f3f04f709fb7b52473afbd4c26_prof);

        
        $__internal_c7ff03b99780d54c8b17a7420bf29c18088fe75edcef57c3905a98210707454f->leave($__internal_c7ff03b99780d54c8b17a7420bf29c18088fe75edcef57c3905a98210707454f_prof);

    }

    // line 134
    public function block_content($context, array $blocks = array())
    {
        $__internal_40a769e323a06ec7c8456eb56ed39eb991094d881b9a1cb11a76b1955dfdfbd1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_40a769e323a06ec7c8456eb56ed39eb991094d881b9a1cb11a76b1955dfdfbd1->enter($__internal_40a769e323a06ec7c8456eb56ed39eb991094d881b9a1cb11a76b1955dfdfbd1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_5acc9d95e1a7ad8b37e9291fc58681c88744cb132cd67f8d06e879bd8503e553 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5acc9d95e1a7ad8b37e9291fc58681c88744cb132cd67f8d06e879bd8503e553->enter($__internal_5acc9d95e1a7ad8b37e9291fc58681c88744cb132cd67f8d06e879bd8503e553_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 135
        echo "                    ";
        $this->displayBlock('body', $context, $blocks);
        // line 136
        echo "                ";
        
        $__internal_5acc9d95e1a7ad8b37e9291fc58681c88744cb132cd67f8d06e879bd8503e553->leave($__internal_5acc9d95e1a7ad8b37e9291fc58681c88744cb132cd67f8d06e879bd8503e553_prof);

        
        $__internal_40a769e323a06ec7c8456eb56ed39eb991094d881b9a1cb11a76b1955dfdfbd1->leave($__internal_40a769e323a06ec7c8456eb56ed39eb991094d881b9a1cb11a76b1955dfdfbd1_prof);

    }

    // line 135
    public function block_body($context, array $blocks = array())
    {
        $__internal_d79a3f8fdd82def0f9bc59234642189649798c74dedbd20eb79b39fbbbeae243 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d79a3f8fdd82def0f9bc59234642189649798c74dedbd20eb79b39fbbbeae243->enter($__internal_d79a3f8fdd82def0f9bc59234642189649798c74dedbd20eb79b39fbbbeae243_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_7badf3f61e5c630c9146a6c821ea201fb6d2385221e35c9921057110e3a7eaec = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7badf3f61e5c630c9146a6c821ea201fb6d2385221e35c9921057110e3a7eaec->enter($__internal_7badf3f61e5c630c9146a6c821ea201fb6d2385221e35c9921057110e3a7eaec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_7badf3f61e5c630c9146a6c821ea201fb6d2385221e35c9921057110e3a7eaec->leave($__internal_7badf3f61e5c630c9146a6c821ea201fb6d2385221e35c9921057110e3a7eaec_prof);

        
        $__internal_d79a3f8fdd82def0f9bc59234642189649798c74dedbd20eb79b39fbbbeae243->leave($__internal_d79a3f8fdd82def0f9bc59234642189649798c74dedbd20eb79b39fbbbeae243_prof);

    }

    // line 146
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0ddd025a3ebd2b009560b0b0866e9cc236268345a8677c99b0b0895a4467f7b0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0ddd025a3ebd2b009560b0b0866e9cc236268345a8677c99b0b0895a4467f7b0->enter($__internal_0ddd025a3ebd2b009560b0b0866e9cc236268345a8677c99b0b0895a4467f7b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_41ce0435dade16b33b61b441dcc7e6ff5b0e0c6bff3c4f90c8cea47e896b9792 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_41ce0435dade16b33b61b441dcc7e6ff5b0e0c6bff3c4f90c8cea47e896b9792->enter($__internal_41ce0435dade16b33b61b441dcc7e6ff5b0e0c6bff3c4f90c8cea47e896b9792_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 147
        echo "        ";
        // line 148
        echo "            ";
        // line 149
        echo "            ";
        // line 150
        echo "        ";
        // line 151
        echo "            <script type=\"text/javascript\" src=\"/js/vendors.js\"></script>
            <script type=\"text/javascript\" src=\"/js/project.js\"></script>
        ";
        // line 154
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 155
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>

        ";
        // line 157
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "has", array(0 => "notice"), "method")) {
            // line 158
            echo "        <script>
            ";
            // line 159
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 160
                echo "            \$.pnotify({
                title: '";
                // line 161
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("notification_caption"), "html", null, true);
                echo "',
                text: '";
                // line 162
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
            // line 169
            echo "        </script>
        ";
        }
        // line 171
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
        
        $__internal_41ce0435dade16b33b61b441dcc7e6ff5b0e0c6bff3c4f90c8cea47e896b9792->leave($__internal_41ce0435dade16b33b61b441dcc7e6ff5b0e0c6bff3c4f90c8cea47e896b9792_prof);

        
        $__internal_0ddd025a3ebd2b009560b0b0866e9cc236268345a8677c99b0b0895a4467f7b0->leave($__internal_0ddd025a3ebd2b009560b0b0866e9cc236268345a8677c99b0b0895a4467f7b0_prof);

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
        return array (  460 => 171,  456 => 169,  443 => 162,  439 => 161,  436 => 160,  432 => 159,  429 => 158,  427 => 157,  422 => 155,  417 => 154,  413 => 151,  411 => 150,  409 => 149,  407 => 148,  405 => 147,  396 => 146,  379 => 135,  369 => 136,  366 => 135,  357 => 134,  340 => 28,  329 => 188,  327 => 146,  316 => 137,  314 => 134,  301 => 123,  293 => 118,  288 => 115,  283 => 112,  277 => 93,  269 => 88,  264 => 86,  260 => 84,  253 => 80,  248 => 78,  245 => 77,  243 => 76,  236 => 72,  231 => 70,  227 => 68,  220 => 64,  215 => 62,  212 => 61,  210 => 60,  207 => 59,  205 => 58,  203 => 57,  199 => 54,  197 => 53,  190 => 50,  184 => 48,  176 => 46,  173 => 45,  171 => 44,  167 => 43,  159 => 37,  153 => 35,  151 => 34,  148 => 33,  146 => 32,  139 => 28,  130 => 27,  120 => 22,  115 => 19,  110 => 16,  107 => 15,  98 => 14,  80 => 5,  69 => 190,  67 => 27,  61 => 23,  59 => 14,  56 => 13,  53 => 12,  51 => 11,  49 => 10,  47 => 9,  45 => 8,  43 => 7,  38 => 5,  32 => 1,);
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
                            <img src=\"{{ asset('uploads/gallery/' ~ logo) }}\" id=\"{{ club.name }}\" />
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
                                    <span class=\"txt\"> {{ 'layout.logged_in_as'|trans({'%username%' : app.user.username}) }}</span>
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
