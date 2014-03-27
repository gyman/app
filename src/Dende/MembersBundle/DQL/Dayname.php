<?php

namespace Dende\MembersBundle\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * DaynameFunction ::= "DAYNAME" "(" ArithmeticPrimary ")"
 */
class Dayname extends FunctionNode {

    public $dateExpression = null;

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker) {
        return 'LOWER(DAYNAME(' . $this->dateExpression->dispatch($sqlWalker) . '))';
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser) {
        $parser->match(Lexer::T_IDENTIFIER); // (2)
        $parser->match(Lexer::T_OPEN_PARENTHESIS); // (3)
        $this->dateExpression = $parser->ArithmeticPrimary(); // (4)
        $parser->match(Lexer::T_CLOSE_PARENTHESIS); // (3)
    }

}
