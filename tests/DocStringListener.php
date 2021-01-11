<?php


namespace tars;


use Antlr\Antlr4\Runtime\BufferedTokenStream;
use Antlr\Antlr4\Runtime\Token;

class DocStringListener extends TarsBaseListener
{
    /**
     * @var BufferedTokenStream
     */
    private $tokens;

    /**
     * DocStringListener constructor.
     * @param BufferedTokenStream $tokens
     */
    public function __construct(BufferedTokenStream $tokens)
    {
        $this->tokens = $tokens;
    }

    public function enterConstDef(Context\ConstDefContext $context): void
    {
        $docs = $this->tokens->getHiddenTokensToLeft($context->getStart()->getTokenIndex(), Token::HIDDEN_CHANNEL);
        if (isset($docs[0])) {
            echo $docs[0]->getText(), "\n";
        }
    }
}