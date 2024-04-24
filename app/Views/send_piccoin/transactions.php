<style>
    .transfer{
        
    display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: center;
    align-items: center;

    }
    tr{
           border: .1px solid #f2f2f2;
    height: 45px;
    font-size: 16px;
    font-weight: 600;
    border-color: #2f3541!important;
    }
    .card h1{
        font-weight:bold;
    }
</style>
<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo 'Todas transações de PicCoins que você fez'; ?></h1>
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
         <table class="display" cellspacing="0" width="100%">
        <tr>
            <th class="w50 text-center all">ID</th>
            <th class="w200 all">Enviado por</th>
            <th class="w15p">Recebido por</th>
            <th class="w20p">Valor</th>
            <th class="w15p">Horário e data</th>
            <?php if ($show_contact_info): ?>
                <th class="w15p">Contact Info</th>
            <?php endif; ?>
        </tr class="odd">
        <?php foreach($transactions as $transaction): ?>
            <tr>
                <td class="w50 text-center all"><?= $transaction['id']; ?></td>
                <td class="w200 all"><?= $transaction['sender_name']; ?></td>
                <td class="w15p"><?= $transaction['receiver_name']; ?></td>
                <td class="w20p"><?= $transaction['amount']; ?></td>
                <td class="w15p"><?= $transaction['timestamp']; ?></td>
                <?php if ($show_contact_info): ?>
                    <td class="w15p"><?= $transaction['contact_info']; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
        </div>
    </div>
</div>





  
