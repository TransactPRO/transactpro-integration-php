<?php
namespace TransactPRO\Gate\Builders;

class VerifyEnrollmentDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'cc' => $this->getField('cc'),
            'mid' => $this->getField('mid'),
            'currency' => $this->getField('currency'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('cc');
        $this->checkMandatoryField('mid');
        $this->checkMandatoryField('currency');
    }
}