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

/* main.twig */
class __TwigTemplate_b4c215b896b3a71ba3b0917b3e77266c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 7
        echo "        <title>";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
    </head>
    <body>
        <header class=\"header\">
            <div class=\"menu\">
                <div class=\"menu-item\">
                    <a class=\"menu-link\" href=\"/\">Home</a>
                </div>
                <div class=\"menu-item\">
                    <a class=\"menu-link\" href=\"/user\">Users</a>
                </div>
                <div class=\"menu-item\">
                    <a class=\"menu-link\" href=\"/info\">Info</a>
                </div>
                <div class=\"menu-item\">
                    <a class=\"menu-link\" href=\"/teams\">EPL Teams</a>
                </div>
                <div class=\"menu-item\">
                    <a class=\"menu-link\" href=\"/weather\">Weather</a>
                </div>
            </div>
            <div class=\"time\">Текущее время ";
        // line 28
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "H:i:s", "Europe/Moscow"), "html", null, true);
        echo "</div>
        </header>
        ";
        // line 30
        $this->loadTemplate(($context["content_template_name"] ?? null), "main.twig", 30)->display($context);
        // line 31
        echo "        <footer></footer>
    </body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "            <link rel=\"stylesheet\" href=\"../../styles/style.css\" />
        ";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "main.twig";
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
        return array (  87 => 5,  83 => 4,  77 => 31,  75 => 30,  70 => 28,  45 => 7,  43 => 4,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.twig", "/data/mysite.local/src/Views/main.twig");
    }
}
