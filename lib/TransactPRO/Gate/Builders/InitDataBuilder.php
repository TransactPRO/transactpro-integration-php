<?

namespace TransactPRO\Gate\Builders;

class InitDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'rs'                      => $this->data['rs'],
            'merchant_transaction_id' => $this->data['merchant_transaction_id'],
            'user_ip'                 => $this->getUserIp($this->data),
            'description'             => $this->data['description'],
            'amount'                  => $this->data['amount'],
            'currency'                => $this->data['currency'],
            'name_on_card'            => $this->data['name_on_card'],
            'street'                  => $this->data['street'],
            'zip'                     => $this->data['zip'],
            'city'                    => $this->data['city'],
            'country'                 => $this->data['country'],
            'state'                   => $this->getState($this->data),
            'email'                   => $this->data['email'],
            'phone'                   => $this->data['phone'],
            'card_bin'                => $this->getCardBin($this->data),
            'bin_name'                => $this->getBinName($this->data),
            'bin_phone'               => $this->getBinPhone($this->data),
            'merchant_site_url'       => $this->data['merchant_site_url'],
        );
    }

    protected function checkData(array $data)
    {
        $this->checkMandatoryField($data, 'rs');
        $this->checkMandatoryField($data, 'merchant_transaction_id');
        $this->checkMandatoryField($data, 'description');
        $this->checkMandatoryField($data, 'amount');
        $this->checkMandatoryField($data, 'currency');
        $this->checkMandatoryField($data, 'name_on_card');
        $this->checkMandatoryField($data, 'street');
        $this->checkMandatoryField($data, 'zip');
        $this->checkMandatoryField($data, 'city');
        $this->checkMandatoryField($data, 'country');
        $this->checkMandatoryField($data, 'phone');
        $this->checkMandatoryField($data, 'merchant_site_url');
    }

    private function getUserIp(array $data)
    {
        return isset($data['user_ip']) ? $data['user_ip'] : $_SERVER['REMOTE_ADDR'];
    }

    private function getState(array $data)
    {
        return isset($data['state']) ? $data['state'] : 'NA';
    }

    private function getCardBin(array $data)
    {
        return isset($data['card_bin']) ? $data['card_bin'] : '';
    }

    private function getBinName(array $data)
    {
        return isset($data['bin_name']) ? $data['bin_name'] : '';
    }

    private function getBinPhone(array $data)
    {
        return isset($data['bin_phone']) ? $data['bin_phone'] : '';
    }
}