<?php

/* @FOSUser/Security/_form.html.twig */
class __TwigTemplate_013ea2aa0e0fff7c737dcc258253f3c465db5e42c178bc9c471c841b4530848a extends Twig_Template
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
        $__internal_4ca34f3e1249e5bd6f903379187ebfd6cc35e66ff44e0f71c3da1ef1e32db587 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4ca34f3e1249e5bd6f903379187ebfd6cc35e66ff44e0f71c3da1ef1e32db587->enter($__internal_4ca34f3e1249e5bd6f903379187ebfd6cc35e66ff44e0f71c3da1ef1e32db587_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Security/_form.html.twig"));

        $__internal_251806bcb2892038befbbeabd52d2e02d6008e41f53873502a63f3018dc08a2e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_251806bcb2892038befbbeabd52d2e02d6008e41f53873502a63f3018dc08a2e->enter($__internal_251806bcb2892038befbbeabd52d2e02d6008e41f53873502a63f3018dc08a2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Security/_form.html.twig"));

        // line 1
        echo "<form id=\"loginForm\" class=\"form-horizontal form-content login-form\" action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_check");
        echo "\" method=\"POST\">
    ";
        // line 2
        if (($context["error"] ?? null)) {
            // line 3
            echo "        <div class=\"alert alert-danger fade in \">
            <i class=\"fa fa-envelope alert-icon\"></i>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            <strong>";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.there_were_errors"), "html", null, true);
            echo "</strong>
            <ul>
                <li>";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_get_attribute($this->env, $this->getSourceContext(), ($context["error"] ?? null), "messageKey", array()), twig_get_attribute($this->env, $this->getSourceContext(), ($context["error"] ?? null), "messageData", array()), "security"), "html", null, true);
            echo "</li>
            </ul>
        </div>
    ";
        }
        // line 12
        echo "
    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"username\">";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.label.username"), "html", null, true);
        echo ": <span class=\"required\">*</span></label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" required=\"required\" class=\"form-control span12\"/>
            </div>
        </div>
    </div>

    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"password\">
                    ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.label.password"), "html", null, true);
        echo ":
                    <span class=\"required\">*</span>
                    <span class=\"icon16 icomoon-icon-lock right gray marginR10\"></span>
                    <span class=\"forgot\"><a href=\"";
        // line 29
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
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("account.login.label.submit"), "html", null, true);
        echo "
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, ($context["csrf_token"] ?? null), "html", null, true);
        echo "\" />
</form>";
        
        $__internal_4ca34f3e1249e5bd6f903379187ebfd6cc35e66ff44e0f71c3da1ef1e32db587->leave($__internal_4ca34f3e1249e5bd6f903379187ebfd6cc35e66ff44e0f71c3da1ef1e32db587_prof);

        
        $__internal_251806bcb2892038befbbeabd52d2e02d6008e41f53873502a63f3018dc08a2e->leave($__internal_251806bcb2892038befbbeabd52d2e02d6008e41f53873502a63f3018dc08a2e_prof);

    }

    public function getTemplateName()
    {
        return "@FOSUser/Security/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 50,  95 => 42,  77 => 29,  71 => 26,  59 => 17,  55 => 16,  49 => 12,  42 => 8,  37 => 6,  32 => 3,  30 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<form id=\"loginForm\" class=\"form-horizontal form-content login-form\" action=\"{{ path(\"fos_user_security_check\") }}\" method=\"POST\">
    {% if error %}
        <div class=\"alert alert-danger fade in \">
            <i class=\"fa fa-envelope alert-icon\"></i>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            <strong>{{ \"account.login.there_were_errors\"|trans }}</strong>
            <ul>
                <li>{{ error.messageKey|trans(error.messageData, 'security') }}</li>
            </ul>
        </div>
    {% endif %}

    <div class=\"form-row row-fluid\">
        <div class=\"span12\">
            <div class=\"row-fluid\">
                <label class=\"form-label span12\" for=\"username\">{{ \"account.login.label.username\"|trans }}: <span class=\"required\">*</span></label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"{{ last_username }}\" required=\"required\" class=\"form-control span12\"/>
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
</form>", "@FOSUser/Security/_form.html.twig", "/vagrant/app/Resources/FOSUserBundle/views/Security/_form.html.twig");
    }
}
