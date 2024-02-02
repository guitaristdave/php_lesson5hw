<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* site-info.twig */
class __TwigTemplate_3627d31fcb20d35dcc8465b11ab133b7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"body\">
    <h2>INFO</h2>
    <p><b>Server:</b> ";
        // line 3
        echo twig_escape_filter($this->env, ($context["server"] ?? null), "html", null, true);
        echo "</p>
    <p><b>PHP:</b> ";
        // line 4
        echo twig_escape_filter($this->env, ($context["phpVersion"] ?? null), "html", null, true);
        echo "</p>
    <p><b>User Agent:</b> ";
        // line 5
        echo twig_escape_filter($this->env, ($context["userAgent"] ?? null), "html", null, true);
        echo "</p>
    <p><b>Текущее время:</b> ";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "H:i:s", "Europe/Moscow"), "html", null, true);
        echo "</p>
</div>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "site-info.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  53 => 6,  49 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "site-info.twig", "/data/mysite.local/src/Views/site-info.twig");
    }
}
