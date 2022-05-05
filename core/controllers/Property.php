<?php
class Property Extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this
            ->session
            ->email))
        {
            header('Location:' . base_url() . 'ucp/login/signin/return/' . str_replace('/', '-', uri_string()));
        }
        else
        {
            $get = $this
                ->user_model
                ->get_biodat();
            $this
                ->session
                ->set_userdata($get[0]);
        }
    }
    public function sell()
    {
        $data = $this
            ->session
            ->userdata();
        $data['title'] = 'Dashboard - Home';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('sell_land', $data);
        $this
            ->load
            ->view('end');
    }

    public function confirm_contract()
    {
        $dat = $this
            ->contract_model
            ->get_bid_where();
        $arr = get_object_vars($dat);
        $data = array_merge($arr, $this
            ->session
            ->userdata());
        $data['title'] = 'Dashboard - Home';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('add_contract_bid', $data);
        $this
            ->load
            ->view('end');
    }

    public function publish()
    {
        //Generate Unique contract
        $contract = $this
            ->main_model
            ->publish_property();
        if ($contract == true)
        {
            echo 'true';
        }
        else
        {
            echo $contract;
        }
    }

    public function publish_contract_bid()
    {
        //Generate Unique contract
        $this
            ->main_model
            ->update_contract_bid();
        $contract = $this
            ->main_model
            ->publish_contract();
        if ($contract == true)
        {
            echo 'true';
        }
        else
        {
            echo $contract;
        }
    }

    public function list()
    {
        $data = $this
            ->session
            ->userdata();
        $data['properties'] = $this
            ->main_model
            ->get_properties();
        $data['title'] = 'Dashboard - List Properties';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('list_properties', $data);
        $this
            ->load
            ->view('end');
    }
    public function manage()
    {
        $data = $this
            ->session
            ->userdata();
        $data['properties'] = $this
            ->main_model
            ->get_properties_approved($this->session->mail);
        $data['title'] = 'Dashboard - Manage Properties';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('manage_properties', $data);
        $this
            ->load
            ->view('end');
    }

    public function pending()
    {
        $data = $this
            ->session
            ->userdata();
        $data['properties'] = $this
            ->main_model
            ->get_properties_pending($this->session->email);
        $data['title'] = 'Dashboard - List Properties';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('list_properties_pending', $data);
        $this
            ->load
            ->view('end');
    }

    public function details()
    {
        $data = $this
            ->session
            ->userdata();
        $data['title'] = 'Dashboard - Pending Bids ';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('contract_details', $data);
        $this
            ->load
            ->view('end');
    }

    public function workflows()
    {
        $data = $this
            ->session
            ->userdata();
        $data['contract'] = $this
            ->main_model
            ->get_contracts();
        $data['title'] = 'Dashboard - List Contracts';
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('workflow', $data);
        $this
            ->load
            ->view('end');
    }

    public function update_contract()
    {
        $contract = $this
            ->main_model
            ->update_contract();
        if ($contract == true)
        {
            echo 'true';
        }
        else
        {
            echo $contract;
        }
    }
}
?>
