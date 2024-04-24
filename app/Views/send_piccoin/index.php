<style>
    .transfer{
        
    display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: center;
    align-items: center;
    }
    .pic-qtd{
           width: 35px!important;
           z-index: 1000;
           transform: translateY(-2px);
          }
          .float-pic-qtd{
              display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        align-items: center;
        width: 150px;
          }
          .float-pic-qtd p{
            color: white!important;
            background-color: #252932 !important;
            padding: 8px 30px;
            border-radius: 10px;
            transform: translateX(10px);
          }
          .float-end{
              transform: translateY(10px);
          }
          .w15p{
          font-weight: 600;
    color: gold!important;
    font-size: 17px;
          }
          .help{
              display: flex;
            flex-wrap:wrap;
            margin-left: 10px;
          }
           .help h2{
               font-size:16px!important;
           }
          
           
           @media (max-width:800px){
             .page-title{
                 display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    flex-direction: column;
             }  
             .dropdown-toggle{
                 display:none;
             }
             .dataTables_filter{
                 margin-bottom: 30px;
                 transform: translateX(-70px);
             }
              #valueForm{
               display:flex;
               flex-direction:column;
           }
           }
          
</style>
<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo 'Transferir PicCoins para Revendedores'; ?></h1>
              <div class="float-end">
           <div class="float-pic-qtd">
               <?php if($login_user->is_admin){ ?>
                 <p style="font-size: 30px; font-family: Arial;">&infin;</p>
                     <style>
                         .float-pic-qtd p {
                        color: white!important;
                        background-color: #252932 !important;
                        padding: 0px 20px;
                        border-radius: 10px;
                        transform: translateX(10px);
                        }
                    </style>
               <img class="pic-qtd" src="<?= base_url("assets/images/piccoin.png") ?>" alt="piccoin">
               <?php } else { ?>
               <p><?=  $piccoinData['balance']; ?></p>
               <img class="pic-qtd" src="<?= base_url("assets/images/piccoin.png") ?>" alt="piccoin">
               <?php }  ?>
           </div>
        </div>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-sm active me-0"  title="<?php echo app_lang('list_view'); ?>"><i data-feather="menu" class="icon-16"></i></button>
                    <?php echo anchor(get_uri("team_members/view"), "<i data-feather='grid' class='icon-16'></i>", array("class" => "btn btn-default btn-sm")); ?>
                </div>
                <?php
                if ($login_user->is_admin || get_array_value($login_user->permissions, "can_add_or_invite_new_team_members")) {
                    // echo modal_anchor(get_uri("team_members/invitation_modal"), "<i data-feather='mail' class='icon-16'></i> " . app_lang('send_invitation'), array("class" => "btn btn-default", "title" => app_lang('send_invitation')));
                    echo modal_anchor(get_uri("team_members/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . "Criar Revendedor", array("class" => "btn btn-default", "title" => app_lang('add_team_member')));
                }
                ?>
            </div>
       
        </div>
        
        
        <div class="table-responsive">
            <table id="team_member-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
        <div class="help">
         <h2>Você também pode retirar PicCoins dos revendedores que você criou, inserindo um valor negativo! </h2>
         </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function () {
    var visibleContact = false;
    if ("<?php echo $show_contact_info; ?>") {
        visibleContact = true;
    }

    var visibleDelete = false;
    if ("<?php echo $login_user->is_admin; ?>") {
        visibleDelete = true;
    }

    var visibleTransfer = false; // Defina a variável para controlar a exibição da coluna "Transferir"
    if ("<?php echo $show_transfer_column; ?>") {
        visibleTransfer = true;
    }

    $("#team_member-table").appTable({
        source: '<?php echo_uri("team_members/list_data/") ?>',
        order: [[1, "asc"]],
        radioButtons: [
            {text: '<?php echo app_lang("active_members") ?>', name: "status", value: "active", isChecked: true},
            {text: '<?php echo app_lang("inactive_members") ?>', name: "status", value: "inactive", isChecked: false}
        ],
        filterDropdown: [<?php echo $custom_field_filters; ?>],
        columns: [
            {title: '', "class": "w50 text-center all"},
            {title: "<?php echo app_lang("name") ?>", "class": "w200 all"},
            {title: "<?php echo 'PicCoins'; ?>", "class": "w15p"},
            {visible: visibleContact, title: "<?php echo app_lang("email") ?>", "class": "w20p"},
            {visible: visibleContact, title: "<?php echo app_lang("phone") ?>", "class": "w15p"},
            <?php echo $custom_field_headers; ?>
            <?php if ($show_transfer_column): ?>
            {title: '<?php echo app_lang("transfer") ?>', "class": "w15p column-transfer"}
            <?php endif; ?>
            {visible: visibleDelete, title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w100"},
        ],
        printColumns: combineCustomFieldsColumns([1, 2, 3, 4,5], '<?php echo $custom_field_headers; ?>'),
        xlsColumns: combineCustomFieldsColumns([1, 2, 3, 4,5], '<?php echo $custom_field_headers; ?>')

    });
});
</script>  
<script type="text/javascript">
$(document).ready(function(){
    $('#team_member-table').on('click', '.valueForm', function(e) {
        setTimeout(function(){
            $('.valueForm').appForm({
                isModal: false,
                onSuccess: function(result) {
                    appAlert.success(result.message, {duration: 3000});

                    var reloadUrl = "<?php echo site_url('shop/send_piccoin'); ?>";
                    if (reloadUrl) {
                        setTimeout(function () {
                            window.location.href = reloadUrl;
                        }, 3000);
                    }
                },
                
                onError: function(result) {
                    appAlert.error(result.message, {duration: 3000});
                
                    var reloadUrl = "<?php echo site_url('shop/send_piccoin'); ?>";
                    if (reloadUrl) {
                        setTimeout(function () {
                            window.location.href = reloadUrl;
                        }, 3000);
                    }
                }
            });
        }, 500); // Delay de 500 milissegundos
    });
});
</script>


