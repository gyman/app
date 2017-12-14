<?php

/* ::base.html.twig */
class __TwigTemplate_7751b59c7d56c09a46ddca61060d2a095efc1143ea04c176e2a132f7b885936c extends Twig_Template
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
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Gyman.pl";
    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
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
    }

    // line 27
    public function block_overraid_body($context, array $blocks = array())
    {
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
    }

    // line 28
    public function block_body_class($context, array $blocks = array())
    {
    }

    // line 134
    public function block_content($context, array $blocks = array())
    {
        // line 135
        echo "                    ";
        $this->displayBlock('body', $context, $blocks);
        // line 136
        echo "                ";
    }

    // line 135
    public function block_body($context, array $blocks = array())
    {
    }

    // line 146
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  370 => 171,  366 => 169,  353 => 162,  349 => 161,  346 => 160,  342 => 159,  339 => 158,  337 => 157,  332 => 155,  327 => 154,  323 => 151,  321 => 150,  319 => 149,  317 => 148,  315 => 147,  312 => 146,  307 => 135,  303 => 136,  300 => 135,  297 => 134,  292 => 28,  287 => 188,  285 => 146,  274 => 137,  272 => 134,  259 => 123,  251 => 118,  246 => 115,  241 => 112,  235 => 93,  227 => 88,  222 => 86,  218 => 84,  211 => 80,  206 => 78,  203 => 77,  201 => 76,  194 => 72,  189 => 70,  185 => 68,  178 => 64,  173 => 62,  170 => 61,  168 => 60,  165 => 59,  163 => 58,  161 => 57,  157 => 54,  155 => 53,  148 => 50,  142 => 48,  134 => 46,  131 => 45,  129 => 44,  125 => 43,  117 => 37,  111 => 35,  109 => 34,  106 => 33,  104 => 32,  97 => 28,  94 => 27,  90 => 22,  85 => 19,  80 => 16,  77 => 15,  74 => 14,  68 => 5,  63 => 190,  61 => 27,  55 => 23,  53 => 14,  50 => 13,  47 => 12,  45 => 11,  43 => 10,  41 => 9,  39 => 8,  37 => 7,  32 => 5,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "::base.html.twig", "/vagrant/app/Resources/views/base.html.twig");
    }
}
