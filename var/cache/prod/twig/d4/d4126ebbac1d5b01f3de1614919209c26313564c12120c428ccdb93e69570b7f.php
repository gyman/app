<?php

/* DashboardBundle:Default:listClassMembers.html.twig */
class __TwigTemplate_239fa6e203aaec22dc38b7ab89a7f6ad0eedb292c0cceedd52a2a2b7ac0b7c08 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DashboardBundle::layout.html.twig", "DashboardBundle:Default:listClassMembers.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DashboardBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"heading\">
    <h3>
        ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "event", array()), "title", array()), "html", null, true);
        echo "
        <small>";
        // line 9
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "startDate", array()), "y.m.d H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "endDate", array()), "H:i"), "html", null, true);
        echo "</small>
    </h3>

    ";
        // line 13
        echo "</div>


";
        // line 16
        echo twig_include($this->env, $context, "_flash.html.twig");
        echo "

<div class=\"row-fluid\">
    <div class=\"span3 offset3\">
        <ul class=\"media-list\" style=\"height: 90%; overflow-y: scroll; overflow-x: hidden\">
            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allMembers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 22
            echo "                <li class=\"media\">
                    <a class=\"pull-left\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_create_for_member", array("occurrence" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "member" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\">
                        <img class=\"pull-left media-object thumbnail\" src=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl($context["member"]), "html", null, true);
            echo "\" style=\"max-width: 30px; margin-right: 10px\"/>
                        <div class=\"media-body\">
                            <h4 class=\"media-heading\">
                                ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "lastname", array()), "html", null, true);
            echo "
                            </h4>
                            karnet:
                            ";
            // line 30
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "currentVoucherId", array()))) {
                // line 31
                echo "                                ok
                            ";
            } else {
                // line 33
                echo "                                brak
                            ";
            }
            // line 35
            echo "                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "        </ul>
    </div>

    <div class=\"span3 offset1\">
        <ul class=\"media-list\" style=\"height: 90%; overflow-y: scroll; overflow-x: hidden\">
            ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["membersThatEntered"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 45
            echo "                <li class=\"media\">
                    <a class=\"pull-left\" onClick=\"return confirm('Jesteś pewien?');\" href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("gyman_entry_remove_from_occurrence", array("occurrence" => twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "member" => twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "id", array()))), "html", null, true);
            echo "\">
                        <img class=\"pull-left media-object thumbnail\" src=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('Gyman\Twig\Extension\Avatar')->getAvatarUrl($context["member"]), "html", null, true);
            echo "\" style=\"max-width: 30px; margin-right: 10px\"/>
                        <div class=\"media-body\">
                            <h4 class=\"media-heading\">
                                ";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "lastname", array()), "html", null, true);
            echo "
                            </h4>
                            karnet:
                            ";
            // line 53
            if ( !(null === twig_get_attribute($this->env, $this->getSourceContext(), $context["member"], "currentVoucherId", array()))) {
                // line 54
                echo "                                ok
                            ";
            } else {
                // line 56
                echo "                                brak
                            ";
            }
            // line 58
            echo "                        </div>
                    </a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "        </ul>
        <h3>Weszło: ";
        // line 63
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["membersThatEntered"] ?? null)), "html", null, true);
        echo "</h3>
    </div>
</div>

";
    }

    // line 69
    public function block_javascripts($context, array $blocks = array())
    {
        // line 70
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script>
        \$(function(){
            var occurrenceId = '";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["occurrence"] ?? null), "id", array()), "html", null, true);
        echo "';
            var store = new JSData.DS();
            store.registerAdapter('http', new DSHttpAdapter({
                ";
        // line 77
        if ((twig_get_attribute($this->env, $this->getSourceContext(), ($context["app"] ?? null), "environment", array()) == "prod")) {
            // line 78
            echo "                basePath: \"/api\",
                ";
        } else {
            // line 80
            echo "                basePath: \"/app_dev.php/api\",
                ";
        }
        // line 82
        echo "            }), { default: true });
            var Member = store.defineResource({name: 'member'});
            var Entry = store.defineResource({name: 'entry'});
            \$(document).on(\"enteredMembersBarcode\", function(event, data){
                alert(\"test\");

                Member
                    .find(data.code)
                    .then(function (_member) {
                        var currentVoucher = _member.current_voucher;
                        var entryType; // allowed entryTypes from this page: voucher, credit
                        if(
                            _.isUndefined(currentVoucher)
                            || currentVoucher.is_closed
                            || currentVoucher.left_amount < 1
                            || currentVoucher.left_days == 0
                        ) {
                            entryType = 'credit';
                        } else {
                            entryType = 'voucher';
                        }
                        Entry.create({
                            member: _member.id,
                            occurrence: occurrenceId,
                            entryType: entryType,
                            price: 0
                        }, {
                            afterCreate: function () {
                                window.location.reload();
                            }
                        });
                    })
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "DashboardBundle:Default:listClassMembers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 82,  191 => 80,  187 => 78,  185 => 77,  179 => 74,  171 => 70,  168 => 69,  159 => 63,  156 => 62,  147 => 58,  143 => 56,  139 => 54,  137 => 53,  129 => 50,  123 => 47,  119 => 46,  116 => 45,  112 => 44,  105 => 39,  96 => 35,  92 => 33,  88 => 31,  86 => 30,  78 => 27,  72 => 24,  68 => 23,  65 => 22,  61 => 21,  53 => 16,  48 => 13,  40 => 9,  36 => 8,  32 => 6,  29 => 5,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "DashboardBundle:Default:listClassMembers.html.twig", "/vagrant/src/Bundle/DashboardBundle/Resources/views/Default/listClassMembers.html.twig");
    }
}
