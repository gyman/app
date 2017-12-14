<?php

/* @GymanApp/Default/_login_form.html.twig */
class __TwigTemplate_2f87caf23697811fb5392b584e561f7d3867523a1d59bdd7079dac6d74b01208 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form id=\"loginForm\" class=\"form-horizontal form-content login-form\" action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_check");
        echo "\" method=\"POST\">
    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"username\">";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.label.username"), "html", null, true);
        echo ": <span class=\"required\">*</span></label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"\" required=\"required\" class=\"form-control span12\"/>
            </div>
        </div>
    </div>

    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"password\">
                    ";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.label.password"), "html", null, true);
        echo ":
                    <span class=\"required\">*</span>
                    <span class=\"icon16 icomoon-icon-lock right gray marginR10\"></span>
                    <span class=\"forgot\"><a href=\"";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_resetting_request");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.password_recovery"), "html", null, true);
        echo "</a></span>
                </label>
                <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" class=\"form-control\" />
            </div>
        </div>
    </div>

    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <div class=\"form-actions\">
                    <div class=\"span12 controls\">
                        <button name=\"_submit\" type=\"submit\" class=\"btn btn-info right\" id=\"loginBtn\">
                            <span class=\"icon16 icomoon-icon-enter white\"></span> ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.label.submit"), "html", null, true);
        echo "
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, ($context["csrf_token"] ?? null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" name=\"_target_path\" value=\"gyman_dashboard_index\" />
</form>";
    }

    public function getTemplateName()
    {
        return "@GymanApp/Default/_login_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 39,  64 => 31,  46 => 18,  40 => 15,  27 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@GymanApp/Default/_login_form.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/_login_form.html.twig");
    }
}
