<style>
    li{
        cursor:pointer;
    }
    .piccoin{
       max-width: 25px!important;
    height: 25px; 
    }
    
    /*Only view the shop when is created by of other user*/
    <?php if ($login_user->is_admin == 1 || $login_user->created_by == 0) : ?>
    .piccoin_loja li:nth-child(1){
       display:none;
    }
   <?php endif; ?>
    
     /*Only view the shop when is created by of other user*/
    <?php if ($login_user->role_id == 8 || $login_user->role_id == 14) : ?>
    .piccoin_loja li:nth-child(3){
       display:none;
    }
    <?php endif; ?>
    
</style>
<div class="sidebar sidebar-off">
   
    <?php
    $user = $login_user->id;
    $admin = $login_user->is_admin;
    $dashboard_link = get_uri("dashboard");
    $user_dashboard = get_setting("user_" . $user . "_dashboard");
    if ($user_dashboard) {
        $dashboard_link = get_uri("dashboard/view/" . $user_dashboard);
    }
    ?>
    <a class="sidebar-toggle-btn hide" href="#">
        <i data-feather="menu" class="icon mt-1 text-off"></i>
    </a>

    <a class="sidebar-brand brand-logo" href="<?php echo $dashboard_link; ?>"><img class="dashboard-image" src="<?php echo get_logo_url(); ?>" /></a>
    <a class="sidebar-brand brand-logo-mini" href="<?php echo $dashboard_link; ?>"><img class="dashboard-image" src="<?php echo get_favicon_url(); ?>" /></a>

    <div class="sidebar-scroll">
        <ul id="sidebar-menu" class="sidebar-menu">
            <?php
            if (!$is_preview) {
                $sidebar_menu = get_active_menu($sidebar_menu);
            }
            ?>
         <?php if($admin){ ?>
        
             <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a <?php echo $target; ?> href="<?php echo site_url('admin/index'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <span class="menu-text <?php echo $custom_class; ?>">Admin</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                </li>
              <?php } ?> 
              <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a <?php echo $target; ?> href="<?php echo site_url('plans_into/index'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key icon"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                        <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                        <span class="menu-text <?php echo $custom_class; ?>">Assinaturas</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                </li>
                
                <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main expand" >
                    <a <?php echo $target; ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload icon"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                        <span class="menu-text <?php echo $custom_class; ?>">Teste Rápido</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                    <ul>
                        <li><a href="#" data-act="ajax-modal" data-title="Criar Revendedor Teste" data-action-url="https://picpago.com.br/index.php/team_members/modal_form">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Criar Teste</span>
                        </a></li>
                        <li><a href="<?php echo site_url('team_members/index'); ?>" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Gerenciar Teste</span>
                        </a></li>
                    </ul>
                </li>
                
                
                <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main expand" >
                    <a <?php echo $target; ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                        <span class="menu-text <?php echo $custom_class; ?>">Revendedores</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                    <ul>
                        <li><a href="#" data-act="ajax-modal" data-title="Criar Revendedor PicPago" data-action-url="https://picpago.com.br/index.php/team_members/modal_form">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Criar Revendedor</span>
                        </a></li>
                        <li><a href="<?php echo site_url('team_members/index'); ?>" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Gerenciar Revendedor</span>
                            </a></li>
                    </ul>
                </li>
                
                
              
            <?php 
            
            foreach ($sidebar_menu as $main_menu) {
                $main_menu_name = get_array_value($main_menu, "name");
                if (!$main_menu_name) {
                    continue;
                }
              

                $is_custom_menu_item = get_array_value($main_menu, "is_custom_menu_item");
                $open_in_new_tab = get_array_value($main_menu, "open_in_new_tab");
                $url = get_array_value($main_menu, "url");
                $class = get_array_value($main_menu, "class");
                $custom_class = get_array_value($main_menu, "custom_class");
                $submenu = get_array_value($main_menu, "submenu");

                $expend_class = $submenu ? " expand " : "";
                $active_class = get_array_value($main_menu, "is_active_menu") ? "active" : "";

                $submenu_open_class = "";
                if ($expend_class && $active_class) {
                    $submenu_open_class = " open ";
                }

                if ($is_custom_menu_item) {
                    $language_key = get_array_value($main_menu, "language_key");
                    if ($language_key) {
                        $main_menu_name = app_lang($language_key);
                    }
                } else {
                    $main_menu_name = app_lang($main_menu_name);
                }

                $badge = get_array_value($main_menu, "badge");
                $badge_class = get_array_value($main_menu, "badge_class");
                $target = ($is_custom_menu_item && $open_in_new_tab) ? "target='_blank'" : "";
                ?>

                <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a <?php echo $target; ?> href="<?php echo $is_custom_menu_item ? $url : get_uri($url); ?>">
                        <i data-feather="<?php echo $class; ?>" class="icon"></i>
                        <span class="menu-text <?php echo $custom_class; ?>"><?php echo $main_menu_name; ?></span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                    <?php
                
                    
                    
                    if ($submenu) {
                        $ul_class = $main_menu_name == 'PicCoin' ? 'piccoin_loja' : '';
                        echo "<ul class='$ul_class'>";
                       
                        foreach ($submenu as $s_menu) {
                            $s_menu_name = get_array_value($s_menu, "name");
                            if (!$s_menu_name) {
                                continue;
                            }

                            $is_custom_menu_item = get_array_value($s_menu, "is_custom_menu_item");
                            $url = get_array_value($s_menu, "url");

                            if ($is_custom_menu_item) {
                                $language_key = get_array_value($s_menu, "language_key");
                                if ($language_key) {
                                    $s_menu_name = app_lang($language_key);
                                }
                            } else {
                                $s_menu_name = app_lang($s_menu_name);
                            }

                            if ($s_menu_name) {
                                $open_in_new_tab = get_array_value($s_menu, "open_in_new_tab");
                                $sub_menu_target = ($is_custom_menu_item && $open_in_new_tab) ? "target='_blank'" : "";
                                ?>
                            <li>
                                <a <?php echo $sub_menu_target; ?> href="<?php echo $is_custom_menu_item ? $url : get_uri($url); ?>">
                                    <i data-feather='minus' width='12'></i>
                                    <span><?php echo $s_menu_name; ?></span>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    echo "</ul>";
                }
                ?>
                </li>
                
                <?php
            }
            ?>
            
             <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a class="alert-id" <?php echo $target; ?> href="#">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle icon-16"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        <span class="menu-text <?php echo $custom_class; ?>">ChatBot</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
              </li>
              
                <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a class="alert-id" <?php echo $target; ?> href="#">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe icon-16"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        <span class="menu-text <?php echo $custom_class; ?>">Campanhas</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
              </li>
            
            <li class="main">
                    <a <?php echo $target; ?> href="<?php echo site_url('team_members/view/' . $login_user->id); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home icon-16"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span class="menu-text <?php echo $custom_class; ?>">Sua Conta</span>
                    </a>
              </li>
            <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a <?php echo $target; ?> href="<?php echo site_url('contact/index'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mic icon-16"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg>
                        <span class="menu-text <?php echo $custom_class; ?>">Suporte</span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
              </li>
        </ul>
    </div>
</div><!-- sidebar menu end -->
<script>
        document.querySelectorAll(".alert-id").forEach(function(button) {
            button.addEventListener("click", function() {
                alert("Funcionalidade em desenvolvimento.");
            });
        });
</script>
<script type='text/javascript'>
    feather.replace();
</script>