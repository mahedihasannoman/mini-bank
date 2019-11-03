<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview @if($activeMenu =='create_account_deposit' || $activeMenu == 'create_balance_transfer') active @endif">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Transactions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if($activeMenu =='create_account_deposit') active @endif">
                        <a href="{{route('deposit')}}"><i class="fa fa-circle-o"></i> Deposit</a></li>
                    <li class="@if($activeMenu =='create_balance_transfer') active @endif"><a
                            href="{{route('transferBalance')}}"><i
                                class="fa fa-circle-o"></i> Balance Transfer</a></li>
                </ul>
            </li>
            <li class="@if($activeMenu =='all_accounts') active @endif"><a href="{{route('allAccount')}}"><i
                        class="fa fa-google-wallet"></i> <span>Account</span></a></li>


        </ul>
    </section>

</aside>
