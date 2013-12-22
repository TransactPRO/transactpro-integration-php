<?php

namespace TransactPRO\Gate\Builders;

class AccessDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'apiUrl'    => $this->getField('apiUrl'),
            'guid'      => $this->getField('guid'),
            'pwd'       => sha1($this->getField('pwd')),
            'verifySSL' => $this->getField('verifySSL', true)
        );
    }

    protected function checkData(array $data)
    {
        $this->checkMandatoryField($data, 'apiUrl');
        $this->checkMandatoryField($data, 'guid');
        $this->checkMandatoryField($data, 'pwd');
    }
}