<?php

namespace TransactPRO\Gate\Builders;

class GetTerminalLimitsBuilder extends Builder
{
    public function build()
    {
        return array(
            'mid' => $this->getField('mid'),
        );
    }

    protected function checkData()
    {

    }
}