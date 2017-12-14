<?php

/* @GymanApp/Default/_login_form.html.twig */
class __TwigTemplate_9e0a54750706b376404ed7f2fcc2db54c7d75d4c7562b0121176f80ce9f64c55 extends Twig_Template
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
        $__internal_e71bb2dea6f45fb5245e773b28716ecd8b19f90bcb4c9f56a90cb2d3d71e83e9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e71bb2dea6f45fb5245e773b28716ecd8b19f90bcb4c9f56a90cb2d3d71e83e9->enter($__internal_e71bb2dea6f45fb5245e773b28716ecd8b19f90bcb4c9f56a90cb2d3d71e83e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Default/_login_form.html.twig"));

        $__internal_7d00b84e91085b18fd221d3d66766c357112df63ce94de734545a10a454611eb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7d00b84e91085b18fd221d3d66766c357112df63ce94de734545a10a454611eb->enter($__internal_7d00b84e91085b18fd221d3d66766c357112df63ce94de734545a10a454611eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GymanApp/Default/_login_form.html.twig"));

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
        
        $__internal_e71bb2dea6f45fb5245e773b28716ecd8b19f90bcb4c9f56a90cb2d3d71e83e9->leave($__internal_e71bb2dea6f45fb5245e773b28716ecd8b19f90bcb4c9f56a90cb2d3d71e83e9_prof);

        
        $__internal_7d00b84e91085b18fd221d3d66766c357112df63ce94de734545a10a454611eb->leave($__internal_7d00b84e91085b18fd221d3d66766c357112df63ce94de734545a10a454611eb_prof);

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
