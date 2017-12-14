<?php

/* AccountBundle::loginLayout.html.twig */
class __TwigTemplate_9a10f9edc4098710799397f40c9dccd4ecffb1355b299f1a5940ae4107bc0331 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "AccountBundle::loginLayout.html.twig", 1);
        $this->blocks = array(
            'overraid_body' => array($this, 'block_overraid_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6cf68c657de01b09bcfbb7150c500f69d03e6e1eed14e96449b2971f9b18371e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6cf68c657de01b09bcfbb7150c500f69d03e6e1eed14e96449b2971f9b18371e->enter($__internal_6cf68c657de01b09bcfbb7150c500f69d03e6e1eed14e96449b2971f9b18371e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AccountBundle::loginLayout.html.twig"));

        $__internal_e68339192b54a19225788216b308e207854b45747348c491d3c2a792c302d08c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e68339192b54a19225788216b308e207854b45747348c491d3c2a792c302d08c->enter($__internal_e68339192b54a19225788216b308e207854b45747348c491d3c2a792c302d08c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AccountBundle::loginLayout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6cf68c657de01b09bcfbb7150c500f69d03e6e1eed14e96449b2971f9b18371e->leave($__internal_6cf68c657de01b09bcfbb7150c500f69d03e6e1eed14e96449b2971f9b18371e_prof);

        
        $__internal_e68339192b54a19225788216b308e207854b45747348c491d3c2a792c302d08c->leave($__internal_e68339192b54a19225788216b308e207854b45747348c491d3c2a792c302d08c_prof);

    }

    // line 3
    public function block_overraid_body($context, array $blocks = array())
    {
        $__internal_9abc6c972a4780ee0b20a02d9e1f05eb38782573d20094ade86aa2c61d8c30c8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9abc6c972a4780ee0b20a02d9e1f05eb38782573d20094ade86aa2c61d8c30c8->enter($__internal_9abc6c972a4780ee0b20a02d9e1f05eb38782573d20094ade86aa2c61d8c30c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

        $__internal_6d8d440e0948446bdd5fc1f05756de9f040378d8c7812c0bb42e34d5e53c8183 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6d8d440e0948446bdd5fc1f05756de9f040378d8c7812c0bb42e34d5e53c8183->enter($__internal_6d8d440e0948446bdd5fc1f05756de9f040378d8c7812c0bb42e34d5e53c8183_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "overraid_body"));

        // line 4
        echo "<body class=\"page-login-promo blur-page\" data-blur-image=\"img/content/bg-login.jpg\" data-blur-amount=\"1\">

<div class=\"page-box\">

<header class=\"header header-three\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"logo-box col-sm-12 col-md-12\">
        <div class=\"logo\">
\t\t  <a href=\"/\">
\t\t\t<img src=\"/assets/images/gyman_logo.png\" class=\"logo-img\" alt=\"\">
\t\t  </a>
\t\t</div>
      </div>
    </div><!--.row -->
  </div>
</header><!-- .header -->

<div class=\"container-fluid\">

    <div class=\"loginContainer\">
        ";
        // line 25
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 26
        echo "    </div>

</div>

";
        // line 30
        $this->displayBlock('javascripts', $context, $blocks);
        // line 33
        echo "
</body>
";
        
        $__internal_6d8d440e0948446bdd5fc1f05756de9f040378d8c7812c0bb42e34d5e53c8183->leave($__internal_6d8d440e0948446bdd5fc1f05756de9f040378d8c7812c0bb42e34d5e53c8183_prof);

        
        $__internal_9abc6c972a4780ee0b20a02d9e1f05eb38782573d20094ade86aa2c61d8c30c8->leave($__internal_9abc6c972a4780ee0b20a02d9e1f05eb38782573d20094ade86aa2c61d8c30c8_prof);

    }

    // line 25
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_c217c565846ddc13c241894b60cac75813c93a2b354ee512783cedfac182ab11 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c217c565846ddc13c241894b60cac75813c93a2b354ee512783cedfac182ab11->enter($__internal_c217c565846ddc13c241894b60cac75813c93a2b354ee512783cedfac182ab11_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        $__internal_2a51df0b6c314f06d49035d553014f1961f8e84f463e750b036341ebe5f42fa4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2a51df0b6c314f06d49035d553014f1961f8e84f463e750b036341ebe5f42fa4->enter($__internal_2a51df0b6c314f06d49035d553014f1961f8e84f463e750b036341ebe5f42fa4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        
        $__internal_2a51df0b6c314f06d49035d553014f1961f8e84f463e750b036341ebe5f42fa4->leave($__internal_2a51df0b6c314f06d49035d553014f1961f8e84f463e750b036341ebe5f42fa4_prof);

        
        $__internal_c217c565846ddc13c241894b60cac75813c93a2b354ee512783cedfac182ab11->leave($__internal_c217c565846ddc13c241894b60cac75813c93a2b354ee512783cedfac182ab11_prof);

    }

    // line 30
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_a7567d5b9791457e45536a5f0e76c04dd804fef82aade55705b87911d21808e8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a7567d5b9791457e45536a5f0e76c04dd804fef82aade55705b87911d21808e8->enter($__internal_a7567d5b9791457e45536a5f0e76c04dd804fef82aade55705b87911d21808e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_2c949df3bd18c44fc54952ad7d32d3d8f8c246ed850d0bcfb9ad2bae1b1cf23d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2c949df3bd18c44fc54952ad7d32d3d8f8c246ed850d0bcfb9ad2bae1b1cf23d->enter($__internal_2c949df3bd18c44fc54952ad7d32d3d8f8c246ed850d0bcfb9ad2bae1b1cf23d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 31
        echo "    ";
        
        $__internal_2c949df3bd18c44fc54952ad7d32d3d8f8c246ed850d0bcfb9ad2bae1b1cf23d->leave($__internal_2c949df3bd18c44fc54952ad7d32d3d8f8c246ed850d0bcfb9ad2bae1b1cf23d_prof);

        
        $__internal_a7567d5b9791457e45536a5f0e76c04dd804fef82aade55705b87911d21808e8->leave($__internal_a7567d5b9791457e45536a5f0e76c04dd804fef82aade55705b87911d21808e8_prof);

    }

    public function getTemplateName()
    {
        return "AccountBundle::loginLayout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 31,  113 => 30,  96 => 25,  84 => 33,  82 => 30,  76 => 26,  74 => 25,  51 => 4,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"::base.html.twig\" %}

{% block overraid_body %}
<body class=\"page-login-promo blur-page\" data-blur-image=\"img/content/bg-login.jpg\" data-blur-amount=\"1\">

<div class=\"page-box\">

<header class=\"header header-three\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"logo-box col-sm-12 col-md-12\">
        <div class=\"logo\">
\t\t  <a href=\"/\">
\t\t\t<img src=\"/assets/images/gyman_logo.png\" class=\"logo-img\" alt=\"\">
\t\t  </a>
\t\t</div>
      </div>
    </div><!--.row -->
  </div>
</header><!-- .header -->

<div class=\"container-fluid\">

    <div class=\"loginContainer\">
        {% block fos_user_content %}{% endblock fos_user_content %}
    </div>

</div>

{% block javascripts %}
    {#{{ parent() }}#}
{% endblock javascripts %}

</body>
{% endblock %}
", "AccountBundle::loginLayout.html.twig", "/vagrant/src/Bundle/AccountBundle/Resources/views/loginLayout.html.twig");
    }
}
