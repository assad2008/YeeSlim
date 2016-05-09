<?php

/* index.html */
class __TwigTemplate_ada3e059967fa1f07747e2b2f92f05f98820351f1a76deab86b0ca47d430f151 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\"/>
        <title>Slim 3</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <style>
            body {
                margin: 50px 0 0 0;
                padding: 0;
                width: 100%;
                font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif;
                text-align: center;
                color: #aaa;
                font-size: 18px;
            }

            h1 {
                color: #719e40;
                letter-spacing: -3px;
                font-family: 'Lato', sans-serif;
                font-size: 100px;
                font-weight: 200;
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
        <h1>Slim</h1>
        <div>a microframework for PHP</div>

        <h2>Hello ";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "!</h2>

    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 32,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8"/>*/
/*         <title>Slim 3</title>*/
/*         <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>*/
/*         <style>*/
/*             body {*/
/*                 margin: 50px 0 0 0;*/
/*                 padding: 0;*/
/*                 width: 100%;*/
/*                 font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;*/
/*                 text-align: center;*/
/*                 color: #aaa;*/
/*                 font-size: 18px;*/
/*             }*/
/* */
/*             h1 {*/
/*                 color: #719e40;*/
/*                 letter-spacing: -3px;*/
/*                 font-family: 'Lato', sans-serif;*/
/*                 font-size: 100px;*/
/*                 font-weight: 200;*/
/*                 margin-bottom: 0;*/
/*             }*/
/*         </style>*/
/*     </head>*/
/*     <body>*/
/*         <h1>Slim</h1>*/
/*         <div>a microframework for PHP</div>*/
/* */
/*         <h2>Hello {{ name }}!</h2>*/
/* */
/*     </body>*/
/* </html>*/
/* */
