<?php

/* ::base.html.twig */
class __TwigTemplate_850173329151fe0b3c6c19b0f55c14dd2ec7f430c5953e9888e756c145a46e54 extends Twig_Template
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
        $__internal_1b71b414b3da7cd75b1d2e25cd4fac602300bbbe07fe0f1cb2ba021685eec3ee = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1b71b414b3da7cd75b1d2e25cd4fac602300bbbe07fe0f1cb2ba021685eec3ee->enter($__internal_1b71b414b3da7cd75b1d2e25cd4fac602300bbbe07fe0f1cb2ba021685eec3ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        $__internal_77552583ea1a84754d25ee82521351f92f378e9506961da79dc517af9f684f7e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_77552583ea1a84754d25ee82521351f92f378e9506961da79dc517af9f684f7e->enter($__internal_77552583ea1a84754d25ee82521351f92f378e9506961da79dc517af9f684f7e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

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
        
        $__internal_1b71b414b3da7cd75b1d2e25cd4fac602300bbbe07fe0f1cb2ba021685eec3ee->leave($__internal_1b71b414b3da7cd75b1d2e25cd4fac602300bbbe07fe0f1cb2ba021685eec3ee_prof);

        
        $__internal_77552583ea1a84754d25ee82521351f92f378e9506961da79dc517af9f684f7e->leave($__internal_77552583ea1a84754d25ee82521351f92f378e9506961da79dc517af9f684f7e_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_7399411d54f2b80a88b91b93ad73ba5bebdcaed8dbe4f8a23dfc9dc6e2d0beb0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7399411d54f2b80a88b91b93ad73ba5bebdcaed8dbe4f8a23dfc9dc6e2d0beb0->enter($__internal_7399411d54f2b80a88b91b93ad73ba5bebdcaed8dbe4f8a23dfc9dc6e2d0beb0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_7a6ef7f8ee78c4c11428cd3c094bc0ef811422557c99a0515561840d57251d79 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7a6ef7f8ee78c4c11428cd3c094bc0ef811422557c99a0515561840d57251d79->enter($__internal_7a6ef7f8ee78c4c11428cd3c094bc0ef811422557c99a0515561840d57251d79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Gyman.pl";
        
        $__internal_7a6ef7f8ee78c4c11428cd3c094bc0ef811422557c99a0515561840d57251d79->leave($__internal_7a6ef7f8ee78c4c11428cd3c094bc0ef811422557c99a0515561840d57251d79_prof);

        
        $__internal_7399411d54f2b80a88b91b93ad73ba5bebdcaed8dbe4f8a23dfc9dc6e2d0beb0->leave($__internal_7399411d54f2b80a88b91b93ad73ba5bebdcaed8dbe4f8a23dfc9dc6e2d0beb0_prof);

    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_a28bb42cdca1bf73fae6f665eb73cafd8d87fbead5d676ea8c8ea4390abcb21d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a28bb42cdca1bf73fae6f665eb73cafd8d87fbead5d676ea8c8ea4390abcb21d->enter($__internal_a28bb42cdca1bf73fae6f665eb73cafd8d87fbead5d676ea8c8ea4390abcb21d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_d81d3b00a663c8058584fdfa40752fa5b90461bdb8798633d8f7828a19662113 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d81d3b00a663c8058584fdfa40752fa5b90461bdb8798633d8f7828a19662113->enter($__internal_d81d3b00a663c8058584fdfa40752fa5b90461bdb8798633d8f7828a19662113_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

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
        
        $__internal_d81d3b00a663c8058584fdfa40752fa5b90461bdb8798633d8f7828a19662113->leave($__internal_d81d3b00a663c8058584fdfa40752fa5b90461bdb8798633d8f7828a19662113_prof);

        
        $__internal_a28bb42cdca1bf73fae6f665eb73cafd8d87fbead5d676ea8c8ea4390abcb21d->leave($__internal_a28bb42cdca1bf73fae6f665eb73cafd8d87fbead5d676ea8c8ea4390abcb21d_prof);

    }

    // line 27
    public function block_overraid_body($context, array $blocks = array())
    {
        $__internal_78adc4a3cd034d41ddac37a28b8cca20da5850ea4ad37eb97a03279851ea9327 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_78adc4a3cd034d41ddac37a28b8cca20da5850ea4ad37eb97a03279851ea9327->enter($__internal_78adc4a3cd034d41ddac37a28b8cca20da5850ea4ad37eb97a03279851ea9327_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

        $__internal_09dd08a6a4981a24bd6fef1b190e6223d7eb3b84354552315389868a1363db76 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_09dd08a6a4981a24bd6fef1b190e6223d7eb3b84354552315389868a1363db76->enter($__internal_09dd08a6a4981a24bd6fef1b190e6223d7eb3b84354552315389868a1363db76_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

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
        
        $__internal_09dd08a6a4981a24bd6fef1b190e6223d7eb3b84354552315389868a1363db76->leave($__internal_09dd08a6a4981a24bd6fef1b190e6223d7eb3b84354552315389868a1363db76_prof);

        
        $__internal_78adc4a3cd034d41ddac37a28b8cca20da5850ea4ad37eb97a03279851ea9327->leave($__internal_78adc4a3cd034d41ddac37a28b8cca20da5850ea4ad37eb97a03279851ea9327_prof);

    }

    // line 28
    public function block_body_class($context, array $blocks = array())
    {
        $__internal_b0273bfa9be3f9f9810081036e10429233f60a8a5685886785d021adcf63b66d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b0273bfa9be3f9f9810081036e10429233f60a8a5685886785d021adcf63b66d->enter($__internal_b0273bfa9be3f9f9810081036e10429233f60a8a5685886785d021adcf63b66d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_d1f65bd722c825be52c38cc031455729b649d1be0ee0f33831dda7b297961ba5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d1f65bd722c825be52c38cc031455729b649d1be0ee0f33831dda7b297961ba5->enter($__internal_d1f65bd722c825be52c38cc031455729b649d1be0ee0f33831dda7b297961ba5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_class"));

        
        $__internal_d1f65bd722c825be52c38cc031455729b649d1be0ee0f33831dda7b297961ba5->leave($__internal_d1f65bd722c825be52c38cc031455729b649d1be0ee0f33831dda7b297961ba5_prof);

        
        $__internal_b0273bfa9be3f9f9810081036e10429233f60a8a5685886785d021adcf63b66d->leave($__internal_b0273bfa9be3f9f9810081036e10429233f60a8a5685886785d021adcf63b66d_prof);

    }

    // line 136
    public function block_content($context, array $blocks = array())
    {
        $__internal_aac9d30cf9923009bc23a4e968d0438cbf5bea9e224dde67873075002252012d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_aac9d30cf9923009bc23a4e968d0438cbf5bea9e224dde67873075002252012d->enter($__internal_aac9d30cf9923009bc23a4e968d0438cbf5bea9e224dde67873075002252012d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_4d999ec95becbe79e5cb485dc0018a2ac24ca44e3ce406b96f9db1782ca8fa7f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4d999ec95becbe79e5cb485dc0018a2ac24ca44e3ce406b96f9db1782ca8fa7f->enter($__internal_4d999ec95becbe79e5cb485dc0018a2ac24ca44e3ce406b96f9db1782ca8fa7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 137
        echo "                    ";
        $this->displayBlock('body', $context, $blocks);
        // line 138
        echo "                ";
        
        $__internal_4d999ec95becbe79e5cb485dc0018a2ac24ca44e3ce406b96f9db1782ca8fa7f->leave($__internal_4d999ec95becbe79e5cb485dc0018a2ac24ca44e3ce406b96f9db1782ca8fa7f_prof);

        
        $__internal_aac9d30cf9923009bc23a4e968d0438cbf5bea9e224dde67873075002252012d->leave($__internal_aac9d30cf9923009bc23a4e968d0438cbf5bea9e224dde67873075002252012d_prof);

    }

    // line 137
    public function block_body($context, array $blocks = array())
    {
        $__internal_f213a7dbe28eccc15e2ef108a6faffae09e16e1c78f629eca97b274c0bd5812f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f213a7dbe28eccc15e2ef108a6faffae09e16e1c78f629eca97b274c0bd5812f->enter($__internal_f213a7dbe28eccc15e2ef108a6faffae09e16e1c78f629eca97b274c0bd5812f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_d45261e4a5198dbfa07e3ab31d5c8da063998b2df2aa98c0798a5fa17e35aa7a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d45261e4a5198dbfa07e3ab31d5c8da063998b2df2aa98c0798a5fa17e35aa7a->enter($__internal_d45261e4a5198dbfa07e3ab31d5c8da063998b2df2aa98c0798a5fa17e35aa7a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_d45261e4a5198dbfa07e3ab31d5c8da063998b2df2aa98c0798a5fa17e35aa7a->leave($__internal_d45261e4a5198dbfa07e3ab31d5c8da063998b2df2aa98c0798a5fa17e35aa7a_prof);

        
        $__internal_f213a7dbe28eccc15e2ef108a6faffae09e16e1c78f629eca97b274c0bd5812f->leave($__internal_f213a7dbe28eccc15e2ef108a6faffae09e16e1c78f629eca97b274c0bd5812f_prof);

    }

    // line 148
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4aaff7288455ecedfab452c988d40442a4c00b7141d7aceff8d2ab76816be127 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4aaff7288455ecedfab452c988d40442a4c00b7141d7aceff8d2ab76816be127->enter($__internal_4aaff7288455ecedfab452c988d40442a4c00b7141d7aceff8d2ab76816be127_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6d4f2b3dc844574ab7c1e7fa6d0d2cb3e582e658c0540d83a01223e0cf013fa9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6d4f2b3dc844574ab7c1e7fa6d0d2cb3e582e658c0540d83a01223e0cf013fa9->enter($__internal_6d4f2b3dc844574ab7c1e7fa6d0d2cb3e582e658c0540d83a01223e0cf013fa9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

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
        
        $__internal_6d4f2b3dc844574ab7c1e7fa6d0d2cb3e582e658c0540d83a01223e0cf013fa9->leave($__internal_6d4f2b3dc844574ab7c1e7fa6d0d2cb3e582e658c0540d83a01223e0cf013fa9_prof);

        
        $__internal_4aaff7288455ecedfab452c988d40442a4c00b7141d7aceff8d2ab76816be127->leave($__internal_4aaff7288455ecedfab452c988d40442a4c00b7141d7aceff8d2ab76816be127_prof);

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
