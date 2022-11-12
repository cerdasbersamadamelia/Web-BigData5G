<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active slideRight" id="setting">
            <form action="?= base_url(); ?>/home/theme" method="POST">
                <!-- <form action="" method="POST"> -->
                <div class="slim_scroll">
                    <div class="card">
                        <h6>Skins</h6>
                        <ul class="choose-skin list-unstyled" id="skin">
                            <li data-theme="purple" value="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue" value="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan" class="active" value="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green" value="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange" value="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush" value="blush">
                                <div class="blush"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <h6>Left Menu</h6>
                        <ul class="list-unstyled theme-light-dark">
                            <li>
                                <div class="t-light btn btn-default btn-simple btn-round">Light</div>
                            </li>
                            <li>
                                <div class="t-dark btn btn-default btn-round">Dark</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside>