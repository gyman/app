<?php

/* MailerBundle::layout.html.twig */
class __TwigTemplate_910ebb30beda3566507a2ad2d59714605aa6f68d4547052e54d649cac7c23787 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3a4005fbbb1cb520cd46d968de3c48b61d61c0b6e60cb4492f0dcf28099c0af9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3a4005fbbb1cb520cd46d968de3c48b61d61c0b6e60cb4492f0dcf28099c0af9->enter($__internal_3a4005fbbb1cb520cd46d968de3c48b61d61c0b6e60cb4492f0dcf28099c0af9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MailerBundle::layout.html.twig"));

        $__internal_2366216b2692eb6d73f076c650617221dae17b375bba342933d1d877e56fd859 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2366216b2692eb6d73f076c650617221dae17b375bba342933d1d877e56fd859->enter($__internal_2366216b2692eb6d73f076c650617221dae17b375bba342933d1d877e56fd859_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MailerBundle::layout.html.twig"));

        // line 1
        echo "<html>
    <head>
        <title>[GyMan.pl] Mailing</title>
    </head>
    <body>
        ";
        // line 6
        $this->displayBlock('content', $context, $blocks);
        // line 7
        echo "    </body>
</html>
";
        
        $__internal_3a4005fbbb1cb520cd46d968de3c48b61d61c0b6e60cb4492f0dcf28099c0af9->leave($__internal_3a4005fbbb1cb520cd46d968de3c48b61d61c0b6e60cb4492f0dcf28099c0af9_prof);

        
        $__internal_2366216b2692eb6d73f076c650617221dae17b375bba342933d1d877e56fd859->leave($__internal_2366216b2692eb6d73f076c650617221dae17b375bba342933d1d877e56fd859_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_3b8bf933a4a24bae990e7fe089c315c7ccb59012bf0329e8b32e833c0d6082c5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3b8bf933a4a24bae990e7fe089c315c7ccb59012bf0329e8b32e833c0d6082c5->enter($__internal_3b8bf933a4a24bae990e7fe089c315c7ccb59012bf0329e8b32e833c0d6082c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_3e08e4199a77d5d0f4f46f381e0cac0890dc4b34de4b07ee97168e58689579b2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3e08e4199a77d5d0f4f46f381e0cac0890dc4b34de4b07ee97168e58689579b2->enter($__internal_3e08e4199a77d5d0f4f46f381e0cac0890dc4b34de4b07ee97168e58689579b2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_3e08e4199a77d5d0f4f46f381e0cac0890dc4b34de4b07ee97168e58689579b2->leave($__internal_3e08e4199a77d5d0f4f46f381e0cac0890dc4b34de4b07ee97168e58689579b2_prof);

        
        $__internal_3b8bf933a4a24bae990e7fe089c315c7ccb59012bf0329e8b32e833c0d6082c5->leave($__internal_3b8bf933a4a24bae990e7fe089c315c7ccb59012bf0329e8b32e833c0d6082c5_prof);

    }

    public function getTemplateName()
    {
        return "MailerBundle::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  47 => 6,  35 => 7,  33 => 6,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
    <head>
        <title>[GyMan.pl] Mailing</title>
    </head>
    <body>
        {% block content %}{% endblock content %}
    </body>
</html>
", "MailerBundle::layout.html.twig", "/vagrant/src/Bundle/MailerBundle/Resources/views/layout.html.twig");
    }
}
