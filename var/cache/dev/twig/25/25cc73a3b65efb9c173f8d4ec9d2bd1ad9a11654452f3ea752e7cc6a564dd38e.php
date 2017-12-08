<?php

/* @GymanApp/Default/_login_form.html.twig */
class __TwigTemplate_73d8ad25d26a83057c9c94967f795be936b79175013d405adca8e5e6bf8c0924 extends Twig_Template
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
        $__internal_d6f60f19903b859b0db88e39b325027da215baee6a0ddf413c0698c4da9fa082 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d6f60f19903b859b0db88e39b325027da215baee6a0ddf413c0698c4da9fa082->enter($__internal_d6f60f19903b859b0db88e39b325027da215baee6a0ddf413c0698c4da9fa082_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Default/_login_form.html.twig"));

        $__internal_f0d84717f8cc62a01db19f14d6ec798c4a48b205cea975d82903846610c1771a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f0d84717f8cc62a01db19f14d6ec798c4a48b205cea975d82903846610c1771a->enter($__internal_f0d84717f8cc62a01db19f14d6ec798c4a48b205cea975d82903846610c1771a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Default/_login_form.html.twig"));

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
        
        $__internal_d6f60f19903b859b0db88e39b325027da215baee6a0ddf413c0698c4da9fa082->leave($__internal_d6f60f19903b859b0db88e39b325027da215baee6a0ddf413c0698c4da9fa082_prof);

        
        $__internal_f0d84717f8cc62a01db19f14d6ec798c4a48b205cea975d82903846610c1771a->leave($__internal_f0d84717f8cc62a01db19f14d6ec798c4a48b205cea975d82903846610c1771a_prof);

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
        return array (  81 => 39,  70 => 31,  52 => 18,  46 => 15,  33 => 5,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<form id=\"loginForm\" class=\"form-horizontal form-content login-form\" action=\"{{ path(\"fos_user_security_check\") }}\" method=\"POST\">
    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"username\">{{ \"account.login.label.username\"|trans }}: <span class=\"required\">*</span></label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"\" required=\"required\" class=\"form-control span12\"/>
            </div>
        </div>
    </div>

    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"password\">
                    {{ \"account.login.label.password\"|trans }}:
                    <span class=\"required\">*</span>
                    <span class=\"icon16 icomoon-icon-lock right gray marginR10\"></span>
                    <span class=\"forgot\"><a href=\"{{ path(\"fos_user_resetting_request\") }}\">{{ \"account.login.password_recovery\"|trans }}</a></span>
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
                            <span class=\"icon16 icomoon-icon-enter white\"></span> {{ \"account.login.label.submit\"|trans }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token }}\" />
    <input type=\"hidden\" name=\"_target_path\" value=\"gyman_dashboard_index\" />
</form>", "@GymanApp/Default/_login_form.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/Default/_login_form.html.twig");
    }
}
