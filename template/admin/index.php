<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Dashboard</h3>
    </div>
                  <div class="panel-body panel">
<div class="content-row">
            <div class="tab-contents" style="width: 100%;">
     <div class="col-md-12 col-lg-12 col-sm-12">
       <h5>Admin Dashboard</h5>
       <hr/>
       <div class="col-xl-10 col-lg-10">
         <div class="card shadow mb-4">
           <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <h5 class="m-0 font-weight-bold text-primary">Overview</h5>
           </div>
           <!-- Card Body -->
           <div class="card-body" >
<?php //foreach ($events as $req): ?>
<span style="font-size:1.3em;" class="mt-3 text-primary text-sm">Total Contracts:
  <b>{contracts_count}</b></span> <hr/>
  <span style="font-size:1.3em;" class="mt-3 text-primary text-sm">Approved Contracts :
    <b>{contracts_approved_count}</b></span> <hr/>
    <span style="font-size:1.3em;" class="mt-3 text-primary text-sm">Active Contracts:
      <b>{contracts_active_count}</b></span> <hr/>
      <span style="font-size:1.3em;" class="mt-3 text-primary text-sm">Pending Approval:
        <b>{contracts_pending_count}</b></span> <hr/>
        <span style="font-size:1.3em;" class="mt-3 text-primary text-sm">Registered Users:
          <b>{users_count}</b></span> <hr/>
<?php //endforeach;?>
           </div>
         </div>
       </div>
       <div class="col-xl-10 col-lg-10">
         <div class="card shadow mb-4">
           <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <h5 class="m-0 font-weight-bold text-primary">Events:</h5>
           </div>
           <!-- Card Body -->
           <div class="card-body" >
<?php foreach ($events as $req): ?>
<span style="font-size:1.3em;" class="mt-3 text-primary text-sm">
  <b><?php echo date('d F, Y',strtotime($req['event_date']));?>; <?php echo  date('h:m a',strtotime($req['event_time']));?>:&nbsp;</b> <?php echo $req['event_title'];?>.</span> <hr/>
<?php endforeach;?>
           </div>
         </div>
       </div>
     </div>


</div>
</div>
</div>

          </div>
        </div>
