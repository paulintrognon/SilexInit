<?php

/* layout.html.twig */
class __TwigTemplate_3a32047de3b65b87e3ae4af38db5d0d1 extends Twig_Template
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
        // line 2
        echo "
<!DOCTYPE html>

<html>
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title>Silex Init</title>
\t</head>
\t
\t<body>
\t\t<div id=\"content\">

\t\t\t";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "
\t\t</div>
\t</body>
</html>

<!doctype html>
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "\t\t\t\t
\t\t\t";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  49 => 15,  46 => 14,  36 => 17,  34 => 14,  20 => 2,);
    }
}
