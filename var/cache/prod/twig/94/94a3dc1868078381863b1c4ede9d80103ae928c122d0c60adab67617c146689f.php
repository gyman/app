<?php

/* @Twig/Exception/error404.html.twig */
class __TwigTemplate_d677ddb43a33a23767491ca2ac7bdafb440aa447f4a33957f671dad2c0f059f8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::errorLayout.html.twig", "@Twig/Exception/error404.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'caption' => array($this, 'block_caption'),
            'description' => array($this, 'block_description'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::errorLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Wystąpił błąd! Strona nie istnieje - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 5
    public function block_caption($context, array $blocks = array())
    {
        // line 6
        echo "<h1>404</h1>
<h2>Podana strona nie istnieje.</h2>
";
    }

    // line 10
    public function block_description($context, array $blocks = array())
    {
        // line 11
        echo "<h3>Cholipka</h3>

<p>Strona, na którą chciałeś wejść, nie istnieje.</p>
<ul>
    <li>Jeżeli własnoręcznie wpisałeś adres w pasku przeglądarki, upewnij się, że jest on poprawny.</li>
    <li>Jeżeli znalazłeś się tu po kliknięciu linki na stronie, to coś zepsuliśmy i strona nie istnieje :(</li>
</ul>
<b>Co robić?</b>
<p>Tylko spokojnie!</p>
<ul>
    <li><a href=\"#\" onClick=\"window.history.back();\">idź wstecz</a> do poprzedniej strony.</li>
    <li><a href=\"";
        // line 22
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("frontpage_index");
        echo "\">wróć do strony głównej</a> | <a href=\"#\">Moje konto</a></li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 22,  49 => 11,  46 => 10,  40 => 6,  37 => 5,  30 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Twig/Exception/error404.html.twig", "/vagrant/app/Resources/TwigBundle/views/Exception/error404.html.twig");
    }
}
