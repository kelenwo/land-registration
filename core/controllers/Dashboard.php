<?php
class Dashboard Extends CI_Controller
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

        $bids = $this
            ->contract_model
            ->get_contracts();
        foreach ($bids as $bid)
        {
            if (strtotime($bid['bid_closing_date']) < strtotime(date('d F, Y')))
            {
                //$bid_amount = $bid['bid_amount'];
                $bid_number = $bid['bid_number'];
                $bid_avg = $this
                    ->contract_model
                    ->get_bids_avg($bid_number);
                if (!empty($bid_avg))
                {
                    $off = $bid_avg;
                    $bidwin = $off[floor(count($off) / 2) ];
                    //var_dump($bidwin);
                    if ($bidwin['bid_status'] == 'pending')
                    {
                        $update = $this
                            ->contract_model
                            ->update_bid_auto($bidwin['bid_number'], $bidwin['id']);
                    }
                }
            }
        }
    }
    public function index()
    {
        $data = $this
            ->session
            ->userdata();
        $data['title'] = 'Dashboard - Home';
        $data['events'] = $this
            ->main_model
            ->get_events_where();
        $data['events_board'] = $this
            ->main_model
            ->get_events_limit();
        $data['contracts_new'] = $this
            ->main_model
            ->get_contracts_new();
        $data['contracts_count'] = $this
            ->main_model
            ->count_contracts();
        $data['contracts_finished'] = $this
            ->main_model
            ->count_contracts_finished();
        $data['contracts_pending_count'] = $this
            ->main_model
            ->count_contracts_pending();
        $data['contracts_approved_count'] = $this
            ->main_model
            ->count_contracts_approved();
        $data['contracts_active_count'] = $this
            ->main_model
            ->count_contracts_active();
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('index', $data);
        $this
            ->load
            ->view('end');
    }

    public function profile()
    {
        $data = get_object_vars($this
            ->user_model
            ->get_biodata());
        if (array_search(null, $data) !== false)
        {
            $data['update'] = true;
        }
        $data['title'] = 'Profile -' . $this
            ->session->name;
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('profile', $data);
        $this
            ->load
            ->view('end');
    }
    public function edit_profile()
    {
        $data = get_object_vars($this
            ->user_model
            ->get_biodata());
        $data['title'] = 'Profile -' . $this
            ->session->name;
        $this
            ->parser
            ->parse('head', $data);
        $this
            ->parser
            ->parse('profile_edit', $data);
        $this
            ->load
            ->view('end');
    }

    public function do_upload()
    {
        $type = $this
            ->input
            ->post('type');
        $config['allowed_types'] = 'png|pdf|jpg|jpeg';
        $config['max_size'] = 10000;
        $config['upload_path'] = './uploads/documents/';
        $this
            ->upload
            ->initialize($config);
        if ($this
            ->upload
            ->do_upload($type))
        {
            $document = $this
                ->upload
                ->data('file_name');
            echo '
  <b><i class="fa fa-check-square-o" style="color:green; font-size:14px;"> Document Uploaded successfully</i></b>
  <script>
  $(".' . $type . '").val("' . $document . '");
  $("#' . $type . '").val("' . $document . '");
  </script>';
        }
        else
        {
            $msg = $this
                ->upload
                ->display_errors();
            echo '
          <i class="fa fa-info-circle" style="color:red;">' . $msg . '</i>';
        }
    }
    public function update_profile()
    {
        $user = $this
            ->user_model
            ->update_user();
        if ($user == true)
        {
            echo 'true';
        }
        else
        {
            echo $user;
        }
    }
}
?>
