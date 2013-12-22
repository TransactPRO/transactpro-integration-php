<?php

namespace TransactPRO\Gate\Builders;

class AccessDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'apiUrl'    => $this->data['apiUrl'],
            'guid'      => $this->data['guid'],
            'pwd'       => sha1($this->data['pwd']),
            'verifySSL' => isset($this->data['verifySSL']) ? $this->data['verifySSL'] : true
        );
    }

    protected function checkData(array $data)
    {
        $this->checkMandatoryField($data, 'apiUrl');
        $this->checkMandatoryField($data, 'guid');
        $this->checkMandatoryField($data, 'pwd');
    }
}