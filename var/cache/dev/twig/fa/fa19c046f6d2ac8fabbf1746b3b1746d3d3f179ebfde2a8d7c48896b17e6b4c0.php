<?php

/* GymanAppBundle::individual_widgets.html.twig */
class __TwigTemplate_f40b0a31d1eac717e3726a13f7797cc56b1dca175f130c26f19f461c2a9db8e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '_gyman_entries_entry_startDate_widget' => array($this, 'block__gyman_entries_entry_startDate_widget'),
            '_dende_schedulebundle_event_activity_widget' => array($this, 'block__dende_schedulebundle_event_activity_widget'),
            '_dende_schedulebundle_event_startDate_widget' => array($this, 'block__dende_schedulebundle_event_startDate_widget'),
            '_gyman_members_member_form_type_birthdate_widget' => array($this, 'block__gyman_members_member_form_type_birthdate_widget'),
            '_dende_schedulebundle_event_endDate_widget' => array($this, 'block__dende_schedulebundle_event_endDate_widget'),
            '_filter_filters_row' => array($this, 'block__filter_filters_row'),
            '_filter_filters_widget' => array($this, 'block__filter_filters_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fe588c0c635350c68ce2fd37e9dc891a9b320d36e927ced7c086f46539f1630c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fe588c0c635350c68ce2fd37e9dc891a9b320d36e927ced7c086f46539f1630c->enter($__internal_fe588c0c635350c68ce2fd37e9dc891a9b320d36e927ced7c086f46539f1630c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle::individual_widgets.html.twig"));

        $__internal_818d582c076ca52b8172a4c93f20a96d67655b8f057320f766788f67464f6f8d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_818d582c076ca52b8172a4c93f20a96d67655b8f057320f766788f67464f6f8d->enter($__internal_818d582c076ca52b8172a4c93f20a96d67655b8f057320f766788f67464f6f8d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GymanAppBundle::individual_widgets.html.twig"));

        // line 1
        $this->displayBlock('_gyman_entries_entry_startDate_widget', $context, $blocks);
        // line 9
        echo "
";
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('_dende_schedulebundle_event_activity_widget', $context, $blocks);
        // line 17
        echo "
";
        // line 18
        $this->displayBlock('_dende_schedulebundle_event_startDate_widget', $context, $blocks);
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('_gyman_members_member_form_type_birthdate_widget', $context, $blocks);
        // line 35
        echo "
";
        // line 36
        $this->displayBlock('_dende_schedulebundle_event_endDate_widget', $context, $blocks);
        // line 44
        echo "
";
        // line 45
        $this->displayBlock('_filter_filters_row', $context, $blocks);
        // line 50
        echo "
";
        // line 51
        $this->displayBlock('_filter_filters_widget', $context, $blocks);
        // line 79
        echo "



";
        
        $__internal_fe588c0c635350c68ce2fd37e9dc891a9b320d36e927ced7c086f46539f1630c->leave($__internal_fe588c0c635350c68ce2fd37e9dc891a9b320d36e927ced7c086f46539f1630c_prof);

        
        $__internal_818d582c076ca52b8172a4c93f20a96d67655b8f057320f766788f67464f6f8d->leave($__internal_818d582c076ca52b8172a4c93f20a96d67655b8f057320f766788f67464f6f8d_prof);

    }

    // line 1
    public function block__gyman_entries_entry_startDate_widget($context, array $blocks = array())
    {
        $__internal_140f22eb4764fa2ceb7ec02b2f6ac7c62742929fd98c19a4123cf65e9143e31a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_140f22eb4764fa2ceb7ec02b2f6ac7c62742929fd98c19a4123cf65e9143e31a->enter($__internal_140f22eb4764fa2ceb7ec02b2f6ac7c62742929fd98c19a4123cf65e9143e31a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_gyman_entries_entry_startDate_widget"));

        $__internal_30b27a5a2f7ca6c69a3be5719132f783fe02dc83c45c6db8412eee60e7f222b9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_30b27a5a2f7ca6c69a3be5719132f783fe02dc83c45c6db8412eee60e7f222b9->enter($__internal_30b27a5a2f7ca6c69a3be5719132f783fe02dc83c45c6db8412eee60e7f222b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_gyman_entries_entry_startDate_widget"));

        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        <div class=\"input-append date\" id=\"entryStartDate\">
            ";
        // line 4
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_30b27a5a2f7ca6c69a3be5719132f783fe02dc83c45c6db8412eee60e7f222b9->leave($__internal_30b27a5a2f7ca6c69a3be5719132f783fe02dc83c45c6db8412eee60e7f222b9_prof);

        
        $__internal_140f22eb4764fa2ceb7ec02b2f6ac7c62742929fd98c19a4123cf65e9143e31a->leave($__internal_140f22eb4764fa2ceb7ec02b2f6ac7c62742929fd98c19a4123cf65e9143e31a_prof);

    }

    // line 12
    public function block__dende_schedulebundle_event_activity_widget($context, array $blocks = array())
    {
        $__internal_26952bac4162df570d7d5f612d00d76de4ca7c5d6423e4edf77868a348851e6e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_26952bac4162df570d7d5f612d00d76de4ca7c5d6423e4edf77868a348851e6e->enter($__internal_26952bac4162df570d7d5f612d00d76de4ca7c5d6423e4edf77868a348851e6e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_dende_schedulebundle_event_activity_widget"));

        $__internal_929b76b63f84ab85baf9756820720a77728242d7a09be4592a2abb56c9457edc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_929b76b63f84ab85baf9756820720a77728242d7a09be4592a2abb56c9457edc->enter($__internal_929b76b63f84ab85baf9756820720a77728242d7a09be4592a2abb56c9457edc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_dende_schedulebundle_event_activity_widget"));

        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "        ";
        $this->displayBlock("choice_widget_collapsed", $context, $blocks);
        echo " <div><a id=\"addNewActivity\" href=\"#\" class=\"btn btn-link\">+ dodaj nowe</a></div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_929b76b63f84ab85baf9756820720a77728242d7a09be4592a2abb56c9457edc->leave($__internal_929b76b63f84ab85baf9756820720a77728242d7a09be4592a2abb56c9457edc_prof);

        
        $__internal_26952bac4162df570d7d5f612d00d76de4ca7c5d6423e4edf77868a348851e6e->leave($__internal_26952bac4162df570d7d5f612d00d76de4ca7c5d6423e4edf77868a348851e6e_prof);

    }

    // line 18
    public function block__dende_schedulebundle_event_startDate_widget($context, array $blocks = array())
    {
        $__internal_117793774752a62e96cee3a453f65591137ac5db61af9a2d4fcde95ad44e7f82 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_117793774752a62e96cee3a453f65591137ac5db61af9a2d4fcde95ad44e7f82->enter($__internal_117793774752a62e96cee3a453f65591137ac5db61af9a2d4fcde95ad44e7f82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_dende_schedulebundle_event_startDate_widget"));

        $__internal_02b9794c9494f513f16015903fb18cfdf22bc5a0de598ac507d6782e9b9401fc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_02b9794c9494f513f16015903fb18cfdf22bc5a0de598ac507d6782e9b9401fc->enter($__internal_02b9794c9494f513f16015903fb18cfdf22bc5a0de598ac507d6782e9b9401fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_dende_schedulebundle_event_startDate_widget"));

        // line 19
        echo "    ";
        ob_start();
        // line 20
        echo "        <div class=\"input-append date\" id=\"eventStartDate\">
            ";
        // line 21
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_02b9794c9494f513f16015903fb18cfdf22bc5a0de598ac507d6782e9b9401fc->leave($__internal_02b9794c9494f513f16015903fb18cfdf22bc5a0de598ac507d6782e9b9401fc_prof);

        
        $__internal_117793774752a62e96cee3a453f65591137ac5db61af9a2d4fcde95ad44e7f82->leave($__internal_117793774752a62e96cee3a453f65591137ac5db61af9a2d4fcde95ad44e7f82_prof);

    }

    // line 27
    public function block__gyman_members_member_form_type_birthdate_widget($context, array $blocks = array())
    {
        $__internal_9ecfd6c9b9dbccdd3c9db39fcc8202099214871b86bea16930c1b5b0dd2da19c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9ecfd6c9b9dbccdd3c9db39fcc8202099214871b86bea16930c1b5b0dd2da19c->enter($__internal_9ecfd6c9b9dbccdd3c9db39fcc8202099214871b86bea16930c1b5b0dd2da19c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_gyman_members_member_form_type_birthdate_widget"));

        $__internal_9e5ff44b73ff337c82c3e0fa4a4791a385c5669b05f380a74bd73861421b3229 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9e5ff44b73ff337c82c3e0fa4a4791a385c5669b05f380a74bd73861421b3229->enter($__internal_9e5ff44b73ff337c82c3e0fa4a4791a385c5669b05f380a74bd73861421b3229_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_gyman_members_member_form_type_birthdate_widget"));

        // line 28
        echo "    ";
        ob_start();
        // line 29
        echo "        <div class=\"input-append date\" id=\"memberBirthdate\">
            ";
        // line 30
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_9e5ff44b73ff337c82c3e0fa4a4791a385c5669b05f380a74bd73861421b3229->leave($__internal_9e5ff44b73ff337c82c3e0fa4a4791a385c5669b05f380a74bd73861421b3229_prof);

        
        $__internal_9ecfd6c9b9dbccdd3c9db39fcc8202099214871b86bea16930c1b5b0dd2da19c->leave($__internal_9ecfd6c9b9dbccdd3c9db39fcc8202099214871b86bea16930c1b5b0dd2da19c_prof);

    }

    // line 36
    public function block__dende_schedulebundle_event_endDate_widget($context, array $blocks = array())
    {
        $__internal_eb875664808f13ab78fe61519c7f63ad2919dfb0feac4967c43adf954716bf54 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eb875664808f13ab78fe61519c7f63ad2919dfb0feac4967c43adf954716bf54->enter($__internal_eb875664808f13ab78fe61519c7f63ad2919dfb0feac4967c43adf954716bf54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_dende_schedulebundle_event_endDate_widget"));

        $__internal_b2ae07413c5531286be566c2563fc1228dc94ffc2e9e7987b66dac3b57712aad = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b2ae07413c5531286be566c2563fc1228dc94ffc2e9e7987b66dac3b57712aad->enter($__internal_b2ae07413c5531286be566c2563fc1228dc94ffc2e9e7987b66dac3b57712aad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_dende_schedulebundle_event_endDate_widget"));

        // line 37
        echo "    ";
        ob_start();
        // line 38
        echo "        <div class=\"input-append date\" id=\"eventEndDate\">
            ";
        // line 39
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_b2ae07413c5531286be566c2563fc1228dc94ffc2e9e7987b66dac3b57712aad->leave($__internal_b2ae07413c5531286be566c2563fc1228dc94ffc2e9e7987b66dac3b57712aad_prof);

        
        $__internal_eb875664808f13ab78fe61519c7f63ad2919dfb0feac4967c43adf954716bf54->leave($__internal_eb875664808f13ab78fe61519c7f63ad2919dfb0feac4967c43adf954716bf54_prof);

    }

    // line 45
    public function block__filter_filters_row($context, array $blocks = array())
    {
        $__internal_0daa6f3fc28d5a0a465233b84e0d3332548816ec9a22d2a8561eff9ea2b6bf94 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0daa6f3fc28d5a0a465233b84e0d3332548816ec9a22d2a8561eff9ea2b6bf94->enter($__internal_0daa6f3fc28d5a0a465233b84e0d3332548816ec9a22d2a8561eff9ea2b6bf94_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_filter_filters_row"));

        $__internal_8c0daf50a3bb34f7ce27510f8182141d5fbc52edb67ebf677f7d4bbc679a424f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8c0daf50a3bb34f7ce27510f8182141d5fbc52edb67ebf677f7d4bbc679a424f->enter($__internal_8c0daf50a3bb34f7ce27510f8182141d5fbc52edb67ebf677f7d4bbc679a424f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_filter_filters_row"));

        // line 46
        echo "    <div class=\"alert\">
    ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
    </div>
";
        
        $__internal_8c0daf50a3bb34f7ce27510f8182141d5fbc52edb67ebf677f7d4bbc679a424f->leave($__internal_8c0daf50a3bb34f7ce27510f8182141d5fbc52edb67ebf677f7d4bbc679a424f_prof);

        
        $__internal_0daa6f3fc28d5a0a465233b84e0d3332548816ec9a22d2a8561eff9ea2b6bf94->leave($__internal_0daa6f3fc28d5a0a465233b84e0d3332548816ec9a22d2a8561eff9ea2b6bf94_prof);

    }

    // line 51
    public function block__filter_filters_widget($context, array $blocks = array())
    {
        $__internal_c5af3e315330d44d1eaf33a6fc78b3d1bca41859c5b669c360dafaef8e0a206a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c5af3e315330d44d1eaf33a6fc78b3d1bca41859c5b669c360dafaef8e0a206a->enter($__internal_c5af3e315330d44d1eaf33a6fc78b3d1bca41859c5b669c360dafaef8e0a206a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_filter_filters_widget"));

        $__internal_5d0b6df850738724d98119a41e940ecc167bb0dc3dee807e83376f142f65f779 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5d0b6df850738724d98119a41e940ecc167bb0dc3dee807e83376f142f65f779->enter($__internal_5d0b6df850738724d98119a41e940ecc167bb0dc3dee807e83376f142f65f779_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "_filter_filters_widget"));

        // line 52
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subfilter"]) {
            // line 53
            echo "        <div class=\"control-group ";
            if ( !twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["form"] ?? null), "vars", array()), "valid", array())) {
                echo "error";
            }
            echo "\">
            ";
            // line 54
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["subfilter"], 'label');
            echo "
            ";
            // line 55
            if (twig_in_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["subfilter"], "vars", array()), "name", array()), array(0 => "Age", 1 => "Belt", 2 => "Price", 3 => "RegistrationDate", 4 => "VoucherStart", 5 => "VoucherEnd"))) {
                // line 56
                echo "                <div class=\"controls\">
                    ";
                // line 57
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["subfilter"]);
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 58
                    echo "                        ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'widget');
                    echo "
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "                    <div class=\"help-block\">
                        ";
                // line 61
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["subfilter"]);
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 62
                    echo "                            ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'errors');
                    echo "
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "                    </div>
                </div>
            ";
            } else {
                // line 67
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["subfilter"]);
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 68
                    echo "                <div class=\"controls\">
                    ";
                    // line 69
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["subfilter"], 'widget');
                    echo "
                    <div class=\"help-block\">
                        ";
                    // line 71
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["subfilter"], 'errors');
                    echo "
                    </div>
                </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 75
                echo "            ";
            }
            // line 76
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subfilter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "    </div>
";
        
        $__internal_5d0b6df850738724d98119a41e940ecc167bb0dc3dee807e83376f142f65f779->leave($__internal_5d0b6df850738724d98119a41e940ecc167bb0dc3dee807e83376f142f65f779_prof);

        
        $__internal_c5af3e315330d44d1eaf33a6fc78b3d1bca41859c5b669c360dafaef8e0a206a->leave($__internal_c5af3e315330d44d1eaf33a6fc78b3d1bca41859c5b669c360dafaef8e0a206a_prof);

    }

    public function getTemplateName()
    {
        return "GymanAppBundle::individual_widgets.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  348 => 77,  342 => 76,  339 => 75,  329 => 71,  324 => 69,  321 => 68,  316 => 67,  311 => 64,  302 => 62,  298 => 61,  295 => 60,  286 => 58,  282 => 57,  279 => 56,  277 => 55,  273 => 54,  266 => 53,  261 => 52,  252 => 51,  239 => 47,  236 => 46,  227 => 45,  212 => 39,  209 => 38,  206 => 37,  197 => 36,  182 => 30,  179 => 29,  176 => 28,  167 => 27,  152 => 21,  149 => 20,  146 => 19,  137 => 18,  123 => 14,  120 => 13,  111 => 12,  96 => 4,  93 => 3,  90 => 2,  81 => 1,  67 => 79,  65 => 51,  62 => 50,  60 => 45,  57 => 44,  55 => 36,  52 => 35,  50 => 27,  47 => 26,  45 => 18,  42 => 17,  40 => 12,  37 => 11,  34 => 9,  32 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block _gyman_entries_entry_startDate_widget %}
    {% spaceless %}
        <div class=\"input-append date\" id=\"entryStartDate\">
            {{ block('form_widget_simple') }}
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    {% endspaceless %}
{% endblock _gyman_entries_entry_startDate_widget %}

{# adding new events modal #}

{% block _dende_schedulebundle_event_activity_widget %}
    {% spaceless %}
        {{ block('choice_widget_collapsed') }} <div><a id=\"addNewActivity\" href=\"#\" class=\"btn btn-link\">+ dodaj nowe</a></div>
    {% endspaceless %}
{% endblock _dende_schedulebundle_event_activity_widget %}

{% block _dende_schedulebundle_event_startDate_widget %}
    {% spaceless %}
        <div class=\"input-append date\" id=\"eventStartDate\">
            {{ block('form_widget_simple') }}
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    {% endspaceless %}
{% endblock _dende_schedulebundle_event_startDate_widget %}

{% block _gyman_members_member_form_type_birthdate_widget %}
    {% spaceless %}
        <div class=\"input-append date\" id=\"memberBirthdate\">
            {{ block('form_widget_simple') }}
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    {% endspaceless %}
{% endblock _gyman_members_member_form_type_birthdate_widget %}

{% block _dende_schedulebundle_event_endDate_widget %}
    {% spaceless %}
        <div class=\"input-append date\" id=\"eventEndDate\">
            {{ block('form_widget_simple') }}
            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
        </div>
    {% endspaceless %}
{% endblock _dende_schedulebundle_event_endDate_widget %}

{% block _filter_filters_row %}
    <div class=\"alert\">
    {{ form_widget(form) }}
    </div>
{% endblock _filter_filters_row %}

{% block _filter_filters_widget %}
    {% for subfilter in form %}
        <div class=\"control-group {% if not form.vars.valid %}error{% endif %}\">
            {{ form_label(subfilter) }}
            {% if subfilter.vars.name in [\"Age\",\"Belt\",\"Price\",\"RegistrationDate\",\"VoucherStart\",\"VoucherEnd\"] %}
                <div class=\"controls\">
                    {% for field  in subfilter %}
                        {{ form_widget(field) }}
                    {% endfor %}
                    <div class=\"help-block\">
                        {% for field  in subfilter %}
                            {{ form_errors(field) }}
                        {% endfor %}
                    </div>
                </div>
            {% else %}
                {% for field  in subfilter %}
                <div class=\"controls\">
                    {{ form_widget(subfilter) }}
                    <div class=\"help-block\">
                        {{ form_errors(subfilter) }}
                    </div>
                </div>
                {% endfor %}
            {% endif %}
        {% endfor %}
    </div>
{% endblock _filter_filters_widget %}




", "GymanAppBundle::individual_widgets.html.twig", "/vagrant/src/Bundle/AppBundle/Resources/views/individual_widgets.html.twig");
    }
}
