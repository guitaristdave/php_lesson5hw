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

/* weather.twig */
class __TwigTemplate_244ee855b79ed30814e4498c1222b60e extends Template
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
    <div class=\"weather-box\">
        <h2 class=\"weather-title\">Погода</h2>
        <p>Город: ";
        // line 4
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, ($context["descr"] ?? null), "html", null, true);
        echo "</p>
        <p>Температура: ";
        // line 5
        echo twig_escape_filter($this->env, ($context["temp"] ?? null), "html", null, true);
        echo " C</p>
        <p>Ощущается, как: ";
        // line 6
        echo twig_escape_filter($this->env, ($context["feels"] ?? null), "html", null, true);
        echo " C</p>
    </div>
</div>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "weather.twig";
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
        return array (  52 => 6,  48 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "weather.twig", "/data/mysite.local/src/Views/weather.twig");
    }
}
