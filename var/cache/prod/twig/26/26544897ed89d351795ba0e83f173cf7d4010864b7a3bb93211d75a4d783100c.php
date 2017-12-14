<?php

/* ::errorLayout.html.twig */
class __TwigTemplate_7136d8c6dede0947b66839af316c83438c545ad5e4f3b864e77cc25b6494eb3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "::errorLayout.html.twig", 1);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
            'caption' => array($this, 'block_caption'),
            'description' => array($this, 'block_description'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "    <section id=\"main\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"content col-sm-12 col-md-12\">
                    <div class=\"row\">
                        <div class=\"col-sm-6 col-md-6\">
                            <div class=\"box-404 bg\">
                                ";
        // line 11
        $this->displayBlock('caption', $context, $blocks);
        // line 12
        echo "                            </div>
                        </div>
                        <div class=\"col-sm-6 col-md-6\">
                            ";
        // line 15
        $this->displayBlock('description', $context, $blocks);
        // line 16
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .container -->
    </section>
";
    }

    // line 11
    public function block_caption($context, array $blocks = array())
    {
    }

    // line 15
    public function block_description($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::errorLayout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 15,  61 => 11,  51 => 16,  49 => 15,  44 => 12,  42 => 11,  33 => 4,  30 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "::errorLayout.html.twig", "/vagrant/app/Resources/views/errorLayout.html.twig");
    }
}
